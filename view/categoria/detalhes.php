<?php
//capturo o objeto categoria que foi passado em $dados
$categoria = $dados['categorias'][0];
?>
<fieldset>
	<legend>Alterar Categoria</legend>
	<form method="post" action="index.php?acao=gravaAlterar">
		<p>ID: <input type="text" name="id" value="<?= $categoria->getId() ?>" readonly></p>
		<p>Nome: <input type="text" name="nome" value="<?= utf8_encode($categoria->getNome()) ?>"></p>
		<p>Descrição: <input type="text" name="descricao" value="<?= utf8_encode($categoria->getDescricao()) ?>"></p>
		<div>
			<input type="submit" value="Gravar">
		</form>
		<br>
		<form action="index.php">
			<input type="submit" value="Cancelar">
		</form>
	</div>
</fieldset>