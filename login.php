<?php

session_start();
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM usuarios WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $usuario = mysqli_fetch_assoc($result);
        $_SESSION['usuario'] = $usuario;

        switch ($usuario['tipo']) {
            case 'cliente':
                header('Location: cliente.php');
                break;
            case 'administrador':
                header('Location: administrador.php');
                break;
            case 'domiciliario':
                header('Location: domiciliario.php');
                break;
        }
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>