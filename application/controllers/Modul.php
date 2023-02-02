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
        $this->load->model('m_tiket');
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

    public function daftar_tiket()
    {
        $data['header']     = "header";
        $data['content']	= "daftar_tiket";
        $data['footer']		= "footer";

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

        $data['data_tiket']     = $this->m_tiket->daftar_tiket();
    
        $this->load->view('template', $data);
    }
    
    public function buat_tiket()
	{
        $data['header']     = "header";
        $data['content']	= "form_tiket";
        $data['footer']		= "footer";

        $date	     		= date('Y-m-d');

        $where1 = array(
            'id_lokasi'     => '11',
            'status'        => '3'
            // 'created'       => $date
        );

        $cek1 = $this->m_tiket->cek_tiket('tiket',$where1)->num_rows();
        // var_dump($cek1);
        
        $data['jenis_infrastruktur']        = $this->m_tiket->jenis();
        $data['lokasi_infrastruktur']       = $this->m_tiket->lokasi();
        $data['sublokasi_infrastruktur']    = $this->m_tiket->sublokasi();

        $this->load->view('template', $data);
	}

    public function data_sublokasi()
    {
        $id_lokasi = $_POST['lokasi'];
        if ($id_lokasi == '') {
            exit;
        } else {
            $get_sublokasi = $this->db->query("SELECT * FROM sub_lokasi_infrastruktur WHERE id_lokasi ='$id_lokasi' ORDER BY id ASC")->result();
            echo '<option value="">--Pilih Sub Lokasi Infrastruktur--</option>';
            foreach ($get_sublokasi as $data) {
                echo '<option value="' . $data->id . '">' . $data->sub_lokasi . '</option>';
            }
            exit;
        }
    }

    public function save_tiket()
	{
        $this->form_validation->set_rules('user_pemohon','Nama User','required');
		$this->form_validation->set_rules('jenis','Jenis Infrastuktur','required');
        $this->form_validation->set_rules('model','Model Infrastruktur','required');
        $this->form_validation->set_rules('lokasi','Loaksi Infrastuktur','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');
        $this->form_validation->set_rules('telp','No. Telp.','required');

        $kode_tiket		    = $this->m_tiket->getkodetiket();
        $user_pemohon	    = $this->input->post('user_pemohon');
        $jenis	            = $this->input->post('jenis');
        $model	            = $this->input->post('model');
        $lokasi	            = $this->input->post('lokasi');
        $sub_lokasi	        = $this->input->post('sub_lokasi');
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
        $date	     		= date('Y-m-d');

        $where1 = array(
            'id_lokasi'     => $lokasi,
            'status'        => '3'
            // 'created'       => $date
        );

        $cek1 = $this->m_tiket->cek_tiket('tiket',$where1)->num_rows();

        if($cek1 < 3){

            if($this->form_validation->run() == FALSE) {
                $this->session->set_flashdata('error', validation_errors());
                $this->buat_tiket();
            } else {
    
                $data = array(
                    'kode_tiket'	=> $kode_tiket,
                    'user_pemohon'	=> $user_pemohon,
                    'id_jenis'		=> $jenis,
                    'model'	        => $model,
                    'id_lokasi'		=> $lokasi,
                    'id_sublokasi'  => $sub_lokasi,
                    'lampiran'		=> $lampiran,
                    'keterangan'	=> $keterangan,
                    'telp'		    => $telp,
                    'status'        => '1',
                    'created'		=> $tanggal
                );
    
                $this->m_tiket->insert($data);
                $this->session->set_flashdata('success','Sukses, Tiket berhasil dibuat');
                redirect(base_url());
            }

        }else{
            $this->session->set_flashdata('error','Gagal, Tiket gagal dibuat');
            redirect(base_url());
        }
	}
}