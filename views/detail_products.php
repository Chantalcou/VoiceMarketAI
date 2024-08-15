<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Detalle del Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .product-card {
            max-width: 600px;
            margin: 20px auto;
        }
        .product-img {
            height: 300px;
            object-fit: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="./dashboard_products.php">Dashboard</a>
        </li>
      </ul>
      <button type="button" class="btn btn-primary position-relative">
        Cart
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          99+
          <span class="visually-hidden">unread messages</span>
        </span>
      </button>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div id="productDetail"></div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
    $(document).ready(function() {
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');
        
        if (productId) {
            $.ajax({
                url: `../controllers/get_product_detail_controller.php?id=${productId}`,
                method: 'GET',
                dataType: 'json',
                success: function(product) {
                    if (product.error) {
                        $('#productDetail').html('<p>' + product.error + '</p>');
                    } else {
                        $('#productDetail').html(
                            `<div class="card product-card">
                                <img src="${product.assets}" alt="${product.name}" class="card-img-top product-img">
                                <div class="card-body">
                                    <h5 class="card-title">${product.name}</h5>
                                    <p class="card-text">Precio: $${product.price}</p>
                                    <p class="card-text">${product.description}</p>
                                    <button class="btn btn-info product-detail-btn" data-id="${product.id}">Agregar al carrito</button>
                                </div>
                            </div>`
                        );
                    }
                },
                error: function(xhr, status, error) {
                    $('#productDetail').html('<p>Error al cargar los detalles del producto</p>');
                }
            });
        } else {
            $('#productDetail').html('<p>ID del producto no especificado</p>');
        }
    });
</script>
</body>
</html>
