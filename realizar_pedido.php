<?php
session_start();
require_once('db.php');

if ($_SESSION['usuario']['tipo'] == 'cliente') {
    $id_producto = $_GET['id_producto'];
    $id_usuario = $_SESSION['usuario']['id'];
    $query = "INSERT INTO pedidos (id_usuario, id_producto) VALUES ($id_usuario, $id_producto)";
    mysqli_query($conn, $query);
    header('Location: cliente.php');
}
?>