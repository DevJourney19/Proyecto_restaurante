<!DOCTYPE html>
<html lang="en">

<head>
    <title>LogIn | SignUp</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="assets/img/logo.png" />
    <link rel="stylesheet" href="css/login_signup.css" />
    <link rel="stylesheet" href="css/main.css" />
    <link rel="stylesheet" href="css/form.css" />
</head>

<body>

    <header>
        <div>
            <img src="assets/img/logo.png" alt="Logo de la Trattoria Secreta" />
            <h1 style="color: white">La Trattoria Secreta</h1>
        </div>
    </header>

    <main>
        <!-- Contenedor de los formularios que vamos a estar usando -->
        <div class="container" id="container">
            <!-- Sign up -->
            <div class="form-container sign-up">
                <form action="php/user_register.php" method="POST" class="formulario_register">
                    <h2>Registrarse</h2>
                    <input title="nombre completo para registro" type="text" placeholder="Nombre completo" name="nombre_completo" autocomplete="off" required />
                    <input title="email para registro" type="email" placeholder="Correo Electrónico" name="correoR" autocomplete="off" required />
                    <input title="nombre de usuario para registro" type="text" placeholder="Usuario" name="usuarioR" autocomplete="off" required />
                    <input title="contrasena para registro" type="password" placeholder="Contraseña" name="contrasenaR" required />
                    <button id="registrar" autocomplete="off" type="submit">Registrarse</button>
                    <!-- Cuando se presione el botón tendrá referencia a la dirección de action  -->
                </form>
            </div>
            <!-- Login -->

            <div class="form-container log-in">
                <form class="formulario_login" onsubmit="verificarLogin(event)">
                    <h2>Iniciar sesión</h2>
                    <input id="usuario-login" title="usuario de inicio de sesion" type="text" placeholder="Nombre de Usuario" name="usuario" autocomplete="off" required />
                    <input id="password-login" title="password de inicio de sesion" type="password" placeholder="Contraseña" name="contrasena" autocomplete="off" required />
                    <button id="entrar" type="submit">Entrar</button>
                </form>
            </div>
            <!-- Parte trasera de color amarillo de los formularios  -->
            <div class="toggle-container">
                <div class="toggle">
                    <!-- Cuando uno ya tiene cuenta -->
                    <div class="toggle-panel toggle-left">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn_iniciarSesion" class="hidden">
                            Iniciar sesión
                        </button>
                    </div>
                    <!-- Cuando uno es nuevo -->
                    <div class="toggle-panel toggle-right">
                        <h3>¿Aún no tienes una cuenta?</h3>
                        <p>Registrate para iniciar sesión</p>
                        <button id="btn_registrarse" class="hidden">Registrarse</button>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <footer class="regresar_footer">
        <div>
            <a id="regresar_a_home" href="home.php">Regresar</a>
        </div>
    </footer>
    <script src="js/login_signup.js" type="text/javascript"></script>
</body>

</html>