<?php
    // recebe o formulário de cad_materias.php, 
    // valida e insere no banco de dados.
    // DIR é uma constante mágica do PHP que retorna o diretório
    // do arquivo atual onde eles estiver.
    require_once __DIR__ . "/../backend/conec.php";
    $titulo = "Cadastro de matérias";
    require_once("nav_padrao.php");
    // mostro as matérias cadastreadas em ordem decrescente, 
    // para que o usuário veja se a matéria que deseja cadastrar já existe.
    $materias = bd_select(
        "SELECT id_materia, nome_materia, descricao_materias
         FROM materias
         ORDER BY id_materia DESC"
    );
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

        <form action="../backend/materia.php" method="POST" id="form-materia">
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

      <section class="lista-materias">
       <h3>Matérias cadastradas</h3>
       
         <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Nome</th>
              <th>Descrição</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($materias as $row): ?>
              <tr>
                <td><?= htmlspecialchars((string) $row["id_materia"]) ?></td>
                <td><?= htmlspecialchars($row["nome_materia"]) ?></td>
                <td><?= htmlspecialchars((string) $row["descricao_materias"]) ?></td>
              </tr>
             <?php endforeach; ?>
          </tbody>
         </table>
      </section>
    </main>
</body>


