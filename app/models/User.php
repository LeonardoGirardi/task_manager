<?php

require_once __DIR__ . '/../core/Database.php';

class User {

    public static function findByEmail($email) {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT * FROM users
            WHERE email = ?
            LIMIT 1
        ");

        $stmt->execute([$email]);

        return $stmt->fetch();
    }

    public static function findById($id) {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT * FROM users
            WHERE id = ?
            LIMIT 1
        ");

        $stmt->execute([$id]);

        return $stmt->fetch();
    }

    public static function create($name, $email, $password) {
        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO users (name, email, password)
            VALUES (?, ?, ?)
        ");

        return $stmt->execute([
            $name,
            $email,
            $password
        ]);
    }
}