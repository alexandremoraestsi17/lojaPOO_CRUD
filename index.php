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

    case 'alterar':
        //pega o ID enviado
        $id = $_GET['id'];
        //instancia o controlador
        $cat = new CategoriaController();
        //chama o método
        $cat->alteracao($id);
        exit;

    case 'incluir':
        $cat = new CategoriaController();
        $cat->insercao();
        exit;

    case 'gravaInsercao':
        //pegar dados do POST
        $categoriaNova = new Categoria();
        $categoriaNova->setNome($_POST['nome']);
        $categoriaNova->setDescricao($_POST['descricao']);
        $cat = new CategoriaController();
        $cat->inserir($categoriaNova);
        exit;

    case 'gravaAlterar':
        $categoriaAlterada = new Categoria();
        $categoriaAlterada->setId($_POST['id']);
        $categoriaAlterada->setNome($_POST['nome']);
        $categoriaAlterada->setDescricao($_POST['descricao']);
        $cat = new CategoriaController();
        $cat->alterar($categoriaAlterada);
        exit;

    case 'excluir':
        $cat = new Categoria();
        $cat->setId($_GET['id']);
        $catexc = new CategoriaController();
        $catexc->excluir($cat);
        exit;
        
    case 'consultar':
        $cat = new Categoria();
        $cat->setId($_POST['id']);
        $cat->setNome($_POST['nome']);
        $cat->setDescricao($_POST['descricao']);
        $catConsul = new CategoriaController();
        $catConsul->consultar($cat);
        exit;
    default:
        echo "Ação inválida";

}




