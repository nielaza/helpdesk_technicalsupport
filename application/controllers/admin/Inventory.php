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

        $jumlah_inventory   = $this->m_inventory->all();
        $data['all']        = $jumlah_inventory->total;

        $kondisi_baik       = $this->m_inventory->baik();
        $data['baik']       = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->m_inventory->bermasalah();
        $data['bermasalah'] = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->m_inventory->rusak();
        $data['rusak']      = $kondisi_rusak->jml_rusak;

        $data['label_jenishardware']    = $this->m_inventory->piejenis()->result();
        $data['label_sumberdana']       = $this->m_inventory->piesumber()->result();
        $data['label_kelengkapan']      = $this->m_inventory->piekelengkapan()->result();
        $data['label_thnpengadaan']     = $this->m_inventory->bar_tahun()->result();
        $data['label_lokasi']           = $this->m_inventory->bar_lokasi()->result();

        $data['data_inventory']  = $this->m_inventory->list_inventory();
    
        $this->load->view('admin/template/template', $data);
    }

    public function kondisi_baik()
    {
        $data['title'] 		= "Data Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/kondisi_baik";

        $jumlah_inventory   = $this->m_inventory->all();
        $data['all']        = $jumlah_inventory->total;

        $kondisi_baik       = $this->m_inventory->baik();
        $data['baik']       = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->m_inventory->bermasalah();
        $data['bermasalah'] = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->m_inventory->rusak();
        $data['rusak']      = $kondisi_rusak->jml_rusak;

        $id_kondisi = '1';
        $data['data_inventory']  = $this->m_inventory->kondisi_inventory($id_kondisi);
    
        $this->load->view('admin/template/template', $data);
    }

    public function kondisi_bermasalah()
    {
        $data['title'] 		= "Data Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/kondisi_bermasalah";

        $jumlah_inventory   = $this->m_inventory->all();
        $data['all']        = $jumlah_inventory->total;

        $kondisi_baik       = $this->m_inventory->baik();
        $data['baik']       = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->m_inventory->bermasalah();
        $data['bermasalah'] = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->m_inventory->rusak();
        $data['rusak']      = $kondisi_rusak->jml_rusak;

        $id_kondisi = '2';
        $data['data_inventory']  = $this->m_inventory->kondisi_inventory($id_kondisi);
    
        $this->load->view('admin/template/template', $data);
    }

    public function kondisi_rusak()
    {
        $data['title'] 		= "Data Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/kondisi_rusak";

        $jumlah_inventory   = $this->m_inventory->all();
        $data['all']        = $jumlah_inventory->total;

        $kondisi_baik       = $this->m_inventory->baik();
        $data['baik']       = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->m_inventory->bermasalah();
        $data['bermasalah'] = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->m_inventory->rusak();
        $data['rusak']      = $kondisi_rusak->jml_rusak;

        $id_kondisi = '3';
        $data['data_inventory']  = $this->m_inventory->kondisi_inventory($id_kondisi);

        $this->load->view('admin/template/template', $data);
    }
}
