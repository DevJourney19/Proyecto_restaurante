<?php
    session_start();
    if($_SESSION['acceso']!='12345'){
        session_destroy();
        header('Location: login_signup.php');
    }