<?php
    $titulo = "Cadastro de cursos";
    require_once("nav_padrao.php"); 
?>
    
    <main class="cadastro-layout">

    <article>

        <section class="titulo-cad-disciplina">
            <h2>Cadastre um Curso</h2>
        </section>
        <section class="subtitulo-cad-disciplina">
            <h3>Preencha com atenção os dados do curso que deseja cadastrar.</h3>
        </section>

    </article>

    <section id="cadastro-disciplina">

        <form action="../backend/curso.php" method="POST" id="form-curso">
          <fieldset>
            <legend>Preencha os campos abaixo:</legend>

            <div>
              <label for="nome">Nome do Curso</label>
              <input type="text" id="nome" name="nome" required>
            </div>
    

            <div class="descricao">

            <label for="desc">Descrição do Curso</label>
            <textarea id="desc" name="desc" rows="5" cols="40" required></textarea>

            </div>

          </fieldset>

          <div>
            <button type="submit" id="cadastrar-curso">Cadastrar</button>
            <button type="reset">Limpar</button>
            <h4 id="aviso" class="aviso" aria-live="polite"></h4>
          </div>
        </form>
      </section>
    
    </main>
</body>
</html>