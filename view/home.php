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
        <a href="../controller/logout.php" class="right">Logout</a><br>
        <br>
        <form action="/controller/filter.php" id='filter-form'>
            Start: <input type="date" name="start-date" id="start-date" value="<?php echo date("Y-m-01");?>">
            End: <input type="date" name="end-date" id="end-date" value="<?php echo date("Y-m-d");?>">
            <button type="submit" id='filter'>Filter</button>
        </form>
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
        <a href="addtransaction.php" class="right">Add Transaction</a><br><br>
        <?php
            echo '<p class="results green">Recipes: $'.number_format($recipe_balance, 2).'</p>';
            echo '<p class="results red">Expenses: $'.number_format($expense_balance, 2).'</p>';
            $local_balance = ($recipe_balance - $expense_balance);
            if ($local_balance > 0) {
                echo '<p class="results green">Local Balance: $'.number_format($local_balance, 2).'</p>';
            } else {
                echo '<p class="results red">Local Balance: $'.number_format($local_balance, 2).'</p>';
            }
            
        ?>
    </div>
    <footer>
        <p>Victor Carvalho &copy; <strong>2020</strong></p>
    </footer>
</body>
</html>