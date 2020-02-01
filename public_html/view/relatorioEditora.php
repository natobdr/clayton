<?php

include '../fpdf/fpdf.php';
require_once '../conexao/Conexao_BD.php';
require_once '../model/Editora.php';

$editora = new Editora();
$dados = $editora->buscarEditora();
$d = new ArrayIterator($dados);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->cell(190, 10, utf8_decode('Relatório de Editoras'),0,0,"C");
$pdf->Ln(15);


$pdf->SetFont('Arial','I',10);
$pdf->cell(70, 7, utf8_decode("Código"),1,0,"C");
$pdf->cell(60, 7, utf8_decode("Nome"),1,0,"C");
$pdf->cell(60, 7, utf8_decode("Telefone"),1,0,"C");
$pdf->Ln(15);

while ($d->valid()){
$pdf->cell(70, 7, $d->current()->editora_id,1,0,"C");		
$pdf->cell(60, 7, $d->current()->editora_nome,1,0,"C");
$pdf->cell(60, 7, $d->current()->editora_telefone,1,0,"C");
$pdf->Ln(15);
$d->next();
}

$pdf->Output();



