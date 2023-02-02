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

    public function ganti_password()
    {
        $data['title'] 		= "Dashboard";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/user/ganti_password";
    
        $this->load->view('admin/template/template', $data);
    }

    public function change_password()
    {
        $password       = $this->input->post('password');
        $password2      = $this->input->post('password2');

        $this->form_validation->set_rules('password', '*', 'required|min_length[6]|matches[password2]');
        $this->form_validation->set_rules('password2', '*', 'required|min_length[6]');

        if ($this->form_validation->run() != FALSE) {
            $where = array(
				'id' => $this->session->userdata('id')
			);

            $data = array(
                'password'	        => sha1($password)
            );

            $this->m_user->update('user', $data, $where);
            $this->session->set_flashdata('info', 'Password berhasil diganti, Silahkan melakukan login kembali !');
            redirect(base_url('admin/auth/login'));
        } else {
            $this->session->set_flashdata('gagal','Gagal, Gagal Ganti Password');
            redirect(base_url().'admin/user/ganti_password');
        }
    }
}
