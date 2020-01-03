<?php
require_once 'model/user_dao.php';
require_once 'model/user.php';

$usuario = new User('Victor', 'victor@gmail.com', 'VHugo', '111');
$create = new UserDao();
$create->create($usuario);

