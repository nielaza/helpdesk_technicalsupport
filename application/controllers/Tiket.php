<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tiket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('url');
		$this->load->library(['session','pagination']);
		$this->load->model('m_tiket');
    }
    
    public function buat_tiket()
	{
        $data['header']     = "header";
        $data['content']	= "form_tiket";
        $data['footer']		= "footer";
        
        $data['jenis_infrastruktur']    = $this->m_tiket->jenis();
        $data['lokasi_infrastruktur']   = $this->m_tiket->lokasi();

        $this->load->view('template', $data);
	}

    public function save_tiket()
	{
        $this->form_validation->set_rules('user_pemohon','Nama User','required');
		$this->form_validation->set_rules('jenis','Jenis Infrastuktur','required');
        $this->form_validation->set_rules('model','Model Infrastruktur','required');
        $this->form_validation->set_rules('lokasi','Loaksi Infrastuktur','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');
        $this->form_validation->set_rules('telp','No. Telp.','required');

        if($this->form_validation->run() == FALSE) {
            $this->buat_tiket();
        } else {
            $user_pemohon	    = $this->input->post('user_pemohon');
            $jenis	            = $this->input->post('jenis');
            $model	            = $this->input->post('model');
            $lokasi	            = $this->input->post('lokasi');
            $lampiran			= $_FILES['lampiran']['name'];
            if($lampiran=''){}else{
                $config['upload_path'] 		= './uploads/';
                $config['allowed_types'] 	= 'jpg|jpeg|png|pdf';
                $config['max_size']			= 10240;
                $config['file_name']		= 'tiket-'.date('ymd').'-'.substr(md5(rand()),0,10);
                $this->load->library('upload',$config);
                if(!$this->upload->do_upload('lampiran')){
                    echo "Gagal Diupload !";
                }else{
                    $lampiran   =$this->upload->data('file_name');
                }
            }
            $keterangan	        = $this->input->post('keterangan');
            $telp	            = $this->input->post('telp');
            $tanggal	 		= date('Y-m-d H:i:s');

            $data = array(
                'user_pemohon'	=> $user_pemohon,
                'id_jenis'		    => $jenis,
                'model'	        => $model,
                'id_lokasi'		=> $lokasi,
                'lampiran'		=> $lampiran,
                'keterangan'	=> $keterangan,
                'telp'		    => $telp,
                'status'        => '1',
                'created'		=> $tanggal
            );

            $this->m_tiket->insert($data);
            $datanya = "swal('Success', 'Data Tiket Anda telah terkirim', 'success');";
            $this->session->set_flashdata("message", $datanya);
            redirect(base_url());
        }
	}

    public function list_tiket()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/list_tiket";

        $data['data_tiket']     = $this->m_tiket->list_tiket();
    
        $this->load->view('admin/template/template', $data);
    }

}