<?php
require_once '../model/user_dao.php';

$user = $_POST['user'];
$password = $_POST['password'];

$login = new UserDao();
$login->login($user, $password);