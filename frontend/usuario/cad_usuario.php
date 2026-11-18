<?php
    $titulo = "Cadastro de usuários";
    require_once __DIR__ . "/../../backend/utils/conec.php";
    $cursos = bd_select("SELECT id_curso, nome FROM cursos ORDER BY nome");
    require_once __DIR__ . "/../assets/utils/nav_padrao.php";
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
      <button class="botao-login"><a href="/studytree/frontend/login.php">Faça login aqui</a></button>

    </section>

  </article>

  <section id="cadastro">

    <form action="/studytree/backend/usuario/confere_usuario.php" method="POST" id="form">
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
          <input type="tel" id="matricula" name="num_matricula" maxlength="12" placeholder="000000000000" required>

          <span id="erro-matricula"><br>A matrícula deve ter exatamente 12 números.</span>
        </div>

        <div>

          <label for="curso">Curso</label>

          <select id="curso" name="curso" required>
            <option value="">Selecione um curso</option>
            <?php foreach ($cursos as $curso): ?>
              <option value="<?php echo (int) $curso["id_curso"]; ?>">
                <?php echo htmlspecialchars($curso["nome"]); ?>
              </option>
            <?php endforeach; ?>
          </select>

        </div>

       <div>

          <label for="senha">Senha</label>
          <input type="password" id="senha" name="senha" required>

        </div>

        <div>

          <label for="confirmar">Confirme a senha</label>
          <input type="password" id="confirmar" name="confirmar" required>

        </div>

      </fieldset>

      <div>
        
        <button type="submit" id="enviar">Cadastrar</button>
        <button type="reset">Limpar</button>
        <p><a href="view_usuarios.php">Ver todos os usuários cadastrados</a></p>

        <h4 id="aviso" class="aviso" aria-live="polite"><?php
          if (isset($_GET["ok"])) {
              echo "Cadastro realizado.";
          } elseif (isset($_GET["erro"]) && $_GET["erro"] === "2") {
              echo "Este e-mail ou esta matrícula já está cadastrado.";
          } elseif (isset($_GET["erro"])) {
              echo "Não foi possível cadastrar. Confira o telefone com DDD, a matrícula de 12 números e a senha.";
          }
        ?></h4>
      </div>

    </form>
  </section>
</main>

<?php
    require_once __DIR__ . "/../assets/utils/footer_padrao.php";
?>