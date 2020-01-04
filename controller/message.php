<?php
session_start();

if(!empty($_SESSION['message'])) {
    $message = $_SESSION['message'];
    echo "<script>alert('$message')</script>";
    unset($_SESSION['message']);
}