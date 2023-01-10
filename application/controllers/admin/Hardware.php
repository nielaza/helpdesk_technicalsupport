<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hardware extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_hardware');
    }

    public function index()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/hardware/index";

        $data['data_hardware']  = $this->m_hardware->list_hardware();
    
        $this->load->view('admin/template/template', $data);
    }
}
