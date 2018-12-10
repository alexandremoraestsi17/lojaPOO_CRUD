<?php
//altera o cabecalho HTTP para dizer que o conteúdo é JSON
header('Content-type:application/json');

//vai usar o CategoriaDAO.php
require_once "../../model/CategoriaDAO.php";
//Pego o JSON em texto, como chegou
$dados_recebidos = file_get_contents('php://input');
//Transformo o texto em um Array
$dados = json_decode($dados_recebidos, true);
$del = $dados['id'];
//cria uma instância do CategoriaDAO
$catdao = new CategoriaDAO();
if($catdao->delete($del)){
	header('Content-type: application/json');
	echo json_encode(['msg'=>'Exclusão Realizada com Sucesso!!!']);
}else{
	header('Content-type: application/json');
	echo json_encode(['msg'=>'Erro ao fazer Exclusão']);
};