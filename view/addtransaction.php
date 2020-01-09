<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header>
        <img src="..\icon.jpg" alt="Icon">
        <h1>FIN 2020</h1>
    </header>
    <div id="content">
        <form action="../controller/addtransaction.php" method="post">
            <div class="input"><label><p>Description: </p><input type="text" name="description" id="description" placeholder="Grocery Shopping"></label></div>
            <div class="radio">Type: 
                <input type="radio" name="type" value="expense" checked>Expense 
                <input type="radio" name="type" value="recipe">Recipe
            </div>
            <div class="input"><label><p>Value: $</p><input type="number" name="price" id="price" placeholder="100.00" step="0.01"></label></div>
            <div class="input"><label><p>Classification: </p><input type="search" name="classification" id="classification" placeholder="Market"></label></div>
            <div class="input"><label><p>Date: </p><input type="date" name="date" id="date" value='<?php echo date("Y-m-d"); ?>'></label></div>
            <button type="submit">Add</button>
            <a href="home.php">Back</a>
        </form>    
    </div>
    <footer>
        <p>Victor Carvalho &copy; <strong>2020</strong></p>
    </footer>
</body>
</html>