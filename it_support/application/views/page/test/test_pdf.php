<?php
require_once 'public/libs/fpdf/fpdf.php';
// require_once 'application/config/config.php';
// $base_url = $this->base_url();
// $public_url = $this->public_url();
// $controller = new Core_controller();
class PDF extends FPDF{
    function header(){
        $this->Setfont('Arial','B',14);
        $this->Cell(276,10,'TEST PaGE Margin',0,0,'C');
        $this->Ln();
        $this->Setfont('Arial','',12);
        $this->Cell(276,10,'sterrt Employee',0,0,'C');
        $this->Ln();
    }
    function footer(){
        $this->SetY(-15);
        $this->Setfont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headertable(){

        $this->Cell(40,10,iconv('UTF-8','TIS-620','รหัส'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','TIS-620','ชื่อ'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','TIS-620','นามสกุล'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','TIS-620','บ้านเลขที่'),1,0,'C');
        $this->Cell(40,10,iconv('UTF-8','TIS-620','หมู่ที่'),1,0,'C');
        $this->Cell(40,10,'UserId',1,0,'C');
        $this->Ln();
    }
}


$pdf = new PDF();
// $pdf->AddFont('angsana','','C:\AppServ\www\fpdf17');
$pdf->AddFont('THSarabunPSK','','THSarabun.php');
// $pdf->AddFont('angsana','',$this->public_url('libs/fpdf/font/angsab.php'));
// $pdf->AddFont('angsana','',$this->public_url('libs/fpdf/font/angsai.php'));
// $pdf->AddFont('angsana','',$this->public_url('libs/fpdf/font/angsaz.php'));
// $pdf->AddFont('angsana','','angsa.php');
// $pdf->AddFont('angsana','B','angsab.php');
// $pdf->AddFont('angsana','I','angsai.php');
// $pdf->AddFont('angsana','BI','angsaz.php');
// $pdf->SetFont('angsana','',16);
$pdf->SetFont('THSarabunPSK','',16);
$pdf->AddPage('P','A4',0);
$pdf->headertable();
$pdf->Output();
?>
