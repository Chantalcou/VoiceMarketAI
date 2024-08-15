<?php
require_once 'config.php';

$servidor = "mysql:dbname=" . DB . ";host=" . SERVIDOR;

try {
    // $pdo = new PDO($servidor, USUARIO, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $pdo = new PDO($servidor, USUARIO, PASSWORD, [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"]);

} catch (PDOException $e) {

    error_log("Error de conexión: " . $e->getMessage());
    exit(json_encode(['error' => 'Error de conexión a la base de datos']));
}
?>
