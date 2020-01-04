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
</head>
<body>
    <form action="../controller/signup.php" method="POST">
        <p>Name: <input type="text" name="name" id="name"></p>
        <p>E-Mail: <input type="email" name="email" id="email"></p>
        <p>User: <input type="text" name="userName" id="userName"></p>
        <p>Password: <input type="password" name="password" id="password"></p>
        <p>Password(Confirm): <input type="password" name="passwordConfirm" id="passwordConfirm"></p>
        <button type="submit">SignUp</button>
        <a href="../">Back</a>
    </form>
</body>
</html>