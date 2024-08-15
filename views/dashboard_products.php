<?php 
include './navBar_products.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            margin-top: 30px;
        }
        .table th, .table td {
            text-align: center;
        }
        .table img {
            width: 100px; 
            height: 100px; 
            object-fit: cover;
        }
        .btn {
            margin: 0 5px;
        }
    </style>
</head>
<body>
    <div>
        </div>
        <div class="container">
            <h2 class="mb-4">Productos Disponibles</h2>
            <button  type="button" class="btn btn-success" id='add_product_button'>Agregar producto</button>
            <script>
        $(document).ready(function() {
            $('#add_product_button').on('click', function() {
                window.location.href=('./form_products.php');
            });
        });
    </script>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="productList">
                <!-- productos se cargarán aquí -->
            </tbody>
        </table>
    </div>

    <!-- Scripts -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        function loadProducts() {
            $.ajax({
                url: '../controllers/get_product_controller.php',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    if (Array.isArray(data)) {
                        const productList = $('#productList');
                        productList.empty();
                        data.forEach(product => {
                            productList.append(
                                `<tr>
                                    <td>${product.id}</td>
                                    <td>${product.name}</td>
                                    <td>$${product.price}</td>
                                    <td>${product.description}</td>
                                    <td><img src="${product.assets}" alt="${product.name}"></td>
                                    <td>
                                        <button type="button" class="btn btn-outline-danger delete-btn" data-id="${product.id}">Eliminar</button>
                                        <button type="button" class="btn btn-outline-info update-btn" data-id="${product.id}">Update</button>
                                    </td>
                                </tr>`
                            );
                        });
                    } else {
                        console.log('Error en la respuesta del servidor', data);
                    }
                },
                error: function(xhr, status, error) {
                    console.log('Error al cargar los productos', error.message);
                }
            });
        }

        $(document).ready(function() {
            loadProducts();
        });

        // Manejar clic en el botón de eliminar
        $(document).on('click', '.delete-btn', function() {
            const product_id = $(this).data('id');
            if (confirm('¿Estás seguro de que quieres eliminar este producto?')) {
                $.ajax({
                    url: '../controllers/post_product_delete_controller.php',
                    method: 'POST',
                    data: { id: product_id },
                    success: function(response) {
                        alert('Producto eliminado exitosamente');
                        loadProducts(); 
                    },
                    error: function(xhr, status, error) {
                        console.log('Error al eliminar el producto', error.message);
                    }
                });
            }
        });


        // Manejar el click del boton update
        $(document).on('click','.update-btn',function(){
            const product_id= $(this).data('id');
            window.location.href=`./form_products.php?id=${product_id}`;

        });



    </script>
</body>
</html>
