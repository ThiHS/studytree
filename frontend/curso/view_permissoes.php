<?php
require_once __DIR__ . "/../../backend/utils/conec.php";

$titulo = "Permissões";
$matricula = trim($_GET["matricula"] ?? "");

$linhas = bd_select(
    "SELECT u.nome, u.num_matricula, p.nome_permissao, p.descricao
     FROM usuarios_permissoes up
     JOIN usuario u ON u.num_matricula = up.num_matricula
     JOIN permissoes p ON p.id_permissao = up.id_permissao
     ORDER BY u.nome, p.nome_permissao, p.descricao"
);

$porUsuario = [];
foreach ($linhas as $linha) {
    $mat = $linha["num_matricula"];
    if (!isset($porUsuario[$mat])) {
        $porUsuario[$mat] = [
            "nome" => $linha["nome"],
            "modulos" => [],
        ];
    }
    $porUsuario[$mat]["modulos"][$linha["nome_permissao"]][] = $linha["descricao"];
}

if ($matricula !== "" && isset($porUsuario[$matricula])) {
    $escolhido = [$matricula => $porUsuario[$matricula]];
    unset($porUsuario[$matricula]);
    $porUsuario = $escolhido + $porUsuario;
}

require_once __DIR__ . "/../assets/utils/nav_padrao.php";
?>

<main>
    <section id="cadastros">
        <h2>Permissões concedidas</h2>

        <?php if ($matricula !== "" && isset($porUsuario[$matricula])): ?>
            <p class="aviso">Permissões salvas para <?php echo htmlspecialchars($porUsuario[$matricula]["nome"]); ?>.</p>
        <?php endif; ?>

        <?php if (!$porUsuario): ?>
            <p class="aviso">Nenhuma permissão cadastrada.</p>
        <?php endif; ?>

        <?php foreach ($porUsuario as $mat => $usuario): ?>
            <h3><?php echo htmlspecialchars($usuario["nome"]); ?></h3>
            <p><?php echo htmlspecialchars($mat); ?></p>
            <table>
                <thead>
                    <tr>
                        <th>Módulo</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuario["modulos"] as $modulo => $acoes): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($modulo); ?></td>
                            <td><?php echo htmlspecialchars(implode(", ", $acoes)); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endforeach; ?>

        <p><a href="list_permissoes.php">Voltar para atribuir permissões</a></p>
        </section>
</main>

<?php
require_once __DIR__ . "/../assets/utils/footer_padrao.php";
?>
