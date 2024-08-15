<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../globals/conexion.php';

// header(): Es una función de PHP que envía una cabecera HTTP al navegador. Las cabeceras HTTP proporcionan información adicional sobre la respuesta que el servidor envía al cliente.
header('Content-Type: application/json');

try {
    $stmt = $pdo->prepare('SELECT * FROM products');
    $stmt->execute(); 
    // Obtengo los productos
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($products); 
} catch (PDOException $error) {
    echo json_encode(['error' => 'Error al obtener los productos: ' . $error->getMessage()]);
} finally {
    // Cerrar la conexión si es necesario
    $pdo = null;
};
?>



