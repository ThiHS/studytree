<?php
$titulo = "Cadastro de disciplinas";
require_once __DIR__ . "/../assets/utils/nav_padrao.php";
require_once __DIR__ . "/../../backend/utils/conec.php";

$lista_cursos = bd_select("SELECT id_curso, nome FROM cursos ORDER BY nome");
$lista_disciplinas = bd_select("SELECT id_disciplina, nome_disciplina FROM disciplinas ORDER BY nome_disciplina");
?>

<main class="cadastro-layout">

  <article>

    <section class="titulo-cad-disciplina">
      <h2>Cadastre uma Disciplina</h2>
    </section>
    <section class="subtitulo-cad-disciplina">
      <h3>Preencha com atenção os dados da disciplina que deseja cadastrar.</h3>
    </section>

  </article>

  <section id="cadastro-disciplina">

    <form action="/studytree/backend/disciplina/confere_disciplina.php" method="POST" id="form-disciplina">
      <fieldset>
        <legend>Preencha os campos abaixo:</legend>

        <div>
          <label for="nome">Nome da Disciplina</label>
          <input type="text" id="nome" name="nome" required>
        </div>

        <h4>Curso(s) relacionado(s):</h4>
        <?php foreach ($lista_cursos as $curso) { ?>
          <div class="checklist-curso">
            <input type="checkbox" id="curso<?= $curso['id_curso'] ?>" name="cursos[]" value="<?= $curso['id_curso'] ?>">
            <label for="curso<?= $curso['id_curso'] ?>"><?= htmlspecialchars($curso['nome']) ?></label>
          </div>
        <?php } ?>

        <div id="req-materia">
          <label for="requisito">Essa disciplina possui pré-requisitos para ser cursada?</label>
          <select id="requisito" name="requisito" onchange="verificarResposta()" required>
            <option value="">Selecione...</option>
            <option value="Sim">Sim</option>
            <option value="Não">Não</option>
          </select>
        </div>

        <div id="checklist-materia">
          <h4>Disciplinas necessárias:</h4>
          <?php foreach ($lista_disciplinas as $disc) { ?>
            <div class="checklist-item">
              <input type="checkbox" id="disc<?= $disc['id_disciplina'] ?>" name="prerequisitos[]"
                value="<?= $disc['id_disciplina'] ?>">
              <label for="disc<?= $disc['id_disciplina'] ?>"><?= htmlspecialchars($disc['nome_disciplina']) ?></label>
            </div>
          <?php } ?>
        </div>

        <div class="descricao">

          <label for="desc">Descrição</label>
          <textarea id="desc" name="desc" rows="5" cols="40" required></textarea>

        </div>

      </fieldset>

      <div>
        <button type="submit" id="cadastrar-disc">Cadastrar</button>
        <button type="reset">Limpar</button>
        <p><a href="view_disciplinas.php">Ver todas as disciplinas cadastradas</a></p>

        <h4 id="aviso" class="aviso" aria-live="polite"></h4>
      </div>
    </form>
  </section>

</main>

<?php
require_once __DIR__ . "/../assets/utils/footer_padrao.php";
?>