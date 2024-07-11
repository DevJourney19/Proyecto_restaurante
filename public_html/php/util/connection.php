<?php
include_once 'bd_config.php';
$cnx = '';
#Conexión a la base de datos
function conectar() {
  global $cnx;
  $cnx = mysqli_connect(HOST, USER, PASS, DATABASE, PORT);
  mysqli_query($cnx, "set names utf8");
}
#Desconexión de la base de datos
function desconectar(){
  global $cnx;
  mysqli_close($cnx);
} 
#Consultas a la Base de datos
function consultar($query) {
  global $cnx;
  $result = mysqli_query($cnx, $query);
  $lista = array();
  while ($registro = mysqli_fetch_assoc($result)) {
      $lista[] = $registro;
  }
  mysqli_free_result($result);
  unset($registro);
  return $lista;
}

#Operaciones en la Base de datos
function ejecutar($query) {
  global $cnx;
  $result = mysqli_query($cnx, $query);
  return $result;
}
