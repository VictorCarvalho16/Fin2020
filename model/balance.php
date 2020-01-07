<?php
require_once 'db_connect.php';

class Balance {
    private $recipe, $expense, $balance;

    public function getRecipe($id){
        $sql = 'SELECT sum(price) as recipe_value from ee2AvKRmqU.transaction WHERE id_user = ? and type = ? and date <= ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, 'recipe');
        $stmt->bindValue(3, date("Y-m-d"));
        
        $stmt->execute();

        $result =  $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['recipe_value'];
    }
    public function getExpense($id) {
        $sql = 'SELECT sum(price) as expense_value from ee2AvKRmqU.transaction WHERE id_user = ? and type = ? and date <= ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);
        $stmt->bindValue(2, 'expense');
        $stmt->bindValue(3, date("Y-m-d"));
        
        $stmt->execute();

        $result =  $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['expense_value'];
    }
    
    public function getBalance($id) {
        $sql = 'SELECT balance_value FROM user WHERE id = ?';

        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
        
        $result =  $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['balance_value'];

    }

    public function setBalance($id, $recipe, $expense) {
        $balance = $recipe - $expense;
        $sql = 'UPDATE  ee2AvKRmqU.user SET balance_value = ? WHERE id = ?';
        
        $stmt = Connection::getConn()->prepare($sql);
        $stmt->bindValue(1, $balance);
        $stmt->bindValue(2, $id);

        $stmt->execute();
    }
}