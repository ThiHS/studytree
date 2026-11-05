<?php
    $titulo = "Cadastro de disciplinas";
    require_once __DIR__ . "/../assets/utils/nav_padrao.php";
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

            <div class="checklist-curso"></div>
            <h4>Curso(s) relacionado(s):</h4>
            <input type="checkbox" id="cc" name="ciencia da computacao">
            <label for="cc">Ciência da Computação</label>
            </div>

            <div class="checklist-curso">
            <input type="checkbox" id="es" name="engenharia de software">
            <label for="es">Engenharia de Software</label>
            </div>

            <div class="checklist-curso">
            <input type="checkbox" id="si" name="sistemas da informacao">
            <label for="si">Sistemas da Informação</label>
            </div>

            <div id="req-materia">
              <label for="requisito">Essa disciplina possui pré-requisitos para ser cursada?</label>
              <select id="requisito" onchange="verificarResposta()">
                <option value="">Selecione...</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
              </select>
            </div>

            <div id="checklist-materia">

                <h4>Matérias necessárias:</h4>
                <div class="checklist-item">
                <input type="checkbox" id="calc1" name="calc1">
                <label for="calc1">Cálculo 1</label>
                </div>

                <div class="checklist-item">
                <input type="checkbox" id="calc2" name="calc2">
                <label for="calc2">Cálculo 2</label>
                </div>

                <div class="checklist-item">
                <input type="checkbox" id="bd" name="bd">
                <label for="bd">Banco de Dados</label>
                </div>

            </div> 

            <div class="descricao">

            <label for="desc">Descrição</label>
            <textarea id="desc" name="desc" rows="5" cols="40" required></textarea>

            </div>

          </fieldset>

          <div>
            <button type="submit" id="cadastrar-disc">Cadastrar</button>
            <button type="reset">Limpar</button>
            <h4 id="aviso" class="aviso" aria-live="polite"></h4>
          </div>
        </form>
      </section>
    
    </main>

<?php
    require_once __DIR__ . "/../assets/utils/footer_padrao.php";
?>