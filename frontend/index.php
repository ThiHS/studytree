
<?php
    require_once("nav_logo.php"); 
?>

    <main>
        <h2>testeh2</h2>
        <h3>testeh3</h3>
    </main>

    <section>
        <p>essas são as logos do nosso trabalho</p>
        <img src="img/logos/logo-clara.png" alt="">
        <img src="img/logos/logo-escura.png" alt="">
        
        <a href="teste_claro.html">página clara</a>
        <a href="teste_escuro.html">página escura </a>
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
    <!--
         6.   Formulário e rodapé — Guilherme Rocha
    -->
        <section>
        <form id="formulario1">


            <legend><span>Formulário</span></legend>
            <label for="lname"><span>Nome</span></label>
            <input type="text" id="lname" name="lname">
            <label for="lname"> <span>Sobrenome</span></label>
            <input type="text" id="lname" name="lname">
            <label for="email"><span>Email</span></label>
            <input type="email" id="email" name="email">
            <label for="birthday"><span>Data de Nascimento</span></label>
            <input type="date" id="birthday" name="birthday">
            <input type="submit" value="Enviar">
            


        </form>
        </section>

        <section>

            <footer>
               <h2><p>StudyTree</p></h2>
               <h3><p>Membros</p></h3>
               <p>Guilherme, Emanuella, Thiago, Angeline, Arthur, Isabella.</p>
            </footer>

        </section>

</body>
</html>