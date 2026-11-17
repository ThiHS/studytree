<?php
$titulo = "Árvore de estudos";
require_once __DIR__ . "/../../backend/utils/conec.php";
require_once __DIR__ . "/../assets/utils/nav_padrao.php";

$cursos = [];


$cursos = bd_select(
    "SELECT id_curso, nome, descricao FROM cursos ORDER BY nome"
);


$idCurso = filter_input(INPUT_GET, "id_curso", FILTER_VALIDATE_INT);
$curso = null;

if ($idCurso) {
    foreach ($cursos as $item) {
        if ((int) $item["id_curso"] === $idCurso) {
            $curso = $item;
            break;
        }
    }
}

$nos = [];
$camadas = [];
$ciclo = [];

if ($curso) {
    
    $disciplinas = bd_select(
        "SELECT d.id_disciplina, d.nome_disciplina, d.descricao_disciplina
            FROM disciplinas d
            JOIN curso_disciplina cd ON cd.id_disciplina = d.id_disciplina
            WHERE cd.id_curso = ?
            ORDER BY d.nome_disciplina",
        [$curso["id_curso"]]
    );

    $arestas = bd_select(
        "SELECT dr.id_disciplina_pai, dr.id_disciplina_filha
            FROM disciplinas_relacionadas dr
            JOIN curso_disciplina filho
                ON filho.id_disciplina = dr.id_disciplina_filha
            AND filho.id_curso = ?
            JOIN curso_disciplina pai
                ON pai.id_disciplina = dr.id_disciplina_pai
            AND pai.id_curso = ?",
        [$curso["id_curso"], $curso["id_curso"]]
    );

    $externas = bd_select(
        "SELECT dr.id_disciplina_filha, p.nome_disciplina
            FROM disciplinas_relacionadas dr
            JOIN disciplinas p ON p.id_disciplina = dr.id_disciplina_pai
            JOIN curso_disciplina filho
                ON filho.id_disciplina = dr.id_disciplina_filha
            AND filho.id_curso = ?
            LEFT JOIN curso_disciplina pai
                ON pai.id_disciplina = dr.id_disciplina_pai
            AND pai.id_curso = ?
            WHERE pai.id_disciplina IS NULL
            ORDER BY p.nome_disciplina",
        [$curso["id_curso"], $curso["id_curso"]]
    );
    

    foreach ($disciplinas as $disciplina) {
        $id = (int) $disciplina["id_disciplina"];
        $nos[$id] = [
            "id" => $id,
            "nome" => $disciplina["nome_disciplina"],
            "descricao" => $disciplina["descricao_disciplina"],
            "pais" => [],
            "filhos" => [],
            "externos" => [],
        ];
    }

    foreach ($arestas as $aresta) {
        $pai = (int) $aresta["id_disciplina_pai"];
        $filha = (int) $aresta["id_disciplina_filha"];
        if (!isset($nos[$pai], $nos[$filha]) || $pai === $filha) {
            continue;
        }
        $nos[$filha]["pais"][$pai] = $nos[$pai]["nome"];
        $nos[$pai]["filhos"][$filha] = $nos[$filha]["nome"];
    }

    foreach ($externas as $externa) {
        $filha = (int) $externa["id_disciplina_filha"];
        if (isset($nos[$filha])) {
            $nos[$filha]["externos"][] = $externa["nome_disciplina"];
        }
    }

    $restantes = $nos;
    $limite = count($nos) + 1;

    while ($restantes && $limite > 0) {
        $limite--;
        $prontos = [];

        foreach ($restantes as $id => $no) {
            $espera = false;
            foreach ($no["pais"] as $pai => $nomePai) {
                if (isset($restantes[$pai])) {
                    $espera = true;
                    break;
                }
            }
            if (!$espera) {
                $prontos[$id] = $no;
            }
        }

        if (!$prontos) {
            uasort($restantes, function ($a, $b) {
                return strcasecmp($a["nome"], $b["nome"]);
            });
            $ciclo = $restantes;
            break;
        }

        uasort($prontos, function ($a, $b) {
            return strcasecmp($a["nome"], $b["nome"]);
        });
        $camadas[] = $prontos;

        foreach ($prontos as $id => $no) {
            unset($restantes[$id]);
        }
    }
}

function juntar_nomes($nomes) {
    $nomes = array_values($nomes);
    $total = count($nomes);
    if ($total === 0) {
        return "";
    }
    if ($total === 1) {
        return $nomes[0];
    }
    $ultimo = array_pop($nomes);
    return implode(", ", $nomes) . " e " . $ultimo;
}
?>

