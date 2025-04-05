<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Acceso</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
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
         width: 380px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 300px;
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
            margin-right: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            margin: 20px auto;
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

    </style>
</head>

<body>
    <h1>¿QUE QUIERES HACER?</h1>
    <br>
    <br>
    <form id="accessForm" action="">

        <label for="admin">Clientes <i class="fa-solid fa-people-group"></i></label>
        <input type="radio" id="admin" name="accessType" value="Clientes"><br>
        <br>
        <label for="admin">Empleados <i class="fa-solid fa-address-card"></i></label>
        <input type="radio" id="admin" name="accessType" value="Empleados"><br>
        <br>
        <label for="accountant">Productos <i class="fa-solid fa-drumstick-bite"></i> 
        
        <input type="radio" id="accountant" name="accessType" value="Agregar producto"><br>
        <br>
        <label for="accountant">Pedidos <i class="fa-solid fa-box-open"></i></label>
        <input type="radio" id="accountant" name="accessType" value="Crear pedido"><br>
    </form>
    <br>
 <button type="button" onclick="redirect()">Seleccionar</button>

    <script>
        function redirect() {
            var selectedOption = document.querySelector('input[name="accessType"]:checked').value;
            if (selectedOption === 'Clientes' ) {
                window.location.href = "Registro_Cliente.php" ;
            } else if (selectedOption === 'Empleados') {
                window.location.href = "Registro_Empleado.php";
            } else if (selectedOption === 'Agregar producto') {
                window.location.href = "productos.php";
            } else if (selectedOption === 'Crear pedido') {
                window.location.href = "pedido.php";
            }
        }
    </script>
</body>

</html>

<div class="btn-vol">
<a href="index.php">
        <button type="button">
            <i class="fa-solid fa-arrow-left"></i>
        </button >
        </a>
</div>