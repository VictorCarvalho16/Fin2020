<?php
require_once '../model/transaction_dao.php';
require_once '../model/transaction.php';

session_start();
$description = $_POST["description"];
$type = $_POST["type"];
$price = $_POST["price"];
$classification = $_POST["classification"];
$date = $_POST["date"];
$price = str_replace(',', '.', $price);

$transaction = new Transaction($description, $type, $price, $classification, $date, $_SESSION['id'], $_SESSION['id_transaction']);
$transaction_dao = new TransactionDao();
$transaction_dao->update($transaction);
