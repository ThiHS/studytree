<?php

require_once __DIR__ . "/../utils/tratareq.php";
exigir_post();

$nome = trim($_POST["nome"] ?? "");
$desc = trim($_POST["desc"] ?? "");
$requisito = $_POST["requisito"] ?? "";

$cursos = [];
if (isset($_POST["cursos"])) {
    $cursos = $_POST["cursos"];
}

$prerequisitos = [];
if (isset($_POST["prerequisitos"])) {
    $prerequisitos = $_POST["prerequisitos"];
}

$ok = true;

try {
    if ($nome === "" || mb_strlen($nome) > 100) {
        $ok = false;
    } elseif ($desc === "" || mb_strlen($desc) > 300) {
        $ok = false;
    } elseif (count($cursos) === 0) {
        $ok = false;
    } elseif ($requisito === "Sim" && count($prerequisitos) === 0) {
        $ok = false;
    }

    if ($ok !== false) {
        // verifica se a disciplina já existe, para não repetir
        $existe = bd_select_one(
            "SELECT id_disciplina FROM disciplinas WHERE nome_disciplina = ?",
            [$nome]
        );
        if ($existe) {
            $ok = false;
        }

        if ($ok) {
            bd_insert(
                "INSERT INTO disciplinas (nome_disciplina, descricao_disciplina) VALUES (?, ?)",
                [$nome, $desc]
            );

            // busca o id da disciplina
            $nova = bd_select_one(
                "SELECT id_disciplina FROM disciplinas WHERE nome_disciplina = ?",
                [$nome]
            );
            $id_nova = $nova["id_disciplina"];

            // liga a disciplina com os cursos
            foreach ($cursos as $id_curso) {
                bd_insert(
                    "INSERT INTO curso_disciplina (id_curso, id_disciplina, data_vinculo) VALUES (?, ?, CURDATE())",
                    [$id_curso, $id_nova]
                );
            }

            // liga a disciplina com os requisitos
            if ($requisito === "Sim") {
                foreach ($prerequisitos as $id_prereq) {
                    bd_insert(
                        "INSERT INTO disciplinas_relacionadas (id_disciplina_pai, id_disciplina_filha) VALUES (?, ?)",
                        [$id_prereq, $id_nova]
                    );
                }
            }
        }
    }
} catch (PDOException $e) {
    $ok = false;
    error_log("Erro no banco: " . $e->getMessage());
}

header("Location: /studytree/frontend/disciplina/cad_disciplina.php");
exit;