<?php

//Si el usuario tiene el acceso = 12345 -> Me debería dejar entrar para poder realizar el pago
include_once '/util/verify_session.php';
include_once '/util/connection.php';

$sql = "SELECT * FROM reservation";
try {
    conectar();
    $listado = consultar($sql);
    desconectar();
    #var_dump($listado);
} catch (Exception $exc) {
    die($exc->getMessage());
}

















//
//
//$id = $_GET["id"];
//$sql = "DELETE FROM producto WHERE id = '$id'";
//
//try {
//    conectar();
//
////    if() {
////        
////    }
//    desconectar();
//} catch (Exception $ex) {
//    
//}