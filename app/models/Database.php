<?php

class Database {
    private static $conn;

    public static function connect() {
        if (!self::$conn) {

            $host = "db";
            $dbname = getenv("POSTGRES_DB");
            $user = getenv("POSTGRES_USER");
            $password = getenv("POSTGRES_PASSWORD");

            try {
                self::$conn = new PDO(
                    "pgsql:host=$host;dbname=$dbname",
                    $user,
                    $password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );

            } catch (PDOException $e) {
                die("Erro na conexão com o banco: " . $e->getMessage());
            }
        }

        return self::$conn;
    }
}