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

        $all = $this->db->query("SELECT COUNT(id) AS jml_tiket FROM tiket")->row();
        $data['semua_tiket']    = $all->jml_tiket;

        $new = $this->db->query("SELECT COUNT(id) AS jml_newtiket FROM tiket WHERE status = 1")->row();
        $data['tiket_baru']     = $new->jml_newtiket;

        $proses = $this->db->query("SELECT COUNT(id) AS jml_tiketproses FROM tiket WHERE status = 2")->row();
        $data['tiket_proses']   = $proses->jml_tiketproses;

        $selesai = $this->db->query("SELECT COUNT(id) AS jml_tiketselesai FROM tiket WHERE status = 3")->row();
        $data['tiket_selesai']  = $selesai->jml_tiketselesai;

        $approved = $this->db->query("SELECT COUNT(id) AS jml_tiketapproved FROM tiket WHERE status = 4")->row();
        $data['tiket_approved'] = $approved->jml_tiketapproved;

        $data['label_perbulan']     = $this->m_dashboard->linebulan()->result();
        $data['label_teknisi']      = $this->m_dashboard->pieteknisi()->result();
        $data['label_status']       = $this->m_dashboard->piestatus()->result();
        $data['label_jenis']        = $this->m_dashboard->bar_jenis()->result();
        $data['label_lokasi']       = $this->m_dashboard->bar_lokasi()->result();
    
        $this->load->view('admin/template/template', $data);
    }
}
