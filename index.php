
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
    <title>Distribuidora de Pollos y Huevos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin-top: 0;
            padding: 0;
            justify-content: center;
            align-items: center;
            height: 100vh;
            width:400px;
            margin: 0px auto;
            background-image: url('../Pollos/img/fondo.jpg');
            background-repeat: no-repeat;
            background-position: center center;
            min-height: 100vh;
            background-attachment: fixed;
            background-size: cover;

        }

        h1 {
            text-align: center;
            color: white;
            background: rgba(5, 7, 12, 0.40);
         border-radius: 5px;
         width: 340px;
        }

        h2 {
            text-align: center;
            color: white;
            background: rgba(5, 7, 12, 0.40);
         border-radius: 5px;
         width: 340px;
        }
        

        form {
            background: rgba(5, 7, 12, 0.40);
            padding: 60px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        label {
            color: white;
            margin-bottom: 30px;
            font-weight: bold;
        }

        input[type="radio"] {
            margin-right: 50px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 30px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: blue;
        }
    </style>
</head>

<body>
    <h1>¡BIENVENIDO A LA DISTRIBUIDORA DE POLLOS Y HUEVOS! 
        <br>
        <br>
        <h2>¿Como quieres acceder?</h2>
    </h1>
    
    <form id="accessForm" action="">

        <label for="admin">Administrador <i class="fa-solid fa-user-tie"></i></label>
        <input type="radio" id="admin" name="accessType" value="administrador"><br>
        <br>
        <label for="accountant">Contador <i class="fa-solid fa-file-invoice"></i></label>
        <input type="radio" id="accountant" name="accessType" value="contador"><br>
        <br>
        <label for="courier">Domiciliario <i class="fa-solid fa-motorcycle"></i></label>
        <input type="radio" id="courier" name="accessType" value="domiciliario"><br>
        <br>  
        <button type="button" onclick="redirect()">Seleccionar</button>
    </form>

    <script>
        function redirect() {
            var selectedOption = document.querySelector('input[name="accessType"]:checked').value;
            if (selectedOption === 'administrador') {
                window.location.href = "Admin.php";
            } else if (selectedOption === 'contador') {
                window.location.href = "Contador.php";
            } else if (selectedOption === 'domiciliario') {
                window.location.href = "Domiciliario.php";
            }
        }
    </script>
</body>

</html>