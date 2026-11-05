
<?php
    // recebe o formulário de cad_curso.php, 
    // valida e insere no banco de dados.
    // DIR é uma constante mágica do PHP que retorna o diretório
    // do arquivo atual onde eles estiver.
    require_once __DIR__ . "/../../backend/utils/conec.php";
    $titulo = "Cadastro de cursos";
    require_once __DIR__ . "/../assets/utils/nav_padrao.php";
    // mostro os cursos cadastreados em ordem decrescente, 
    // para que o usuário veja se o curso que deseja cadastrar já existe.
    $curso = bd_select(
        "SELECT id_curso, nome, descricao FROM cursos ORDER BY id_curso DESC"
    );
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

        <form action="/studytree/backend/curso/confere_curso.php" method="POST" id="form-curso">
          <fieldset>
            <legend>Preencha os campos abaixo:</legend>

            <div>
              <label for="nome">Nome do curso</label>
              <input type="text" id="nome" name="nome" required>
            </div>
    

            <div class="descricao">

            <label for="desc">Descrição do curso</label>
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

      <section class="lista-cursos">
       <h3>Cursos cadastrados</h3>
       
         <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descrição</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($curso as $row): ?>
              <tr>
                <td><?= htmlspecialchars((string) $row["id_curso"]) ?></td>
                <td><?= htmlspecialchars($row["nome"]) ?></td>
                <td><?= htmlspecialchars((string) $row["descricao"]) ?></td>
              </tr>
             <?php endforeach; ?>
          </tbody>
         </table>
      </section>
    </main>
</body>
</html>