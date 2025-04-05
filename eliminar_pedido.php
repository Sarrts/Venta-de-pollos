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
        background-image: url('../Pollos/img/Imagenfonpedd.jpg');
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
         width: 370px;
    }

    form{
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
            background: rgba(5, 7, 12, 0.40);
    }

     h2{
        background: rgba(5, 7, 12, 0.40);
         border-radius: 5px;
         width: 340px;
    color: white;
     }
    th,td {
    background-color: #f2f2f2;
    
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
    <!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDOS</title>
</head>
<body>

<h1>ELIMINAR PEDIDOS <i class="fa-solid fa-delete-left"></i></h1>

    <form action="#" method="post">
        <select name="N_Pedido_eliminar" id="N_Pedido_eliminar">
            <option value="">Seleccionar Pedido</option>
            <?php
            $query = "SELECT N_Pedido, Pedido FROM pedido";
            $result = mysqli_query($enlace, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo "<option value='{$row['N_Pedido']}'>{$row['N_Pedido']} - {$row['Pedido']}</option>";
            }
            ?>
        </select>
        <input type="submit" name="eliminarPedido" value="Eliminar">
    </form>

    <?php
    if (isset($_POST['eliminarPedido'])) {
        $N_Pedido_eliminar = $_POST['N_Pedido_eliminar'];
        if ($N_Pedido_eliminar) {
            $eliminar_query = "DELETE FROM pedido WHERE N_Pedido='$N_Pedido_eliminar'";
            if (mysqli_query($enlace, $eliminar_query)) {
                echo "Pedido eliminado correctamente.";
            } else {
                echo "Error al eliminar pedido: " . mysqli_error($enlace);
            }
        } else {
            echo "Por favor, selecciona un pedido.";
        }
    }
    ?>




<div class="btn-vol">
<a href="pedido.php" >
    
        <button type="submit" name="accessType" value="Volver">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
</a>
</div>

</body>
</html>