<?php
    require_once __DIR__ . "/../../backend/materia/view_materias.php";
    $titulo="materias cadastradas";
    $materias = view_materias();
    require_once __DIR__ . "/../assets/utils/nav_padrao.php";
    // is_null() é uma função do php que verifica se uma variavel recebeu null, ou seja
    // não carregou nada do banco de dados, ou seja, houve algum erro na conexão com o banco de dados.
    if (is_null($materias)) {
        echo "<p>Erro ao carregar as matérias.</p>";
    } 
    // verifica se o array de materias ta vazio.
     elseif (empty($materias)) {
         echo "<p>Nenhuma matéria cadastrada.</p>";
     }
    
?>

<main>
   <section>
        <div class="table-container">
         <table>
          <thead>
            <tr>
              <th scope="col">id_materia</th>
              <th scope="col">nome_materia</th>
              <th scope="col">descricao_materias</th>
              <th scope="col">ativa</th>
            </tr>
          </thead>
            <tbody>
                <?php foreach ($materias as $row): ?>
              <tr>
                <td><?php echo htmlspecialchars($row['id_materia']); ?></td>
                <td><?php echo htmlspecialchars($row['nome_materia']); ?></td>
                <td><?php echo htmlspecialchars($row['descricao_materias']); ?></td>
                <!-- por padrão é 1 pelo banco, então por enquanto vai ser sim... -->
                <td><?php echo $row['ativo'] ? 'Sim' : 'Não'; ?></td>
              </tr>
               <?php endforeach; ?>
            </tbody>
        </table>
      </div>
  </section>
</main>
