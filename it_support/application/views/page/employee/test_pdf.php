<?php
//ดอง
require_once '../it_support/public/libs/fpdf/fpdf.php';
// require_once '../it_support/public/libs/fpdf/makefont/makefont.php';
// $mpdf = new \Mpdf\Mpdf();
// $mpdf->WriteHTML('<h1>Hello world!</h1>');
// $mpdf->Output();

// MakeFont('D:\xampp\htdocs\it_support\public\libs\fpdf\font\THSarabun.ttf','cp874'); // MakeFont('พาธของฟอนต์','Encode ของฟอนต์');
// MakeFont('D:\xampp\htdocs\it_support\public\libs\fpdf\font\THSarabun Bold.ttf','cp874'); // MakeFont('พาธของฟอนต์','Encode ของฟอนต์');
// MakeFont('D:\xampp\htdocs\it_support\public\libs\fpdf\font\THSarabun Bold Italic.ttf','cp874'); // MakeFont('พาธของฟอนต์','Encode ของฟอนต์');
// MakeFont('D:\xampp\htdocs\it_support\public\libs\fpdf\font\THSarabun Italic.ttf','cp874'); // MakeFont('พาธของฟอนต์','Encode ของฟอนต์');
//การสร้างตาราง
class PDF extends FPDF
{
    function Header()
    {
        // $this->AddFont('angsa','','angsa.php');
    }
    //Simple table
    function BasicTable($header,$data)
    {
        //Header
        $w=array(30,30,55,25,20,20);
        //Header
        for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
        $this->Ln();
        //Data
        foreach ($data as $eachResult)
        {
            $this->Cell(30,6,'CustomerID',1);
            $this->Cell(30,6,"Name",1);
            $this->Cell(55,6,"Email",1);
            $this->Cell(25,6,"CountryCode",1,0,'C');
            $this->Cell(20,6,"Budget",1);
            $this->Cell(20,6,"Budget",1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
$pdf->SetFont('Arial','',10);
// $pdf->AddFont('angsana','','angsa.php');
//
// //*** Table 1 ***//
$pdf->AddPage();
$pdf->AddFont('THSarabun','','THSarabun.php');//ธรรมดา
$pdf->SetFont('THSarabun','',30);
$pdf->Cell(0,0,iconv('UTF-8', 'TIS-620', 'ข้อความทดสอบ'),0,0,'C');
$pdf->Ln(15);

$pdf->AddFont('THSarabun','b','THSarabun Bold.php');//หนา
$pdf->SetFont('THSarabun','b',30);
$pdf->Cell(0,0,iconv('UTF-8', 'TIS-620', 'ข้อความทดสอบ'),0,0,'C');
$pdf->Ln(15);

$pdf->AddFont('THSarabun','i','THSarabun Italic.php');//อียง
$pdf->SetFont('THSarabun','i',30);
$pdf->Cell(0,0,iconv('UTF-8', 'TIS-620', 'ข้อความทดสอบ'),0,0,'C');
$pdf->Ln(15);

$pdf->AddFont('THSarabun','bi','THSarabun Bold Italic.php');//หนาเอียง
$pdf->SetFont('THSarabun','bi',30);
$pdf->Cell(0,0,iconv('UTF-8', 'TIS-620', 'ข้อความทดสอบ'),0,0,'C');
$pdf->Ln(15);
// $pdf->Cell(0,0,'ข้อความทดสอบ');
// $pdf->Image($this->public_url('file/images/background/photo-1394134.jpg'),10,12,30,0,'','');
// $pdf->Image($this->public_url('file/images/background/photo-1394134.jpg'),10,12,30,0,'','http://www.select2web.com');
// $pdf->SetFont('Arial','B',16);
// $pdf->Cell( 0  , 5 , iconv( 'UTF-8','cp874' , 'พิมพ์ให้อยู่ตรงกลาง' ) , 0 , 1 , 'C' );
// $pdf->Text( 10 , 10 , 'Hello World!');


$pdf->Output();
// $pdf->Output("MyPDF/MyPDF.pdf","F");
 ?>
