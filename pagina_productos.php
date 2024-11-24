<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("Inicia sesión por favor");
        window.location = "pagina_principal.php";
    </script>
    ';
    session_destroy();
    die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="activos/imagenes/InnovaTech.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Artículos en Venta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(#134e1b, #033);
            color: #f0f0f0;
        }
        .header {
            padding: 10px 20px;
            background-color: #222;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }
        .product-card {
            background: rgba(255, 255, 255, 0.1); /* Fondo transparente */
            border-radius: 10px;
            color: #fff;
            margin: 15px;
            padding: 20px;
            text-align: center;
            transition: transform 0.2s;
        }
        .product-card:hover {
            transform: scale(1.05);
        }
        .product-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="activos/imagenes/InnovaTech.png" alt="Logo" style="height: 30px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="pagina_principal.php" class="btn btn-danger ms-2">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger ms-2" href="php/cerrar_sesion.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Productos -->
    <div class="container my-4">
        <h2 class="text-center">Artículos en Venta</h2>
        <div class="row">
            <div class="col-md-4">
                <div class="product-card">
                    <img src="activos/imagenes/samsumg tel.png" alt="Samsung Galaxy" class="product-img">
                    <h4>Samsung Galaxy S21</h4>
                    <p>Dispositivo de alta gama con una cámara increíble y un diseño elegante.</p>
                    <form action="carrito.php" method="post">
                        <input type="hidden" name="producto" value="Samsung Galaxy S21">
                        <input type="hidden" name="cantidad" value="1">
                        <button type="submit" class="btn btn-success">Comprar</button>
                    </form>
                    <button class="btn btn-info">Ver Detalles</button>
                </div>
            </div>
            <div class="col-md-4">
                <div class="product-card">
                    <img src="activos/imagenes/apple.png" alt="Apple iPhone 13" class="product-img">
                    <h4>Apple iPhone 13</h4>
                    <p>El iPhone más avanzado con tecnología de cámara y rendimiento inigualable.</p>
                    <form action="carrito.php" method="post">
                        <input type="hidden" name="producto" value="Apple iPhone 13">
                        <input type="hidden" name="cantidad" value="1">
                        <button type="submit" class="btn btn-success">Comprar</button>
                    </form>
                    <button class="btn btn-info">Ver Detalles</button>
                </div>
            </div>
            <!-- Más productos -->
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
