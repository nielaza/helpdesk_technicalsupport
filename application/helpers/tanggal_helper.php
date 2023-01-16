<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('format_indo')) {
    function format_indo($date){
      date_default_timezone_set('Asia/Jakarta');
      // array hari dan bulan
      $Hari = array("Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu");
      $Bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
      
      // pemisahan tahun, bulan, hari, dan waktu
      $tahun = substr($date,0,4);
      $bulan = substr($date,5,2);
      $tgl = substr($date,8,2);
      $waktu = substr($date,11,5);
      $hari = date("w",strtotime($date));
      $result = $Hari[$hari].", ".$tgl." ".$Bulan[(int)$bulan-1]." ".$tahun." ".$waktu;

    //   echo format_indo(date('Y-m-d'));
    //   25 Agustus 2019
    //   echo format_indo(date('Y-m-d H:i:s'));
    //   25 Agustus 2019 09:32:00
  
      return $result;
    }
  }

if ( ! function_exists('tanggal_indonesia')) {
  function tanggal_indonesia($tanggal) {
    $ubahTanggal = gmdate($tanggal, time()+60*60*8);
    $pecahTanggal = explode('-', $ubahTanggal);
    $tanggal = $pecahTanggal[2];
    $bulan = bulan_panjang($pecahTanggal[1]);
    $tahun = $pecahTanggal[0];

    // $tanggal = '2018-10-13';
    // echo tanggal_indonesia($tanggal);
    // 13 Oktober 2018

    return $tanggal.' '.$bulan.' '.$tahun;
  }
}

if ( ! function_exists('tanggal_indonesia_lengkap')) {
  function tanggal_indonesia_lengkap($tanggal) {
    $ubahTanggal = gmdate($tanggal, time()+60*60*8);
    $pecahTanggal = explode('-', $ubahTanggal);
    $tanggal = $pecahTanggal[2];
    $bulan = $pecahTanggal[1];
    $tahun = $pecahTanggal[0];
    $namaHari = nama_hari(date('l', mktime(0, 0, 0, $bulan, $tanggal, $tahun)));
    
    // $tanggal = '2018-10-13';
    // echo tanggal_indonesia_lengkap($tanggal);
    // Sabtu, 13 Oktober 2018

    return $namaHari.', '.$tanggal.' '.bulan_panjang($bulan).' '.$tahun;
  }
}

if ( ! function_exists('tanggal_indonesia_medium')) {
  function tanggal_indonesia_medium($tanggal) {
    $ubahTanggal = gmdate($tanggal, time()+60*60*8);
    $pecahTanggal = explode('-', $ubahTanggal);
    $tanggal = $pecahTanggal[2];
    $bulan = bulan_pendek($pecahTanggal[1]);
    $tahun = $pecahTanggal[0];
    
    // $tanggal = '2018-10-13';
    // echo tanggal_indonesia_medium($tanggal);
    // 13 Okt 2018

    return $tanggal.' '.$bulan.' '.$tahun;
  }
}

if ( ! function_exists('tanggal_indonesia_pendek')) {
  function tanggal_indonesia_pendek($tanggal) {
    $ubahTanggal = gmdate($tanggal, time()+60*60*8);
    $pecahTanggal = explode('-', $ubahTanggal);
    $tanggal = $pecahTanggal[2];
    $bulan = bulan_angka($pecahTanggal[1]);
    $tahun = $pecahTanggal[0];
    
    // $tanggal = '2018-10-13';
    // echo tanggal_indonesia_pendek($tanggal);
    // 13/10/2018

    return $tanggal.'/'.$bulan.'/'.$tahun;
  }
}

if ( ! function_exists('bulan_panjang')) {
  function bulan_panjang($bulan) {
    switch ($bulan) {
      case 1:
        return 'Januari';
        break;
      case 2:
        return 'Februari';
        break;
      case 3:
        return 'Maret';
        break;
      case 4:
        return 'April';
        break;
      case 5:
        return 'Mei';
        break;
      case 6:
        return 'Juni';
        break;
      case 7:
        return 'Juli';
        break;
      case 8:
        return 'Agustus';
        break;
      case 9:
        return 'September';
        break;
      case 10:
        return 'Oktober';
        break;
      case 11:
        return 'November';
        break;
      case 12:
        return 'Desember';
        break;
        
    // $bulan = '10';
    // echo bulan_panjang($bulan);
    // Oktober

    }
  }
}

if ( ! function_exists('bulan_pendek')) {
function bulan_pendek($bulan) {
    switch ($bulan) {
      case 1:
        return 'Jan';
        break;
      case 2:
        return 'Feb';
        break;
      case 3:
        return 'Mar';
        break;
      case 4:
        return 'Apr';
        break;
      case 5:
        return 'Mei';
        break;
      case 6:
        return 'Jun';
        break;
      case 7:
        return 'Jul';
        break;
      case 8:
        return 'Agu';
        break;
      case 9:
        return 'Sep';
        break;
      case 10:
        return 'Okt';
        break;
      case 11:
        return 'Nov';
        break;
      case 12:
        return 'Des';
        break;
                
    // $bulan = '10';
    // echo bulan_panjang($bulan);
    // Okt

    }
  }    
}

if ( ! function_exists('bulan_angka')) {
  function bulan_angka($bulan) {
    switch ($bulan) {
      case 1:
        return '01';
        break;
      case 2:
        return '02';
        break;
      case 3:
        return '03';
        break;
      case 4:
        return '04';
        break;
      case 5:
        return '05';
        break;
      case 6:
        return '06';
        break;
      case 7:
        return '07';
        break;
      case 8:
        return '08';
        break;
      case 9:
        return '09';
        break;
      case 10:
        return '10';
        break;
      case 11:
        return '11';
        break;
      case 12:
        return '12';
        break;
                    
    // $bulan = '10';
    // echo bulan_panjang($bulan);
    // 10

    }
  }
}

if ( ! function_exists('nama_hari')) {
  function nama_hari($hari) {
    if ($hari == 'Sunday') {
      return 'Minggu';
    } elseif ($hari == 'Monday') {
      return 'Senin';
    } elseif ($hari == 'Tuesday') {
      return 'Selasa';
    } elseif ($hari == 'Wednesday') {
      return 'Rabu';
    } elseif ($hari == 'Thursday') {
      return 'Kamis';
    } elseif ($hari == 'Friday') {
      return 'Jumat';
    } elseif ($hari == 'Saturday') {
      return 'Sabtu';
    }
                    
    // $hari = 'Saturday';
    // echo nama_hari($hari);
    // Sabtu

  }
}

?>