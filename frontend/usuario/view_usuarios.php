<?php

require_once __DIR__ . "/../../backend/utils/tratareq.php";

$titulo = "Cadastro de usuários";

$usuarios = bd_select("SELECT * FROM usuario ORDER BY num_matricula DESC");
$total = count($usuarios);

require_once __DIR__ . "/../assets/utils/nav_logo.php";
?>

<main>
    <section id="cadastros">
    <h2>Usuários Cadastrados</h2>
    <p class="aviso"><?php echo $total; ?> Usuário(s) no banco.</p>
        <table>
        <thead>
        <tr>
        <th>Nº</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Telefone</th>
        <th>Matrícula</th>
        <th>Curso</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($usuarios as $u): ?>
        <tr>
        <td><?php echo $u["id"]; ?></td>
        <td><?php echo htmlspecialchars($u["nome"]); ?></td>
        <td><?php echo htmlspecialchars($u["email"]); ?></td>
        <td><?php echo htmlspecialchars($u["telefone"]); ?></td>
        <td><?php echo htmlspecialchars($u["matricula"]); ?></td>
        <td><?php echo htmlspecialchars($u["curso"]); ?></td>
        </tr>
        <?php endforeach; ?>

        </tbody>
        </table>
        <p><a href="cad_usuario.php">Voltar para a página</a></p>
    </section>
</main>

<?php
require_once __DIR__ . "/../assets/utils/footer_padrao.php";
?>
