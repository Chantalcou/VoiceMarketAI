<?php
require_once '../globals/conexion.php';

header('Content-Type: application/json');

$productId = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);

if ($productId) {
    try {
        $stmt = $pdo->prepare('DELETE FROM products WHERE id = :id');
         // asocia el aprametro $prodId y lo asocia a ':id'
        $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
        // ejecuto la consulta sql.
        $stmt->execute(); 

        // chequeo las filas afectadas en mi tabla
        if ($stmt->rowCount() > 0) {
            echo json_encode(['success' => 'Producto eliminado exitosamente']);
        } else {
            echo json_encode(['error' => 'Producto no encontrado']);
        }
    } catch (PDOException $error) {
        echo json_encode(['error' => 'Error al eliminar el producto: ' . $error->getMessage()]);
    } finally {
        $pdo = null;
    }
} else {
    echo json_encode(['error' => 'ID del producto no especificado o no válido']);
}
?>
