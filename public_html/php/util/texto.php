
<?php

function minusculas($texto){
  return strtolower($texto);
}

// convierte la primera letra de un texto a mayúscula solo si el texto esta en minúsculas
function mayusculaFirst($texto){
  return ucfirst($texto);
}

function evaluarVacio($texto){
  if(empty($texto)){
    return "Campo vacío";
  }else{
    return $texto;
  }
}

function limpiarEspacios($texto){
  return trim($texto);
}

// evitar html and php injections
function limpiarHtml($texto){
  return strip_tags($texto);
}