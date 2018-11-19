<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descricao</th>
        </tr>
    </thead>
    <tbody>
<?php
    
    $categorias = $dados['categorias'];
    foreach ($categorias as $categoria){

        echo '<tr>';
        echo '<td>'.$categoria->getId().'</td>';
        echo '<form action="index.php" method="get">';
        echo '<td><input type="text" name="nome" value="'.utf8_encode($categoria->getNome()).'"></td>';
        echo '<td><input type="text" name="descricao" value="'.utf8_encode($categoria->getDescricao()).'"></td>';
        echo '</tr> <a href="index.php?acao=update&id='.$categoria->getId().'">Atualizar Dados</a>';
        echo '</form>';      
      
    }
?>
    </tbody>
</table>