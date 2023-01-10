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
            $lampiran			= $_FILES['spk']['name'];
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
            redirect(base_url());
        }
	}

    public function list_tiket()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/list_tiket";


        $kondisi_baik       = $this->db->query("SELECT COUNT(id) AS jml_baik FROM inventory_komputer WHERE kondisi = 1")->row();
        $data['tiket_baru']     = $new->jml_newtiket;

        $kondisi_bermasalah = $this->db->query("SELECT COUNT(id) AS jml_bermasalah FROM inventory_komputer WHERE kondisi = 2")->row();
        $data['tiket_proses']   = $proses->jml_tiketproses;

        $kondisi_rusak      = $this->db->query("SELECT COUNT(id) AS jml_selesai FROM inventory_komputer WHERE kondisi = 3")->row();
        $data['tiket_selesai']  = $selesai->jml_tiketselesai;

        $data['label_perbulan']     = $this->m_dashboard->linebulan()->result();
        $data['label_teknisi']      = $this->m_dashboard->pieteknisi()->result();
        $data['label_status']       = $this->m_dashboard->piestatus()->result();
        $data['label_jenis']        = $this->m_dashboard->bar_jenis()->result();
        $data['label_lokasi']       = $this->m_dashboard->bar_lokasi()->result();

        $data['data_tiket'] = $this->m_tiket->list_tiket();
    
        $this->load->view('admin/template/template', $data);
    }

}