<br>
<fieldset>
    <legend>Filtro</legend>
    <form method="post" action="index.php?acao=consultar">
        ID <input type="text" name="id" ><br><br>
        Nome <input type="text" name="nome" ><br><br>
        Descrição <input type="text" name="descricao"><br><br>
        <div>
            <input type="submit" value="Consultar">
        </form>
        <form action="index.php">
            <input type="submit" value="Limpar">
        </form>
    </div>
</fieldset>
<br>

<fieldset>
    <legend>Lista de Categorias</legend>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            <br>
            <form method="post" action="index.php?acao=incluir">
                <input type="submit" value="Incluir">
            </form>
            <br><br>
            <?php
            $categorias = $dados['categorias'];
            foreach ($categorias as $categoria){
                echo '<tr>';
                echo '<td style="text-align: center; vertical-align: middle;">'.$categoria->getId().'</td>';
                echo '<td style="text-align: center; vertical-align: middle;">'.utf8_encode($categoria->getNome()).'</td>';
                echo '<td style="text-align: center; vertical-align: middle;">'.utf8_encode($categoria->getDescricao()).'</td>';
                echo '<td style="text-align: center; vertical-align: middle;"><a href="index.php?acao=alterar&id='.$categoria->getId().'">Editar</a></td>';
                echo '<td style="text-align: center; vertical-align: middle;"><a href="index.php?acao=excluir&id='.$categoria->getId().'">Excluir</a></td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</fieldset>