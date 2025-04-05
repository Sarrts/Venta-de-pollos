<?php
session_start();
require_once('db.php');
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'domiciliario') {
    header('Location: index.html');
    exit();
}
$pedidos = mysqli_query($conn, "SELECT pedidos.id, productos.nombre, usuarios.username AS cliente, pedidos.entregado FROM pedidos JOIN productos ON pedidos.id_producto = productos.id JOIN usuarios ON pedidos.id_usuario = usuarios.id");
?>

<h2>Panel Domiciliario</h2>
<table border="1">
    <tr><th>Producto</th><th>Cliente</th><th>Entregado</th><th>Acción</th></tr>
    <?php while ($row = mysqli_fetch_assoc($pedidos)) { ?>
    <tr>
        <td><?php echo $row['nombre']; ?></td>
        <td><?php echo $row['cliente']; ?></td>
        <td><?php echo $row['entregado'] ? 'Sí' : 'No'; ?></td>
        <td>
            <?php if (!$row['entregado']) { ?>
                <a href="entregar.php?id=<?php echo $row['id']; ?>">Marcar como entregado</a>
            <?php } ?>
        </td>
    </tr>
    <?php } ?>
</table>