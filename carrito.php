<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'cliente') {
    header('Location: index.html');
    exit();
}

$carrito = $_SESSION['carrito'] ?? [];

if (empty($carrito)) {
    echo "<h3>Tu carrito está vacío</h3>";
    echo "<a href='cliente.php'>Volver a comprar</a>";
    exit();
}

// Buscar info de los productos en carrito
$ids = implode(",", $carrito);
$query = "SELECT * FROM productos WHERE id IN ($ids)";
$result = mysqli_query($conn, $query);
?>

<h2> Tu Carrito</h2>
<ul>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <li><?php echo $row['nombre'] . " - $" . $row['precio']; ?></li>
<?php } ?>
</ul>

<form action="pagar.php" method="post">
    <button type="submit">💳 Pagar</button>
</form>

<br><a href="cliente.php">⬅ Volver</a>
