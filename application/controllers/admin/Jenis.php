<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_jenis');
    }

    public function index()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/jenis/index";

        $data['data_jenis']  = $this->m_jenis->list_jenis();
    
        $this->load->view('admin/template/template', $data);
    }
}
