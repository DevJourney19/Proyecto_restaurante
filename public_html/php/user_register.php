<?php
//Incluimos al archivo connection, para poder establecer una conexión a la BD
include 'connection.php';

//Almacenamos los datos del campo de html que tiene el name nombre_completo
$full_name = $_POST["nombre_completo"];
$email = $_POST["correoR"];
$user = $_POST["usuarioR"];
$pass = $_POST["contrasenaR"];
$pass = hash('sha512', $pass);

//Se crea una query para llevar los datos recibidos a una tabla
$query = "INSERT INTO clientes(nombre_completo, correo, usuario, contrasena)
              VALUES('$full_name', '$email', '$user', '$pass')";

//Verificar que el correo no se repita en la base de datos
$verificar_correo = mysqli_query($connection, "SELECT * FROM clientes WHERE correo='$email'");

//Si encuentra por lo menos una fila, quiere decir que ese correo ya ha sido creado
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '<script>alert("Ese correo ya está registrado, intenta con otro diferente"); 
          window.location = "../index.php";</script>';
    exit();
}
//Verificar que el nombre de usuario no se repita en la base de datos
$verificar_usuario = mysqli_query($connection, "SELECT * FROM clientes WHERE usuario = '$user'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '<script>alert("Ese usuario ya ha sido registrado, intente con otro diferente");
     window.location = "../index.php";</script>';
    exit();
}
//Necesitamos ejecutar la query
$ejecutar = mysqli_query($connection, $query);

if ($ejecutar) {
    echo '<script>alert("Usuario almacenado exitosamente");'
    . ' window.location = "../index.php"; </script>';
} else {
    echo '<script>alert("Intente nuevamente, usuario no almacenado"); '
    . 'window.location = "../index.php";</script>';
}

mysqli_close($connection);
?>;