<?php

require_once __DIR__ . '/../core/Database.php';

class Task {

    public static function allByUser($userId) {
        $db = Database::connect();

        $stmt = $db->prepare("
            SELECT * FROM tasks
            WHERE user_id = ?
            ORDER BY id DESC
        ");

        $stmt->execute([$userId]);

        return $stmt->fetchAll();
    }

    public static function create($userId, $title, $description, $priority) {
        $db = Database::connect();

        $stmt = $db->prepare("
            INSERT INTO tasks (user_id, title, description, priority, status)
            VALUES (?, ?, ?, ?, 'pendente')
        ");

        return $stmt->execute([
            $userId,
            $title,
            $description,
            $priority
        ]);
    }

    public static function delete($id) {
        $db = Database::connect();

        $stmt = $db->prepare("
            DELETE FROM tasks
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }

    public static function toggleStatus($id) {
        $db = Database::connect();

        $stmt = $db->prepare("
            UPDATE tasks
            SET status = CASE
                WHEN status = 'pendente' THEN 'concluida'
                ELSE 'pendente'
            END
            WHERE id = ?
        ");

        return $stmt->execute([$id]);
    }
}