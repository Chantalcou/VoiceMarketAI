<?php
// migration.php
include './globals/conexion.php';

try {
    // Script de migración para crear una tabla de productos
    $sql = "CREATE TABLE IF NOT EXISTS products (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        price DECIMAL(20,2),
        description TEXT,
        assets VARCHAR(255)
    )";

    $pdo->exec($sql);

} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}

$pdo = null;
?>
