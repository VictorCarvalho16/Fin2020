<?php
require_once 'transaction.php';
require_once 'db_connect.php';

class TransactionDao {
    public function create(Transaction $t){
        $sql = "INSERT INTO ee2AvKRmqU.transaction (description, type, value, classification, date, id_user) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $t->getDescription());
        $stmt->bindValue(2, $t->getType());
        $stmt->bindValue(3, $t->getValue());
        $stmt->bindValue(4, $t->getClassification());
        $stmt->bindValue(5, $t->getDate());
        $stmt->bindValue(6, $t->getId_user());
        
        session_start();
        try{
            $stmt->execute();
            $_SESSION['message'] =  "Cadastro Efetuado";
            header("location: ../view/home.php");
        }catch(PDOException $e){
            $_SESSION['message'] =  "Erro no Cadastro";
            header("location: ../view/home.php");;
        }
    }

    public function update(Transaction $t){
        $sql = "UPDATE ee2AvKRmqU.transaction SET description = ?, type = ?, value = ?, classification = ?, date ? WHERE id = ?";

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $t->getDescription());
        $stmt->bindValue(2, $t->getType());
        $stmt->bindValue(3, $t->getValue());
        $stmt->bindValue(4, $t->getClassification());
        $stmt->bindValue(5, $t->getDate());
        $stmt->bindValue(6, $t->getId());
        
        session_start();
        try{
            $stmt->execute();
            
            $_SESSION['message'] =  "Atualizado";
            header("location: ../view/home.php");
        }catch(PDOException $e){
            $_SESSION['message'] =  "Erro no Cadastro";
            header("location: ../view/home.php");;
        }
    }

    public function delete($id){
        $sql = "DELETE FROM  ee2AvKRmqU.transaction WHERE id = ?";
        
        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        
        session_start();
        try{
            $stmt->execute();
            $_SESSION['message'] =  "Exclusão Realizada";
            header("location: ../view/home.php");
        }catch(PDOException $e){
            echo $e->getMessage();
            $_SESSION['message'] =  "Erro na Exclusão";
            header("location: ../view/home.php");
        }
    }       
}