<?php
require_once '../model/transaction_dao.php';
session_start();

$id = $_GET['id'];
$user_id = $_SESSION['id'];
$transaction = new TransactionDao();
$select = $transaction->readRow($id);
if ($select['id_user'] === $user_id) {
    $transaction->delete($id);
} else {
    $_SESSION['message'] =  "Impossible delete item";
    header("location: ../../view/home.php");
}
