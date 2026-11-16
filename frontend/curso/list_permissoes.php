<?php
    require_once __DIR__ . "/../../backend/utils/conec.php";

    $sql = "SELECT * FROM permissoes;";
    $permissoes_bd = bd_select($sql);

    /* ----------------------
        organiza permissões
    ------------------------*/
    $permissoes = [];
    $perpermissoes_padrao = ['Ver','Criar','Editar','Excluir'];

    foreach($permissoes_bd as $id => $permissao) {
        if(!isset($permissoes[$permissao['nome_permissao']])) {
            $permissoes[$permissao['nome_permissao']] = [];
        }
        $permissoes[$permissao['nome_permissao']][$id] = $permissao['descricao'];
    }

    /* ----------------------
        cria permissões padões: coordenador, secretaria, admin
    ------------------------*/
    
    //admin
    $cargo["admin"] = $permissoes;

    //coordenador
    $cargo["coordenador"] = $permissoes;
    unset($cargo["coordenador"]["permissoes"]);

    //secretaria
    foreach($permissoes as $nome_permissao => $conteudo) {
        foreach ($conteudo as $key => $value) {
            if($value == "Ver") {
                $cargo["secretaria"][$nome_permissao] = [$key => $value];
            }
        }
    }

    /* ----------------------
        Front-end
        vars:
        
        $permissoes

        $cargo["admin"]
        $cargo["coordenador"]
        $cargo["secretaria"]
    ------------------------*/


    $titulo = "Permissões";
   require_once __DIR__ . "/../assets/utils/nav_padrao.php";

?>

    <main>
    

         
        <section>

        <div class="fora">

            <?php foreach($cargo as $nome_cargo => $permissoes_n){ ?>
                <div class = "cargos">  
                    <h3> <?= $nome_cargo ?> </h3>
                    
                    <button class= "botao_carg">Selecionar</button>
                </div> 
            <?php } ?>
            

        </div>

        <div>
            <?php

            foreach ($permissoes as $nome_permissao => $conteudo) { ?>
                <table> 
                    <thead>
                        <tr>
                            <th> <?= $nome_permissao  ?> </th>
                        </tr>
                    </thead>
                    
                    <?php foreach ($conteudo as $funcao => $valor) {?>
                         <div class = checkbox>
                            <tbody>
                                <tr>
                                    <td> <input type='checkbox' name='permissao'>
                                    <label for='permissao'> <?= $valor?> </label> </td>
                                </tr>
                            </tbody>
                         </div>

                    <?php } ?>

                </table>
                    
            <?php } ?>

        </div>
        
        </section>
    </main>
