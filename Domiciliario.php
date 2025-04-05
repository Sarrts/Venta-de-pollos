<?php
require('C:\xampp\php\pear\fpdf186/fpdf.php'); 

$servidor = "localhost";
$usuario = "root"; 
$clave = ""; 
$BaseDeDatos = "venta_pollos";

$enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);

if (!$enlace) {
    die ("Error de conexion: " . mysqli_connect_error());
}

// Manejar el cambio de estado del pedido
if (isset($_POST['cambiarEstado'])) {
    $pedidoSeleccionado = $_POST['pedido'];

    // Verificar que se ha seleccionado un pedido
    if ($pedidoSeleccionado != '') {
        // Consulta SQL para obtener el estado actual del pedido
        $sql_estado_actual = "SELECT Estado FROM pedido WHERE N_Pedido='$pedidoSeleccionado'";
        $result_estado_actual = mysqli_query($enlace, $sql_estado_actual);
        $row_estado_actual = mysqli_fetch_assoc($result_estado_actual);
        $estado_actual = $row_estado_actual['Estado'];

        // Cambiar el estado del pedido
        $nuevo_estado = $estado_actual == 1 ? 0 : 1;
        $actualizarEstado = "UPDATE pedido SET Estado='$nuevo_estado' WHERE N_Pedido='$pedidoSeleccionado'";

        if (mysqli_query($enlace, $actualizarEstado)) {
            echo "<script>alert('Se ha cambiado el estado del pedido correctamente.');</script>";
        } else {
            echo "<script>alert('Error al cambiar el estado del pedido: " . mysqli_error($enlace) . "');</script>";
        }
    } else {
        echo "<script>alert('Por favor, seleccione un numero de pedido.');</script>";
    }
}

// Exportar a PDF
if (isset($_GET['export_pdf'])) {
    $pedidoSeleccionado = $_GET['export_pdf'];

    $pdf = new FPDF();
    
    $pdf->AddPage();

    $pdf->SetFont('Arial','B',20);
    $pdf->SetXY(53, 0); // Establecer la posición (X, Y) del título
    $pdf->Cell(0, 10, 'Distribuidora de Pollo y Huevo', 0, 1, 'L');

    $pdf->SetFont('Arial','',10);
    $pdf->SetXY(65, 8); // Establecer la posición (X, Y) de la dirección
    $pdf->Cell(0, 10, 'Direccion: Calle 21 #8-40 Barrio Colon - Monteria', 0, 1, 'L'); // Dirección

    $pdf->SetFont('Arial','B',16);
    $pdf->SetXY(75, 25);
    $pdf->Cell(0, 10, 'Recibo de Pago', 0, 1, 'L');
    $pdf->Ln(1);

    $pdf->SetFont('Arial','',12);
    

    $sql = "SELECT c.Nombre AS Nombre_cliente, c.Apellido AS Apellido_cliente, c.Cedula, c.Telefono, c.Direccion, p.Pedido, p.Valor, p.Estado 
            FROM pedido p 
            INNER JOIN cliente c ON p.id_cliente = c.id
            WHERE p.N_Pedido='$pedidoSeleccionado'";
    $result = mysqli_query($enlace, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $pdf->Cell(84,10,'Nombre:', 0, 0, 'R');
        $pdf->Cell(104,10,$row['Nombre_cliente'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(84,10,'Apellido:', 0, 0, 'R');
        $pdf->Cell(104,10,$row['Apellido_cliente'], 0,0, 'L');
        $pdf->Ln();
        $pdf->Cell(82,10,'Cedula:', 0, 0, 'R');
        $pdf->Cell(104,10,$row['Cedula'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(85,10,'Telefono:', 0, 0, 'R');
        $pdf->Cell(104,10,$row['Telefono'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(86.5,10,'Direccion:', 0, 0, 'R');
        $pdf->Cell(104,10,$row['Direccion'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(82,10,'Pedido:', 0, 0, 'R');
        $pdf->Cell(104,10,$row['Pedido'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(78.8 ,10,'Valor:', 0, 0, 'R');
        $pdf->Cell(104,10,$row['Valor'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(82,10,'Estado:', 0, 0, 'R');
        $pdf->Cell(104,10,($row['Estado'] == 1 ? 'Entregado' : 'Pendiente'), 0, 0, 'L');
        $pdf->Ln(10);
    } else {
        $pdf->Cell(40,10,'Pedido no encontrado.', 0);
    }

    $pdf->Output();
    exit;
}



?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina del Administrador</title>
    
    <style>
    body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    justify-content: center;
    align-items: center;
    height: 100vh;
    min-height: 100vh;
    background-attachment: fixed;
    background-size: cover;
    background-image: url('../Pollos/img/fondoDomii.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 100vh;
            background-attachment: fixed;
            background-size: cover;
}

h1 {
    text-align: center;
    color: white;
}

table {
    width: 80%; 
    margin: 20px auto; 
    border-collapse: collapse;
    
}

th, td {
            border: 1px solid #ddd;
            padding: 5px;
            text-align: left;
            background-color: #f2f2f2;
        }

        th {
            background-color: #f2f2f2;
        }
button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 5px;
    display: block;
    width: 150px;
    margin: 20px auto; 
}

button:hover {
    background-color: blue;
}


</style>
</head>
<body>
    <h1>PEDIDOS</h1>
    
    <table border='1'>
        <tr>
            <th>Nombre Cliente</th>
            <th>Apellido Cliente</th>
            <th>Numero de Pedido</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Pedido</th>
            <th>Valor</th>
            <th>Estado</th>
            <th>Accion</th>
        </tr>
        <?php
        $sql = "SELECT c.Nombre AS Nombre_cliente, c.Apellido AS Apellido_cliente, p.N_Pedido, c.Telefono, c.Direccion, p.Pedido, p.Valor, p.Estado 
        FROM pedido p 
        INNER JOIN cliente c ON p.id_cliente = c.id";
        $result = mysqli_query($enlace, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['Nombre_cliente'] . "</td>";
                echo "<td>" . $row['Apellido_cliente'] . "</td>";
                echo "<td>" . $row['N_Pedido'] . "</td>";
                echo "<td>" . $row['Telefono'] . "</td>";
                echo "<td>" . $row['Direccion'] . "</td>";
                echo "<td>" . $row['Pedido'] . "</td>";
                echo "<td>" . $row['Valor'] . "</td>";
                echo "<td>" . ($row['Estado'] == 1 ? 'Entregado' : 'Pendiente') . "</td>";
                echo "<td>";
                echo "<form action='#' method='post'>";
                echo "<input type='hidden' name='pedido' value='" . $row['N_Pedido'] . "'>";
                echo "<button type='submit' name='cambiarEstado'>Cambiar Estado</button>";
                echo "</form>";
                echo "<form method='GET' action='' target='_blank'>
    <input type='hidden' name='export_pdf' value='" . $row['N_Pedido'] . "'>
    <button type='submit' name='export_pdf_button'>Exportar a PDF</button>
    </form>";
                echo "</td>";
                
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No hay pedidos existentes.</td></tr>";
        }
        ?>
    </table>

    

</body>
</html>


<?php
mysqli_close($enlace);
?>


<div class="btn-vol">
<a href="index.php" >
    
        <button type="submit" name="accessType" value="Volver">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
</a>
</div>
