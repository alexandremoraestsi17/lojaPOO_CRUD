<?php

#AQUI FAREMOS O PRIMEIRO TESTE DE CONEXAO E CONSULTA

require_once "../config/Database.php";

$conexao = Database::getConexao();

$sql = "select * from categoria";

$resultado = $conexao->query($sql);

$categorias = $resultado->fetchAll(PDO::FETCH_ASSOC);

echo('<pre>');
print_r($categorias);
echo('</pre>');