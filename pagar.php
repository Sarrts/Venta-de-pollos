<?php
session_start();
require_once('db.php');

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'cliente') {
    header('Location: index.html');
    exit();
}

$id_usuario = $_SESSION['usuario']['id'];
$carrito = $_SESSION['carrito'] ?? [];

foreach ($carrito as $id_producto) {
    mysqli_query($conn, "INSERT INTO pedidos (id_usuario, id_producto) VALUES ($id_usuario, $id_producto)");
}

// Vaciar carrito
unset($_SESSION['carrito']);

echo "<h2>✅ Pedido realizado con éxito</h2>";
echo "<a href='cliente.php'>Volver a comprar</a>";



?>
