<?php
    $titulo = "Cadastro de usuários";
    require_once("nav_padrao.php"); 
?>

<main class="cadastro-layout">

  <article class="cadastro-usuario">

    <section>

      <h2>Faça parte da nossa comunidade!</h2>

    </section>

    <section>

      <p>
      Cadastre-se e tenha acesso a uma plataforma de estudos completa, com recursos interativos,
      materiais de qualidade e uma comunidade engajada. Junte-se a nós e potencialize seu aprendizado!
      </p>

    </section>

    <section>

      <h2>Já tem uma conta? </h2>
      <button class="botao-login"><a href="login.html">Faça login aqui</a></button>

    </section>

  </article>

  <section id="cadastro">

    <form action="usuario.php" method="POST" id="form">
      <fieldset>

        <legend>Preencha seus dados abaixo:</legend>

        <div>

          <label for="nome">Nome completo</label>
          <input type="text" id="nome" name="nome" required>

        </div>

        <div>

          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" required>

        </div>

        <div>

          <label for="telefone">Telefone</label>
          <input type="text" placeholder="(00) 00000-0000" maxlength="15" id="telefone" name="telefone" required>

        </div>

        <div>

          <label for="matricula">Número de matrícula</label>
          <input type="tel" id="matricula" maxlength="12" placeholder="000000000000" required>

          <span id="erro-matricula"><br>A matrícula deve ter exatamente 12 números.</span>
        </div>

        <div>

          <label for="curso">Curso</label>

          <select id="curso" name="curso">
            <option value="Ciência da Computação">Ciência da Computação</option>
            <option value="Engenharia de Software">Engenharia de Software</option>
            <option value="Sistemas de Informação">Sistemas de Informação</option>
          </select>

        </div>

        <div>

          <label for="mensagem">Mensagem</label>
          <textarea id="mensagem" name="mensagem" rows="5" cols="40" required></textarea>

        </div>

        <div>

          <input type="checkbox" id="copia" name="copia" value="sim">
          <label for="copia">Quero receber uma cópia desta mensagem</label>

        </div>

      </fieldset>

      <div>
        
        <button type="submit" id="enviar">Enviar</button>
        <button type="reset">Limpar</button>

        <h4 id="aviso" class="aviso" aria-live="polite"></h4>
      </div>

    </form>
  </section>
</main>

<?php
    require_once("footer_padrao.php"); 
?>