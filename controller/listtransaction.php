<?php
require_once '../model/transaction_dao.php';

$transations = new TransactionDao();



if(!empty($_SESSION['filter'])) {
    $transations = $transations->readListFilter($_SESSION['id'], $_SESSION['filter'][0], $_SESSION['filter'][1]);
    $recipe_balance = 0;
    $expense_balance = 0;

    foreach ($transations as $transation) {
        echo "<tr>";
        if($transation['price']){
            if($transation['type'] == 'recipe'){
                $recipe_balance += $transation['price'];
            } else {
                $expense_balance += $transation['price'];
            }
        }
        foreach ($transation as $key=>$data) {
            if($key != 'id'){
                echo "<td>$data</td>";
            }
        }
        $id = $transation['id'];
        echo "<td><a href='../view/edittransaction.php\?id=$id'>Edit</a></td>";
        echo "<td><a href='..\controller\deletetransaction.php\?id=$id'>Delete</a></td>";
        echo "</tr>";    
    }
} else {
    $transations = $transations->readList($_SESSION['id']);
    foreach ($transations as $transation) {
        echo "<tr>";
        foreach ($transation as $key=>$data) {
            if($key != 'id'){
                echo "<td>$data</td>";
            }
        }
        $id = $transation['id'];
        echo "<td><a href='../view/edittransaction.php\?id=$id'>Edit</a></td>";
        echo "<td><a href='..\controller\deletetransaction.php\?id=$id'>Delete</a></td>";
        echo "</tr>";
    }
}
