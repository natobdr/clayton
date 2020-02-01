<?php

include '../fpdf/fpdf.php';
require_once '../conexao/Conexao_BD.php';
require_once '../model/EncomendaCliente.php';

$encomenda = new EncomendaCliente();
$dados = $encomenda->buscarEncomendaCliente();
$d = new ArrayIterator($dados);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->cell(190, 10, utf8_decode('Relatório de Encomendas'),0,0,"C");
$pdf->Ln(15);


$pdf->SetFont('Arial','I',8);
$pdf->cell(30, 7, utf8_decode("Vendedor"),1,0,"C");
$pdf->cell(30, 7, utf8_decode("Cliente"),1,0,"C");
$pdf->cell(40, 7, utf8_decode("Produto"),1,0,"C");
$pdf->cell(30, 7, utf8_decode("Isbn"),1,0,"C");
$pdf->cell(30, 7, utf8_decode("Data"),1,0,"C");
$pdf->cell(30, 7, utf8_decode("Editora"),1,0,"C");
$pdf->Ln(15);

while ($d->valid()){
$pdf->cell(30, 7, utf8_decode($d->current()->usuario_nome),1,0,"C");		
$pdf->cell(30, 7, utf8_decode($d->current()->cliente_nome),1,0,"C");
$pdf->cell(40, 7, utf8_decode($d->current()->produto_nome),1,0,"C");
$pdf->cell(30, 7, utf8_decode($d->current()->produto_isbn),1,0,"C");
$pdf->cell(30, 7, date('d/m/Y', strtotime($d->current()->encomenda_data)),1,0,"C");
$pdf->cell(30, 7, utf8_decode($d->current()->editora_nome),1,0,"C");
$pdf->Ln(15);
$d->next();
}

$pdf->Output();



