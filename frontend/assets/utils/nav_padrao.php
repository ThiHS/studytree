<!DOCTYPE html>
<html lang="en">
    <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StudyTree</title>
    <link rel="icon" type="image/png-icon" href="/studytree/frontend/assets/img/logos/five.png">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Elms+Sans:ital,wght@0,100..900;1,100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
       
    <link rel="stylesheet" href="/studytree/frontend/assets/css/estilo.css">
    <link rel="stylesheet" href="/studytree/frontend/assets/css/tema-escuro.css" id="tema-escuro" disabled>

    <script src="/studytree/frontend/assets/js/script.js" defer></script>
    </head>

<body>

    <header>

    <div class="miniL">
        <img src="/studytree/frontend/assets/img/logos/pequena.png" alt="logo_pequena" class="logopequena">
    </div>

        
        <h1>
            <?=$titulo?>

        </h1>

    </header>
        
    <nav>

        <ul>
            <li> <button ><a href="/studytree/frontend/index.php">Voltar para a página inicial</a></button></li>
            <li> <button><a href="/studytree/frontend/usuario/cad_usuario.php">Cadastre-se Aqui!</a></button></li>
            <li> <button><a href="/studytree/frontend/disciplina/cad_disciplina.php">Cadastrar disciplinas</a></button></li>
            <li> <button><a href="/studytree/frontend/materia/cad_materias.php">Cadastrar materias</a></button></li>
            <li> <button ><a href="/studytree/frontend/curso/cad_curso.php">Cadastrar cursos</a></button></li>
            <li><button><a href="/studytree/frontend/conteudo/cad_conteudo.php">Cadastrar conteúdo</a></button></li>
            <div class="botao-tema">
                <button type="button" id="botao-tema" id="botao-tema" class="botao-tema">⏾</button>
            </div>

        </ul>

    </nav>

