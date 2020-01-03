<?php

class Connection {
    private static $instance;

    public static function getConn() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=localhost;dbname=fin_db','root', '');
            }
            catch (PDOException $e){
                echo $e->getMessage();
                die;
            }
        }
        return self::$instance;
    }
}