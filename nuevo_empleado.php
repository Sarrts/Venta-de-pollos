<?php
$servidor = "localhost";
$usuario = "root"; 
$clave = ""; 
$BaseDeDatos = "venta_pollos";

$enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);

if (!$enlace) {
    die ("Error de conexion: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina del Administrador</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stylesNuevo_Empleado.css">
    
</head>
    <body>

    <h1>AGREGAR UN NUEVO EMPLEADO</h1>
    <br>
    
    <h2>CONTADOR <i class="fa-solid fa-user-plus"></i><h2>
    
    <form action="#" name="contador" method="post">
           
    <input type="text" name="Nombre" placeholder="Nombre">
        <input type="text" name="Apellido" placeholder="Apellido">
        <input type="number" name="Cedula" placeholder="Cedula">

        <input type="submit" name="registrarContador">
        <input type="reset">
   
    </form>

    <h2>DOMICILIARIO  <i class="fa-solid fa-motorcycle"></i><h2>
    <form action="#" name="Domiciliario" method="post">
       
        <input type="text" name="Nombre" placeholder="Nombre">
        <input type="text" name="Apellido" placeholder="Apellido">
        <input type="number" name="Cedula" placeholder="Cedula">

        <input type="submit" name="registrarDomiciliario">
        <input type="reset">
    </form>

    </body>
    
<html>

<?php //Registro contador
if (isset ($_POST['registrarContador'])) {
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Cedula = $_POST['Cedula'];

 
    if ($enlace) {
        $insertarContador = "INSERT INTO contador (Nombre, Apellido, Cedula) VALUES ('$Nombre', '$Apellido', '$Cedula')";

        if (mysqli_query($enlace, $insertarContador)) {
            echo "Datos del contador insertados correctamente.";
        } else {
            echo "Error al insertar datos del contador: " . mysqli_error($enlace);
        }
    } else {
        echo "Error: No se pudo establecer la conexion a la base de datos.";
    }
}
?>


<?php //Registro domiciliario
if (isset ($_POST['registrarDomiciliario'])) {
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Cedula = $_POST['Cedula'];

 
    if ($enlace) {
        $insertarDomiciliario = "INSERT INTO domiciliario (Nombre, Apellido, Cedula) VALUES ('$Nombre', '$Apellido', '$Cedula')";

        if (mysqli_query($enlace, $insertarDomiciliario)) {
            echo "Datos del contador insertados correctamente.";
        } else {
            echo "Error al insertar datos del contador: " . mysqli_error($enlace);
        }
    } else {
        echo "Error: No se pudo establecer la conexion a la base de datos.";
    }
}
?>

<div class="btn-vol">
<a href="Registro_Empleado.php" >
    
        <button type="submit" name="accessType" value="Volver">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
</a>
</div>
   