<?php

class Connection
{
    private static $conn = null;

    public static function getConnection($msg = false): PDO
    {
        $db = "mysql";
        $serverName = "localhost";
        $dbname = "dbprodutos";
        $userName = "root";
        $password = "";
        $port = 3307;
        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
        ];

        if (self::$conn == null) {

            try {
                self::$conn = new PDO(
                    dsn: "$db:host=$serverName;dbname=$dbname;port=$port",
                    username: $userName,
                    password: $password,
                    options: $options
                );
                if($msg)
                    echo "CONEXAO REALIZADA COM SUCESSO HAHAHAHA";
            } catch (PDOException $e) {
                echo "ERRO AO SE CONECTAR AO BANCO DE DADOS $db<br>{$e->getMessage()}";
            }
        }
        return self::$conn;
    }
}
