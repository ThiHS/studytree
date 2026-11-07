<?php

    require_once(__DIR__ . "/../utils/conec.php");

    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        http_response_code(405);
        exit("Requisição com metodo errado.");
    }
 

    $nome = $_POST['nome_conteudo'];
    $descricao = $_POST['descricao_conteudo'];
    $idmateria = $_POST['id_materia'];

    bd_insert(
    "INSERT INTO conteudos (id_materia, nome_conteudo, descricao_conteudo)
     VALUES (?, ?, ?)",
    [
        $idmateria,
        $nome,
        $descricao !== "" ? $descricao : null
    ]
);



    catch (PDOException $e) {
        $ok = false;
        error_log("Erro no banco: " . $e->getMessage());
    }



    header("Location: /studytree/frontend/cad_conteudo.php");
    exit;
?>