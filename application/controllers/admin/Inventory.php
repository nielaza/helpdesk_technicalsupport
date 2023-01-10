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

        $data['data_inventory']  = $this->m_inventory->list_inventory();
    
        $this->load->view('admin/template/template', $data);
    }
}