<main class="arvore-pagina">
    <section class="arvore-intro">
        <h2>Estrutura curricular</h2>
        <p>Escolha um curso.</p>
    </section>

    <?php if (!$cursos): ?>
        <p class="aviso">Nenhum curso cadastrado ainda.</p>
        <p><a href="/studytree/frontend/curso/cad_curso.php">Cadastrar um curso</a></p>
    <?php else: ?>
        <form class="arvore-seletor" method="get" action="/studytree/frontend/curso/view_tree.php">
            <div>
                <label for="id_curso">Curso</label>
                <select id="id_curso" name="id_curso" onchange="this.form.submit()">
                    <option value="">Selecione um curso</option>
                    <?php foreach ($cursos as $item): ?>
                        <option value="<?php echo (int) $item["id_curso"]; ?>"<?php echo ($curso && (int) $item["id_curso"] === (int) $curso["id_curso"]) ? " selected" : ""; ?>>
                            <?php echo htmlspecialchars($item["nome"]); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div>
                <button type="submit">Montar árvore</button>
            </div>
        </form>

        <?php if ($idCurso && !$curso): ?>
            <p class="aviso">Esse curso não foi encontrado.</p>
        <?php elseif ($curso && !$nos): ?>
            <section class="arvore-resumo">
                <h2><?php echo htmlspecialchars($curso["nome"]); ?></h2>
                <?php if (!empty($curso["descricao"])): ?>
                    <p><?php echo htmlspecialchars($curso["descricao"]); ?></p>
                <?php endif; ?>
                <p class="aviso">Este curso ainda não tem disciplinas vinculadas.</p>
                <p><a href="/studytree/frontend/disciplina/cad_disciplina.php">Cadastrar uma disciplina</a></p>
            </section>
        <?php elseif ($curso): ?>
            <section class="arvore-resumo">
                <h2><?php echo htmlspecialchars($curso["nome"]); ?></h2>
                <?php if (!empty($curso["descricao"])): ?>
                    <p><?php echo htmlspecialchars($curso["descricao"]); ?></p>
                <?php endif; ?>
            </section>

            <div class="arvore-mapa">
                <div class="arvore-camadas" id="arvore-camadas">
                    <svg class="arvore-linhas" id="arvore-linhas" aria-hidden="true"></svg>

                    <?php foreach ($camadas as $indice => $coluna): ?>
                        <section class="arvore-camada">
                            <?php foreach ($coluna as $no): ?>
                                <article
                                    class="arvore-no<?php echo $indice === 0 ? " arvore-no-inicio" : ""; ?>"
                                    id="disc-<?php echo $no["id"]; ?>"
                                    data-id="<?php echo $no["id"]; ?>"
                                    data-pais="<?php echo htmlspecialchars(implode(",", array_keys($no["pais"]))); ?>"
                                >
                                    <h4><?php echo htmlspecialchars($no["nome"]); ?></h4>
                                    <?php if (!empty($no["descricao"])): ?>
                                        <p><?php echo htmlspecialchars($no["descricao"]); ?></p>
                                    <?php endif; ?>
                                    <p class="arvore-meta">
                                        <?php if ($no["pais"]): ?>
                                            Pré-requisitos: <?php echo htmlspecialchars(juntar_nomes($no["pais"])); ?>.
                                        <?php else: ?>
                                            Nenhum pré-requisito neste curso.
                                        <?php endif; ?>
                                    </p>
                                    <?php if ($no["externos"]): ?>
                                        <p class="arvore-meta">
                                            Fora deste curso, também exige <?php echo htmlspecialchars(juntar_nomes($no["externos"])); ?>.
                                        </p>
                                    <?php endif; ?>
                                    <p class="arvore-meta">
                                        <?php if ($no["filhos"]): ?>
                                            Libera: <?php echo htmlspecialchars(juntar_nomes($no["filhos"])); ?>.
                                        <?php else: ?>
                                            Nenhuma disciplina deste curso depende dela.
                                        <?php endif; ?>
                                    </p>
                                </article>
                            <?php endforeach; ?>
                        </section>
                    <?php endforeach; ?>

                    <?php if ($ciclo): ?>
                        <section class="arvore-camada arvore-camada-ciclo">
                            <?php foreach ($ciclo as $no): ?>
                                <article
                                    class="arvore-no"
                                    id="disc-<?php echo $no["id"]; ?>"
                                    data-id="<?php echo $no["id"]; ?>"
                                    data-pais="<?php echo htmlspecialchars(implode(",", array_keys($no["pais"]))); ?>"
                                >
                                    <h4><?php echo htmlspecialchars($no["nome"]); ?></h4>
                                    <?php if (!empty($no["descricao"])): ?>
                                        <p><?php echo htmlspecialchars($no["descricao"]); ?></p>
                                    <?php endif; ?>
                                    <p class="arvore-meta">
                                        <?php if ($no["pais"]): ?>
                                            Pré-requisitos: <?php echo htmlspecialchars(juntar_nomes($no["pais"])); ?>.
                                        <?php endif; ?>
                                    </p>
                                </article>
                            <?php endforeach; ?>
                        </section>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>
</main>

<?php
require_once __DIR__ . "/../assets/utils/footer_padrao.php";
?>
