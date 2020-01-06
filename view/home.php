<?php
    require_once '../controller/message.php';
    require_once '../controller/verifysession.php';
    require_once '../model/user.php';
    require_once '../model/user_dao.php';
    
    $user = new UserDao();
    $user = $user->read($_SESSION['id']);
    foreach ($user as $key => $value) {
        $$key = $value;
    }
    $user = new User($name, $email, $user_name, $password, $id);
    echo "Bem Vindo ".$user->getName();
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
    <a href="addtransaction.php">Add Transaction</a>
    <a href="../controller/logout.php">Logout</a>
</body>
</html>