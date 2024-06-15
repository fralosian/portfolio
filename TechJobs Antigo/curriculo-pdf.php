<?php 

$nome = "Thiago Almeida da Silva";
$email = "thiagoalmeida@gmail.com";
$endereco = "Av. Norte Sul Nº 12";
$cep = "07263-730";
$cidade = "Pimentas - Guarulhos";
$estado = "SP";
$telefone= "11 2477-9931";
$escolaridade = '-Ensino Médio Completo (2013)
-Curso de Inglês avançado (2015)
-Cursando 2º Modulo do Técnico em Informática (ETEC Horácio Augusto da Silveira)

';
$objetivos = '-A disposição da empresa

'
;
$experiencias = '-Empresa: TechPro
-Periodo: 5 meses
-Cargo: Auxiliar de Informatica


';
require_once("fpdf/fpdf.php");

$pdf= new FPDF("P","pt","A4");


$pdf->AddPage();

$pdf->SetFont('arial','B',18);
$pdf->Cell(0,5,"Curriculo",0,1,'C');
$pdf->Cell(0,5,"","B",1,'C');
$pdf->Ln(8);


//nome
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Nome:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(0,20,$nome,0,1,'L');

//email
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"E-mail:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$email,0,1,'L');

//Endereço
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Endereço:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$endereco,0,1,'L');

//cep
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"CEP:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$cep,0,1,'L');

//cidade
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Cidade:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$cidade,0,1,'L');

//Estado
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Estado:",0,0,'L');
$pdf->setFont('arial','',12);
$pdf->Cell(70,20,$estado,0,1,'L');

$pdf->ln(10);


$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Objetivos:",0,1,'L');
$pdf->setFont('arial','',12);
$pdf->MultiCell(0,20,$objetivos,0,'J');

//escolaridade
$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Escolaridade:",0,1,'L');
$pdf->setFont('arial','',12);
$pdf->MultiCell(0,20,$escolaridade,0,'J');

$pdf->SetFont('arial','B',12);
$pdf->Cell(70,20,"Experiências:",0,1,'L');
$pdf->setFont('arial','',12);
$pdf->MultiCell(0,20,$experiencias,0,'J');


$pdf->Output("curriculo.pdf","D");
?>