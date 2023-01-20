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

$spreadsheet->getActiveSheet()
			->getColumnDimension('B')
			->setWidth(5);
$spreadsheet->getActiveSheet()
			->getColumnDimension('C')
			->setWidth(20);
$spreadsheet->getActiveSheet()
			->getColumnDimension('D')
			->setWidth(25);
$spreadsheet->getActiveSheet()
			->getColumnDimension('E')
			->setWidth(20);
$spreadsheet->getActiveSheet()
			->getColumnDimension('F')
			->setWidth(40);
$spreadsheet->getActiveSheet()
			->getColumnDimension('G')
			->setWidth(40);

$spreadsheet->getActiveSheet()
			->setCellValue('G2', "SURAT PERINTAH PERBAIKAN");
$spreadsheet->getActiveSheet()
			->getStyle('G2')
			->getFont()
			->setBold(true)
			->setSize(14);
$spreadsheet->getActiveSheet()
			->getStyle('G2')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('G2')->getFill()
    		->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    		->getStartColor()->setARGB('000000');
$spreadsheet->getActiveSheet()->getStyle('G2')
    		->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
$spreadsheet->getActiveSheet()
			->setCellValue('G4', "Kode Tiket : ".$tiket[0]->kode_tiket."");
$spreadsheet->getActiveSheet()
            ->setCellValue('B5', "Tanggal Aduan Masuk : ".tanggal_indonesia(date('Y-m-d', strtotime($tiket[0]->created)))."");
$spreadsheet->getActiveSheet()
            ->setCellValue('G5', "Hari : ".nama_hari(date('l'))."");
$spreadsheet->getActiveSheet()
			->setCellValue('B6', "Bidang / Unit : ".$tiket[0]->lokasi."");
$spreadsheet->getActiveSheet()
            ->setCellValue('G6', "Tanggal : ".tanggal_indonesia(date('Y-m-d'))."");
            
$spreadsheet->getActiveSheet()
            ->mergeCells('B5:D5');
$spreadsheet->getActiveSheet()
            ->mergeCells('B6:D6');
$spreadsheet->getActiveSheet()
            ->mergeCells('B20:G20');

$spreadsheet->getActiveSheet()
            ->setCellValue('B8', "No.");
$spreadsheet->getActiveSheet()
			->getStyle('B8')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('B8')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('B9', "1");
$spreadsheet->getActiveSheet()
            ->setCellValue('B10', "2");
$spreadsheet->getActiveSheet()
            ->setCellValue('B11', "3");
$spreadsheet->getActiveSheet()
            ->setCellValue('B12', "4");
$spreadsheet->getActiveSheet()
            ->setCellValue('B13', "5");
$spreadsheet->getActiveSheet()
            ->setCellValue('B14', "6");
$spreadsheet->getActiveSheet()
            ->setCellValue('B15', "7");
$spreadsheet->getActiveSheet()
            ->setCellValue('B16', "8");
$spreadsheet->getActiveSheet()
            ->setCellValue('B17', "9");
$spreadsheet->getActiveSheet()
            ->setCellValue('B18', "10");
$spreadsheet->getActiveSheet()
            ->setCellValue('C8', "PEMILIK ASET");
$spreadsheet->getActiveSheet()
			->getStyle('C8')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('C8')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('D8', "JENIS INFRASTRUKTUR");
$spreadsheet->getActiveSheet()
			->getStyle('D8')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('D8')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('E8', "MODEL");
$spreadsheet->getActiveSheet()
			->getStyle('E8')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('E8')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('F8', "KELUHAN CLIENT");
$spreadsheet->getActiveSheet()
			->getStyle('F8')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('F8')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('G8', "JENIS PEKERJAAN");
$spreadsheet->getActiveSheet()
			->getStyle('G8')
			->getFont()
			->setBold(true);
$spreadsheet->getActiveSheet()
			->getStyle('G8')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER)
			->setVertical(Alignment::VERTICAL_CENTER);

$spreadsheet->getActiveSheet()
            ->setCellValue('G24', "Tenaga Ahli");
$spreadsheet->getActiveSheet()
			->getStyle('G24')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('G30', "……………………………………..");
$spreadsheet->getActiveSheet()
			->getStyle('G30')
			->getFont()
			->setBold(true)
			->setUnderline(true);
$spreadsheet->getActiveSheet()
			->getStyle('G30')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()
            ->setCellValue('G31', "".$this->session->userdata('nama_lengkap')."");
$spreadsheet->getActiveSheet()
			->getStyle('G31')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);

$spreadsheet->getActiveSheet()->getStyle('B1:G1')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);
$spreadsheet->getActiveSheet()->getStyle('B1:B31')
    		->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);
$spreadsheet->getActiveSheet()->getStyle('G1:G31')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);
$spreadsheet->getActiveSheet()->getStyle('B31:G31')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);

$spreadsheet->getActiveSheet()->getStyle('B8:G8')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B8:G8')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B8:B20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C8:C20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D8:D20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('E8:E20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('F8:F20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B31:G31')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_MEDIUM);

$spreadsheet->getActiveSheet()->getStyle('B20')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B20')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('B20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C20')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C20')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('C20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D20')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D20')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('D20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('E20')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('E20')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('E20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('F20')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('F20')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('F20')
    		->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('G20')
    		->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
$spreadsheet->getActiveSheet()->getStyle('G20')
    		->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

			
$writer = new Xlsx($spreadsheet);

header('Content-Type: application/vnd.ms-excel');
// header('Content-Disposition: attachment;filename=Surat Perintah Perbaikan'.' - '.$tiket[0]->user_pemohon.' '.'('.tanggal_indonesia(date('Y-m-d', strtotime($tiket[0]->created))).')'.'.xlsx'); 
header('Content-Disposition: attachment;filename=Surat Perintah Perbaikan (GROUP)'.' - '.$tiket[0]->user_pemohon.' '.'('.tanggal_indonesia(date('Y-m-d', strtotime($tiket[0]->created))).')'.'.xls'); 
header('Cache-Control: max-age=0');
$writer->save('php://output');
?>