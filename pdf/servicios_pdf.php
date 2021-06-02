<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
function Header()
{
    $this->SetFont('Arial','B',15);
    $this->Cell(60);
    $this->Cell(70,10,'Reporte de servicios',0,0,'C');
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
 $consulta = "SELECT * FROM apartado_servicios";
 $resultado  = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(25,10, $row['servicio_folio'],1,0,'C',0);
    $pdf->Cell(29,10, $row['servicio_tipo'],1,0,'C',0);
    $pdf->Cell(29,10, $row['servicio_fecha'],1,0,'C',0);
    $pdf->Cell(40,10, $row['servicio_hora'],1,0,'C',0);
    $pdf->Cell(35,10, $row['cliente_id'],1,0,'C',0);
    $pdf->Cell(20,10, $row['servicio_precio'],1,0,'C',0);
    $pdf->Cell(10,10, $row['servicio_terminado'],1,1,'C',0);
}

$pdf->Output();
?>