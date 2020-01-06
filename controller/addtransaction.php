<?php
require_once '../model/transaction_dao.php';
require_once '../model/transaction.php';

session_start();
$description = $_POST["description"];
$type = $_POST["type"];
$value = $_POST["value"];
$classification = $_POST["classification"];
$date = $_POST["date"];
$value = str_replace(',', '.', $value);

$transaction = new Transaction($description, $type, $value, $classification, $date, $_SESSION['id']);
$transaction_dao = new TransactionDao();
$transaction_dao->create($transaction);
