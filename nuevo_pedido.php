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

         label {
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
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
   <h1>AGREGAR PEDIDOS <i class="fa-solid fa-box-open"></i></h1>
<form action="#" method="post">
    <select name="id_cliente" id="id_cliente" onchange="mostrarDatosCliente()">
        <option value="">Seleccionar Cliente</option>
        <!-- Aquí se generan las opciones del menú desplegable -->
        <?php
        $query_clientes = "SELECT id, Nombre, Apellido, Cedula, Telefono, Direccion FROM cliente";
        $result_clientes = mysqli_query($enlace, $query_clientes);
        while ($cliente = mysqli_fetch_assoc($result_clientes)) {
            echo "<option value='{$cliente['id']}' data-nombre='{$cliente['Nombre']}' data-apellido='{$cliente['Apellido']}' data-cedula='{$cliente['Cedula']}' data-telefono='{$cliente['Telefono']}' data-direccion='{$cliente['Direccion']}'>{$cliente['Cedula']} - {$cliente['Nombre']} {$cliente['Apellido']}</option>";
        }
        ?>
    </select>
    <br>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="Nombre_cliente" readonly>
    <br>
    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="Apellido_cliente" readonly>
    <br>
    <label for="cedula">Cedula:</label>
    <input type="text" id="cedula" name="Cedula_cliente" readonly>
    <br>
    <label for="telefono">Telefono:</label>
    <input type="number" id="telefono" name="Telefono_cliente" readonly>
    <br>
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="Direccion_cliente" readonly>
    <br>

    <input type="text" name="Pedido" placeholder="Pedido">
    <input type="number" name="Valor" placeholder="Valor">

    <input type="submit" name="registrarPedido" value="Registrar Pedido">
</form>


    <script>
function mostrarDatosCliente() {
    var select = document.getElementById("id_cliente");
    var selectedOption = select.options[select.selectedIndex];
    var nombre = selectedOption.getAttribute('data-nombre');
    var apellido = selectedOption.getAttribute('data-apellido');
    var cedula = selectedOption.getAttribute('data-cedula');
    var telefono = selectedOption.getAttribute('data-telefono');
    var direccion = selectedOption.getAttribute('data-direccion');

    document.getElementById("nombre").value = nombre;
    document.getElementById("apellido").value = apellido;
    document.getElementById("cedula").value = cedula;
    document.getElementById("telefono").value = telefono;
    document.getElementById("direccion").value = direccion;
}
</script>
<br>
<br>


<?php
if (isset($_POST['registrarPedido'])) {
    $id_cliente = $_POST['id_cliente'];
    $Pedido = $_POST['Pedido'];
    $Valor = $_POST['Valor'];

    $query_insert = "INSERT INTO pedido (id_cliente, Pedido, Valor) VALUES ('$id_cliente', '$Pedido', '$Valor')";
    $result_insert = mysqli_query($enlace, $query_insert);

    if ($result_insert) {
        echo "Pedido registrado correctamente.";
    } else {
        echo "Error al registrar pedido: " . mysqli_error($enlace);
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

