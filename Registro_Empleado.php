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

<title>Empleados</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="stylesRegistrar_Empleado.css">
<h1>¿QUE QUIERES HACER?<h1>
<h2>
<form>
    <label for="admin">Nuevo empleado <i class="fa-solid fa-user-plus"></i></label>
        <input type="radio" id="admin" name="accessType" value="Nuevo empleado"><br>
    <label for="admin">Eliminar empleado <i class="fa-solid fa-delete-left"></i></label>
        <input type="radio" id="admin" name="accessType" value="Eliminar empleado"><br>
    <label for="admin">Modificar empleado <i class="fa-solid fa-gear"></i></label>
        <input type="radio" id="admin" name="accessType" value="Modificar empleado"><br>
</form>
<br>

<button type="button" onclick="redirect()">Seleccionar</button>

<br>

<h2>
<h2>VER EMPLEADOS <i class="fa-solid fa-table-list"></i></h2>
<form action="#" name="ver_empleados" method="post">
    <input type="hidden" name="accessType" value="verEmpleados">
    <input type="submit" value="Ver Empleados">
<br>

     
</form>

<br>

<script>
        function redirect() {
            var selectedOption = document.querySelector('input[name="accessType"]:checked').value;
            if (selectedOption === 'Nuevo empleado') {
                window.location.href = "nuevo_empleado.php";
            } else if (selectedOption === 'Eliminar empleado') {
                window.location.href = "eliminar_empleado.php";
            } else if (selectedOption === 'Modificar empleado') {
                window.location.href = "Modificacion_Empleado.php";
            } 
        }
    </script>



</body>
</html>



<?php

//Para ver los empleados y su ocupacion

if (isset($_POST['accessType']) && $_POST['accessType'] == 'verEmpleados') {
    
    echo "<h2>Lista de Empleados</h2>";

    
    $query = "SELECT Nombre, Apellido, Cedula, 'Contador' as Tipo FROM contador
              UNION
              SELECT Nombre, Apellido, Cedula, 'Domiciliario' as Tipo FROM domiciliario";
    $result = mysqli_query($enlace, $query);
    
    if (mysqli_num_rows($result) > 0) {
        
        echo "<table border='1'>";
        echo "<tr><th>Nombre</th><th>Apellido</th><th>Cedula</th><th>Tipo</th></tr>";
        while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr>";
            echo "<td>" . $row['Nombre'] . "</td>";
            echo "<td>" . $row['Apellido'] . "</td>";
            echo "<td>" . $row['Cedula'] . "</td>";
            echo "<td>" . $row['Tipo'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        
        echo "No hay empleados registrados.";
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
   