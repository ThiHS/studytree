<?php
// Recebe o formulário de list_permissoes.php.
// O ? do prepare recebe o valor sem montar a SQL na mão.
require_once __DIR__ . "/../utils/conec.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /studytree/frontend/curso/list_permissoes.php");
    exit;
}

$matricula = trim($_POST["usuarios"] ?? "");

$ids = [];
foreach ($_POST as $chave => $valor) {
    if ($chave === "usuarios") {
        continue;
    }
    $id = filter_var(trim((string) $valor), FILTER_VALIDATE_INT);
    if ($id) {
        $ids[] = $id;
    }
}

$usuario = bd_select_one(
    "SELECT num_matricula FROM usuario WHERE num_matricula = ?",
    [$matricula]
);

if (!$usuario) {
    header("Location: /studytree/frontend/curso/list_permissoes.php");
    exit;
}

$inserir = $pdo->prepare(
    "INSERT IGNORE INTO usuarios_permissoes (num_matricula, id_permissao) VALUES (?, ?)"
);

foreach ($ids as $id) {
    $inserir->execute([$matricula, $id]);
}

header("Location: /studytree/frontend/curso/view_permissoes.php?matricula=" . urlencode($matricula));
exit;
