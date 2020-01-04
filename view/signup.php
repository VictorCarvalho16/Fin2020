<?php
    require_once 'controller/message.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SingUp</title>
</head>
<body>
    <form action="../controller/signup.php" method="POST">
        Name: <input type="text" name="name" id="name">
        E-Mail: <input type="email" name="email" id="email">
        User: <input type="text" name="user" id="user">
        Password: <input type="password" name="password" id="password">
        Password(Confirm): <input type="password" name="password-confirm" id="password-confirm">
        <button type="submit">SignUp</button>
        <a href="../">Back</a>
    </form>
</body>
</html>