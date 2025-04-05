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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina del Administrador</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            width:400px;
            margin: 0px auto;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('../Pollos/img/imgFondoCliente.jpg');
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
    color: white;
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

</head>
<body>
    <h1>AGREGAR CLIENTE <i class="fa-solid fa-user-plus"></i><h1>
    <form action="#" name="cliente" method="post">
        <input type="text" name="Nombre" placeholder="Nombre">
        <input type="text" name="Apellido" placeholder="Apellido">
        <input type="number" name="Cedula" placeholder="Cedula">
        <input type="number" name="Telefono" placeholder="Telefono">
        <input type="text" name="Direccion" placeholder="Direccion">

        <input type="submit" name="registrarCliente">
        <input type="reset">
   
    </form>
<html>


<?php //Registro cliente
if (isset ($_POST['registrarCliente'])) {
    $Nombre = $_POST['Nombre'];
    $Apellido = $_POST['Apellido'];
    $Cedula = $_POST['Cedula'];
    $Telefono = $_POST['Telefono'];
    $Direccion = $_POST['Direccion'];

 
    if ($enlace) {
        $insertarCliente = "INSERT INTO cliente (Nombre, Apellido, Cedula, Telefono, Direccion) VALUES ('$Nombre', '$Apellido', '$Cedula', '$Telefono', '$Direccion')";

        if (mysqli_query($enlace, $insertarCliente)) {
            echo "Datos del cliente insertados correctamente.";
        } else {
            echo "Error al insertar datos del cliente: " . mysqli_error($enlace);
        }
    } else {
        echo "Error: No se pudo establecer la conexion a la base de datos.";
    }
}
?>


<div class="btn-vol">
<a href="Registro_Cliente.php" >
    
        <button type="submit" name="accessType" value="Volver">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
</a>
</div>