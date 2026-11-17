
<?php
    require_once __DIR__ . "/assets/utils/nav_logo.php";
?>

    <main>
        <h2>testeh2</h2>
        <h3>testeh3</h3>
    </main>

    <section>
        <p>essas são as logos do nosso trabalho</p>
        <img src="/studytree/frontend/assets/img/logos/logo-clara.png" alt="">
        <img src="/studytree/frontend/assets/img/logos/logo-escura.png" alt="">
        
        <a href="/studytree/testes/teste_claro.html">página clara</a>
        <a href="/studytree/testes/teste_escuro.html">página escura </a>
    </section>

    <!--
        5.   Tabela — Arthur Henrique
    -->

    <section id="tabela-materias">
        <p>tabela de materias do primeiro periodo</p>
        <table>
            <caption>bem vindo ao primeiro periodo de ciencias da computação(teste)!</caption>
            <thead>
                <tr>
                    <th scope="col">materia</th>
                    <th scope="col">topico</th>
                    <th scope="col">dificuldade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>calculo</td>
                    <td>derivada</td>
                    <td>alta</td>
                </tr>
                <tr>
                    <td>sistemas_operacionais</td>
                    <td>gerenciamento_memoria</td>
                    <td>media</td>
                </tr>
                <tr>
                    <td>programacao_1</td>
                    <td>estrutura_dados</td>
                    <td>baixa</td>
                </tr>
                <tr>
                    <td>compiladores</td>
                    <td>analise_léxica</td>
                    <td>media</td>
                </tr>
            </tbody>
        </table>
    </section>   


       <section id="cadastro-disciplina">

        <form action="/studytree/backend/materia/confere_materia.php" method="POST" id="form-materia">
          <fieldset>
            <legend>preencha os campos abaixo:</legend>

            <div>
              <label for="nome">exemplo</label>
              <input type="text" id="nome" name="nome" required>
            </div>
    

            <div class="descricao">

            <label for="desc">descrição do exemplo</label>
            <textarea id="desc" name="desc" rows="5" cols="40" required></textarea>

            </div>

          </fieldset>

          <div>
            <button type="submit" id="cadastrar-materia">cadastrar</button>
            <button type="reset">limpar</button>
            <h4 id="aviso" class="aviso" aria-live="polite"></h4>
          </div>
        </form>

      </section>

<?php
    require_once __DIR__ . "/assets/utils/footer_padrao.php";
?>