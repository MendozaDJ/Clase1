<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,utf8_decode('Listado de Usuarios'),0,0,'C');
    // Salto de línea
    $this->Ln(20);
	
	$this->Cell(10,10,utf8_decode('N°'),1,0,'C',0);
	$this->Cell(90,10,'Nombre',1,0,'C',0);
	$this->Cell(40,10,'Usuario',1,0,'C',0);
	$this->Cell(50,10,'Grupo',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
	 $this->Cell(150);
    $this->Cell(0,10,utf8_decode('Página').$this->PageNo().'/{nb}',0,0,'D');
}
}

require('cado/clase_usuario.php');
$objUsuario= new Usuario;
$lista= $objUsuario->listar();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFillColor(240,10,30);
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','',10);
$j=0;
while($fila=$lista->fetch()){
	$j++;
	$pdf->Cell(10,10,$j,1,0,'C',0);//ancho,altura,cadena a imprmir,borde,posicion actual donde va a ir "0" indica que va a la derecha,texto con "C" significa centrado,0 significa sin relleno y 1 con relleno
	$pdf->Cell(90,10,utf8_decode($fila[1]),1,0,'C',0);
	$pdf->Cell(40,10,$fila[2],1,0,'C',0);
	$pdf->Cell(50,10,utf8_decode($fila[5]),1,1,'C',0);
}


$pdf->Output();
?>