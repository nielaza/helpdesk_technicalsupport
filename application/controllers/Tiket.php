<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tiket extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
		$this->load->helper(['url','tanggal']);
		$this->load->library(['session','pagination']);
		$this->load->model('m_tiket');
    }

    public function proses_tiket($id)
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

    public function cetak_tiket($id)
	{
		$data['tiket']      = $this->m_tiket->tiket($id);
		
		$this->load->view('admin/tiket/cetak', $data);
	}

    public function cetak_unit($id)
	{
		$data['tiket']      = $this->m_tiket->tiket($id);
		
		$this->load->view('admin/tiket/cetak_unit', $data);
	}

    public function tiket_teknisi($id)
    {
        $data['title'] 		= "Rekap Technical Support";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/tiket_teknisi";

        $data['tiket']          = $this->m_tiket->tiket($id);
        $data['list_teknisi']   = $this->m_tiket->list_teknisi();
    
        $this->load->view('admin/template/template', $data);
    }

    public function cetaktiket_teknisi()
	{
        $id_tiket 	    = $this->input->post('id_tiket');
        $data['teknis'] = $this->input->post('teknisi');

        // $teknisi	    = $this->session->flashdata("nama_teknisi");
		$data['tiket']  = $this->m_tiket->cetak_teknisi($id_tiket);

        $this->load->view('admin/tiket/cetak_teknisi', $data);
	}

    public function cetak_grouptiket($id)
	{
		$data['tiket']  = $this->m_tiket->tiket($id);
		
		$this->load->view('admin/tiket/cetak_group', $data);
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
        $id_sublokasi       = $this->session->userdata('id_sublokasi');

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
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $data['data_tiket']     = $this->m_tiket->unit_tiket($id_sublokasi);    
        } else if ($level == 'Pimpinan'){
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $data['data_tiket']     = $this->m_tiket->unit_tiket($id_sublokasi);    
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
        $id_sublokasi       = $this->session->userdata('id_sublokasi');

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
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;
            

            $status = "1";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_sublokasi);    
        } else if ($level == 'Pimpinan'){
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;
            

            $status = "1";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_sublokasi);    
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
        $id_sublokasi       = $this->session->userdata('id_sublokasi');

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
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "2";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_sublokasi);    
        } else if ($level == 'Pimpinan'){
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "2";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_sublokasi);    
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
        $id_sublokasi       = $this->session->userdata('id_sublokasi');

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
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "3";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_sublokasi);    
        } else if ($level == 'Pimpinan'){
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "3";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_sublokasi);    
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
        $id_sublokasi       = $this->session->userdata('id_sublokasi');

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
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "4";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_sublokasi);    
        } else if ($level == 'Pimpinan'){
            $all                    = $this->m_tiket->unit_all($id_sublokasi);
            $data['semua_tiket']    = $all->jml_tiket;

            $new                    = $this->m_tiket->unit_new($id_sublokasi);
            $data['tiket_baru']     = $new->jml_newtiket;

            $proses                 = $this->m_tiket->unit_processed($id_sublokasi);
            $data['tiket_proses']   = $proses->jml_tiketproses;

            $selesai                = $this->m_tiket->unit_finished($id_sublokasi);
            $data['tiket_selesai']  = $selesai->jml_tiketselesai;

            $approved               = $this->m_tiket->unit_done($id_sublokasi);
            $data['tiket_approved'] = $approved->jml_tiketapproved;

            $status = "4";
            $data['data_tiket']     = $this->m_tiket->tiket_unit($status, $id_sublokasi);    
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
            $status             = $this->input->post('status');
            $jenis_pekerjaan    = $this->input->post('jenis_pekerjaan');

            $where = array(
				'id' => $id
			);

            $data = array(
                'status'	        => $status,
                'jenis_pekerjaan'	=> $jenis_pekerjaan
            );

            $this->m_tiket->update('tiket', $data, $where);

            // $data = array(
            //     'status'    	=> '3'
            // );
    
            $this->db->where('id', $id);
            $this->db->update('tiket', $data);

            $this->session->set_flashdata('success','Sukses, Berhasil Input Pengerjaan');
            redirect(base_url().'tiket/tiket_proses');
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

            $this->session->set_flashdata('success','Sukses, Berhasil Buat Review');
            redirect(base_url().'tiket/tiket_approved');
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

    public function rekap_teknisi()
    {
        $data['title'] 		= "Rekap Technical Support";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/rekap_teknisi";

        $data['teknisi']    = $this->m_tiket->list_teknisi();
    
        $this->load->view('admin/template/template', $data);
    }

    public function cari_teknisi()
	{	
		$teknisi        = $this->input->get('teknisi');
        $tgl1 			= $this->input->get('tgl1');
		$tgl2 			= $this->input->get('tgl2');
		
		$ada=0;
		$where = "";

		if ($teknisi!=""){
			if ($ada == 0){	
				$where .= "tiket.id_teknisi LIKE '%$teknisi%'";	
				$ada = 1;	
			} else {
				$where .= "AND tiket.id_teknisi LIKE '%$teknisi%'";
				$ada = 1;
			}
		}

        if($tgl1!="" and $tgl2==""){
			if ($ada==0)
			{
				$where .= " tiket.created LIKE '%$tgl1%'";
				$ada=1;
			} else {
				$where .= " AND tiket.created LIKE '%$tgl1%'";
				$ada=1;
			}
		} else if($tgl1!="" and $tgl2!=""){
			if ($ada==0)
			{
				$where .= " tiket.created between '$tgl1' and '$tgl2' ";
				$ada=1;
			} else {
				$where .= " AND tiket.created between '$tgl1' and '$tgl2'";
				$ada=1;
			}
		}

		if($where != ""){
		$this->session->set_userdata('wherenya',$where);
		}
		if($where ==""){
			$where = $this->session->userdata('wherenya');
			// $where .= "1";
		}
		
		$data['title'] 		= "Rekap Technical Support";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/hasil_rekap";
        
        // $data['data_tiket']  = $this->m_tiket->rekap_tiket($where);
        $data['data_tiket'] = $this->db->query("SELECT tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap 
        FROM tiket 
        LEFT JOIN jenis_infrastruktur ON tiket.id_jenis = jenis_infrastruktur.id
        LEFT JOIN lokasi_infrastruktur ON tiket.id_lokasi = lokasi_infrastruktur.id
        LEFT JOIN user ON tiket.id_teknisi = user.id
        WHERE $where 
        ORDER BY tiket.id ASC")->result();
    
        $this->load->view('admin/template/template', $data);
	}

	public function cetak_pencarian()
	{
		$where = $this->session->userdata('wherenya');
		// $data['data_tiket']  = $this->m_tiket->rekap_tiket($where);
        $data['data_tiket'] = $this->db->query("SELECT tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap 
        FROM tiket 
        LEFT JOIN jenis_infrastruktur ON tiket.id_jenis = jenis_infrastruktur.id
        LEFT JOIN lokasi_infrastruktur ON tiket.id_lokasi = lokasi_infrastruktur.id
        LEFT JOIN user ON tiket.id_teknisi = user.id
        WHERE $where 
        ORDER BY tiket.id ASC")->result();
		
		$this->load->view('admin/tiket/cetak_rekap', $data);
	}

    public function tiket_group($kode_tiket)
    {
        $data['title'] 		= "Data Group Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/list_grouptiket";

        $level      		= $this->session->userdata('level');
        $id_user            = $this->session->userdata('id');
        $id_lokasi          = $this->session->userdata('id_lokasi');

        $data['kode_tiket'] = $kode_tiket;
        $data['data_tiket'] = $this->m_tiket->tiket_group($kode_tiket);
    
        $this->load->view('admin/template/template', $data);
    }

    public function group_tiket($kode_tiket)
	{
        $data['title'] 		= "Input Group Tiket";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/tiket/add_grouptiket";

        $data['tiket']      = $this->m_tiket->group_tiket($kode_tiket);
        $data['jenis']      = $this->m_tiket->jenis();

        $this->load->view('admin/template/template', $data);
	}

    public function save_grouptiket()
	{
        $this->form_validation->set_rules('user_pemohon','Nama User','required');
		$this->form_validation->set_rules('jenis','Jenis Infrastuktur','required');
        $this->form_validation->set_rules('model','Model Infrastruktur','required');
        $this->form_validation->set_rules('keterangan','Keterangan','required');

        if($this->form_validation->run() == FALSE) {
            $this->tiket_all();
        } else {
            $kode_tiket		    = $this->m_tiket->getkodetiket();
            $group_tiket	    = $this->input->post('group_tiket');
            $user_pemohon	    = $this->input->post('user_pemohon');
            $jenis	            = $this->input->post('jenis');
            $model	            = $this->input->post('model');
            $lokasi	            = $this->input->post('lokasi');
            $keterangan	        = $this->input->post('keterangan');
            $jenis_pekerjaan    = $this->input->post('jenis_pekerjaan');
            $teknisi	        = $this->input->post('teknisi');
            $status	            = $this->input->post('status');
            $tanggal	 		= $this->input->post('tanggal');

            $data = array(
                'kode_tiket'	    => $kode_tiket,
                'group_tiket'	    => $group_tiket,
                'user_pemohon'	    => $user_pemohon,
                'id_jenis'		    => $jenis,
                'model'	            => $model,
                'id_lokasi'		    => $lokasi,
                'keterangan'	    => $keterangan,
                'jenis_pekerjaan'	=> $jenis_pekerjaan,
                'id_teknisi'        => $teknisi,
                'status'            => $status,
                'created'		    => $tanggal
            );
            $this->m_tiket->insert($data);

            $data = array(
                'kode_tiket'    	=> $kode_tiket,
                'group_tiket'    	=> $group_tiket
            );
            $this->m_tiket->insert_group($data);

            $this->session->set_flashdata('success','Sukses, Berhasil buat Group Tiket');
            redirect(base_url().'tiket/tiket_all');
        }
	}

    public function approve_tiket()
    {
        $tiket_id = $this->input->post('tiket_id'); 

        for ($i=0; $i < sizeof($tiket_id); $i++) 
        {             
            $data = array(
                'status'    => '4'
            );

            $this->db->where('id', $tiket_id[$i]);
            $this->db->update('tiket', $data);
        }

        $this->session->set_flashdata('success_approve','Sukses, Tiket telah di Approve by User');
        redirect(base_url().'tiket/tiket_selesai');
    }

    public function approval_tiket()
    {
        $tiket_id = $this->input->post('tiket_id'); 

        for ($i=0; $i < sizeof($tiket_id); $i++) 
        {             
            $data = array(
                'approval'    => '1'
            );

            $this->db->where('id', $tiket_id[$i]);
            $this->db->update('tiket', $data);
        }

        $this->session->set_flashdata('success_approve','Sukses, Tiket telah di Approval untuk ditangani');
        redirect(base_url().'tiket/tiket_baru');
    }

}