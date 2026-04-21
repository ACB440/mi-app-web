<?php
/**
 * DB Connection Helper
 * Uses PDO for secure database interactions.
 */

$host = 'localhost';
$db   = 'ranking_juegos';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // In a production environment, you should log error and show a generic message.
    die("Error de conexión: " . $e->getMessage());
}
?>
