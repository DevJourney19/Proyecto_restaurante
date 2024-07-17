<?php

include './util/connection.php';

//Traemos los datos del html
$user = $_POST['usuario'];
$pass = $_POST['contrasena'];

$validar_login = "SELECT * FROM clients WHERE username = '$user' AND AES_DECRYPT(password, '$pass') = '$pass'";

try {
    conectar();
    //"Consultar" retorna un array de elementos
    $registro = consultar($validar_login);
    desconectar();
    if (count($registro) == 1) {
        session_start();
        $_SESSION['acceso'] = '12345';
        //Valor único por eso el 0 del primer elemento
        //Estamos trayendo el id del usuario
        $_SESSION['id'] = $registro[0]['id']; //Es NULL!!!!

        $_SESSION['email'] = $registro[0]['email'];
        header("Location: ../bienvenida.php");
    } else {
        session_start();
        session_destroy();
        header("Location: ../login_signup.php?e=true");
    }
} catch (Exception $exc) {
    die($exc->getMessage());
}