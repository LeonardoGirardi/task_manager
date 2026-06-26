<?php

require_once __DIR__ . '/../models/User.php';

class AuthController {

    public function login() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $user = User::findByEmail($email);

            if ($user && password_verify($password, $user['password'])) {

                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'name' => $user['name'],
                    'email' => $user['email']
                ];

                header("Location: /dashboard");
                exit;
            }

            echo "Login inválido";
            return;
        }

        require __DIR__ . '/../views/auth/login.php';
    }

    public function register() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $name = $_POST['name'] ?? '';
            $email = $_POST['email'] ?? '';
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            User::create($name, $email, $password);

            header("Location: /login");
            exit;
        }

        require __DIR__ . '/../views/auth/register.php';
    }

    public function logout() {

        session_destroy();

        header("Location: /login");
        exit;
    }
}