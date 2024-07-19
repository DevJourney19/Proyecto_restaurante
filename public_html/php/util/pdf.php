<?php

include 'plantilla_pdf.php';
include 'connection.php';
include './reg_reservation.php';

session_start();
$id = $_SESSION['id'];
try {
    //El orden de las tablas al hacer un INNER JOIN, sí importa.
    //Obtener los pedidos del cliente registrado.
    $query = "Select * from orders WHERE client_id = $id order by id desc limit 1";
    conectar();
    //Obtenemos los pedidos realizados por el cliente registrado
    $listado = consultar($query);

    //Obtener el ultimo registro de ese pedido
    $id_pedido = $listado[0]["id"];
    $query2 = "Select * from order_detail where order_id = $id_pedido order by id desc limit 1";
    $listado2 = consultar($query2);
    $id_detail = $listado2[0]['id'];
    $product_id = $listado2[0]['product_id'];

    $sql = "SELECT * FROM clients INNER JOIN orders on clients.id=client_id "
            . "INNER JOIN order_detail on orders.id=order_detail.order_id "
            . " INNER JOIN products on product_id=products.id WHERE clients.id='$id'"
            . "AND orders.id='$id_pedido' ";
    $bolsa = consultar($sql);
    desconectar();
//$resultado = $mysqli->query($query);
} catch (ErrorException $exc) {
    die($exc->getMessage());
}

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFillColor(232, 232, 232);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(30, 6, 'Nombre:', 0, 0, 'C', 0);
$pdf->Cell(50, 6, $bolsa[0]['fullname'], 0, 0, 'L');
$pdf->Cell(40, 6, 'Fecha:', 0, 0, 'R', 0);
$pdf->Cell(52, 6, $bolsa[0]['created_at'], 0, 1, 'L');
$pdf->Multicell(0, 2, "");
$pdf->Cell(30, 6, 'Direccion:', 0, 0, 'C', 0);
$pdf->Cell(60, 6, $bolsa[0]['address'], 0, 1, 'L');
$pdf->Multicell(0, 6, "");

$pdf->Cell(40, 6, 'Cantidad', 1, 0, 'C', 1);
$pdf->Cell(70, 6, 'Producto', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'P. Unidad', 1, 0, 'C', 1);
$pdf->Cell(40, 6, 'Importe', 1, 1, 'C', 1);

foreach ($bolsa as $row) {
    $pdf->Cell(40, 6, $row['quantity'], 1, 0, 'C');
    $pdf->Cell(70, 6, utf8_decode($row['title']), 1, 0, 'C');
    $pdf->Cell(40, 6, $row['price'], 1, 0, 'C');
    $pdf->Cell(40, 6, $row['subtotal'], 1, 1, 'C');
}
$pdf->Cell(110, 6, '', 1, 0, 'C', 0);
$pdf->Cell(40, 6, 'Total S/', 1, 0, 'C', 1);
$pdf->Cell(40, 6, $row['total_price'], 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);
$pdf->Cell(0, 26, utf8_decode('Representación Impresa de la boleta de Venta Electrónica'), 0, 0, 'C', 0);
$pdf->Output('D', "Boleta_Electronica.pdf");
