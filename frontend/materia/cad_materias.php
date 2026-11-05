<?php
    // recebe o formulário de cad_materias.php, 
    // valida e insere no banco de dados.
    // DIR é uma constante mágica do PHP que retorna o diretório
    // do arquivo atual onde eles estiver.
  
    $titulo = "Cadastro de matérias";
    require_once __DIR__ . "/../assets/utils/nav_padrao.php";
    // mostro as matérias cadastreadas em ordem decrescente, 
    // para que o usuário veja se a matéria que deseja cadastrar já existe.

?>
    
  <main class="cadastro-layout">

    <article>

        <section class="titulo-cad-disciplina">
            <h2>Cadastre uma Matéria</h2>
        </section>
        <section class="subtitulo-cad-disciplina">
            <h3>Preencha com atenção os dados da matéria que deseja cadastrar.</h3>
        </section>

    </article>

    <section id="cadastro-disciplina">

        <form action="/studytree/backend/materia/confere_materia.php" method="POST" id="form-materia">
          <fieldset>
            <legend>Preencha os campos abaixo:</legend>

            <div>
              <label for="nome">Nome da matéria</label>
              <input type="text" id="nome" name="nome" required>
            </div>
    

            <div class="descricao">

            <label for="desc">Descrição da matéria</label>
            <textarea id="desc" name="desc" rows="5" cols="40" required></textarea>

            </div>

          </fieldset>

          <div>
            <button type="submit" id="cadastrar-materia">Cadastrar</button>
            <button type="reset">Limpar</button>
            <h4 id="aviso" class="aviso" aria-live="polite"></h4>
          </div>
        </form>

      </section>
    </main>
</body>


