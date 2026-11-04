<?php
    require_once("../backend/conec.php");

    $sql = "SELECT * FROM permissoes;";
    $permissoes_bd = bd_select($sql);

    var_dump($permissoes_bd);
    $permissoes = [];
    $perpermissoes_padrao = ['Ver','Criar','Editar','Excluir'];

    foreach($permissoes_bd as $permissao) {
        if(!isset($permissoes[$permissao['nome_permissao']])) {
            $permissoes;
        }

        /*if(in_array($permissao['descricao'],$perpermissoes_padrao )) {
            $permissoes[$permissao['nome_permissao']]['nivel'] += $permissao['cod_permissao'];
        }*/
        //$permissoes[$permissao['nome_permissao']];
    }

    echo "<br><br>---------------------------------<br><br>";
    var_dump($permissoes);
?>