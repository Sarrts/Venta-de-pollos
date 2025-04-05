<?php
session_start();
require_once('db.php');
if ($_SESSION['usuario']['tipo'] == 'domiciliario') {
    $id = $_GET['id'];
    mysqli_query($conn, "UPDATE pedidos SET entregado = 1 WHERE id = $id");
}
header('Location: domiciliario.php');
?>