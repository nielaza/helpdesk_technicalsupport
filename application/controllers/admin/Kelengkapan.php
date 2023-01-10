<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelengkapan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_kelengkapan');
    }

    public function index()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/kelengkapan/index";

        $data['data_kelengkapan']  = $this->m_kelengkapan->list_kelengkapan();
    
        $this->load->view('admin/template/template', $data);
    }
}
