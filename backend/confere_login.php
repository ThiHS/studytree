<?php
    require_once("conec.php");
    session_start();

    $sql="
        SELECT 
            * 
        FROM 
            usuarios 
        WHERE 
            email = '".$_POST['email']."' AND 
            senha = '".md5($_POST['senha'])."';
    ";
    $res = bd_select_one($sql);

    $_SESSION['usuario']['nome'] = $res['nome'];
    $_SESSION['usuario']['email'] = $res['email '];
    $_SESSION['usuario']['telefone'] = $res['telefone'];
    $_SESSION['usuario']['num_matricula'] = $res['num_matricula'];

    header("Location: ../frontend/login.php");
?>