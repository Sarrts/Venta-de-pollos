<?php
session_start();
require_once('db.php');

if ($_SESSION['usuario']['tipo'] == 'administrador') {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $id_usuario = $_SESSION['usuario']['id'];

    $query = "INSERT INTO productos (nombre, descripcion, precio, disponible, id_usuario) VALUES ('$nombre', '$descripcion', $precio, 1, $id_usuario)";
    mysqli_query($conn, $query);

    header('Location: administrador.php');
}
?>