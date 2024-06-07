<?php
include 'connection.php';
session_start();

if (isset($_SESSION['usuario'])) {
    echo true;
} else {
    echo false;
}
$connection->close();
?>