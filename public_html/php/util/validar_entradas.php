<?php

function validar_entrada($location, $page)
{
  session_start();
  if ($_SESSION['acceso'] != '12345') {
    if ($page === "bienvenida") {
      session_destroy();
    }
    header('Location: ' . $location);
  }
}
