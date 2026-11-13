<?php
require_once __DIR__ . "/../utils/conec.php";
   
// mostra as materias cadastreadas em ordem decrescente, do ultimo cadastrado para o primeiro,
// para que o usuário veja se a materia que deseja cadastrar já existe.
function view_materias() {
    try {
        require_once __DIR__ . "/../utils/conec.php";
        $materias = bd_select(
            "SELECT id_materia, nome_materia, descricao_materias, ativo FROM materias ORDER BY id_materia DESC"
        );
        return $materias;
    } catch (PDOException $e) {
        error_log("erro ao carregar banco: " . $e->getMessage());
        return null;
    }
}
?>