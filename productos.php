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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina del Administrador</title>

    <style>
    body{
        font-family: Arial, sans-serif;
        width:400px;
        margin: 0px auto;
        padding: 0;
        background-color: #f4f4f4;
        background-image: url('../Pollos/img/ImageFondoProo.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 100vh;
            background-attachment: fixed;
            background-size: cover;
    }

    h1{
        text-align: center;
        color: white;
         background: rgba(5, 7, 12, 0.40);
         border-radius: 5px;
         width: 350px;
    }

    form{
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            background: rgba(5, 7, 12, 0.40);
    }
    
    label{
            display: block;
            margin-bottom: 10px;
            font-size: 16px;
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
   
    <h1>AGREGAR PRESAS <i class="fa-solid fa-drumstick-bite"></i><h1>
    <form action="#" name="Productos" method="post">
        <input type="text" name="Presas" placeholder="Presas">
       
       
        <input type="submit" name="registrarPresas">
        <input type="reset">

        
   
    </form>


    <h1>AGREGAR HUEVOS <i class="fa-solid fa-egg"></i><h1>
    <form action="#" name="Productos" method="post">
        
        <input type="text" name="Huevos" placeholder="Huevos">
       
        <input type="submit" name="registrarHuevos">
        <input type="reset">

        
   
    </form>

    

    <h1>ELIMINAR PRODUCTOS</h1>
    <form action="#" name="eliminar_productos" method="post">
    <select name="id_productos_eliminar">
        <option value="">Seleccionar Producto a Eliminar</option>
        <?php
        $query_productos_eliminar = "SELECT id, CONCAT(Presas, ' ', Huevos) AS PresasHuevos FROM productos";
        $result_productos_eliminar = mysqli_query($enlace, $query_productos_eliminar);
        while ($productos_eliminar = mysqli_fetch_assoc($result_productos_eliminar)) {
            echo "<option value='{$productos_eliminar['id']}'>{$productos_eliminar['id']} - {$productos_eliminar['PresasHuevos']}</option>";
        }
        ?>
    </select>
    <input type="submit" name="eliminarproductos" value="Eliminar">
</form>

<br>



    <?php //Registro presa
if (isset ($_POST['registrarPresas'])) {
    $Presas = $_POST['Presas'];

 

 
    if ($enlace) {
        $insertarPresa = "INSERT INTO productos (Presas)  VALUES ('$Presas')";

        if (mysqli_query($enlace, $insertarPresa)) {
            echo "Datos del producto insertados correctamente.";
        } else {
            echo "Error al insertar datos del insertados: " . mysqli_error($enlace);
        }
    } else {
        echo "Error: No se pudo establecer la conexion a la base de datos.";
    }
}
?>


 <?php //Registro huevo
if (isset ($_POST['registrarHuevos'])) {

    $Huevos = $_POST['Huevos'];
 

 
    if ($enlace) {
        $insertarHuevo = "INSERT INTO productos (Huevos)  VALUES ( '$Huevos')";

        if (mysqli_query($enlace, $insertarHuevo)) {
            echo "Datos del producto insertados correctamente.";
        } else {
            echo "Error al insertar datos del insertados: " . mysqli_error($enlace);
        }
    } else {
        echo "Error: No se pudo establecer la conexion a la base de datos.";
    }
}
?>

<?php //eliminar productos
if (isset($_POST['eliminarproductos'])) {
    $id = $_POST['id_productos_eliminar'];

    if ($id) { 
        $eliminar = "DELETE FROM productos WHERE id='$id'";
        $sql = mysqli_query($enlace, $eliminar);

        if ($sql) {
            echo "Producto eliminado correctamente.";
        } else {
            echo "Error al eliminar el producto: " . mysqli_error($enlace);
        }
    } else {
        echo "Por favor, selecciona un producto a eliminar.";
    }
}

?>
<div class="btn-vol">
<a href="Admin.php" >
    
        <button type="submit" name="accessType" value="Volver">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
</a>
</div>