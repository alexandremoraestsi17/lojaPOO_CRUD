<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 30/09/18
 * Time: 14:45
 */

require_once "model/CategoriaDAO.php";
require_once "model/Categoria.php";
require_once "view/View.php";

class CategoriaController
{
    private $dados;
    public function principal(){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->selectAll();
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/listar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function consultar($cat){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->selectFiltrado($cat);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/listar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }
    
    public function alteracao($id){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->select($id);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/detalhes.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function alterar($categoriaAlterada){
        $dao = new CategoriaDAO();
        if ($dao->update($categoriaAlterada)){
            header("Location:index.php");
        }else{
            header("Location:index.php");
        }
    }

    public function insercao(){
        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/incluir.html');
        View::carregar('view/template/rodape.html');
    }

    public function inserir($categoriaNova){

        $dao = new CategoriaDAO();
        if ($dao->insert($categoriaNova)){
            header("Location:index.php");
        }else{
            echo "nao inserido";
            header("Location:index.php");
        }
    }    

    public function excluir($cat){
        $dao = new CategoriaDAO();
        if ($dao->delete($cat)){
            header("Location:index.php");
        }else{
            header("Location:index.php");
        }
    }

}