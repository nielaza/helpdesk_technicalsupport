<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teknisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_teknisi');
    }

    public function index()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/teknisi/index";

        $data['data_teknisi']  = $this->m_teknisi->list_teknisi();
    
        $this->load->view('admin/template/template', $data);
    }
}
