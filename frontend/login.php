<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>studytree</title>
    <link rel="icon" type="image/png-icon" href="img/logos/five.png">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,200..800&family=Elms+Sans:ital,wght@0,100..900;1,100..900&family=Saira:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
       
    <link rel="stylesheet" href="css/tema-escuro.css">
    <link rel="stylesheet" href="css/estilo.css">
    <script src="js/script.js" defer></script>
</head>
<body>
    <header>
        <h1 class="my-auto">StudyTree</h1>
    </header>
    
    <main class="cadastro-layout">

        <section id="cadastro-disciplina">

            <form action="../backend/confere_login.php" method="POST">
                <fieldset>
                    <legend>Login</legend>

                    <div>
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
            

                     <div>
                        <label for="senha">senha</label>
                        <input type="password" id="senha" name="senha" required>
                    </div>

                </fieldset>

                <div>
                    <button type="submit" id="logar">Logar</button>
                    <button type="reset">Limpar</button>
                    <h4 id="aviso" class="aviso" aria-live="polite"></h4>
                </div>
            </form>
        </section>
    </main>

    <a href="list_permissoes.php"></a>
</body>
</html>