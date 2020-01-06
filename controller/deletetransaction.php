<?php
require_once '../model/transaction_dao.php';


$id = $_GET['id'];

$delete = new TransactionDao();
$delete->delete($id);
