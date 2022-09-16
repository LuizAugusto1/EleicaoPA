<?php

define("SERVERNAME","localhost");
define("DATABASE","contagem_votos");
define("USERNAME","root");
define("PASSWORD","");

class ConexaoDB
{
    private static $conn;

    public static function getConn(){
        if(!isset(self::$conn)){
            try {
                self::$conn = new PDO("mysql:host=".SERVERNAME.";dbname=".DATABASE.";charset=utf8", USERNAME, PASSWORD);
                self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo "Falha na conexão: " . $e->getMessage();
            }
        }
        return self::$conn;
    }
}

?>