<?php
require_once '../globals/conexion.php'; 
session_start();
$err_messages = '';
$success_message='';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $assets = $_POST['assets'];

    if (empty($name) || empty($price) || empty($description) || empty($assets)) {
        $err_messages = 'Por favor ingrese todos los datos.';
        $_SESSION['err_messages'] = $err_messages; 
        // print_r($_SESSION['err_messages']);
        // Redirige al form.
        // header('Location: ../views/form_products.php');
        exit();
    }

    try {
        // Preparar la consulta SQL
        // Statement representa una instancia de una consulta SQL preparada para PDO
        // prepare=>metodo de la clase pdo=>proposito=>generar una consulta sql que se pueda ejecutar con 'parametros vinculados'
        $stmt = $pdo->prepare("INSERT INTO products (name, price, description, assets) VALUES (:name, :price, :description, :assets)");
        
        // Vincular los parámetros
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':assets', $assets);
        
        // Ejecutar la consulta
        $stmt->execute();
        
        $_SESSION['success_message'] = 'Producto insertado con éxito.';
        echo "<script>alert('El producto fue ingresado a la base de datos con exito!')</script>";
        header('Location: ../index.php');
        exit();
    } catch (PDOException $e) {
        $err_messages = 'Error al insertar el producto: '.$e->getMessage();
        $_SESSION['err_messages'] = $err_messages; 
        print_r( $_SESSION['error_messages']);
        header('Location: ../views/form_products.php');
        exit();
    }
}
?>
