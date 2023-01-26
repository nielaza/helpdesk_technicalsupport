<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function login()
    {
        $this->load->view('admin/login');
    }

    public function proses_login()
    {

        if ($this->form_validation->run() != FALSE) {
            $this->login();
        } else {
            $username = $this->input->post('username', TRUE);
            $password = sha1($this->input->post('password', TRUE));

            $data = array(
                'username'  => $username,
                'password'  => $password,
                'status'    => 'Aktif'
            );
            $cek_login = $this->M_login->login_cek($data)->num_rows();
            if ($cek_login > 0) {
                $user = $this->M_login->login_cek($data)->result_array();
                $cek = $user[0];

                $cek['login'] = 'Berhasil';
                $this->session->set_userdata($cek);
                if($this->session->userdata('level') == "Unit"){
                    $this->session->set_flashdata('success_login','Sukses, Anda Berhasil Login');
                    redirect(base_url('tiket/tiket-all'));
                } else {
                    $this->session->set_flashdata('success_login','Sukses, Anda Berhasil Login');
                    redirect(base_url('admin/dashboard'));
                }
            } else {
                $this->session->set_flashdata('info', 'Username Atau Password salah !!!');
                redirect(base_url('admin/auth/login'));
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('admin/auth/login'));
    }
}
