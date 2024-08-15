<?php
require_once '../globals/conexion.php'; 
session_start(); // Inicia la sesión

// isset => función de sesión que comprueba si err_message no es null
// Devuelve true o false
if (isset($_SESSION['err_messages'])) {
    $err_messages = $_SESSION['err_messages'];
    unset($_SESSION['err_messages']);
} else {
    $err_messages = '';
}

// verifico si se está editando un producto existente
$product = null;
$form_title = "Agregar Producto"; 
$button_text = "Enviar";
$URL_UPDATE_CONTROLLER = 'post_product_update_controller.php';
$URL_CREATE_CONTROLLER = 'post_product_controller.php';
$base_url = 'http://localhost/sistemaDeRegistroDeUsuarios/controllers/';

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    // Consulta a la base de datos para obtener los detalles del producto
    $query = "SELECT * FROM products WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $productId, PDO::PARAM_INT);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product) {
        $form_title = "Actualizar Producto";  
        $button_text = "Actualizar";  
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Producto</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 600px;
            margin-top: 30px;
        }
        .alert {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="mb-4"><?php echo htmlspecialchars($form_title); ?></h1>

        <?php if (!empty($err_messages)): ?>
            <div class="alert alert-danger" role="alert">
                <?php echo htmlspecialchars($err_messages); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo $base_url . ($form_title === 'Actualizar Producto' ? $URL_UPDATE_CONTROLLER : $URL_CREATE_CONTROLLER); ?>" method="post">    
    <?php if ($product): ?>
        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['id']); ?>">
        
        <div class="form-group">
            <label for="name">Nombre del producto:</label>
            <input type="text" 
                   class="form-control" 
                   placeholder="<?php echo htmlspecialchars($product['name']); ?>"  
                   name="name" 
                   id="name" 
                   value="<?php echo htmlspecialchars($product['name']); ?>" 
                   required>
        </div>

        <div class="form-group">
            <label for="price">Precio del producto:</label>
            <input type="number" 
                   class="form-control" 
                   name="price" 
                   id="price" 
                   step="0.01" 
                   value="<?php echo htmlspecialchars($product['price']); ?>" 
                   required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" 
                   class="form-control" 
                   name="description" 
                   id="description" 
                   value="<?php echo htmlspecialchars($product['description']); ?>" 
                   required>
        </div>

        <div class="form-group">
            <label for="assets">Imagen (URL):</label>
            <input type="text" 
                   class="form-control" 
                   name="assets" 
                   id="image" 
                   value="<?php echo htmlspecialchars($product['assets']); ?>" 
                   required>
        </div>
    <?php else: ?>
        <!-- muestro campos en blanco si no hay producto -->
        <div class="form-group">
            <label for="name">Nombre del producto:</label>
            <input type="text" 
                   class="form-control" 
                   name="name" 
                   id="name" 
                   required>
        </div>

        <div class="form-group">
            <label for="price">Precio del producto:</label>
            <input type="number" 
                   class="form-control" 
                   name="price" 
                   id="price" 
                   step="0.01" 
                   required>
        </div>

        <div class="form-group">
            <label for="description">Descripción:</label>
            <input type="text" 
                   class="form-control" 
                   name="description" 
                   id="description" 
                   required>
        </div>

        <div class="form-group">
            <label for="assets">Imagen (URL):</label>
            <input type="text" 
                   class="form-control" 
                   name="assets" 
                   id="image" 
                   required>
        </div>
    <?php endif; ?>

    <button type="submit" class="btn btn-primary"><?php echo htmlspecialchars($button_text); ?></button>
</form>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
