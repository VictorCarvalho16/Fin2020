<?php
require_once 'user_dao.php';

function passwordCrypt($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

function verifyUser($user_name) {
    $sql = 'SELECT * FROM user WHERE user_name = ?';
    $stmt = Connection::getConn()->prepare($sql);
    $stmt->bindValue(1, $user_name);

    $stmt->execute();
    
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if(!empty($result)){ 
        session_start();
        $_SESSION['message'] =  "Nome de Usuário já cadastrado!";
        header("location: ../view/signup.php");
        die;
    }
}