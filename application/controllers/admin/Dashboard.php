<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_dashboard');
    }

    public function index()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/dashboard";

        /////////////////////////////////////////// Dashboard Admin //////////////////////////////////////////////////////////

        $all                    = $this->m_dashboard->all();
        $data['all_tiket']      = $all->jml_tiket;

        $new                    = $this->m_dashboard->baru();
        $data['tiket_baru']     = $new->jml_newtiket;

        $proses                 = $this->m_dashboard->proses();
        $data['tiket_proses']   = $proses->jml_tiketproses;

        $selesai                = $this->m_dashboard->selesai();
        $data['tiket_selesai']  = $selesai->jml_tiketselesai;

        $approved               = $this->m_dashboard->approved();
        $data['tiket_approved'] = $approved->jml_tiketapproved;

        $data['label_perbulan']     = $this->m_dashboard->linebulan()->result();
        $data['label_teknisi']      = $this->m_dashboard->pieteknisi()->result();
        $data['label_status']       = $this->m_dashboard->piestatus()->result();
        $data['label_jenis']        = $this->m_dashboard->bar_jenis()->result();
        $data['label_lokasi']       = $this->m_dashboard->bar_lokasi()->result();

        ////////////////////////////////////////// Dashboard Teknisi /////////////////////////////////////////////////////////
        
        $id_user                    = $this->session->userdata('id');
        
        $all                        = $this->m_dashboard->all();
        $data['semua_tiket']        = $all->jml_tiket;

        $new                        = $this->m_dashboard->baru();
        $data['teknisi_baru']       = $new->jml_newtiket;

        $teknisi_processed          = $this->m_dashboard->processed($id_user);
        $data['teknisi_proses']     = $teknisi_processed->jml_tiketproses;

        $teknisi_finished           = $this->m_dashboard->finished($id_user);
        $data['teknisi_selesai']    = $teknisi_finished->jml_tiketselesai;

        $teknisi_done               = $this->m_dashboard->done($id_user);
        $data['teknisi_beres']      = $teknisi_done->jml_tiketapproved;

        $this->load->view('admin/template/template', $data);
    }
}
