<?php
require_once '../model/transaction_dao.php';

$transations = new TransactionDao();
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