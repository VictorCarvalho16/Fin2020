<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="../controller/addtransaction.php" method="post">
        <label>Description: <input type="text" name="description" id="description" placeholder="Grocery Shopping"></label>
        <p>Type: 
            <input type="radio" name="type" value="expense" checked>Expense 
            <input type="radio" name="type" value="recipe">Recipe
        </p>
        <label>Value: $<input type="number" name="value" id="value" placeholder="100.00" step="0.01"></label>
        <label>Classification: <input type="search" name="classification" id="classification" placeholder="Market"></label>
        <label>Date: <input type="date" name="date" id="date" value='<?php echo date("Y-m-d"); ?>'></label>
        <button type="submit">Add</button>
    </form>    
</body>
</html>