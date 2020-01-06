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
    <form action="http://localhost:8000/controller/updatetransaction.php" method="post">
    <label>Description: <input type="text" name="description" id="description" placeholder="Grocery Shopping" value="'.$transaction->getDescription().'"></label>
    ';
if($type == 'recipe'){
    echo '
        <p>Type: 
        <input type="radio" name="type" value="expense">Expense 
        <input type="radio" name="type" value="recipe" checked>Recipe
        </p>
        ';
}else {
    echo '
        <p>Type: 
        <input type="radio" name="type" value="expense" checked>Expense 
        <input type="radio" name="type" value="recipe">Recipe
        </p>
        ';
}
echo'
    <label>price: $<input type="number" name="price" id="price" placeholder="100.00" step="0.01" value="'.$price.'"></label>
    <label>Classification: <input type="search" name="classification" id="classification" placeholder="Market" value="'.$classification.'"></label>
    <label>Date: <input type="date" name="date" id="date" value='.$date.'></label>
    <button type="submit">Edit</button>
    </form>    
    ';
session_start();
$_SESSION['id_transaction'] = $id;