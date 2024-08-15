<?php
require_once '../globals/conexion.php'; 
session_start();

$err_messages = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $assets = $_POST['assets'];
    $product_id = $_POST['product_id']; 

    // Validar que no haya campos vacíos
    if (empty($name) || empty($price) || empty($description) || empty($assets)) {
        $err_messages = 'Por favor ingrese todos los datos.';
        $_SESSION['err_messages'] = $err_messages; 
        header('Location: ../views/form_products.php');
        exit();
    }

    try {
        // Preparar la consulta SQL para actualización
        $stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price, description = :description, assets = :assets WHERE id = :id");

        // Vincular los parámetros
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':assets', $assets);
        $stmt->bindParam(':id', $product_id, PDO::PARAM_INT); 

        // Ejecutar la consulta
        $stmt->execute();

        // Mensaje de éxito y redirección
        $_SESSION['success_message'] = 'Producto actualizado con éxito!!!';

        header('Location: ../index.php');
        exit();
    } catch (PDOException $e) {
        $err_messages = 'Error al actualizar el producto: ' . $e->getMessage();
        $_SESSION['err_messages'] = $err_messages;
        header('Location: ../views/form_products.php');
        exit();
    }
}


?>
