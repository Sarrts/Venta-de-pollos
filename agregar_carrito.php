<?php
session_start();

$id_producto = $_GET['id_producto'];

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (!in_array($id_producto, $_SESSION['carrito'])) {
    $_SESSION['carrito'][] = $id_producto;
}

header('Location: cliente.php');
?>

