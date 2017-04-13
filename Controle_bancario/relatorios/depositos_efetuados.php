<?php

require("../bibliotecas/fpdf/fpdf.php");
require('../config.php');
require('../bibliotecas/adodb5/adodb.inc.php');
require('../conecta.php');
require('../funcoes.php');

define('FPDF_FONTPATH', '../bibliotecas/fpdf/font');
$pdf = new FPDF();
$pdf->AddPage('P', 'A4');
$pdf->SetFont('Courier', 'B', '12');

$pdf->SetFillColor(125, 125, 125);
$pdf->SetTextColor(255, 255, 255);
$pdf->Cell(190, 10, utf8_decode('DEPÓSITOS EFETUADOS'), 'B,L,R,T', 1, 'C', 1);
$pdf->SetFont('Courier', 'B', 14);
$pdf->SetTextColor(0, 0, 0);
$pdf->Cell(30, 10, utf8_decode('CÓDIGO'), 1, 0, 'C', 0);
$pdf->Cell(40, 10, utf8_decode('CONTA'), 1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode('VALOR DO DEPÓSITO'), 1, 0, 'C', 0);
$pdf->Cell(60, 10, utf8_decode('DATA DO DEPÓSITO'), 1, 1, 'C', 0);


$pdf->SetFont('Courier', '', 12);
$mod = new conecta();
$sql = "select * from depositos order by DEP_CODIGO";
$res = $mod->bd->Execute($sql);
$cont = 0;
while ($reg = $res->FetchNextObject()) {
    $cont++;
    $pdf->Cell(30, 10, utf8_decode($reg->DEP_CODIGO), 1, 0, 'C', 0);
    $pdf->Cell(40, 10, utf8_decode($reg->CONT_NUMERO), 1, 0, 'C', 0);
    $pdf->Cell(60, 10, utf8_decode($reg->DEP_VALOR), 1, 0, 'C', 0);
    $pdf->Cell(60, 10, utf8_decode($reg->DEP_DATA), 1, 1, 'C', 0);


    
}
$pdf->Cell(95, 10,utf8_decode('Total de depósitos efetuados: ').$cont, 0, 0, 'L', 0);
$pdf->Cell(95, 10,'Data: '.date('d-m-Y '), 0, 0, 'R', 0);










$pdf->Output();


?>
