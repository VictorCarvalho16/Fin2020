<?php
    require_once 'controller/message.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <link rel="stylesheet" href="/view/styles/main.css">
</head>
<body>
    <header>
        <img src="icon.jpg" alt="Icon">
        <h1>FIN 2020</h1>
    </header>
    <div id="content">
        <form action="controller/login.php" method="POST" id="login-form">
            <div class="input index"><label><p>User:</p><input type="text" name="user" id="user" autofocus></label></div>
            <div class="input index"><label><p>Password:</p><input type="password" name="password" id="password"></label></div>
            <button type="submit">LogIn</button>
            <a href="/view/signup.php">SignUp</a>
        </form>
    </div>
    <footer>
        <p>Victor Carvalho &copy; <strong>2020</strong></p>
    </footer>
</body>
</html>