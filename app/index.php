<?php
$host = "db";
$dbname = getenv("POSTGRES_DB");
$user = getenv("POSTGRES_USER");
$password = getenv("POSTGRES_PASSWORD");

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    echo "✅ Conectado com sucesso!";
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}