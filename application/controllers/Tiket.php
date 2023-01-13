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
            $kode_tiket		    = $this->m_tiket->getkodetiket();
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
                'kode_tiket'	=> $kode_tiket,
                'user_pemohon'	=> $user_pemohon,
                'id_jenis'		=> $jenis,
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
            // $this->session->set_flashdata('success', 'Success Message...');  
            redirect(base_url());
        }
	}

    public function cetak_tiket($id)
	{
		$data['tiket']      = $this->m_tiket->tiket_cetak($id);
		
		$this->load->view('admin/tiket/cetak', $data);
	}

    public function tiket_all()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/list_tiket";

        $all                    = $this->m_tiket->all();
        $data['semua_tiket']    = $all->jml_tiket;

        $new                    = $this->m_tiket->baru();
        $data['tiket_baru']     = $new->jml_newtiket;

        $proses                 = $this->m_tiket->proses();
        $data['tiket_proses']   = $proses->jml_tiketproses;

        $selesai                = $this->m_tiket->selesai();
        $data['tiket_selesai']  = $selesai->jml_tiketselesai;

        $approved               = $this->m_tiket->approved();
        $data['tiket_approved'] = $approved->jml_tiketapproved;

        $data['data_tiket']     = $this->m_tiket->list_tiket();
    
        $this->load->view('admin/template/template', $data);
    }

    public function tiket_baru()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_baru";

        $all                    = $this->m_tiket->all();
        $data['semua_tiket']    = $all->jml_tiket;

        $new                    = $this->m_tiket->baru();
        $data['tiket_baru']     = $new->jml_newtiket;

        $proses                 = $this->m_tiket->proses();
        $data['tiket_proses']   = $proses->jml_tiketproses;

        $selesai                = $this->m_tiket->selesai();
        $data['tiket_selesai']  = $selesai->jml_tiketselesai;

        $approved               = $this->m_tiket->approved();
        $data['tiket_approved'] = $approved->jml_tiketapproved;

        $status = "1";
        $data['data_tiket']     = $this->m_tiket->tiket_status($status);
    
        $this->load->view('admin/template/template', $data);
    }

    public function tiket_proses()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_proses";

        $all                    = $this->m_tiket->all();
        $data['semua_tiket']    = $all->jml_tiket;

        $new                    = $this->m_tiket->baru();
        $data['tiket_baru']     = $new->jml_newtiket;

        $proses                 = $this->m_tiket->proses();
        $data['tiket_proses']   = $proses->jml_tiketproses;

        $selesai                = $this->m_tiket->selesai();
        $data['tiket_selesai']  = $selesai->jml_tiketselesai;

        $approved               = $this->m_tiket->approved();
        $data['tiket_approved'] = $approved->jml_tiketapproved;

        $status = "2";
        $data['data_tiket']     = $this->m_tiket->tiket_status($status);
    
        $this->load->view('admin/template/template', $data);
    }

    public function tiket_selesai()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_selesai";

        $all                    = $this->m_tiket->all();
        $data['semua_tiket']    = $all->jml_tiket;

        $new                    = $this->m_tiket->baru();
        $data['tiket_baru']     = $new->jml_newtiket;

        $proses                 = $this->m_tiket->proses();
        $data['tiket_proses']   = $proses->jml_tiketproses;

        $selesai                = $this->m_tiket->selesai();
        $data['tiket_selesai']  = $selesai->jml_tiketselesai;

        $approved               = $this->m_tiket->approved();
        $data['tiket_approved'] = $approved->jml_tiketapproved;

        $status = "3";
        $data['data_tiket']     = $this->m_tiket->tiket_status($status);
    
        $this->load->view('admin/template/template', $data);
    }

    public function tiket_approved()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_approved";

        $all                    = $this->m_tiket->all();
        $data['semua_tiket']    = $all->jml_tiket;

        $new                    = $this->m_tiket->baru();
        $data['tiket_baru']     = $new->jml_newtiket;

        $proses                 = $this->m_tiket->proses();
        $data['tiket_proses']   = $proses->jml_tiketproses;

        $selesai                = $this->m_tiket->selesai();
        $data['tiket_selesai']  = $selesai->jml_tiketselesai;

        $approved               = $this->m_tiket->approved();
        $data['tiket_approved'] = $approved->jml_tiketapproved;

        $status = "4";
        $data['data_tiket']     = $this->m_tiket->tiket_status($status);
    
        $this->load->view('admin/template/template', $data);
    }

}