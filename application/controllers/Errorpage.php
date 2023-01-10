<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Errorpage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('model_app');

		if (!$this->session->userdata('id_user')) {
			$this->session->set_flashdata('status1', 'expired');
			redirect('login');
		}
	}

	public function index()
	{

		$data['title'] 	  = "Error. Page that you requested are forbidden";
		$data['navbar']   = "navbar";
		$data['sidebar']  = "sidebar";
		$data['body']     = "error";


		$id_dept = $this->session->userdata('id_dept');
		$id_user = $this->session->userdata('id_user');


		$this->load->view('template', $data);
	}
}