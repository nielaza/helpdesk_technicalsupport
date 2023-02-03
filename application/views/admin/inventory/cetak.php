<?php  
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
// Buat sebuah variabel untuk menampung pengaturan style dari header tabel
$style_col = [
    'font' => ['bold' => true], // Set font nya jadi bold
    'alignment' => [
    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],
    'borders' => [
    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
];
// Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
$style_row = [
    'alignment' => [
    'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
    ],
    'borders' => [
    'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
    'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
    'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
    'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
    ]
];
$sheet->setCellValue('A1', "INVENTORY KOMPUTER"); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells('A1:U1'); 
$sheet->getStyle('A1')->getFont()->setBold(true); 
$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER); 
$sheet->setCellValue('A3', "NO"); 
$sheet->setCellValue('B3', "BARCODE"); 
$sheet->setCellValue('C3', "JENIS INFRASTRUKTUR");
$sheet->setCellValue('D3', "PC / PRINTER"); 
$sheet->setCellValue('E3', "PROCESSOR");
$sheet->setCellValue('F3', "RAM DDR"); 
$sheet->setCellValue('G3', "RAM (GB)"); 
$sheet->setCellValue('H3', "HD (SDD)");
$sheet->setCellValue('I3', "HD (HDD)"); 
$sheet->setCellValue('J3', "GRAFIK CARD"); 
$sheet->setCellValue('K3', "SISTEM OPERASI"); 
$sheet->setCellValue('L3', "KONDISI"); 
$sheet->setCellValue('M3', "SUMBER DANA");
$sheet->setCellValue('N3', "TAHUN PENGADAAN"); 
$sheet->setCellValue('O3', "KELENGKAPAN");  
$sheet->setCellValue('P3', "NAMA PC"); 
$sheet->setCellValue('Q3', "MAC ADDRESS"); 
$sheet->setCellValue('R3', "LANTAI");
$sheet->setCellValue('S3', "BIDANG UNIT"); 
$sheet->setCellValue('T3', "SEKSI"); 
$sheet->setCellValue('U3', "PENGGUNA"); 
// Apply style header yang telah kita buat tadi ke masing-masing kolom header
$sheet->getStyle('A3')->applyFromArray($style_col);
$sheet->getStyle('B3')->applyFromArray($style_col);
$sheet->getStyle('C3')->applyFromArray($style_col);
$sheet->getStyle('D3')->applyFromArray($style_col);
$sheet->getStyle('E3')->applyFromArray($style_col);
$sheet->getStyle('F3')->applyFromArray($style_col);
$sheet->getStyle('G3')->applyFromArray($style_col);
$sheet->getStyle('H3')->applyFromArray($style_col);
$sheet->getStyle('I3')->applyFromArray($style_col);
$sheet->getStyle('J3')->applyFromArray($style_col);
$sheet->getStyle('K3')->applyFromArray($style_col);
$sheet->getStyle('L3')->applyFromArray($style_col);
$sheet->getStyle('M3')->applyFromArray($style_col);
$sheet->getStyle('N3')->applyFromArray($style_col);
$sheet->getStyle('O3')->applyFromArray($style_col);
$sheet->getStyle('P3')->applyFromArray($style_col);
$sheet->getStyle('Q3')->applyFromArray($style_col);
$sheet->getStyle('R3')->applyFromArray($style_col);
$sheet->getStyle('S3')->applyFromArray($style_col);
$sheet->getStyle('T3')->applyFromArray($style_col);
$sheet->getStyle('U3')->applyFromArray($style_col);
// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
// $siswa = $this->SiswaModel->view();
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
foreach($data_inventory as $data){ // Lakukan looping pada variabel siswa
    $sheet->setCellValue('A'.$numrow, $no);
    $sheet->setCellValue('B'.$numrow, $data->barcode);
    $sheet->setCellValue('C'.$numrow, $data->jenis);
    $sheet->setCellValue('D'.$numrow, $data->pc_printer);
    $sheet->setCellValue('E'.$numrow, $data->processor);
    $sheet->setCellValue('F'.$numrow, $data->ram_ddr);
    $sheet->setCellValue('G'.$numrow, $data->ram_gb);
    $sheet->setCellValue('H'.$numrow, $data->hd_ssd);
    $sheet->setCellValue('I'.$numrow, $data->hd_hdd);
    $sheet->setCellValue('J'.$numrow, $data->grafik_card);
    $sheet->setCellValue('K'.$numrow, $data->sistem_operasi);
    $sheet->setCellValue('L'.$numrow, $data->kondisi);
    $sheet->setCellValue('M'.$numrow, $data->sumber);
    $sheet->setCellValue('N'.$numrow, $data->tahun_pengadaan);
    $sheet->setCellValue('O'.$numrow, $data->kelengkapan);
    $sheet->setCellValue('P'.$numrow, $data->nama_pc);
    $sheet->setCellValue('Q'.$numrow, $data->mac_address);
    $sheet->setCellValue('R'.$numrow, $data->lantai);
    $sheet->setCellValue('S'.$numrow, $data->sub_lokasi);
    $sheet->setCellValue('T'.$numrow, $data->jenis);
    $sheet->setCellValue('U'.$numrow, $data->pengguna);
    
    // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
    $sheet->getStyle('A'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('M'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('N'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('O'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('P'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('Q'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('R'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('S'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('T'.$numrow)->applyFromArray($style_row);
    $sheet->getStyle('U'.$numrow)->applyFromArray($style_row);    
    
    $no++; // Tambah 1 setiap kali looping
    $numrow++; // Tambah 1 setiap kali looping
}
// Set width kolom
$sheet->getColumnDimension('A')->setWidth(5); 
$sheet->getColumnDimension('B')->setWidth(26); 
$sheet->getColumnDimension('C')->setWidth(21); 
$sheet->getColumnDimension('D')->setWidth(25); 
$sheet->getColumnDimension('E')->setWidth(15); 
$sheet->getColumnDimension('F')->setWidth(10); 
$sheet->getColumnDimension('G')->setWidth(10); 
$sheet->getColumnDimension('H')->setWidth(10); 
$sheet->getColumnDimension('I')->setWidth(10); 
$sheet->getColumnDimension('J')->setWidth(25); 
$sheet->getColumnDimension('K')->setWidth(23); 
$sheet->getColumnDimension('L')->setWidth(23); 
$sheet->getColumnDimension('M')->setWidth(20); 
$sheet->getColumnDimension('N')->setWidth(19); 
$sheet->getColumnDimension('O')->setWidth(40); 
$sheet->getColumnDimension('P')->setWidth(20); 
$sheet->getColumnDimension('Q')->setWidth(15); 
$sheet->getColumnDimension('R')->setWidth(10); 
$sheet->getColumnDimension('S')->setWidth(35); 
$sheet->getColumnDimension('T')->setWidth(20); 
$sheet->getColumnDimension('U')->setWidth(25); 

// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
$sheet->getDefaultRowDimension()->setRowHeight(-1);
// Set orientasi kertas jadi LANDSCAPE
$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
// Set judul file excel nya
$sheet->setTitle("Laporan Inventory Komputer");
// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Inventory Komputer.xls"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');