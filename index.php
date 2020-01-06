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
</head>
<body>
    <form action="controller/login.php" method="POST">
        <label>User: <input type="text" name="user" id="user"></label>
        <labe>Password: <input type="password" name="password" id="password"></label>
        <button type="submit">LogIn</button>
        <a href="/view/signup.php">SignUp</a>
    </form>
</body>
</html>