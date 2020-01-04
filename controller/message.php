<?php
session_start();
// Imprime um alert na carregar da pagina de houver alguma mensagem
if(!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script>alert('$message')</script>";
    unset($_SESSION['message']);
}