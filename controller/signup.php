<?php
require_once '../model/user_dao.php';
require_once '../model/user.php';
// Percorre os Dados do formulario e salvando em variaveis
foreach ($_POST as $key => $value) {
    $$key = $value;
    if(empty($value)){
        session_start();
        $_SESSION['message'] =  "Todos os campos são obrigatórios!";
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
    $_SESSION['message'] =  'As Senhas não são Iguais';
    header("location: ../view/signup.php");
}