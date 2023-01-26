<?php  
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
  
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
$drawing->setName('Paid');
$drawing->setDescription('Paid');
$drawing->setPath('assets/img/logo_pusdatin.png'); 
$drawing->setCoordinates('B2');
$drawing->setHeight(60);
$drawing->setOffsetX(20);
$drawing->getShadow()->setVisible(true);
$drawing->getShadow()->setDirection(45);
$drawing->setWorksheet($spreadsheet->getActiveSheet());

if(!empty($tiket[0]->lampiran)){
    $drawing = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
    $drawing->setName('Paid');
    $drawing->setDescription('Paid');
    $drawing->setPath('uploads/'.$tiket[0]->lampiran.''); 
    $drawing->setCoordinates('D11');
    $drawing->setWidth(180);
    $drawing->setOffsetX(40);
    $drawing->getShadow()->setVisible(true);
    $drawing->getShadow()->setDirection(45);
    $drawing->setWorksheet($spreadsheet->getActiveSheet());
}

$spreadsheet->getActiveSheet()
			->getColumnDimension('B')
			->setWidth(45);
$spreadsheet->getActiveSheet()
			->getColumnDimension('C')
			->setWidth(45);
$spreadsheet->getActiveSheet()
			->getColumnDimension('D')
			->setWidth(45);

$spreadsheet->getActiveSheet()->getRowDimension('2')->setRowHeight(27, 'pt');
$spreadsheet->getActiveSheet()->getRowDimension('9')->setRowHeight(25, 'pt');
$spreadsheet->getActiveSheet()->getRowDimension('10')->setRowHeight(24, 'pt');
$spreadsheet->getActiveSheet()->getRowDimension('11')->setRowHeight(190, 'pt');

$spreadsheet->getActiveSheet()
			->setCellValue('D2', "SURAT PERINTAH PERBAIKAN");
$spreadsheet->getActiveSheet()
			->getStyle('D2')
			->getFont()
			->setBold(true)
			->setSize(14);
$spreadsheet->getActiveSheet()
			->getStyle('D2')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('D2')->getFill()
    		->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    		->getStartColor()->setARGB('000000');
$spreadsheet->getActiveSheet()->getStyle('D2')
    		->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
$spreadsheet->getActiveSheet()
			->setCellValue('D3', "Kode Tiket : ".$tiket[0]->kode_tiket."");
$spreadsheet->getActiveSheet()
            ->setCellValue('D4', "Hari : ".nama_hari(date('l'))."");
$spreadsheet->getActiveSheet()
            ->setCellValue('B5', "Tanggal Aduan Masuk : ".tanggal_indonesia(date('Y-m-d', strtotime($tiket[0]->created)))."");
$spreadsheet->getActiveSheet()
            ->setCellValue('D5', "Tanggal : ".tanggal_indonesia(date('Y-m-d'))."");
$spreadsheet->getActiveSheet()
            ->setCellValue('B7', "Pemilik Aset : ".$tiket[0]->user_pemohon."");
$spreadsheet->getActiveSheet()
            ->setCellValue('C7', "Nama Aset : ");
$spreadsheet->getActiveSheet()
            ->setCellValue('C8', "".$tiket[0]->jenis." - ".$tiket[0]->model."");
$spreadsheet->getActiveSheet()
            ->setCellValue('D7', "Bidang / Unit : ");
$spreadsheet->getActiveSheet()
            ->setCellValue('D8', "".$tiket[0]->lokasi."");
$spreadsheet->getActiveSheet()
            ->setCellValue('B8', "No. Telp : ".$tiket[0]->telp."");
$spreadsheet->getActiveSheet()
            ->setCellValue('B10', "JENIS PEKERJAAN");
$spreadsheet->getActiveSheet()
            ->setCellValue('B11', "[   ] Pembuatan Kabel LAN  …..  M
			[   ] Connection internet error
			[   ] Printer error
			[   ] Windows error
			[   ] Lain - lain :
			
				…...........................................................................
			
				…...........................................................................
			
				…...........................................................................");
$spreadsheet->getActiveSheet()->getStyle('B11')
    		->getAlignment()->setWrapText(true)
			->setHorizontal(Alignment::HORIZONTAL_LEFT)
			->setVertical(Alignment::VERTICAL_TOP);
$spreadsheet->getActiveSheet()
			->getStyle('B10')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('B10')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('C10', "KELUHAN CLIENT");
$spreadsheet->getActiveSheet()
			->getStyle('C10')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('C10')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('C11', "".$tiket[0]->keterangan."");
$spreadsheet->getActiveSheet()
			->getStyle('C11')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('D10', "KETERANGAN");
$spreadsheet->getActiveSheet()
			->getStyle('D10')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('D10')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('B13', "Catatan :");
$spreadsheet->getActiveSheet()
            ->setCellValue('B17', "Pemilik Aset / Pemberi Pekerjaan");
$spreadsheet->getActiveSheet()
			->getStyle('B17')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('B23', "……………………………………..");
$spreadsheet->getActiveSheet()
			->getStyle('B23')
			->getFont()
			->setBold(true)
			->setUnderline(true);
$spreadsheet->getActiveSheet()
			->getStyle('B23')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('C17', "Tim PPHP");
$spreadsheet->getActiveSheet()
			->getStyle('C17')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('C23', "……………………………………..");
$spreadsheet->getActiveSheet()
			->getStyle('C23')
			->getFont()
			->setBold(true)
			->setUnderline(true);
$spreadsheet->getActiveSheet()
			->getStyle('C23')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('D17', "Tenaga Ahli");
$spreadsheet->getActiveSheet()
			->getStyle('D17')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('D23', "……………………………………..");
$spreadsheet->getActiveSheet()
			->getStyle('D23')
			->getFont()
			->setBold(true)
			->setUnderline(true);
$spreadsheet->getActiveSheet()
			->getStyle('D23')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('D24', "".$this->session->userdata('nama_lengkap')."");
$spreadsheet->getActiveSheet()
			->getStyle('D24')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('B1:D1')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);
$spreadsheet->getActiveSheet()->getStyle('B1:B24')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);
$spreadsheet->getActiveSheet()->getStyle('D1:D24')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);
$spreadsheet->getActiveSheet()->getStyle('B24:D24')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);

$spreadsheet->getActiveSheet()->getStyle('B7:D7')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B7:B9')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D7:D9')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$spreadsheet->getActiveSheet()->getStyle('B10')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B10')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B10')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B11')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B11')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B11')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B12')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B12')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B12')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$spreadsheet->getActiveSheet()->getStyle('C10')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C10')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C10')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C10')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C11')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C11')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C11')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C11')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C12')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C12')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C12')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C12')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

$spreadsheet->getActiveSheet()->getStyle('D10')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D10')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D10')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D11')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D11')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D11')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D12')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D12')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D12')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
			
$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment;filename=Surat Perintah Perbaikan'.' - '.$tiket[0]->user_pemohon.' '.'('.tanggal_indonesia(date('Y-m-d', strtotime($tiket[0]->created))).')'.'.xlsx'); 
header('Content-Disposition: attachment;filename=Surat Perintah Perbaikan'.' - '.$tiket[0]->user_pemohon.' '.'('.tanggal_indonesia(date('Y-m-d', strtotime($tiket[0]->created))).')'.'.xls'); 
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>