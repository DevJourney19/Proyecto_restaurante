
<?php

function minusculas($texto){
  return strtolower($texto);
}

// convierte la primera letra de un texto a mayúscula solo si el texto esta en minúsculas, si tiene varias palabras todas las primeras letras de cada palabra serán mayúsculas
function mayusculaFirstWord($texto){
  return ucwords($texto);
}

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

function evaluarTelefono($texto){
  if(preg_match("/[0-9]{7,9}/", $texto)){
    return $texto;
  }else{
    return "Número de celular inválido";
  }
}