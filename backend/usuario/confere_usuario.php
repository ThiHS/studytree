<?php
// Recebe o formulário de cad_usuario.php.
// O ? do prepare recebe o valor sem montar a SQL na mão.
require_once __DIR__ . "/../utils/conec.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /studytree/frontend/usuario/cad_usuario.php");
    exit;
}

$nome = trim($_POST["nome"] ?? "");
$email = trim($_POST["email"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");
$matricula = preg_replace('/\D/', '', $_POST["num_matricula"] ?? "");
$senha = $_POST["senha"] ?? "";
$confirmar = $_POST["confirmar"] ?? "";
$curso = filter_input(INPUT_POST, "curso", FILTER_VALIDATE_INT);

$digitosFone = preg_replace('/\D/', '', $telefone);
if (preg_match('/^\d{11}$/', $digitosFone)) {
    $telefone = "(" . substr($digitosFone, 0, 2) . ") " . substr($digitosFone, 2, 5) . "-" . substr($digitosFone, 7, 4);
} elseif (preg_match('/^\d{10}$/', $digitosFone)) {
    $telefone = "(" . substr($digitosFone, 0, 2) . ") " . substr($digitosFone, 2, 4) . "-" . substr($digitosFone, 6, 4);
}

$valido = $nome !== ""
    && mb_strlen($nome) <= 80
    && preg_match('/^[\p{L} ]+$/u', $nome)
    && filter_var($email, FILTER_VALIDATE_EMAIL)
    && mb_strlen($email) <= 230
    && preg_match('/^\(\d{2}\) \d{4,5}-\d{4}$/', $telefone)
    && preg_match('/^\d{12}$/', $matricula)
    && strlen($senha) > 5
    && $senha === $confirmar
    && $curso;

if (!$valido) {
    header("Location: /studytree/frontend/usuario/cad_usuario.php?erro=1");
    exit;
}

try {
    $busca = $pdo->prepare(
        "SELECT num_matricula FROM usuario WHERE num_matricula = ? OR email = ?"
    );
    $busca->execute([$matricula, $email]);
    if ($busca->fetch()) {
        header("Location: /studytree/frontend/usuario/cad_usuario.php?erro=2");
        exit;
    }

    $cursoExiste = $pdo->prepare("SELECT id_curso FROM cursos WHERE id_curso = ?");
    $cursoExiste->execute([$curso]);
    if (!$cursoExiste->fetch()) {
        header("Location: /studytree/frontend/usuario/cad_usuario.php?erro=1");
        exit;
    }

    $inserir = $pdo->prepare(
        "INSERT INTO usuario (num_matricula, nome, email, telefone, senha) VALUES (?, ?, ?, ?, ?)"
    );
    $inserir->execute([$matricula, $nome, $email, $telefone, md5($senha)]);

    $vincular = $pdo->prepare(
        "INSERT INTO cursos_usuario (id_curso, num_matricula, ativo, data_inicio) VALUES (?, ?, 'ativo', CURDATE())"
    );
    $vincular->execute([$curso, $matricula]);
} catch (PDOException $e) {
    header("Location: /studytree/frontend/usuario/cad_usuario.php?erro=1");
    exit;
}

header("Location: /studytree/frontend/usuario/cad_usuario.php?ok=1");
exit;
