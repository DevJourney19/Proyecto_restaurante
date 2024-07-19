<?php

session_start();
if (isset($_SESSION['acceso'])) {
    echo true;
} else {
    echo false;
}

