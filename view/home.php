<?php
    require_once '../controller/message.php';
    require_once '../controller/verifysession.php';
    require_once '../controller/balance.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header>
        <img src="..\icon.jpg" alt="Icon">
        <h1>FIN 2020</h1>
    </header>
    <div id="home">
        <?php require_once '../controller/user.php'; ?>
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
    </div>
    <footer>
        <p>Victor Carvalho &copy; <strong>2020</strong></p>
    </footer>
</body>
</html>