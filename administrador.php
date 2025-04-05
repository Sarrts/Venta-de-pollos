<?php
session_start();
require_once('db.php');
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] != 'administrador') {
    header('Location: index.html');
    exit();
}
?>

<h2>Bienvenido Administrador: <?php echo $_SESSION['usuario']['username']; ?></h2>
<form action="crear_producto.php" method="post">
    <h3>Agregar Producto</h3>
    <input type="text" name="nombre" placeholder="Nombre" required><br>
    <input type="text" name="descripcion" placeholder="Descripción"><br>
    <input type="number" step="0.01" name="precio" placeholder="Precio" required><br>
    <input type="submit" value="Agregar">
</form>
<h3>💰 Sección de Cuentas</h3>

<?php
// Calcular ganancias: unir productos con pedidos
$ganancias = mysqli_query($conn, "
    SELECT p.nombre, p.precio, COUNT(pe.id) as cantidad, (p.precio * COUNT(pe.id)) as total
    FROM productos p
    INNER JOIN pedidos pe ON p.id = pe.id_producto
    GROUP BY p.id
");

$total_general = 0;
?>

<table border="1" cellpadding="5">
    <tr>
        <th>Producto</th>
        <th>Precio</th>
        <th>Cantidad Vendida</th>
        <th>Total Ganado</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($ganancias)) {
        $total_general += $row['total'];
    ?>
    <tr>
        <td><?php echo $row['nombre']; ?></td>
        <td>$<?php echo $row['precio']; ?></td>
        <td><?php echo $row['cantidad']; ?></td>
        <td>$<?php echo $row['total']; ?></td>
    </tr>
    <?php } ?>
    <tr>
        <td colspan="3"><strong>Total General</strong></td>
        <td><strong>$<?php echo $total_general; ?></strong></td>
    </tr>
</table>


