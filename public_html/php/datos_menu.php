<?php
include 'util/connection.php';

// Establecer el encabezado para devolver datos en formato JSON
header('Content-Type: application/json');

$sql = "SELECT * FROM products";
try {
    conectar();
    $resultado = consultar($sql);
    // Suponiendo que 'consultar' devuelve un array de resultados
    desconectar();
    
    // Convertir los resultados a JSON y devolverlos
    echo json_encode($resultado);
} catch (Exception $exc) {
    // En caso de error, devolver un mensaje de error en formato JSON
    echo json_encode(['error' => $exc->getMessage()]);
}
?>