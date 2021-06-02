<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{
    $this->SetFont('Arial','B',15);
    $this->Cell(60);
    $this->Cell(70,10,'Reporte de ventas',0,0,'C');
    $this->Ln(20);
}

function Footer()
{
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'C');
}
}
 require '../php/conexion.php';
 $consulta = "SELECT * FROM ventas";
 $resultado  = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(29,10, $row['venta_folio'],1,0,'C',0);
    $pdf->Cell(29,10, $row['producto_id'],1,0,'C',0);
    $pdf->Cell(29,10, $row['empleado_id'],1,0,'C',0);
    $pdf->Cell(29,10, $row['cliente_id'],1,0,'C',0);
    $pdf->Cell(29,10, $row['venta_fecha'],1,0,'C',0);
    $pdf->Cell(22,10, $row['venta_cantidad'],1,0,'C',0);
    $pdf->Cell(22,10, $row['venta_precio'],1,1,'C',0);
}

$pdf->Output();
?>