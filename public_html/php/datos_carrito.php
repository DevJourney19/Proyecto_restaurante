<?php
include_once './util/connection.php';
include_once './util/texto.php';
// obtener información enviada desde JS
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $location = $_POST['location'];
    $address = mayusculaFirstWord(minusculas(limpiarHtml(limpiarEspacios($_POST['direccion']))));
    $phone = $_POST['telefono'];
    $type_order = $_POST['type-payment'];
    $amout = "";
    $type_card = "";
    $total = $_POST['total'];
    if ($type_order == 'online') {
        $type_card = $_POST['type_card'];
    } else {
        $amout = $_POST['amount_pay'];
    }
    $productos = json_decode($_POST['productos'], true);
    $email = $_SESSION['email'];
    // obtener el id del cliente
    $query = "SELECT id FROM clients WHERE email = '$email'";
    try {
        conectar();
        $result = consultar($query);
        if (count($result) == 1) {
            $client_id = $result[0]['id'];
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontró el cliente']);
            exit();
        }
        desconectar();
    } catch (Exception $exc) {
        die($exc->getMessage());
    }
    // insertar el pedido de order
    $insertOrder = "INSERT INTO orders(location_id, address, phone_number, type_order, amount, payment_method, total_price, client_id) VALUES ('$location', '$address', '$phone', '$type_order', '$amout', '$type_card', '$total', '$client_id')";
    try {
        conectar();
        if (ejecutar($insertOrder)) {
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al insertar el pedido']);
            exit();
        }
    } catch (Exception $exc) {
        die($exc->getMessage());
    }
    // obtener el id del pedido insertado
    $query = "SELECT id FROM orders WHERE id=LAST_INSERT_ID()";
    try {
        $result = consultar($query);
        if (count($result) == 1) {
            $order_id = $result[0]['id'];
        } else {
            echo json_encode(['success' => false, 'message' => 'No se encontró el pedido']);
            exit();
        }
        desconectar();
    } catch (Exception $exc) {
        die($exc->getMessage());
    }
    foreach ($productos as $item) {
        $quantity = intval($item['amount']);
        $price = floatval($item['price']);
        $subtotal = $quantity * $price;
        $product_id = intval($item['id']);
        // insertar el detalle del pedido
        $query = "INSERT INTO order_detail(quantity, subtotal, product_id, order_id) VALUES ($quantity, $subtotal, $product_id, $order_id)";
        try {
            conectar();
            if (ejecutar($query)) {
            } else {
                echo json_encode(['success' => false, 'message' => 'Error al insertar el pedido']);
                exit();
            }
            desconectar();
        } catch (Exception $exc) {
            die($exc->getMessage());
        }
    }
}
