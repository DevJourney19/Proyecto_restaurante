<?php

require 'fpdf/fpdf.php';

class PDF extends FPDF {

    function Header() {                    //pos x , y, tamanio
        $this->Image("../../assets/img/logo.png", 33, 5, 25);
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(30);
        
        //pos x, y
        $this->SetX(140);
        $this->Cell(60, 10, utf8_decode("La Trattoria Secreta"), 0, 1, "C");
        $this->Cell(0, 10, utf8_decode("Boleta electrónica"), 0, 0, "C");
        $this->Ln(25);
    }

    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        //0=centro y va a ocupar toda la hoja
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

}
