<?php
// Objeto de conexao com o BD
class Connection {
    private static $instance;

    public static function getConn() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new PDO('mysql:host=remotemysql.com:3306;dbname=ee2AvKRmqU','ee2AvKRmqU', 'AQXpsMNIFP');
            }
            catch (PDOException $e){
                echo $e->getMessage();
                die;
            }
        }
        return self::$instance;
    }
}
