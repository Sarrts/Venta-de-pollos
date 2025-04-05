<?php
session_start();
require_once('db.php');

// Verificar que el usuario sea cliente
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'cliente') {
    header('Location: index.html');
    exit();
}

//  productos disponibles
$productos = mysqli_query($conn, "SELECT * FROM productos WHERE disponible = 1");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cliente - Tienda de Pollos</title>
</head>
<body>
    <h2>Bienvenido Cliente: <?php echo $_SESSION['usuario']['username']; ?></h2>

    <h3>Productos Disponibles</h3>
    <ul>
        <?php while ($row = mysqli_fetch_assoc($productos)) { ?>
            <li>
                <?php echo $row['nombre'] . " - $" . $row['precio']; ?>
                <a href="agregar_carrito.php?id_producto=<?php echo $row['id']; ?>">🛒 Agregar al carrito</a>
            </li>
        <?php } ?>
    </ul>

    <br>
    <a href="carrito.php">Ver Carrito</a>
</body>

</html>
