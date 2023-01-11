<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_inventory');
    }

    public function index()
    {
        $data['title'] 		= "Data Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/index";

        $jumlah_inventory   = $this->db->query("SELECT COUNT(id) AS total FROM inventory_komputer")->row();
        $data['jml_inventory']  = $jumlah_inventory->total;

        $kondisi_baik       = $this->db->query("SELECT COUNT(id) AS jml_baik FROM inventory_komputer WHERE kondisi = 1")->row();
        $data['baik']           = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->db->query("SELECT COUNT(id) AS jml_bermasalah FROM inventory_komputer WHERE kondisi = 2")->row();
        $data['bermasalah']     = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->db->query("SELECT COUNT(id) AS jml_rusak FROM inventory_komputer WHERE kondisi = 3")->row();
        $data['rusak']          = $kondisi_rusak->jml_rusak;

        $data['label_jenishardware']    = $this->m_inventory->piejenis()->result();
        $data['label_sumberdana']       = $this->m_inventory->piesumber()->result();
        $data['label_kelengkapan']      = $this->m_inventory->piekelengkapan()->result();
        $data['label_thnpengadaan']     = $this->m_inventory->bar_tahun()->result();
        $data['label_lokasi']           = $this->m_inventory->bar_lokasi()->result();

        $data['data_inventory']  = $this->m_inventory->list_inventory();
    
        $this->load->view('admin/template/template', $data);
    }
}
