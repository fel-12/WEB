<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
        alert("Inicia sesión por favor");
        window.location = "index.php";
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
    <title>InnovaTech</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(#134e1b, #033);
            color: #ffffff; /* Color de texto más oscuro */
        }
        .header {
            padding: 10px 20px;
            background-color: rgba(76, 175, 80, 0.8); /* Color de fondo de la barra de navegación */
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        }
        .custom-btn {
            background: linear-gradient(90deg, #ff9800, #ffc107);
            border: none;
            color: #ffffff; 
            padding: 5px 20px;
            border-radius: 20px;
            transition: 0.3s;
            font-size: 0.9rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .custom-btn:hover {
            background: linear-gradient(90deg, #134e1b, #81c784);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.5);
        }
        .carousel-item img {
            height: 400px;
            object-fit: medium;
            border-radius: 10px;
        }
        .promotions {
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.3); /* Fondo más claro */
            border-radius: 10px;
            color: #333; /* Texto oscuro para mayor contraste */
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        .promotions .custom-btn {
            background: linear-gradient(90deg,  #134e1b, #81c784); /* Naranja a amarillo */
            color: #fff; /* Texto en blanco */
            border: none;
            padding: 5px 20px;
            border-radius: 20px;
            font-size: 1rem;
            transition: 0.3s;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }
        .promotions .custom-btn:hover {
            background: linear-gradient(90deg, #ffc107, #ff9800); /* Gradiente invertido */
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.5);
        }
        .container h2 {
            color: #ffeb3b;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
        }
        .navbar {
            background: linear-gradient(#134e1b, #033);/* Color de fondo de la barra de navegación */
        }
        .navbar-brand img {
            border-radius: 60%;
            border: 2px solid #ffd700;
            padding: 5px;
        }
        .category-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin: 10px 0;
            transition: transform 0.3s;
        }
        .category-img:hover {
            transform: scale(1.1);
        }
        .product-img {
            width: 120px;
            height: auto;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .product-img:hover {
            transform: scale(1.05);
        }
        .card {
            background-color: rgba(255, 255, 255, 0.1);
            border: 1px solid #8bc34a;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.5);
        }
        .card h3 {
            color: #4caf50;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="activos/imagenes/InnovaTech3.png" alt="Logo" style="height: 90px; width: 120px;">
            </a>
            <form class="d-flex ms-auto">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="🔎 Buscar...">
                </div>
                <a href="carrito.php" class="btn btn-danger ms-2">🛒</a>
                <button class="custom-btn ms-2" type="button">Usuario 👦</button>
                <a href="php/cerrar_sesion.php" class="btn btn-danger ms-2">Cerrar Sesión</a>
            </form>
        </div>
    </nav>

    <!-- Carousel -->
    <div id="productCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="activos/imagenes/modelos.png" class="d-block w-100" alt="Samsung">
            </div>
            <div class="carousel-item">
                <img src="activos/imagenes/motorolacarru.png" class="d-block w-100" alt="Motorola">
            </div>
            <div class="carousel-item">
                <img src="activos/imagenes/huaweicarru.png" class="d-block w-100" alt="Huawei">
            </div>
            <div class="carousel-item">
                <img src="activos/imagenes/apple carru.png" class="d-block w-100" alt="Apple">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- Categories -->
    <div class="container my-4">
        <h2 class="text-center">Modelos</h2>
        <div class="row text-center justify-content-center">
            <div class="col-md-2">
                <a href="pagina_sam.php">
                    <img src="activos/imagenes/samsung.png" alt="Samsung" class="img-fluid category-img">
                </a>
            </div>
            <div class="col-md-2">
                <a href="pagina_apple.php">
                    <img src="activos/imagenes/apple.png" alt="Apple" class="img-fluid category-img">
                </a>
            </div>
            <div class="col-md-2">
                <a href="paguina_huawei.php">
                    <img src="activos/imagenes/huawei.png" alt="Huawei" class="img-fluid category-img">
                </a>
            </div>
            <div class="col-md-2">
                <a href="pagina_xiaomi.php">
                    <img src="activos/imagenes/xiaomi.png" alt="Xiaomi" class="img-fluid category-img">
                </a>
            </div>
            <div class="col-md-2">
                <a href="pagina_motorola.php">
                    <img src="activos/imagenes/motorola.png" alt="Motorola" class="img-fluid category-img">
                </a>
            </div>
            <div class="col-md-2">
                <a href="otros.php">
                    <img src="activos/imagenes/mas.jpg" alt="Otros" class="img-fluid category-img">
                </a>
            </div>
        </div>
    </div>

    <!-- Información de Productos -->
    <div class="container my-4">
        <h3 class="text-center">Información de Productos</h3>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="activos/imagenes/samsumg tel.png" alt="Apple" class="product-img">
                <h4>Samsung</h4>
                <p>Samsung es una de las marcas líderes en tecnología móvil, ofreciendo una amplia variedad de modelos que destacan por su calidad de pantalla, cámaras avanzadas y excelente rendimiento.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="activos/imagenes/apple tel.jpg" alt="Apple" class="product-img">
                <h4>Apple</h4>
                <p>Apple es sinónimo de diseño y simplicidad. Sus iPhones ofrecen una experiencia de usuario fluida, con una integración perfecta entre hardware y software.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="activos/imagenes/hawuei tel.jpg" alt="Huawei" class="product-img">
                <h4>Huawei</h4>
                <p>Huawei se ha posicionado como una marca de smartphones innovadores, con cámaras de alta resolución y tecnología 5G.</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 text-center">
                <img src="activos/imagenes/redmi.jpg" alt="Xiaomi" class="product-img">
                <h4>Xiaomi</h4>
                <p>Con una excelente relación calidad-precio, Xiaomi ofrece teléfonos con características de alta gama a precios competitivos.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="activos/imagenes/motorola tel.jpg" alt="Motorola" class="product-img">
                <h4>Motorola</h4>
                <p>Motorola sigue siendo una marca confiable, con dispositivos duraderos y accesibles, destacando en batería y accesibilidad.</p>
            </div>
            <div class="col-md-4 text-center">
                <img src="activos/imagenes/audifonos.jpg" alt="Otros" class="product-img">
                <h4>Otros Productos</h4>
                <p>Ofrecemos una variedad de dispositivos que cubren necesidades específicas y ofrecen características competitivas en el mercado.</p>
            </div>
        </div>
    </div>

    <!-- Promociones -->
    <div class="container promotions my-4">
        <h3>¡Promociones Especiales!</h3>
        <p>No te pierdas nuestras ofertas limitadas en smartphones de las mejores marcas.</p>
        <button class="custom-btn">Ver Más</button>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>