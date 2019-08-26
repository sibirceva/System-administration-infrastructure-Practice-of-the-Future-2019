<?php
    require_once( "tfpdf.php" );
    $pdf=new tFPDF();
    $pdf->AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSerif-Bold.ttf',true);
    $pdf->SetFont('DejaVu','',46);
    $pdf->Cell(0,20,'Возникла проблема?',0,2,'C');
    $pdf->SetFontSize(42);
    $pdf->Cell(0,35,'Отсканируйте код:',0,2,'C');
    $pdf->Image('https://api.qrserver.com/v1/create-qr-code/?data=https:\\school/form/'.$id.'&size=300x300'.'.png',70);
    $pdf->SetFontSize(36);
    $pdf->Cell(0,20,'или перейдите по ссылке:',0,2,'C');
    $pdf->Cell(0,20,'https:\\\school/form/'.$id,0,2,'C');
    $pdf->Cell(0,80,$type->name,0,2,'C');
    $pdf->Cell(0,20,$thing->location,0,2,'C');
    $pdf->Output();
