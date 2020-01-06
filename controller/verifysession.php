<?php
if(!isset($_COOKIE["PHPSESSID"])){
  session_start();
}
if(empty($_SESSION)){
    session_destroy();
    header("location: ../");
}