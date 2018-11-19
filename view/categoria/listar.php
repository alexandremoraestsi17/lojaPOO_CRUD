
<table>
    <tbody>
<?php
    if (isset($dados['mensagem'])){
        echo "mensagem ".$dados['mensagem'];
    }

    echo '
    <a href="view\categoria\cadastrar.php" >Cadastrar Nova Categoria</a>
    <table style="width:100%">';
    $categorias = $dados['categorias'];
    foreach ($categorias as $categoria){
        echo '<tr>';
        echo '<td><a href="index.php?acao=detalhar&id='.$categoria->getId().'">'.utf8_encode($categoria->getNome()).'</a></td>';
        echo '<td><a href="index.php?acao=detalhar&id='.$categoria->getId().'">Detalhes</a></td>';
        echo '<td><a href="index.php?acao=deletar&id='.$categoria->getId().'">Deletar</a></td>';
        echo '</tr>';
    }
?>
    </tbody>
</table>