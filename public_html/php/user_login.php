<?php
session_start();
include 'connection.php';

//Traemos los datos del html
$user = $_POST['usuario'];
$pass = $_POST['contrasena'];
$pass = hash('sha512', $pass);

$validar_login = mysqli_query($connection, "SELECT * FROM clientes WHERE usuario = '$user' AND contrasena = '$pass'");
if (mysqli_num_rows($validar_login) > 0) {
    $_SESSION['usuario'] = $user;
    echo true;
} else {
    echo false;
}
?>