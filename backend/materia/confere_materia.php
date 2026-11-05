<?php
// Recebe o formulário de cad_materias.php
// Recebe os dados do formulário de cadastro da matéria, 
// valida e insere no banco de dados.

require_once __DIR__ . "/../utils/tratareq.php";
exigir_post();

// variáveis vindas do formulario, o parametro ?? verifica se a variavel foi definida
// no metodo POST, caso não tenha sido definida, atribui uma string vazia.
$nome = $_POST["nome"] ?? "";
$desc = $_POST["desc"] ?? "";

$ok = true;

try {
    if ($nome === "" || mb_strlen($nome) > 150) {
        $ok = false;
        $status = "nome_invalido";
    } elseif (mb_strlen($desc) > 300) {
        $ok = false;
    } else {
        $existe = bd_select_one(
            "SELECT id_materia FROM materias WHERE nome_materia = ?",
            [$nome]
        );

        if ($existe) {
            $ok = false;
        } else {
            bd_insert(
                "INSERT INTO materias (nome_materia, descricao_materias) VALUES (?, ?)",
                [$nome, $desc !== "" ? $desc : null]
            );
        }
    }
} catch (PDOException $e) {
    $ok = false;
    exit("Erro no banco: " . $e->getMessage());
}

header("Location: /studytree/frontend/materia/cad_materias.php");
exit;
