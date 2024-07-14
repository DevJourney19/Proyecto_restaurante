<?php
session_start();
if ($_SESSION['acceso']=="12345") {
    echo true;
    return true;
} else {
    return false;
}

