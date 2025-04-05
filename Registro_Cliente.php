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
<title>Cliente</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    <label for="admin">Nuevo cliente <i class="fa-solid fa-user-plus"></i></label>
        <input type="radio" id="admin" name="accessType" value="Nuevo cliente"><br>
    </br>
    <label for="admin">Eliminar cliente <i class="fa-solid fa-delete-left"></i></label>
        <input type="radio" id="admin" name="accessType" value="Eliminar cliente"><br>
        <br>
    <label for="admin">Modificar cliente <i class="fa-solid fa-gear"></i></label>
        <input type="radio" id="admin" name="accessType" value="Modificar cliente"><br>
</form>
<br>
     <button type="button" onclick="redirect()">Seleccionar</button>


<br>

<h2>
<h2>VER CLIENTES <i class="fa-solid fa-table-list"></i></h2>
<form action="#" name="ver_clientes" method="post">
    <input type="hidden" name="accessType" value="verClientes">
    <input type="submit" value="Ver Clientes">
</form>

<script>
        function redirect() {
            var selectedOption = document.querySelector('input[name="accessType"]:checked').value;
            if (selectedOption === 'Nuevo cliente') {
                window.location.href = "nuevo_cliente.php";
            } else if (selectedOption === 'Eliminar cliente') {
                window.location.href = "eliminar_cliente.php";
            } else if (selectedOption === 'Modificar cliente') {
                window.location.href = "modificar_cliente.php";
            } 
        }
    </script>

</body>
</html>

<?php

//Para ver los clientes

if (isset($_POST['accessType']) && $_POST['accessType'] == 'verClientes') {
    
    echo "<h2>Lista de Clientes</h2>";

    
    $query = "SELECT Nombre, Apellido, Cedula, Telefono, Direccion FROM cliente";
    $result = mysqli_query($enlace, $query);
    
    if (mysqli_num_rows($result) > 0) {
        
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Cedula</th><th>Telefono</th><th>Direccion</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . $row['Apellido'] . "</td>";
            echo "<td>" . $row['Cedula'] . "</td>";
            echo "<td>" . $row['Telefono'] . "</td>";
            echo "<td>" . $row['Direccion'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        
        echo "No hay clientes registrados.";
    }
}
?>
<br>
<br>

<div class="btn-vol">
<a href="Admin.php" >
    
        <button type="submit" name="accessType" value="Volver">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
</a>
</div>