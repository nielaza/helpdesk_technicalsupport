<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tiket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
		$this->load->helper(['url','tanggal']);
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
        $id_user            = $this->session->userdata('id');

        $data = array(
            'id_teknisi'	=> $id_user,
            'status'    	=> '2'
        );

        $this->db->where('id', $id);
        $this->db->update('tiket', $data);

		$data['tiket']      = $this->m_tiket->tiket($id);
		
		$this->load->view('admin/tiket/cetak', $data);
	}

    public function tiket_all()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/list_tiket";

        $level      		= $this->session->userdata('level');
        $id_user            = $this->session->userdata('id');
        $id_lokasi          = $this->session->userdata('id_lokasi');

        if($level == 'Teknisi'){
            $all                    = $this->m_tiket->all();
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->baru();
            $data['tiket_baru']     = $new->jml_newtiket;
    
            $proses                 = $this->m_tiket->processed($id_user);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->finished($id_user);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->done($id_user);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $data['data_tiket']     = $this->m_tiket->list_tiket();  
		} else if ($level == 'Unit'){
            $all                    = $this->m_tiket->unit_all($id_lokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_lokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_lokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_lokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_lokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $data['data_tiket']     = $this->m_tiket->unit_tiket($id_lokasi);    
	    } else {
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
        }
    
        $this->load->view('admin/template/template', $data);
    }

    public function tiket_baru()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_baru";

        $level      		= $this->session->userdata('level');
        $id_user            = $this->session->userdata('id');
        $id_lokasi          = $this->session->userdata('id_lokasi');

        if($level == 'Teknisi'){
            $all                    = $this->m_tiket->all();
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->baru();
            $data['tiket_baru']     = $new->jml_newtiket;
    
            $proses                 = $this->m_tiket->processed($id_user);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->finished($id_user);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->done($id_user);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "1";
            $data['data_tiket']     = $this->m_tiket->tiket_status($status);    
		} else if ($level == 'Unit'){
            $all                    = $this->m_tiket->unit_all($id_lokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_lokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_lokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_lokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_lokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;
            

            $status = "1";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_lokasi);    
	    } else {
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
        }
    
        $this->load->view('admin/template/template', $data);
    }

    public function tiket_proses()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_proses";

        $level      		= $this->session->userdata('level');
        $id_user            = $this->session->userdata('id');
        $id_lokasi          = $this->session->userdata('id_lokasi');

        if($level == 'Teknisi'){
            $all                    = $this->m_tiket->all();
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->baru();
            $data['tiket_baru']     = $new->jml_newtiket;
    
            $proses                 = $this->m_tiket->processed($id_user);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->finished($id_user);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->done($id_user);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "2";
            $data['data_tiket']     = $this->m_tiket->tiket_teknisi($status, $id_user);    
		} else if ($level == 'Unit'){
            $all                    = $this->m_tiket->unit_all($id_lokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_lokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_lokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_lokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_lokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "2";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_lokasi);    
	    } else {
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
        }
    
        $this->load->view('admin/template/template', $data);
    }

    public function tiket_selesai()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_selesai";

        $level      		= $this->session->userdata('level');
        $id_user            = $this->session->userdata('id');
        $id_lokasi          = $this->session->userdata('id_lokasi');

        if($level == 'Teknisi'){
            $all                    = $this->m_tiket->all();
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->baru();
            $data['tiket_baru']     = $new->jml_newtiket;
    
            $proses                 = $this->m_tiket->processed($id_user);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->finished($id_user);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->done($id_user);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "3";
            $data['data_tiket']     = $this->m_tiket->tiket_teknisi($status, $id_user);    
		} else if ($level == 'Unit'){
            $all                    = $this->m_tiket->unit_all($id_lokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_lokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_lokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_lokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_lokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "3";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_lokasi);    
	    } else {
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
        }
        
        $this->load->view('admin/template/template', $data);
    }

    public function tiket_approved()
    {
        $data['title'] 		= "Data Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_approved";

        $level      		= $this->session->userdata('level');
        $id_user            = $this->session->userdata('id');
        $id_lokasi          = $this->session->userdata('id_lokasi');

        if($level == 'Teknisi'){
            $all                    = $this->m_tiket->all();
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->baru();
            $data['tiket_baru']     = $new->jml_newtiket;
    
            $proses                 = $this->m_tiket->processed($id_user);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->finished($id_user);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->done($id_user);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "4";
            $data['data_tiket']     = $this->m_tiket->tiket_teknisi($status, $id_user);    
		} else if ($level == 'Unit'){
            $all                    = $this->m_tiket->unit_all($id_lokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_lokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_lokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_lokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_lokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "4";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_lokasi);    
	    } else {
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
        }
    
        $this->load->view('admin/template/template', $data);
    }

    public function pengerjaan($id)
	{
        $data['title'] 		= "Tiket Pengerjaan";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_pengerjaan";

        $data['tiket']      = $this->m_tiket->tiket($id);

        $this->load->view('admin/template/template', $data);
	}

    public function add_pengerjaan()
	{
        $this->form_validation->set_rules('jenis_pekerjaan','Jenis Pekerjaan','required');
        if($this->form_validation->run() == FALSE) {
            $this->pengerjaan();
        } else {
            $id_user            = $this->session->userdata('id');

            $id				    = $this->input->post('id');
            $jenis_pekerjaan    = $this->input->post('jenis_pekerjaan');

            $where = array(
				'id' => $id
			);

            $data = array(
                'jenis_pekerjaan'	=> $jenis_pekerjaan
            );

            $this->m_tiket->update('tiket', $data, $where);

            $data = array(
                'status'    	=> '3'
            );
    
            $this->db->where('id', $id);
            $this->db->update('tiket', $data);

            redirect(base_url().'tiket/tiket_all');
        }
	}

    public function rate_tiket($id)
	{
        $data['title'] 		= "Rate Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/rate_tiket";

        $data['tiket']      = $this->m_tiket->tiket($id);

        $this->load->view('admin/template/template', $data);
	}

    public function add_review()
	{
        $this->form_validation->set_rules('emot','Emot','required');
		$this->form_validation->set_rules('komentar','Komentar','required');

        if($this->form_validation->run() == FALSE) {
            $this->rate_tiket();
        } else {
            $id_user        = $this->session->userdata('id');

            $id             = $this->input->post('id');
            $emot	        = $this->input->post('emot');
            $komentar	    = $this->input->post('komentar');
            $tanggal	 	= date('Y-m-d H:i:s');

            $data = array(
                'id_tiket'	    => $id,
                'emot'	        => $emot,
                'komentar'	    => $komentar,
                'created'	    => $tanggal
            );

            $this->m_tiket->insert_review($data);

            $data = array(
                'status'    	=> '4'
            );

            $this->db->where('id', $id);
            $this->db->update('tiket', $data);

            redirect(base_url().'tiket/tiket_all');
        }
	}

    public function review()
	{
        $data['title'] 		= "Review User";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/review_user";

        $data['review']     = $this->m_tiket->tiket_review();

        $this->load->view('admin/template/template', $data);
	}

}