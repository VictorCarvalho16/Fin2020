<?php
require_once '../model/user.php';
require_once '../model/user_dao.php';

$user = new UserDao();
$user = $user->read($_SESSION['id']);
foreach ($user as $key => $price) {
    $$key = $price;
}
$user = new User($name, $email, $user_name, $password, $id, $balance_value);
echo "Welcome ".$user->getName()." Balance: $".$user->getBalance_value();