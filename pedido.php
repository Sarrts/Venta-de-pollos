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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!DOCTYPE html>
<html lang="es">
 
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
         width: 340px;
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

<h1>¿QUE QUIERES HACER?<h1>
<h2>
<form>
    <label for="admin">Agregar pedido <i class="fa-solid fa-box-open"></i></label>
        <input type="radio" id="admin" name="accessType" value="Nuevo pedido"><br>

    <label for="admin">Eliminar pedido <i class="fa-solid fa-delete-left"></i></label>
        <input type="radio" id="admin" name="accessType" value="Eliminar pedido"><br>

    <label for="admin">Modificar pedido <i class="fa-solid fa-gear"></i></label>
        <input type="radio" id="admin" name="accessType" value="Modificar pedido"><br>
</form>
<br>
     <button type="button" onclick="redirect()">Seleccionar</button>


<br>

<h2>Ver Pedidos <i class="fa-solid fa-eye"></i></h2>
<form action="#" name="ver_pedidos" method="post">
    <input type="hidden" name="accessType" value="verPedidos">
    <input type="submit" value="Ver Pedidos">
</form>

<script>
        function redirect() {
            var selectedOption = document.querySelector('input[name="accessType"]:checked').value;
            if (selectedOption === 'Nuevo pedido') {
                window.location.href = "nuevo_pedido.php";
            } else if (selectedOption === 'Eliminar pedido') {
                window.location.href = "eliminar_pedido.php";
            } else if (selectedOption === 'Modificar pedido') {
                window.location.href = "modificar_pedido.php";
            } 
        }
    </script>


</body>
</html>



<?php
    //para ver los pedidos
    if (isset($_POST['accessType']) && $_POST['accessType'] == 'verPedidos') {
        
        echo "<h2>Lista de Pedidos</h2>";

        $query = "SELECT p.N_Pedido, c.Cedula, c.Nombre, c.Apellido, c.Direccion, c.Telefono, p.Pedido, p.Valor, p.Estado
                  FROM pedido p
                  INNER JOIN cliente c ON p.id_cliente = c.id";
        $result = mysqli_query($enlace, $query);
        
        if (mysqli_num_rows($result) > 0) {
            
            echo "<table border='1'>";
            echo "<tr><th>ID Pedido</th><th>Cedula Cliente</th><th>Nombre Cliente</th><th>Apellido Cliente</th><th>Direccion Cliente</th><th>Telefono Cliente</th><th>Pedido</th><th>Valor</th><th>Estado</th></tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo "<tr>";
                echo "<td>" . $row['N_Pedido'] . "</td>";
                echo "<td>" . $row['Cedula'] . "</td>";
                echo "<td>" . $row['Nombre'] . "</td>";
                echo "<td>" . $row['Apellido'] . "</td>";
                echo "<td>" . $row['Direccion'] . "</td>";
                echo "<td>" . $row['Telefono'] . "</td>";
                echo "<td>" . $row['Pedido'] . "</td>";
                echo "<td>" . $row['Valor'] . "</td>";
                echo "<td>" . $row['Estado'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            
            echo "No hay pedidos registrados.";
        }
    }
    ?>


</body>
</html>

<br>
<br>

<div class="btn-vol">
<a href="Admin.php" >
    
        <button type="submit" name="accessType" value="Volver">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
</a>
</div>