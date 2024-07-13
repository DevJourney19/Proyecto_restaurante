<?php
session_start();
if ($_SESSION['acceso']=="12345") {
    return true;
} else {
    return false;
}

