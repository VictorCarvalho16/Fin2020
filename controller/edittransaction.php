<?php
require_once '../model/transaction_dao.php';
require_once '../model/transaction.php';

$id = $_GET['id'];
$transaction_request = new TransactionDao();
$transaction_request = $transaction_request->readRow($id);

foreach ($transaction_request as $key => $value) {
    $$key = $value;
}
$transaction = new Transaction(
    $description,
    $type,
    $price,
    $classification,
    $date,
    $id_user,
    $id
);
echo '
    <div id="content">
    <form action="http://localhost:8000/controller/updatetransaction.php" method="post">
    <div class="input"><label><p>Description: </p><input type="text" name="description" id="description" placeholder="Grocery Shopping" value="'.$transaction->getDescription().'"></label></div>
    ';
if($type == 'recipe'){
    echo '
        <div class="radio">
            Type: 
            <input type="radio" name="type" value="expense">Expense 
            <input type="radio" name="type" value="recipe" checked>Recipe
        </div>
        ';
}else {
    echo '
        <div class="radio">
            Type: 
            <input type="radio" name="type" value="expense" checked>Expense 
            <input type="radio" name="type" value="recipe">Recipe   
        </div>
        ';
}
echo'
    <div class="input"><label><p>Value: $</p><input type="number" name="price" id="price" placeholder="100.00" step="0.01" value="'.$price.'"></label></div>
    <div class="input"><label><p>Classification: </p><input type="search" name="classification" id="classification" placeholder="Market" value="'.$classification.'"></label></div>
    <div class="input"><label><p>Date: </p><input type="date" name="date" id="date" value='.$date.'></label></div>
    <button type="submit">Edit</button>
    <a href="../home.php">Back</a>
    </form>    
    </div>
    ';
session_start();
$_SESSION['id_transaction'] = $id;