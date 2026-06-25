<?php

class Database
{
    private static ?PDO $instance = null;

    private static string $host = "localhost";
    private static string $dbname = "pnk_inmobiliaria";
    private static string $username = "root";
    private static string $password = "";

    public static function getConnection(): PDO
    {
        if (self::$instance === null) {

            $dsn = sprintf(
                "mysql:host=%s;dbname=%s;charset=utf8mb4",
                self::$host,
                self::$dbname
            );

            self::$instance = new PDO(
                $dsn,
                self::$username,
                self::$password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        }

        return self::$instance;
    }
}