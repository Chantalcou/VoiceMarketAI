<?php
require_once '../globals/conexion.php';

header('Content-Type: application/json');

// filter input recibe tres parametros, 1- el tipo de entrada que se 
// desea obtener INPUT_GET, INPUT_POST, INPUT_COOKIE, INPUT_SERVER, INPUT_ENV.
//2- string $variable_name: El nombre de la variable de entrada. 'id'
//3- int $filter (opcional):valida si es un entero.
$productId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($productId) {
    try {
        $stmt = $pdo->prepare('SELECT * FROM products WHERE id = :id');
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        $stmt->execute(); 
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            echo json_encode($product); 
        } else {
            echo json_encode(['error' => 'Producto no encontrado']);
        }
    } catch (PDOException $error) {
        echo json_encode(['error' => 'Error al obtener el producto: ' . $error->getMessage()]);
    } finally {
        $pdo = null;
    }
} else {
    echo json_encode(['error' => 'ID del producto no especificado o no válido']);
}
?>
