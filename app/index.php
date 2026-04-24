<?php

require_once __DIR__ . '/models/Database.php';

try {
    $pdo = Database::connect();

    echo "✅ Conexão com o banco realizada com sucesso!<br>";

    $stmt = $pdo->query("SELECT NOW()");
    $time = $stmt->fetch();

} catch (Exception $e) {
    echo "❌ Erro na conexão: " . $e->getMessage();
}