<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inventory extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!isset($_SESSION['username'])) {
            redirect(base_url('admin/auth/login'));
        }
        $this->load->model('m_inventory');
    }

    public function index()
    {
        $data['title'] 		= "Data Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/index";

        $jumlah_inventory   = $this->m_inventory->all();
        $data['all']        = $jumlah_inventory->total;

        $kondisi_baik       = $this->m_inventory->baik();
        $data['baik']       = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->m_inventory->bermasalah();
        $data['bermasalah'] = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->m_inventory->rusak();
        $data['rusak']      = $kondisi_rusak->jml_rusak;

        $data['label_jenishardware']    = $this->m_inventory->piejenis()->result();
        $data['label_sumberdana']       = $this->m_inventory->piesumber()->result();
        $data['label_kelengkapan']      = $this->m_inventory->piekelengkapan()->result();
        $data['label_thnpengadaan']     = $this->m_inventory->bar_tahun()->result();
        $data['label_lokasi']           = $this->m_inventory->bar_lokasi()->result();

        $data['data_inventory']  = $this->m_inventory->list_inventory();
    
        $this->load->view('admin/template/template', $data);
    }

    public function kondisi_baik()
    {
        $data['title'] 		= "Data Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/kondisi_baik";

        $jumlah_inventory   = $this->m_inventory->all();
        $data['all']        = $jumlah_inventory->total;

        $kondisi_baik       = $this->m_inventory->baik();
        $data['baik']       = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->m_inventory->bermasalah();
        $data['bermasalah'] = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->m_inventory->rusak();
        $data['rusak']      = $kondisi_rusak->jml_rusak;

        $id_kondisi = '1';
        $data['data_inventory']  = $this->m_inventory->kondisi_inventory($id_kondisi);
    
        $this->load->view('admin/template/template', $data);
    }

    public function kondisi_bermasalah()
    {
        $data['title'] 		= "Data Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/kondisi_bermasalah";

        $jumlah_inventory   = $this->m_inventory->all();
        $data['all']        = $jumlah_inventory->total;

        $kondisi_baik       = $this->m_inventory->baik();
        $data['baik']       = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->m_inventory->bermasalah();
        $data['bermasalah'] = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->m_inventory->rusak();
        $data['rusak']      = $kondisi_rusak->jml_rusak;

        $id_kondisi = '2';
        $data['data_inventory']  = $this->m_inventory->kondisi_inventory($id_kondisi);
    
        $this->load->view('admin/template/template', $data);
    }

    public function kondisi_rusak()
    {
        $data['title'] 		= "Data Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/kondisi_rusak";

        $jumlah_inventory   = $this->m_inventory->all();
        $data['all']        = $jumlah_inventory->total;

        $kondisi_baik       = $this->m_inventory->baik();
        $data['baik']       = $kondisi_baik->jml_baik;

        $kondisi_bermasalah = $this->m_inventory->bermasalah();
        $data['bermasalah'] = $kondisi_bermasalah->jml_bermasalah;

        $kondisi_rusak      = $this->m_inventory->rusak();
        $data['rusak']      = $kondisi_rusak->jml_rusak;

        $id_kondisi = '3';
        $data['data_inventory']  = $this->m_inventory->kondisi_inventory($id_kondisi);

        $this->load->view('admin/template/template', $data);
    }

    public function pencarian()
    {
        $data['title'] 		= "Pencarian Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/pencarian";

        $data['jenis_hardware'] = $this->m_inventory->jenis();
        $data['kondisi']        = $this->m_inventory->kondisi();
        $data['sumber_dana']    = $this->m_inventory->sumber();
        $data['kelengkapan']    = $this->m_inventory->kelengkapan();
        $data['lokasi']         = $this->m_inventory->lokasi();
    
        $this->load->view('admin/template/template', $data);
    }

    public function cari_inventory()
	{	
		$jenis 		        = $this->input->get('jenis');
		$kondisi 		    = $this->input->get('kondisi');
		$sumber_dana 	    = $this->input->get('sumber_dana');
		$tahun_pengadaan    = $this->input->get('tahun_pengadaan');
		$kelengkapan 	    = $this->input->get('kelengkapan');
		$lantai 	        = $this->input->get('lantai');
		$bidang_unit 		= $this->input->get('bidang_unit');
		$pengguna 	        = $this->input->get('pengguna');
		
		$ada=0;
		$where = "";

		if ($jenis!=""){
			if ($ada == 0){	
				$where .= "inventory_komputer.jenis_infrastruktur LIKE '%$jenis%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.jenis_infrastruktur LIKE '%$jenis%'";
				$ada = 1;
			}
		}

		if ($kondisi!=""){
			if ($ada == 0){	
				$where .= "inventory_komputer.kondisi LIKE '%$kondisi%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.kondisi LIKE '%$kondisi%'";
				$ada = 1;
			}
		}
		
		if ($sumber_dana!=""){
			if ($ada == 0){	
				$where .= "inventory_komputer.sumber_dana LIKE '%$sumber_dana%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.sumber_dana LIKE '%$sumber_dana%'";
				$ada = 1;
			}
		}

		if ($tahun_pengadaan!=""){
			if ($ada == 0){	
				$where .= "inventory_komputer.tahun_pengadaan LIKE '%$tahun_pengadaan%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.tahun_pengadaan LIKE '%$tahun_pengadaan%'";
				$ada = 1;
			}
		}

		if ($kelengkapan!=""){
			if ($ada == 0){	
				$where .= "inventory_komputer.kelengkapan LIKE '%$kelengkapan%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.kelengkapan LIKE '%$kelengkapan%'";
				$ada = 1;
			}
		}

		if ($lantai!=""){
			if ($ada == 0){	
				$where .= "inventory_komputer.lantai LIKE '%$lantai%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.lantai LIKE '%$lantai%'";
				$ada = 1;
			}
		}

		if ($bidang_unit!=""){
			if ($ada == 0){	
				$where .= "inventory_komputer.bidang_unit LIKE '%$bidang_unit%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.bidang_unit LIKE '%$bidang_unit%'";
				$ada = 1;
			}
		}

		if ($pengguna!=""){
			if ($ada == 0){	
				$where .= "inventory_komputer.pengguna LIKE '%$pengguna%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.pengguna LIKE '%$pengguna%'";
				$ada = 1;
			}
		}

		if($where != ""){
		$this->session->set_userdata('wherenya',$where);
		}
		if($where ==""){
			$where = $this->session->userdata('wherenya');
			// $where .= "1";
		}
		
		$data['title'] 		= "Pencarian Inventory Komputer";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/hasil_cari";
        
        // $data['data_inventory']  = $this->m_inventory->hasil_cari($where);
        $data['data_inventory'] = $this->db->query("SELECT inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi 
        FROM inventory_komputer 
        LEFT JOIN jenis_hardware ON inventory_komputer.jenis_infrastruktur = jenis_hardware.id
        LEFT JOIN kondisi ON inventory_komputer.kondisi = kondisi.id
        LEFT JOIN sumber_dana ON inventory_komputer.sumber_dana = sumber_dana.id
        LEFT JOIN kelengkapan ON inventory_komputer.kelengkapan = kelengkapan.id
        LEFT JOIN lokasi_infrastruktur ON inventory_komputer.bidang_unit = lokasi_infrastruktur.id 
        WHERE $where 
        ORDER BY inventory_komputer.id ASC")->result();
    
        $this->load->view('admin/template/template', $data);
	}

	public function cetak_pencarian()
	{
		$where = $this->session->userdata('wherenya');
		// $data['data_inventory']  = $this->m_inventory->hasil_cari($where);
        $data['data_inventory'] = $this->db->query("SELECT inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi 
        FROM inventory_komputer 
        LEFT JOIN jenis_hardware ON inventory_komputer.jenis_infrastruktur = jenis_hardware.id
        LEFT JOIN kondisi ON inventory_komputer.kondisi = kondisi.id
        LEFT JOIN sumber_dana ON inventory_komputer.sumber_dana = sumber_dana.id
        LEFT JOIN kelengkapan ON inventory_komputer.kelengkapan = kelengkapan.id
        LEFT JOIN lokasi_infrastruktur ON inventory_komputer.bidang_unit = lokasi_infrastruktur.id 
        WHERE $where 
        ORDER BY inventory_komputer.id ASC")->result();
		
		$this->load->view('admin/inventory/cetak', $data);
	}
}
