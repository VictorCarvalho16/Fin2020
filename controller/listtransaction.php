<?php
require_once '../model/transaction_dao.php';

$transations = new TransactionDao();


if(!empty($_SESSION['filter'])) {
    if ($_SESSION['filter'][0] > date("Y-m-d")) {
        $_SESSION['message'] =  "Invalid Date";
        header("location: #");
        $_SESSION['filter'] = '';
        die;
    }

    $transations = $transations->readListFilter($_SESSION['id'], $_SESSION['filter'][0], $_SESSION['filter'][1]);
    $recipe_balance = 0;
    $expense_balance = 0;
    

    foreach ($transations as $transation) {
        $transation['date'] = date("d/m/Y", strtotime($transation['date']));
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
        echo "<td><a class='icon' href='../view/edittransaction.php\?id=$id'><img class='icon' src='../src/edit.png'></a></td>";
        echo "<td><a class='icon' href='..\controller\deletetransaction.php\?id=$id'><img class='icon' src='../src/delete.png'></a></td>";
        echo "</tr>";    
    }
} else {
    $transations = $transations->readList($_SESSION['id']);
    foreach ($transations as $transation) {
        $transation['date'] = date("d/m/Y", strtotime($transation['date']));
        echo "<tr>";
        foreach ($transation as $key=>$data) {
            if($key != 'id'){
                echo "<td>$data</td>";
            }
        }
        $id = $transation['id'];
        echo "<td><a class='icon' href='../view/edittransaction.php\?id=$id'><img class='icon' src='../src/edit.png'></a></td>";
        echo "<td><a class='icon' href='..\controller\deletetransaction.php\?id=$id'><img class='icon' src='../src/delete.png'></a></td>";
        echo "</tr>";
    }
}
