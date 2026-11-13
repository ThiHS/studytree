<?php

$titulo = "Cadastro de disciplinas";
require_once __DIR__ . "/../../backend/utils/tratareq.php";
require_once __DIR__ . "/../../backend/utils/conec.php";
require_once __DIR__ . "/../assets/utils/nav_padrao.php";

// deixar os nomes iguais aos da tabela

$disciplinas = bd_select(
    "SELECT d.id_disciplina AS id,
            d.nome_disciplina AS nome,
            d.descricao_disciplina AS descricao,
            CASE WHEN EXISTS (SELECT 1 FROM disciplinas_relacionadas dr
                               WHERE dr.id_disciplina_filha = d.id_disciplina)
                 THEN 'Sim' ELSE 'Não' END AS requisito,
            (SELECT GROUP_CONCAT(c.nome ORDER BY c.nome SEPARATOR ', ')
               FROM curso_disciplina cd
               JOIN cursos c ON c.id_curso = cd.id_curso
              WHERE cd.id_disciplina = d.id_disciplina) AS cursos,
            (SELECT GROUP_CONCAT(p.nome_disciplina ORDER BY p.nome_disciplina SEPARATOR ', ')
               FROM disciplinas_relacionadas dr
               JOIN disciplinas p ON p.id_disciplina = dr.id_disciplina_pai
              WHERE dr.id_disciplina_filha = d.id_disciplina) AS prerequisitos
       FROM disciplinas d
      ORDER BY d.nome_disciplina ASC"
);
$total = count($disciplinas);
?>

<main>
    <section id="cadastros">
    <h2>Disciplinas Cadastradas</h2>
    <p class="aviso"><?php echo $total; ?> Disciplina(s) no banco.</p>
        <table>
        <thead>
        <tr>
        <th>Nº</th>
        <th>Nome</th>
        <th>Requisito</th>
        <th>Cursos</th>
        <th>Pré-requisitos</th>
        <th>Descrição</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($disciplinas as $d): ?>
        <tr>
        <td><?php echo $d["id"]; ?></td>
        <td><?php echo htmlspecialchars($d["nome"]); ?></td>
        <td><?php echo htmlspecialchars($d["requisito"]); ?></td>
        <td><?php echo htmlspecialchars($d["cursos"] ?? "-"); ?></td>
        <td><?php echo htmlspecialchars($d["prerequisitos"] ?? "-"); ?></td>
        <td><?php echo htmlspecialchars($d["descricao"] ?? ""); ?></td>
        </tr>
        <?php endforeach; ?>

        </tbody>
        </table>
        <p><a href="cad_disciplina.php">Voltar para a página</a></p>
    </section>
</main>

<?php
require_once __DIR__ . "/../assets/utils/footer_padrao.php";
?>