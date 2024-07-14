<?php

header('Content-Type: application/json');
include 'util/connection.php';
include_once 'util/texto.php';
$response = [];

$full_name = mayusculaFirstWord(limpiar_cadena($_POST["nombre_completo"]));
$email = minusculas(limpiar_cadena($_POST["correoR"]));
$user = limpiar_cadena($_POST["usuarioR"]);
$pass = limpiar_cadena($_POST["contrasenaR"]);

//$pass = hash('sha512', $pass);


function verificarExistencia($campo, $valor) {
    conectar();

    $query = "SELECT * FROM clients WHERE $campo = '$valor'";

    $listado = consultar($query);

    desconectar();
    return count($listado) > 0;
}

function enviarRespuesta($estado) {

    echo json_encode(['success' => $estado]);
    exit();
}

// Verificar correo
if (verificarExistencia('email', $email)) {
    enviarRespuesta("correo_ya_existe");
}

// Verificar usuario
if (verificarExistencia('username', $user)) {
    enviarRespuesta("usuario_ya_existe");
}

// Ejecutar la inserción
conectar();

$query = "INSERT INTO clients(fullname, email, username, password)
              VALUES('$full_name', '$email', '$user', AES_ENCRYPT('$pass','$pass'))";

if (ejecutar($query)) {
    enviarRespuesta("registrado");
} else {
    enviarRespuesta("no_registrado");
}
desconectar();
