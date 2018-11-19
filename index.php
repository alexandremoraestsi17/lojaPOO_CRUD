<?php

require_once "controller/CategoriaController.php";

//ROTAS -

if (isset($_GET['acao'])){
    $acao = $_GET['acao'];
}else{
    $acao = 'index';
}


switch ($acao){
    case 'index':
        $cat = new CategoriaController();
        $cat->principal();
        exit;

    case 'detalhar':
        $cat = new CategoriaController();
        $cat->detalharCategoria($_GET['id']);
        exit;

    case 'deletar':
        $cat = new CategoriaController();
        $cat->deletarCategoria($_GET['id']);
        exit;

    case 'incluir':
        $cat = new CategoriaController();
        $cat->incluir();

    case 'inserir':
        /*$catNova = new Categoria();
        $catNova = setNome($_POST['nome']);
        $catNova = setDescricao($_POST['descricao']);*/
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $cat = new CategoriaController();
        $cat->cadastrarCategoria($nome, $descricao);
        exit;

    case 'update':
        $cat = new CategoriaController();
        $cat->alterarCategoria($_GET['id'],$_GET['nome'], $_GET['descricao']);
        exit;
    default:
        echo "Ação inválida!!!";
}




