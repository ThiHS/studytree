<?php
    require_once __DIR__ . "/../../backend/utils/conec.php";
    $titulo = "Cadastro de conteúdo";
    require_once __DIR__ . "/../assets/utils/nav_padrao.php";
?>
    
    <main class="cadastro-layout">

    <article>

        <section class="titulo-cad-conteúdo">
            <h2>Cadastre um conteúdo</h2>
        </section>
        <section class="subtitulo-cad-conteúdo">
            <h3>Preencha com atenção os dados do conteúdo que deseja cadastrar.</h3>
        </section>

    </article>

    <section id="cadastro-conteúdo">
        <form action="">
          <fieldset>
            <legend>Preencha os campos abaixo:</legend>

            <div>
              <label for="nome">Nome do conteúdo</label>
              <input type="text" id="nome" name="nome" required>
            </div>
    

            <div class="descricao">

            <label for="desc">Descrição do conteúdo</label>
            <textarea id="desc" name="desc" rows="5" cols="40" required></textarea>

            </div>

          </fieldset>

          <div>
            <button type="submit" id="cadastrar-conteúdo">Cadastrar</button>
            <button type="reset">Limpar</button>
            <h4 id="aviso" class="aviso" aria-live="polite"></h4>
          </div>
        </form>
      </section>
        </form>
        



       
      </section>
    
    </main>
</body>
</html>