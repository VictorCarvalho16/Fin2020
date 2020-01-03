<?php
require_once 'db_connect.php';
require_once 'user.php';
require_once 'password_crypt.php';

function login($user_name, $password) {
    $sql = "SELECT id, password From user WHERE user_name ='$user_name'";
    $stmt = Connection::getConn()->query($sql);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    if($result) {
        echo 'Usuário Encontrado!';
        if(password_verify($password, $result['password'])){
            echo 'Senha Correta!';
            session_start();
            $_SESSION['id'] = $result['id'];
        } else {
            echo 'Senha Incorreta!';
        }
    } else {
        echo 'Usuário Não Encontrado!';
    }
}