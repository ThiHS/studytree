<?php
    $titulo = "Login";
    require_once __DIR__ . "/assets/utils/nav_padrao.php";
?>

    
    <main class="cadastro-layout">

        
        <section id="cadastro-disciplina">

            <form action="/studytree/backend/usuario/confere_login.php" method="POST">
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

<?php require_once __DIR__ . "/assets/utils/footer_padrao.php"; ?>