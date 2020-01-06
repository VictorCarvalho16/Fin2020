<?php
require_once '../model/user_dao.php';
require_once '../model/user.php';
// Percorre os Dados do formulario e salvando em variaveis
foreach ($_POST as $key => $price) {
    $$key = $price;
    if(empty($price)){
        session_start();
        $_SESSION['message'] =  "All fields are mandatory!";
        header("location: ../view/signup.php");
        die;
    }
}
// Verifica se as duas senhas sao identicas
if($password === $passwordConfirm) {
    $user = new User($name, $email, $userName, $password);
    $signup = new UserDao();
    $signup->create($user);
} else{
    session_start();
    $_SESSION['message'] =  'Passwords are not equal';
    header("location: ../view/signup.php");
}