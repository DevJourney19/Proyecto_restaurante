
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
  return htmlentities($texto);
}

function evaluarTelefono($texto){
  if(preg_match("/[0-9]{7,9}/", $texto)){
    return $texto;
  }else{
    return "Número de celular inválido";
  }
}

function limpiar_cadena($cadena) {
  $cadena = trim($cadena);
  $cadena = stripslashes($cadena);
  $cadena = str_ireplace("<script>", "", $cadena);
  $cadena = str_ireplace("</script>", "", $cadena);
  $cadena = str_ireplace("<script src", "", $cadena);
  $cadena = str_ireplace("<script type=", "", $cadena);
  $cadena = str_ireplace("SELECT * FROM", "", $cadena);
  $cadena = str_ireplace("DELETE FROM", "", $cadena);
  $cadena = str_ireplace("INSERT INTO", "", $cadena);
  $cadena = str_ireplace("DROP TABLE", "", $cadena);
  $cadena = str_ireplace("DROP DATABASE", "", $cadena);
  $cadena = str_ireplace("TRUNCATE TABLE", "", $cadena);
  $cadena = str_ireplace("SHOW TABLES;", "", $cadena);
  $cadena = str_ireplace("SHOW DATABASES;", "", $cadena);
  $cadena = str_ireplace("<?php", "", $cadena);
  $cadena = str_ireplace("?>", "", $cadena);
  $cadena = str_ireplace("--", "", $cadena);
  $cadena = str_ireplace("^", "", $cadena);
  $cadena = str_ireplace("<", "", $cadena);
  $cadena = str_ireplace(">", "", $cadena);
  $cadena = str_ireplace("!", "", $cadena);
  $cadena = str_ireplace("/", "", $cadena);
  $cadena = str_ireplace("\,", "", $cadena);
  $cadena = str_ireplace("[", "", $cadena);
  $cadena = str_ireplace("]", "", $cadena);
  $cadena = str_ireplace("==", "", $cadena);
  $cadena = str_ireplace(";", "", $cadena);
  $cadena = str_ireplace("::", "", $cadena);
  $cadena = trim($cadena);
  $cadena = preg_replace('/\s+/', ' ', $cadena);
  $cadena = stripslashes($cadena);
  return $cadena;
}