<?php
    // recebe o formulário de cad_conteudo.php, 
    // valida e insere no banco de dados.
    // DIR é uma constante que retorna o diretório
    // do arquivo atual onde eles estiver.
    require_once __DIR__ . "/../../backend/utils/conec.php";
    $titulo = "Cadastro de conteúdos";
    require_once __DIR__ . "/../assets/utils/nav_padrao.php";
    
?>
    
  <main class="cadastro-layout">

    <article>

        <section class="titulo-cad-disciplina">
            <h2>Cadastre o Conteúdo</h2>
        </section>
        <section class="subtitulo-cad-disciplina">
            <h3>Preencha com atenção os dados do conteúdo que deseja cadastrar.</h3>
        </section>

    </article>

    <section id="cadastro-disciplina">

        <form action="/studytree/backend/conteudo/confere_conteudo.php" method="POST" id="form-conteudo">
          <fieldset>
            <legend>Preencha os campos abaixo:</legend>

            <div>
              <label for="nome">Nome </label>
              <input type="text" id="nome" name="nome" required>
            </div>
    

            <div class="descricao">

            <label for="desc">Descrição </label>
            <textarea id="desc" name="desc" rows="5" cols="40" required></textarea>

            </div>

            <div>
              <label for="ativo">Ativo</label>
              <input type="checkbox" id="ativo" name="ativo" value="1" checked>
            </div>

          </fieldset>

          <div>
            <button type="submit" id="cadastrar-conteudo">Cadastrar</button>
            <button type="reset">Limpar</button>
            <h4 id="aviso" class="aviso" aria-live="polite"></h4>
          </div>
        </form>

      </section>
    </main>
</body>
</html>