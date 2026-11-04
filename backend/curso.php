<?php
// Recebe o formulário de cad_curso.php
// Recebe os dados do formulário de cadastro de curso, 
// valida e insere no banco de dados.
// 
require_once __DIR__ . "/tratareq.php";
exigir_post();

$nome = $_POST["nome"];
$desc = $_POST["desc"];

// a variavel $ok e uma auxiliar usada como flag para indicar 
// o que está habilitado para ser inserido no banco de dados.
$ok = true;

try {
    if ($nome === "" || mb_strlen($nome) > 80) {
        $ok = false;
    } 
     elseif (mb_strlen($desc) > 300) {
         $ok = false;
    } else {
        // Verifica se o curso já existe no banco de dados, usando prepared statement para evitar SQL injection.
        // bd_select_one retorna um registro ou false se não encontrar.
        $existe = bd_select_one(
            "SELECT id_curso FROM cursos WHERE nome = ?",
            [$nome]
        );
        if ($existe) {
            $ok = false;
        } 
         else {
            // a inserçao usa prepared statement tratada em conec.php, que previne SQL injection.
             bd_insert(
                 "INSERT INTO cursos (nome, descricao) VALUES (?, ?)",
                 [$nome, $desc !== "" ? $desc : null]
             );
         }
    }
} catch (PDOException $e) {
    $ok = false;
    exit("Erro no banco: " . $e->getMessage());
}

header("Location: ../frontend/cad_curso.php");
exit;
