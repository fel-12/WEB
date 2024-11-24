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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
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
        /* Ajuste del tamaño de las imágenes en el modal */
        .modal-img {
            max-width: 50%; /* Ajusta el tamaño máximo de la imagen */
            margin: 0 auto;
            display: block;
        }
        .modal-body p {
            color: #000; /* Texto en negro dentro del modal */
        }
        .modal-title {
            color: #000; /* Titulo en negro dentro del modal */
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
                        <a class="nav-link" href="#">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contacto</a>
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
            <!-- Producto 1 -->
            <div class="col-md-4">
                <div class="product-card">
                    <img src="activos/imagenes/samsumg tel.png" alt="Samsung Galaxy" class="product-img">
                    <h4>Samsung Galaxy S21</h4>
                    <p>Dispositivo de alta gama con una cámara increíble y un diseño elegante.</p>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#product1Modal">Ver Detalles</button>
                </div>
            </div>
            <!-- Producto 2 -->
            <div class="col-md-4">
                <div class="product-card">
                    <img src="activos/imagenes/SAM20.png" alt="Samsung Galaxy" class="product-img">
                    <h4>Samsung Galaxy S20</h4>
                    <p>El iPhone más avanzado con tecnología de cámara y rendimiento inigualable.</p>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#product2Modal">Ver Detalles</button>
                </div>
            </div>
            <!-- Producto 3 -->
            <div class="col-md-4">
                <div class="product-card">
                    <img src="activos/imagenes/SAM22.png" alt="Samsung Galaxy" class="product-img">
                    <h4>Samsung Galaxy S22</h4>
                    <p>Conectividad 5G y cámara de alta resolución para fotos impresionantes.</p>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#product3Modal">Ver Detalles</button>
                </div>
            </div>
            <!-- Producto 4 -->
            <div class="col-md-4">
                <div class="product-card">
                    <img src="activos/imagenes/SAM24.png" alt="Samsung Galaxy" class="product-img">
                    <h4>Samsung Galaxy S24</h4>
                    <p>Conectividad 5G y cámara de alta resolución para fotos impresionantes.</p>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#product4Modal">Ver Detalles</button>
                </div>
            </div>
            <!-- Producto 5 -->
            <div class="col-md-4">
                <div class="product-card">
                    <img src="activos/imagenes/SAM40.png" alt="Samsung Galaxy" class="product-img">
                    <h4>Samsung Galaxy A40</h4>
                    <p>Conectividad 5G y cámara de alta resolución para fotos impresionantes.</p>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#product5Modal">Ver Detalles</button>
                </div>
            </div>
            <!-- Producto 6 -->
            <div class="col-md-4">
                <div class="product-card">
                    <img src="activos/imagenes/SAM55.png" alt="Samsung Galaxy" class="product-img">
                    <h4>Samsung Galaxy S55</h4>
                    <p>Conectividad 5G y cámara de alta resolución para fotos impresionantes.</p>
                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#product6Modal">Ver Detalles</button>
                </div>
            </div>
        </div>
        <!-- Agregar más productos aquí -->
    </div>

    <!-- Modal Producto 1 -->
    <div class="modal fade" id="product1Modal" tabindex="-1" aria-labelledby="product1ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product1ModalLabel">Samsung Galaxy S21</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="activos/imagenes/samsumg tel.png" alt="Samsung Galaxy S21" class="modal-img">
                    <p><strong>Marca:</strong> Samsung</p>
                    <p><strong>Modelo:</strong> Galaxy S21</p>
                    <p><strong>Precio:</strong> $799.99 USD</p>
                    <p><strong>Características:</strong> Pantalla de 6.2" Dynamic AMOLED, cámara de 64 MP, procesador Exynos 2100, 5G, batería de 4000mAh.</p>
                    <a href="carrito.php" class="btn btn-success">Comprar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Producto 2 -->
    <div class="modal fade" id="product2Modal" tabindex="-1" aria-labelledby="product2ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product2ModalLabel">Samsung Galaxy S20</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="activos/imagenes/SAM20.png" alt="Samsung Galaxy S20" class="modal-img">
                    <p><strong>Marca:</strong> Samsung</p>
                    <p><strong>Modelo:</strong> Galaxy S20</p>
                    <p><strong>Precio:</strong> $699.99 USD</p>
                    <p><strong>Características:</strong> Pantalla 6.2" Dynamic AMOLED, cámara triple de 12+64+12 MP, procesador Exynos 990, 5G, batería de 4000mAh.</p>
                    <a href="carrito.php" class="btn btn-success">Comprar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Producto 3 -->
    <div class="modal fade" id="product3Modal" tabindex="-1" aria-labelledby="product3ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product3ModalLabel">Samsung Galaxy S22</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="activos/imagenes/SAM22.png" alt="Samsung Galaxy S22" class="modal-img">
                    <p><strong>Marca:</strong> Samsung</p>
                    <p><strong>Modelo:</strong> Galaxy S22</p>
                    <p><strong>Precio:</strong> $899.99 USD</p>
                    <p><strong>Características:</strong> Pantalla 6.1" Dynamic AMOLED 2X, cámara principal de 50 MP, procesador Snapdragon 8 Gen 1, 5G, batería de 3700mAh.</p>
                    <a href="carrito.php" class="btn btn-success">Comprar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Producto 4 -->
    <div class="modal fade" id="product4Modal" tabindex="-1" aria-labelledby="product4ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product4ModalLabel">Samsung Galaxy S24</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="activos/imagenes/SAM24.png" alt="Samsung Galaxy S24" class="modal-img">
                    <p><strong>Marca:</strong> Samsung</p>
                    <p><strong>Modelo:</strong> Galaxy S24</p>
                    <p><strong>Precio:</strong> $999.99 USD</p>
                    <p><strong>Características:</strong> Pantalla de 6.2" Dynamic AMOLED 2X, cámara de 50 MP, procesador Exynos 2200, 5G, batería de 4000mAh.</p>
                    <a href="carrito.php" class="btn btn-success">Comprar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Producto 5 -->
    <div class="modal fade" id="product5Modal" tabindex="-1" aria-labelledby="product5ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product5ModalLabel">Samsung Galaxy A40</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="activos/imagenes/SAM40.png" alt="Samsung Galaxy A40" class="modal-img">
                    <p><strong>Marca:</strong> Samsung</p>
                    <p><strong>Modelo:</strong> Galaxy A40</p>
                    <p><strong>Precio:</strong> $249.99 USD</p>
                    <p><strong>Características:</strong> Pantalla Super AMOLED 5.9", cámara dual de 16+5 MP, procesador Exynos 7885, 4G, batería de 3100mAh.</p>
                    <a href="carrito.php" class="btn btn-success">Comprar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Producto 6 -->
    <div class="modal fade" id="product6Modal" tabindex="-1" aria-labelledby="product6ModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="product6ModalLabel">Samsung Galaxy S55</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="activos/imagenes/SAM55.png" alt="Samsung Galaxy S55" class="modal-img">
                    <p><strong>Marca:</strong> Samsung</p>
                    <p><strong>Modelo:</strong> Galaxy S55</p>
                    <p><strong>Precio:</strong> $1,099.99 USD</p>
                    <p><strong>Características:</strong> Pantalla 6.7" AMOLED, cámara de 108 MP, procesador Snapdragon 8 Gen 2, 5G, batería de 5000mAh.</p>
                    <a href="carrito.php" class="btn btn-success">Comprar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
