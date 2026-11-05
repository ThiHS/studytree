<?php

try {
    require_once __DIR__ . '/conec.php';

    echo "Conectou com o banco de dados";

} catch (PDOException $e) {
    echo "Erro na conexão com o banco de dados.";
}