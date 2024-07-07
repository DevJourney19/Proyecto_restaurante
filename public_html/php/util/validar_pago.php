<?php
    session_start();
    if($_SESSION['acceso']!='12345'){
        header('Location: ./login_signup.php');
    }