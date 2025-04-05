<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$BaseDeDatos = "venta_pollos";

$enlace = mysqli_connect($servidor, $usuario, $clave, $BaseDeDatos);

if (!$enlace) {
    die("Error de conexion: " . mysqli_connect_error());
}

?>

<!DOCTYPE html>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="stylesRegistrar_Empleado.css">
<html lang="es">

<style>
    body{background-image: url('../Pollos/img/fondoRegisEmple.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 100vh;
            background-attachment: fixed;
            background-size: cover;
    }

    h2{
        color: black;
    }
    </style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina del Administrador</title>

    
</head>

<body>
    <h2>MODIFICAR CONTADOR <i class="fa-solid fa-user"></i></h2>
    <br>

    <br>

    <form action="#" method="post">
        <select name="empleado">
            <option value="">Seleccionar Contador</option>
            <?php
            // Consultar contadores
            $query = "SELECT * FROM contador";
            $result = mysqli_query($enlace, $query);

            // Mostrar opciones en el menú desplegable
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['Cedula']}'>{$row['Nombre']} {$row['Apellido']} - {$row['Cedula']}</option>";
            }
            ?>
        </select>
        <select name="campo">
            <option value="Nombre">Nombre</option>
            <option value="Apellido">Apellido</option>
            <option value="Cedula">Cedula</option>
        </select>
        <input type="text" name="nuevo_valor" placeholder="Nuevo Valor">

        <input type="submit" name="editarContador" value="Editar">
        <input type="reset">
    </form>
<br>

    <h2>MODIFICAR DOMICILIARIO <i class="fa-solid fa-motorcycle"></i></h2>
    <br>

    <br>

    <form action="#" method="post">
        <select name="empleado">
            <option value="">Seleccionar Domiciliario</option>
            <?php
            // Consultar domiciliarios
            $query = "SELECT * FROM domiciliario";
            $result = mysqli_query($enlace, $query);

            // Mostrar opciones en el menú desplegable
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='{$row['Cedula']}'>{$row['Nombre']} {$row['Apellido']} - {$row['Cedula']}</option>";
            }
            ?>
        </select>
        <select name="campo">
            <option value="Nombre">Nombre</option>
            <option value="Apellido">Apellido</option>
            <option value="Cedula">Cedula</option>
        </select>
        <input type="text" name="nuevo_valor" placeholder="Nuevo Valor">

        <input type="submit" name="editarDomiciliario" value="Editar">
        <input type="reset">
    </form>
    

</body>
</html>

<?php
    // Procesar el formulario para editar contador
    if (isset($_POST['editarContador'])) {
        $cedula = $_POST['empleado'];
        $campo = $_POST['campo'];
        $nuevo_valor = $_POST['nuevo_valor'];

        if ($enlace) {
            $editarContador = "UPDATE contador SET $campo='$nuevo_valor' WHERE Cedula='$cedula'";

            if (mysqli_query($enlace, $editarContador)) {
                echo "Contador modificado correctamente.";
            } else {
                echo "Error al modificar contador: " . mysqli_error($enlace);
            }
        } else {
            echo "Error: No se pudo modificar el empleado.";
        }
    }
    ?>

<?php
    // Procesar el formulario para editar domiciliario
    if (isset($_POST['editarDomiciliario'])) {
        $cedula = $_POST['empleado'];
        $campo = $_POST['campo'];
        $nuevo_valor = $_POST['nuevo_valor'];

        if ($enlace) {
            $editarContador = "UPDATE domiciliario SET $campo='$nuevo_valor' WHERE Cedula='$cedula'";

            if (mysqli_query($enlace, $editarContador)) {
                echo "Domiciliario modificado correctamente.";
            } else {
                echo "Error al modificar domiciliario: " . mysqli_error($enlace);
            }
        } else {
            echo "Error: No se pudo modificar el empleado.";
        }
    }
    ?>
<?php

mysqli_close($enlace);
?>
<br>
<br>

<div class="btn-vol">
<a href="Registro_Empleado.php" >
    
        <button type="submit" name="accessType" value="Volver">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
</a>
</div>