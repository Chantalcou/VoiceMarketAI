<?php
// Aquí va tu código PHP inicial
include_once './globals/config.php';
include_once './globals/conexion.php';
include './tables/products_table.php';
include_once './views/navBar_products.php';
session_start(); 
echo $PATH

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .product-card {
            max-width: 300px;
            margin: 10px;
        }
        .product-img {
            height: 200px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<div class="container mt-4">
    <h2 class="text-center text-primary border-bottom pb-2 mb-4">Productos Disponibles</h2>
    <div id="productList" class="d-flex flex-wrap justify-content-center"></div>
    <div class="text-center mt-4">
        <!-- Botón para activar el reconocimiento de voz -->
        <button id="startVoiceRecognition" class="btn btn-primary">Hablar</button>
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    function loadProducts() {
        $.ajax({
            url: './controllers/get_product_controller.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                if (Array.isArray(data)) {
                    const productList = $('#productList');
                    productList.empty();
                    data.forEach(product => {
                        productList.append(
                            `<div class="card product-card">
                                <img src="${product.assets}" alt="${product.name}" class="card-img-top product-img">
                                <div class="card-body">
                                    <h5 class="card-title">${product.name}</h5>
                                    <p class="card-text">Precio: $${product.price}</p>
                                    <p class="card-text">${product.description}</p>
                                    <button class="btn btn-info product-detail-btn" data-id="${product.id}">Product detail</button>
                                </div>
                            </div>`
                        );
                    });
                } else {
                    console.log('Error en la respuesta del servidor', data);
                };
            },
            error: function(xhr, status, error) {
                console.log('Error al cargar los productos', error.message);
            }
        });
    }

    // Product detail
    $(document).on('click', '.product-detail-btn', function() {
        const productId = $(this).data('id'); 
        console.log(productId); 
        window.location.href = `./views/detail_products.php?id=${productId}`;
    });

    $(document).ready(function() {
        loadProducts();

        <?php if (isset($_SESSION['success_message'])): ?>
        Swal.fire({
            title: 'Exito!',
            text: '<?php echo $_SESSION['success_message']; ?>',
            icon: 'success',
            confirmButtonText: 'Aceptar'
        });
        <?php unset($_SESSION['success_message']); ?>
        <?php endif; ?>
    });

    // Integración del reconocimiento de voz
    if ('webkitSpeechRecognition' in window) {
        const recognition = new webkitSpeechRecognition();
        recognition.continuous = false; // Para escuchar solo un comando a la vez
        recognition.interimResults = false; // Resultados intermedios
        recognition.lang = 'es-ES'; // Idioma del reconocimiento, en este caso español

        recognition.onresult = function(event) {
            const voiceCommand = event.results[0][0].transcript.toLowerCase();
            console.log('Comando de voz:', voiceCommand);
            // Aquí puedes agregar lógica para ejecutar comandos basados en el texto capturado
            // Por ejemplo, si el usuario dice "agregar producto", puedes mostrar un modal o redirigir a una página.
        };

        recognition.onerror = function(event) {
            console.error('Error en el reconocimiento de voz:', event.error);
        };

        // Iniciar el reconocimiento de voz cuando se presiona el botón
        $('#startVoiceRecognition').on('click', function() {
            recognition.start();
        });
    } else {
        console.error('Este navegador no soporta reconocimiento de voz.');
    }
</script>
</body>
</html>
