<?php
/**
 * Created by PhpStorm.
 * User: speroni
 * Date: 29/09/18
 * Time: 22:24
 *
 * Classe de Acesso a Dados de Categoria - Contem os métodos para manipulacao dos dados
 */

require_once "Categoria.php";
require_once "DAO.php";

class CategoriaDAO extends DAO
{
    public function selectAll(){
        $sql = "SELECT * FROM categoria ORDER BY id ASC";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }
    
    public function select($id){
        $sql = "SELECT * FROM categoria WHERE id=:valorid ORDER BY nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':valorid', $id);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);
            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }
    
    public function selectFiltrado($filtro){
        $sql = "SELECT * FROM categoria WHERE id LIKE :id OR nome=:nome OR descricao=:descricao";
        try{
            $stmt = $this->conexao->prepare($sql);
            $id = $filtro->getId();
            $nome = $filtro->getNome();
            $descricao = $filtro->getDescricao();
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }
    
    public function insert($categoria){
       //RECEBE UM OBJETO DO TIPO CATEGORIA E 
       //INSERE SEUS DADOS NO BANCO
     $sql = "INSERT INTO categoria (nome, descricao) VALUES (:nome, :descricao)";
     $stmt = $this->conexao->prepare($sql);
     $nome = $categoria->getNome();
     $descricao = $categoria->getDescricao();
     $stmt->bindParam(':nome', $nome);
     $stmt->bindParam(':descricao', $descricao);
     if ( $stmt->execute()){
         return true;
     }else{
         return false;
     }
 }

 public function update($categoria){
    $sql = "UPDATE categoria SET nome=:nome, descricao=:descricao WHERE id=:id";
    $stmt = $this->conexao->prepare($sql);
    $id = $categoria->getId();
    $nome = $categoria->getNome();
    $desc = $categoria->getDescricao();
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':descricao', $desc);
    if ( $stmt->execute()){
        return true;
    }else{
        return false;
    }
}

public function delete($id){
    $sql = "DELETE FROM categoria WHERE id=:valorid";
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindParam(':valorid', $id);
    if ( $stmt->execute()){
        return true;
    }else{
        return false;
    }
}    
}