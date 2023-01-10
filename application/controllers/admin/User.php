<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_user');
    }

    public function index()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/user/index";

        $data['data_user']  = $this->m_user->list_user();
    
        $this->load->view('admin/template/template', $data);
    }
}
