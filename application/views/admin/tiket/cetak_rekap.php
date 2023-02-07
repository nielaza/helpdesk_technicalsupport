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
$sheet->setCellValue('A1', "REPORT PEKERJAAN TECHNICAL SUPPORT"); // Set kolom A1 dengan tulisan "DATA SISWA"
$sheet->mergeCells('A1:N1'); 
$sheet->getStyle('A1')->getFont()->setBold(true); 
$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER)->setVertical(Alignment::VERTICAL_CENTER); 
$sheet->setCellValue('A3', "NO"); 
$sheet->setCellValue('B3', "TGL. TIKET"); 
$sheet->setCellValue('C3', "KODE TIKET");
$sheet->setCellValue('D3', "NAMA PEMOHON"); 
$sheet->setCellValue('E3', "TELP");
$sheet->setCellValue('F3', "JENIS INFRASTRUKTUR"); 
$sheet->setCellValue('G3', "MODEL PERANGKAT"); 
$sheet->setCellValue('H3', "LOKASI INFRASTRUKTUR");
$sheet->setCellValue('I3', "SUB LOKASI INFRASTRUKTUR"); 
$sheet->setCellValue('J3', "KETERANGAN"); 
$sheet->setCellValue('K3', "JENIS PEKERJAAN");
$sheet->setCellValue('L3', "APPROVAL");
$sheet->setCellValue('M3', "STATUS TIKET");
$sheet->setCellValue('N3', "TEKNISI");
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
// Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
// $siswa = $this->SiswaModel->view();
$no = 1; // Untuk penomoran tabel, di awal set dengan 1
$numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
foreach($data_tiket as $data){ // Lakukan looping pada variabel siswa
    $sheet->setCellValue('A'.$numrow, $no);
    $sheet->setCellValue('B'.$numrow, tanggal_indonesia(date('Y-m-d', strtotime($data->created))));
    $sheet->setCellValue('C'.$numrow, $data->kode_tiket);
    $sheet->setCellValue('D'.$numrow, $data->user_pemohon);
    $sheet->setCellValue('E'.$numrow, $data->telp);
    $sheet->setCellValue('F'.$numrow, $data->jenis);
    $sheet->setCellValue('G'.$numrow, $data->model);
    $sheet->setCellValue('H'.$numrow, $data->lokasi);
    $sheet->setCellValue('I'.$numrow, $data->sub_lokasi);
    $sheet->setCellValue('J'.$numrow, $data->keterangan);
    $sheet->setCellValue('K'.$numrow, $data->jenis_pekerjaan);
    if ($data->approval == 0) {
        $sheet->setCellValue('L'.$numrow, "Belum Approval");
    } else if ($data->approval == 1) {
        $sheet->setCellValue('L'.$numrow, "Sudah Approval");
    }
    if ($data->status == 0) {
        $sheet->setCellValue('M'.$numrow, "Tiket Ditolak");
    } else if ($data->status == 1) {
        $sheet->setCellValue('M'.$numrow, "Tiket Dibuat");
    } else if ($data->status == 2) {
        $sheet->setCellValue('M'.$numrow, "Tiket Dalam Proses");
    } else if ($data->status == 3) {
        $sheet->setCellValue('M'.$numrow, "Pengerjaan selesai by Technical Support");
    } else if ($data->status == 4) {
        $sheet->setCellValue('M'.$numrow, "Tiket Done");
    }
    if ($data->id_teknisi == 0) {
        $sheet->setCellValue('N'.$numrow, "Belum Ditangani");
    } else {
        $sheet->setCellValue('N'.$numrow, $data->nama_lengkap);
    }
    
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
    
    $no++; // Tambah 1 setiap kali looping
    $numrow++; // Tambah 1 setiap kali looping
}
// Set width kolom
$sheet->getColumnDimension('A')->setWidth(5); 
$sheet->getColumnDimension('B')->setWidth(17); 
$sheet->getColumnDimension('C')->setWidth(20); 
$sheet->getColumnDimension('D')->setWidth(20); 
$sheet->getColumnDimension('E')->setWidth(17); 
$sheet->getColumnDimension('F')->setWidth(23); 
$sheet->getColumnDimension('G')->setWidth(23); 
$sheet->getColumnDimension('H')->setWidth(40); 
$sheet->getColumnDimension('I')->setWidth(40); 
$sheet->getColumnDimension('J')->setWidth(37);
$sheet->getColumnDimension('K')->setWidth(37); 
$sheet->getColumnDimension('L')->setWidth(20); 
$sheet->getColumnDimension('M')->setWidth(37); 
$sheet->getColumnDimension('N')->setWidth(20); 

// Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
$sheet->getDefaultRowDimension()->setRowHeight(-1);
// Set orientasi kertas jadi LANDSCAPE
$sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);
// Set judul file excel nya
$sheet->setTitle("Laporan Technical Support");
// Proses file excel
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment; filename="Report Pekerjaan Technical Support.xls"'); // Set nama file excel nya
header('Cache-Control: max-age=0');
$writer = new Xlsx($spreadsheet);
$writer->save('php://output');