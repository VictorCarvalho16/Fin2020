<?php
    require_once '../controller/message.php';
    require_once '../controller/verifysession.php';
    require_once '../controller/balance.php';
    require_once '../controller/user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
    <table>
        <tr>
            <th>Description</th>
            <th>Type</th>
            <th>Value $</th>
            <th>Classification</th>
            <th>Date</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php require_once '../controller/listtransaction.php';?>
    </table>
    <a href="addtransaction.php">Add Transaction</a>
    <a href="../controller/logout.php">Logout</a>
    <?php
        echo '<br>Recipes: $'.$recipe_balance;
        echo '<br>Expenses: $'.$expense_balance;
    ?>
</body>
</html>