<?php  
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
$styleJudul = [
	'font' => [
		'color' => [
			'rgb' => 'FFFFFF'
		],
		'bold'=>true,
		'size'=>11
	],
	'fill'=>[
		'fillType' =>  fill::FILL_SOLID,
		'startColor' => [
			'rgb' => 'e74c3c'
		]
	],
	'alignment'=>[
		'horizontal' => Alignment::HORIZONTAL_CENTER
	]
 
];
 
$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
 
//Set Default Teks
$spreadsheet->getDefaultStyle()
			->getFont()
			->setName('Times New Roman')
			->setSize(10);
 
//Style Judul table
$spreadsheet->getActiveSheet()
			->setCellValue('A1', "Daftar Mahasiswa");
 
$spreadsheet->getActiveSheet()
            ->mergeCells("A1:C1");
			// ->mergeCells("A1:E1");
 
$spreadsheet->getActiveSheet()
			->getStyle('A1')
			->getFont()
			->setSize(20);
 
$spreadsheet->getActiveSheet()
			->getStyle('A1')
			->getAlignment()
			->setHorizontal(Alignment::HORIZONTAL_CENTER);
 
// style lebar kolom
$spreadsheet->getActiveSheet()
			->getColumnDimension('A')
			->setWidth(5);
$spreadsheet->getActiveSheet()
			->getColumnDimension('B')
			->setWidth(18);
$spreadsheet->getActiveSheet()
			->getColumnDimension('C')
			->setWidth(13);
// $spreadsheet->getActiveSheet()
// 			->getColumnDimension('D')
// 			->setWidth(9);
// $spreadsheet->getActiveSheet()
// 			->getColumnDimension('E')
// 			->setWidth(18);
 
// SET judul table
$spreadsheet->getActiveSheet()
			->setCellValue('A2', "ID")
			->setCellValue('B2', "Nama")
			->setCellValue('C2', "NIM");
			// ->setCellValue('D2', "Kelas")
			// ->setCellValue('E2', "Jurusan");
 
// STYLE judul table
$spreadsheet->getActiveSheet()
			->getStyle('A2:C2')
            // ->getStyle('A2:E2')
			->applyFromArray($styleJudul);
 
// ambil data JSON
// $file = file_get_contents('daftar-mahasiswa.json');
// $dataMahasiwa = json_decode($file, true);
 
//tampilkan data JSON
$index = 3;
// foreach($dataMahasiwa as $mahasiswa){
	$spreadsheet->getActiveSheet()
	->setCellValue('A'.$index, '1')
	->setCellValue('B'.$index, 'Daniel')
	->setCellValue('C'.$index, '2022');
	// ->setCellValue('D'.$index, $mahasiswa['kelas'])
	// ->setCellValue('E'.$index, $mahasiswa['jurusan']);
 
 
// $index++;
// }


$writer = new Xlsx($spreadsheet);
$filename = 'laporan-siswa';

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
header('Cache-Control: max-age=0');
$writer->save('php://output');
 

// header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); 
// header('Content-Disposition: attachment;filename="mahasiswa.xls"');
// $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
// $writer->save('php://output');
?>