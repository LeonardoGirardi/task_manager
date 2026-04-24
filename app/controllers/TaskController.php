<?php

require_once __DIR__ . '/../models/Task.php';

class TaskController {

    public function index() {


        $user = $_SESSION['user'] ?? null;

        if (!$user) {
            header("Location: /login");
            exit;
        }

        $tasks = Task::allByUser($user['id']);

        require __DIR__ . '/../views/tasks/dashboard.php';
    }

    public function create() {

        $user = $_SESSION['user'] ?? null;

        if (!$user) {
            header("Location: /login");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            Task::create(
                $user['id'],
                $_POST['title'] ?? '',
                $_POST['description'] ?? '',
                $_POST['priority'] ?? 'baixa'
            );

            header("Location: /dashboard");
            exit;
        }

        require __DIR__ . '/../views/tasks/create.php';
    }

    public function delete() {

        $user = $_SESSION['user'] ?? null;

        if (!$user) {
            header("Location: /login");
            exit;
        }

        if (isset($_GET['id'])) {
            Task::delete($_GET['id']);
        }

        header("Location: /dashboard");
        exit;
    }

    public function toggle() {

        $user = $_SESSION['user'] ?? null;

        if (!$user) {
            header("Location: /login");
            exit;
        }

        if (isset($_GET['id'])) {
            Task::toggleStatus($_GET['id']);
        }

        header("Location: /dashboard");
        exit;
    }
}