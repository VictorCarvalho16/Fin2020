<?php
require_once '../model/transaction_dao.php';
session_start();

$transations = new TransactionDao();
$transations = $transations->readList($_SESSION['id'], $_GET['start-date'], $_GET['end-date']);

$_SESSION['filter'] = array($_GET['start-date'], $_GET['end-date']);

header("location: ../view/home.php");
