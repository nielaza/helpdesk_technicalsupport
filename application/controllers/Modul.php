<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Modul extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->library(['session','pagination']);
    }
    
    public function tentang_kami()
	{
        $data['header']     = "header";
        $data['content']	= "tentang_kami";
        $data['footer']		= "footer";

        $this->load->view('template', $data);
	}

    public function team_sistem_informasi()
	{
        $data['header']     = "header";
        $data['content']	= "team_sistem_informasi";
        $data['footer']		= "footer";

        $this->load->view('template', $data);
	}
}