<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sumber_dana extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_sumberdana');
    }

    public function index()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/sumber_dana/index";

        $data['data_sumberdana']  = $this->m_sumberdana->list_sumberdana();
    
        $this->load->view('admin/template/template', $data);
    }
}
