<?php
require_once 'transaction.php';
require_once 'db_connect.php';

class TransactionDao {
    public function create(Transaction $t){
        $sql = "INSERT INTO ee2AvKRmqU.transaction (description, type, price, classification, date, id_user) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $t->getDescription());
        $stmt->bindValue(2, $t->getType());
        $stmt->bindValue(3, $t->getPrice());
        $stmt->bindValue(4, $t->getClassification());
        $stmt->bindValue(5, $t->getDate());
        $stmt->bindValue(6, $t->getId_user());
        
        session_start();
        try{
            $stmt->execute();
            $_SESSION['message'] =  "Registred";
            header("location: ../view/home.php");
        }catch(PDOException $e){
            $_SESSION['message'] =  "Registration Error";
            header("location: ../view/home.php");
        }
    }

    public function readList($id_user) {
        $sql = "SELECT id, description, type, price, classification, date  FROM ee2AvKRmqU.transaction WHERE id_user = ?";

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id_user);

        $stmt->execute();
        
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            $_SESSION['message'] =  "Error in Select";
            header("location: ../view/home.php");
        }   
    }

    public function readListFilter($id_user, $start_date, $end_date) {
        $sql = "SELECT id, description, type, price, classification, date  FROM ee2AvKRmqU.transaction WHERE id_user = ? AND date >= ? AND date <= ?";

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id_user);
        $stmt->bindValue(2, $start_date);
        $stmt->bindValue(3, $end_date);

        $stmt->execute();
        
        try{
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }catch(PDOException $e){
            $_SESSION['message'] =  "Error in Select";
            header("location: ../view/home.php");
        }   
    }

    public function readRow($id) {
        $sql = "SELECT *  FROM ee2AvKRmqU.transaction WHERE id = ?";

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
        
        try{
            $stmt->execute();
            return $stmt->fetch();
        }catch(PDOException $e){
            $_SESSION['message'] =  "Error in Select";
            header("location: ../view/home.php");
        }
        
    }


    public function update(Transaction $t){
        $sql = "UPDATE ee2AvKRmqU.transaction SET description = ?, type = ?, price = ?, classification = ?, date = ? WHERE id = ?";

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $t->getDescription());
        $stmt->bindValue(2, $t->getType());
        $stmt->bindValue(3, $t->getPrice());
        $stmt->bindValue(4, $t->getClassification());
        $stmt->bindValue(5, $t->getDate());
        $stmt->bindValue(6, $t->getId());
     
        
        session_start();
        try{
            $stmt->execute();
            $_SESSION['message'] =  "Updated";
            header("location: ../view/home.php");
        }catch(PDOException $e){
            $_SESSION['message'] =  "Update Error";
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
            $_SESSION['message'] =  "$id - Deleted";
            header("location: http://localhost:8000/view/home.php");
        }catch(PDOException $e){
            echo $e->getMessage();
            $_SESSION['message'] =  "Delete Error";
            header("location: ../view/home.php");
        }
    }       
}