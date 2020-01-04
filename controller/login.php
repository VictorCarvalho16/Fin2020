<?php
require_once '../model/user_dao.php';
// Recebe Dados do Formulario
$user = $_POST['user'];
$password = $_POST['password'];
// Tenta Fazer o Login
$login = new UserDao();
$login->login($user, $password);