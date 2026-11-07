<?php
   
// mostro os cursos cadastreados em ordem decrescente, do ultimo cadastrado para o primeiro,
// para que o usuário veja se o curso que deseja cadastrar já existe. 
try {
    require_once __DIR__ . "/../utils/conec.php";
    $cursos = bd_select(
        "SELECT id_curso, nome, descricao FROM cursos ORDER BY id_curso DESC"
    );
} catch (PDOException $e) {
    error_log("erro ao carregar banco: " . $e->getMessage());
}
?>