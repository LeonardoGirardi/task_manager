<?php

require_once __DIR__ . '/controllers/AuthController.php';
require_once __DIR__ . '/controllers/TaskController.php';

// Inicia a sessão 
session_start();


// pega rota
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// controllers
$auth = new AuthController();
$task = new TaskController();

// Rotas
switch ($uri) {

    // AUTH
    case '/':
    case '/login':
        $auth->login();
        break;

    case '/register':
        $auth->register();
        break;

    case '/logout':
        $auth->logout();
        break;

    // TASKS
    case '/dashboard':
        $task->index();
        break;

    case '/tasks/create':
        $task->create();
        break;

    case '/tasks/delete':
        $task->delete();
        break;

    case '/tasks/toggle':
        $task->toggle();
        break;

    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}