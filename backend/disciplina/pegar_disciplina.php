<?php

require_once __DIR__ . "/../utils/tratareq.php";
exigir_get();

$ok = true;

try {
    $disciplinas = bd_select(
        "SELECT d.id_disciplina AS id,
            d.nome_disciplina AS nome,
            d.descricao_disciplina AS descricao,
            GROUP_CONCAT(DISTINCT c.nome ORDER BY c.nome SEPARATOR ', ') AS cursos,
            GROUP_CONCAT(DISTINCT p.nome_disciplina ORDER BY p.nome_disciplina SEPARATOR ', ') AS prerequisitos
            FROM disciplinas d
            LEFT JOIN curso_disciplina cd ON cd.id_disciplina = d.id_disciplina
            LEFT JOIN cursos c ON c.id_curso = cd.id_curso
            LEFT JOIN disciplinas_relacionadas dr ON dr.id_disciplina_filha = d.id_disciplina
            LEFT JOIN disciplinas p ON p.id_disciplina = dr.id_disciplina_pai
            GROUP BY d.id_disciplina
            ORDER BY d.nome_disciplina"
    );
} catch (PDOException $e) {
    $ok = false;
    error_log("Erro no banco: " . $e->getMessage());
}

header("Location: /studytree/frontend/disciplina/cad_disciplina.php");
exit;