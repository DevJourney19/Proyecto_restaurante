<?php

header('Content-Type: application/json');
include 'connection.php';
include_once '../util/letras.php';
$response = [];

$full_name = mayuscula(limpiar_cadena($_POST["nombre_completo"]));
$email = minuscula(limpiar_cadena($_POST["correoR"]));
$user = limpiar_cadena($_POST["usuarioR"]);
$pass = limpiar_cadena($_POST["contrasenaR"]);
$pass = hash('sha512', $pass);

//Se crea una query para llevar los datos recibidos a una tabla
$query = "INSERT INTO clientes(nombre_completo, correo, usuario, contrasena)
              VALUES('$full_name', '$email', '$user', '$pass')";

//Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($connection, "SELECT * FROM clientes WHERE correo='$email'");

//Si encuentra por lo menos una fila, quiere decir que ese correo ya ha sido creado
if (mysqli_num_rows($verificar_correo) > 0) {
    $response['success'] = "correo_ya_existe";
    echo json_encode($response);
    exit();
}
//Verificar que el nombre de usuario no se repita en la base de datos
$verificar_usuario = mysqli_query($connection, "SELECT * FROM clientes WHERE usuario = '$user'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    $response['success'] = "usuario_ya_existe";
    echo json_encode($response);
    exit();
}
//Necesitamos ejecutar la query
$ejecutar = mysqli_query($connection, $query);

if ($ejecutar) {
    /* Lo que quiero es dirigirme a esa dirección sin recargar la pagina */
    $response['success'] = "registrado";
} else {
    $response['success'] = "no_registrado";
}
echo json_encode($response);
mysqli_close($connection);
