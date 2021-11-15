<?php
class Database{
    public static function getConnection(){
        $envPath = realpath(dirname(__FILE__) . '/../env.ini');
        $env = parse_ini_file($envPath);
        $connection = new mysqli($env['host'], $env['username'], $env['password'], $env['database']);
        if($connection->connect_error){
            die("Erro: " . $connection->connect_error);
        }
        return $connection;
    }

    public static function getResultFromQuery($sql){
        $connection = self::getConnection();
        $result = $connection->query($sql);
        $connection->close();
        return $result;
    }
}