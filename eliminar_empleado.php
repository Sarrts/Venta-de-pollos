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
<title>Eliminar Empleado</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
        body {
            font-family: Arial, sans-serif;
            width:400px;
            margin: 0px auto;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('../Pollos/img/fondoRegisEmple.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 100vh;
            background-attachment: fixed;
            background-size: cover;
        }

        
        h1 {
            text-align: center;
            margin-top: 20px;
            color: white;
            background: rgba(5, 7, 12, 0.40);
         border-radius: 5px;
         max-width: 400px;
        }

        h2 {
            text-align: center;
            font-size: 20px;
            margin-top: 30px;
            color: white;
            background: rgba(5, 7, 12, 0.40);
         border-radius: 5px;
         max-width: 400px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            background: rgba(5, 7, 12, 0.40);
        }

        input[type="text"],
        input[type="number"],
        input[type="submit"],
        input[type="reset"] {
            display: block;
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"],
        input[type="reset"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="reset"]:hover {
            background-color: #0056b3;
        }
        
        
        h2{
        background: rgba(5, 7, 12, 0.40);
         border-radius: 5px;
         width: 400px;
         color: black;
     }
    th,td {
    background-color: #f2f2f2;
    
}

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

         button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            margin: 0px auto;
        }

         button:hover {
            background-color: blue;
        }
        /* Estilos para el botón de volver */
        .btn-vol {
            position: absolute;
            top: 20px; /* Ajusta la distancia desde la parte superior */
            left: 20px; /* Ajusta la distancia desde la izquierda */
            z-index: 999; /* Asegura que esté por encima del resto de elementos */
            
        }

        .btn-vol:hover{
            background-color: white;
        }
    </style>

<html>
<h2>ELIMINAR CONTADOR <i class="fa-solid fa-user-plus"></i></h2>
    <form action="#" name="eliminar_Contador" method="post">
    <select name="cedula_Contador_eliminar">
        <option value="">Seleccionar Cliente a Eliminar</option>
        <?php
        $query_Contador_eliminar = "SELECT Cedula, CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM contador";
        $result_Contador_eliminar = mysqli_query($enlace, $query_Contador_eliminar);
        while ($Contador_eliminar = mysqli_fetch_assoc($result_Contador_eliminar)) {
            echo "<option value='{$Contador_eliminar['Cedula']}'>{$Contador_eliminar['Cedula']} - {$Contador_eliminar['NombreCompleto']}</option>";
        }
        ?>
    </select>
    <input type="submit" name="eliminarContador" value="Eliminar">
</form>



 <h2>ELIMINAR DOMICILIARIO <i class="fa-solid fa-motorcycle"></i></h2>
    <form action="#" name="eliminar_Domiciliario" method="post">
    <select name="cedula_Domiciliario_eliminar">
        <option value="">Seleccionar Cliente a Eliminar</option>
        <?php
        $query_Domiciliario_eliminar = "SELECT Cedula, CONCAT(Nombre, ' ', Apellido) AS NombreCompleto FROM domiciliario";
        $result_Domiciliario_eliminar = mysqli_query($enlace, $query_Domiciliario_eliminar);
        while ($Domiciliario_eliminar = mysqli_fetch_assoc($result_Domiciliario_eliminar)) {
            echo "<option value='{$Domiciliario_eliminar['Cedula']}'>{$Domiciliario_eliminar['Cedula']} - {$Domiciliario_eliminar['NombreCompleto']}</option>";
        }
        ?>
    </select>
    <input type="submit" name="eliminarDomiciliario" value="Eliminar">
</form>

<html>


<?php //eliminar contador
if (isset($_POST['eliminarContador'])) {
    $Cedula = $_POST['cedula_Contador_eliminar'];

    if ($Cedula) { 
        $eliminar = "DELETE FROM contador WHERE Cedula='$Cedula'";
        $sql = mysqli_query($enlace, $eliminar);

        if ($sql) {
            echo "Contador eliminado correctamente.";
        } else {
            echo "Error al eliminar contador: " . mysqli_error($enlace);
        }
    } else {
        echo "Por favor, selecciona un contador a eliminar.";
    }
}

?>

<?php //eliminar domiciliario
if (isset($_POST['eliminarDomiciliario'])) {
    $Cedula = $_POST['cedula_Domiciliario_eliminar'];

    if ($Cedula) { 
        $eliminar = "DELETE FROM domiciliario WHERE Cedula='$Cedula'";
        $sql = mysqli_query($enlace, $eliminar);

        if ($sql) {
            echo "Domiciliario eliminado correctamente.";
        } else {
            echo "Error al eliminar domiciliario: " . mysqli_error($enlace);
        }
    } else {
        echo "Por favor, selecciona un domiciliario a eliminar.";
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
   