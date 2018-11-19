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
        $sql = "SELECT * FROM categoria ORDER by nome";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

    public function select($id){
        $sql = "SELECT * FROM categoria WHERE id =:id";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $categorias = $stmt->fetchAll(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Categoria', ['nome', 'descricao', 'id']);

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

      public function update($id, $nome, $descricao){
          
        $sql = "UPDATE categoria SET nome=':nome', descricao=':descricao' WHERE id=:id;";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

     public function insert($nome, $descricao){
        $sql = "INSERT INTO categoria (nome, descricao) VALUES :nome, :descricao";
        try{
            $stmt = $this->conexao->prepare($sql);
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':descricao', $descricao);
            $stmt->execute();

            return $categorias;
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }

        public function delete($id){
        $sql = "DELETE FROM categoria WHERE id =:id";
        try{
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();

            return $msg = 'Categoria Excluída com Sucesso!!!';
        }catch (PDOException $e){

            throw new PDOException($e);
        }
    }
}