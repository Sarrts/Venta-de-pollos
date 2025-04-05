<?php
$conn = mysqli_connect('localhost', 'root', '', 'tienda_pollos');
if (!$conn) {
    die('Error al conectar con la base de datos: ' . mysqli_connect_error());
}
?>