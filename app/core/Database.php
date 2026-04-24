<?php

class Database {

    private static $instance = null;

    public static function connect() {

        if (self::$instance === null) {

            $host = "db";
            $dbname = getenv("POSTGRES_DB");
            $user = getenv("POSTGRES_USER");
            $password = getenv("POSTGRES_PASSWORD");

            try {

                $dsn = "pgsql:host=$host;dbname=$dbname";

                self::$instance = new PDO(
                    $dsn,
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

        return self::$instance;
    }
}