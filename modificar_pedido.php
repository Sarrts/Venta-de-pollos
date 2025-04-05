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
    <h1>MODIFICAR PEDIDO <i class="fa-solid fa-gear"></i></h1>
    <br>

    <form action="#" method="post">
        <select name="N_Pedido" id="N_Pedido" onchange="mostrarDatosPedido()">
            <option value="">Seleccionar Pedido</option>
            <?php
            // Consultar pedidos
            $query = "SELECT N_Pedido, id_cliente, Pedido, Valor FROM pedido";
            $result = mysqli_query($enlace, $query);

            // Mostrar opciones en el menú desplegable
            while ($row = mysqli_fetch_assoc($result)) {
                // Consultar cliente asociado al pedido
                $cliente_query = "SELECT Nombre, Apellido, Cedula FROM cliente WHERE id={$row['id_cliente']}";
                $cliente_result = mysqli_query($enlace, $cliente_query);
                $cliente = mysqli_fetch_assoc($cliente_result);

                // Mostrar opciones en el menú desplegable con la información del cliente
                echo "<option value='{$row['N_Pedido']}' data-cliente='{$row['id_cliente']}' data-pedido='{$row['Pedido']}' data-valor='{$row['Valor']}' data-nombre='{$cliente['Nombre']}' data-apellido='{$cliente['Apellido']}' data-cedula='{$cliente['Cedula']}'>{$cliente['Cedula']} - {$cliente['Nombre']} {$cliente['Apellido']}</option>";
            }
            ?>
        </select>
        <label for="cliente">Cliente:</label>
        <input type="text" id="cliente" name="Cliente" readonly>
       <label for="pedido">Pedido:</label>
        <input type="text" id="pedido" name="Pedido" readonly>
        <label for="valor">Valor:</label>
        <input type="number" id="valor" name="Valor" readonly>

        <label for="nuevo">Nuevo:</label>
        <select name="nuevo">
            <option value="Pedido">Pedido</option>
            <option value="Valor">Valor</option>
        </select>
        <input type="text" name="nuevo_valor" placeholder="Nuevo Valor">
        <br>
        <input type="submit" name="editarPedido" value="Editar">
        <input type="reset">
    </form>
<br>
<br>
    
</body>
</html>

<script>
function mostrarDatosPedido() {
    var select = document.getElementById("N_Pedido");
    var selectedOption = select.options[select.selectedIndex];
    var cliente = selectedOption.getAttribute('data-cedula') + ' - ' + selectedOption.getAttribute('data-nombre') + ' ' + selectedOption.getAttribute('data-apellido');
    var pedido = selectedOption.getAttribute('data-pedido');
    var valor = selectedOption.getAttribute('data-valor');

    document.getElementById("cliente").value = cliente;
    document.getElementById("pedido").value = pedido;
    document.getElementById("valor").value = valor;
}
</script>

<?php
if (isset($_POST['editarPedido'])) {
    $id_pedido = $_POST['N_Pedido'];
    $nuevo_campo = $_POST['nuevo'];
    $nuevo_valor = $_POST['nuevo_valor'];

    $query_editar = "UPDATE pedido SET $nuevo_campo='$nuevo_valor' WHERE N_Pedido='$id_pedido'";
    $result_editar = mysqli_query($enlace, $query_editar);

    if ($result_editar) {
        echo "Pedido editado correctamente.";
    } else {
        echo "Error al editar pedido: " . mysqli_error($enlace);
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




