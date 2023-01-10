<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kondisi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_kondisi');
    }

    public function index()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/kondisi/index";

        $data['data_kondisi']  = $this->m_kondisi->list_kondisi();
    
        $this->load->view('admin/template/template', $data);
    }
}
