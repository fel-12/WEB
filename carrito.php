<?php
session_start();

// Inicializar el carrito si no existe
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Agregar productos (este bloque se ejecuta al agregar un producto desde otra página)
if (isset($_GET['producto']) && isset($_GET['cantidad'])) {
    $producto = $_GET['producto'];
    $cantidad = $_GET['cantidad'];

    // Buscar si el producto ya está en el carrito
    $encontrado = false;
    foreach ($_SESSION['carrito'] as &$item) {
        if ($item['nombre'] == $producto) {
            $item['cantidad'] += $cantidad;
            $encontrado = true;
            break;
        }
    }

    // Si no está, añadirlo como nuevo
    if (!$encontrado) {
        $_SESSION['carrito'][] = [
            'nombre' => $producto,
            'cantidad' => $cantidad,
            'precio' => 100 // Precio fijo por ejemplo, ajusta según tus necesidades
        ];
    }
}

// Función para eliminar productos del carrito
if (isset($_GET['eliminar'])) {
    $indice = $_GET['eliminar'];
    array_splice($_SESSION['carrito'], $indice, 1);
}

// Función para actualizar cantidad
if (isset($_POST['actualizar'])) {
    foreach ($_POST['cantidad'] as $indice => $cantidad) {
        $_SESSION['carrito'][$indice]['cantidad'] = $cantidad;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(#134e1b, #033);
            color: #f0f0f0;
        }
        .container {
            max-width: 900px;
            margin-top: 50px;
            background-color: #222;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);
        }
        h2 {
            color: #28a745;
            font-weight: 700;
            text-align: center;
        }
        .table {
            color: #f0f0f0;
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead {
            background-color: #444;
        }
        .btn-actualizar {
            background-color: #ffc107;
            color: #222;
        }
        .btn-finalizar {
            background-color: #28a745;
            color: #f0f0f0;
        }
        .btn-danger {
            color: #f0f0f0;
        }
        .total-carrito {
            font-size: 1.2em;
            font-weight: bold;
            color: #28a745;
            text-align: right;
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

    <div class="container">
        <h2>Carrito de Compras</h2>

        <?php if (empty($_SESSION['carrito'])): ?>
            <p class="text-center mt-4">El carrito está vacío.</p>
        <?php else: ?>
            <form method="post" action="carrito.php">
                <table class="table table-hover mt-4">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $total_carrito = 0;
                        foreach ($_SESSION['carrito'] as $indice => $producto): 
                            $total_producto = $producto['precio'] * $producto['cantidad'];
                            $total_carrito += $total_producto;
                        ?>
                            <tr>
                                <td><?php echo htmlspecialchars($producto['nombre']); ?></td>
                                <td>
                                    <input type="number" name="cantidad[<?php echo $indice; ?>]" value="<?php echo $producto['cantidad']; ?>" min="1" class="form-control form-control-sm" style="width: 70px;">
                                </td>
                                <td>$<?php echo number_format($producto['precio'], 2); ?></td>
                                <td>$<?php echo number_format($total_producto, 2); ?></td>
                                <td>
                                    <a href="carrito.php?eliminar=<?php echo $indice; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="total-carrito">Total Carrito</td>
                            <td class="total-carrito">$<?php echo number_format($total_carrito, 2); ?></td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
                <div class="text-end">
                    <button type="submit" name="actualizar" class="btn btn-actualizar">Actualizar Cantidades</button>
                    <a href="checkout.php" class="btn btn-finalizar">Finalizar Compra</a>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
