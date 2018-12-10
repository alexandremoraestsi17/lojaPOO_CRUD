<?php
//altera o cabecalho HTTP para dizer que o conteúdo é JSON
header('Content-type:application/json');

//vai usar o CategoriaDAO.php
require_once "../../model/Categoria.php";
require_once "../../model/CategoriaDAO.php";
//Pego o JSON em texto, como chegou
$dados_recebidos = file_get_contents('php://input');
//print_r($dados_recebidos);
//Transformo o texto em um Array
$dados = json_decode($dados_recebidos, true);
//print_r($dados);

$nome = $dados['nome'];
$descricao = $dados['descricao'];

//cria uma instância do Categoria
$categoria = new Categoria($nome, $descricao);
//cria uma instância do CategoriaDAO
$catdao = new CategoriaDAO();

if($catdao->insert($categoria)){
	header('HTTP/1.1 201 Created');
	header('Content-type: application/json');
	echo json_encode(['msg'=>'Categoria Criada com Sucesso!!!']);
}else{
	header('Content-type: application/json');
	echo json_encode(['msg'=>'Erro ao Criar Categoria.']);
};