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
    public function principal($msg = null){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->selectAll();
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }

        $this->dados['categorias'] = $categorias;
        if (isset($msg)){
            $this->dados['mensagem'] = $msg;
        }

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/listar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

    public function detalharCategoria($id){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->select($id);
            //var_dump($categorias);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/detalhar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

     public function alterarCategoria($id, $nome, $descricao){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->update($id, $nome, $descricao);
            $this->principal("Categoria Atualizada com Sucesso!!!");
            
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }

    public function incluir(){

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/cadastrar.php');
        View::carregar('view/template/rodape.html');
    }

     public function cadastrarCategoria($nome, $descricao){
          $this->dados = array();
          $catdao = new CategoriaDAO();
        try{
            $categorias = $catdao->insert($nome, $descricao);
            //var_dump($categorias);
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
        $this->dados['categorias'] = $categorias;

        View::carregar('view/template/cabecalho.html');
        View::carregar('view/categoria/cadastrar.php', $this->dados);
        View::carregar('view/template/rodape.html');
    }

       public function deletarCategoria($id){
        $this->dados = array();
        $catdao = new CategoriaDAO();

        try{
            $categorias = $catdao->delete($id);
            $this->principal("Categoria Excluída com Sucesso!!!");
            
        }catch (PDOException $e){
            echo "Erro: ".$e->getMessage();
        }

        
    }
}


