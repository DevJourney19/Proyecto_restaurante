<?php
session_start();
if ($_SESSION['acceso']=="12345") {
    echo true;
} else {
    echo false;
}

