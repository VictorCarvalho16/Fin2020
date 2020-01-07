<?php
require_once '../model/balance.php';
$balance = new Balance();
$recipe_balance = $balance->getRecipe($_SESSION['id']);
$expense_balance = $balance->getExpense($_SESSION['id']);
$balance->setBalance($_SESSION['id'], $recipe_balance, $expense_balance);