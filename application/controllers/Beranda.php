<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Beranda extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
    }

	public function index()
	{
        $data['header']     = "header";
        $data['content']	= "beranda";
        $data['footer']		= "footer";

        $this->load->view('template', $data);
	}
    
}