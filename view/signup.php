<?php
    require_once '../controller/message.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SingUp</title>
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header>
        <img src="..\icon.jpg" alt="Icon">
        <h1>FIN 2020</h1>
    </header>
    <div id="content">
        <form action="../controller/signup.php" method="POST" id="login-form">
            <div class="input"><label><p>Name: </p><input type="text" name="name" id="name"></label></div>
            <div class="input"><label><p>E-Mail: </p><input type="email" name="email" id="email"></label></div>
            <div class="input"><label><p>User: </p><input type="text" name="userName" id="userName"></label></div>
            <div class="input"><label><p>Password: </p><input type="password" name="password" id="password"></label></div>
            <div class="input"><label><p>Password(Confirm): </p><input type="password" name="passwordConfirm" id="passwordConfirm"></label></div>
            <button type="submit">SignUp</button>
            <a href="../">Back</a>
        </form>
    </div>
    <footer>
        <p>Victor Carvalho &copy; <strong>2020</strong></p>
    </footer>
</body>
</html>