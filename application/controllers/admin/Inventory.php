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

    public function add_inventory()
	{
        $data['title'] 		= "Input Inventory";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/add_inventory";

        $data['lokasi']         = $this->m_inventory->lokasi();
        $data['seksi']          = $this->m_inventory->seksi();
        $data['jenis']          = $this->m_inventory->jenis();
        $data['kelengkapan']    = $this->m_inventory->kelengkapan();
        $data['kondisi']        = $this->m_inventory->kondisi();
        $data['sumber_dana']    = $this->m_inventory->sumber();

        $this->load->view('admin/template/template', $data);
	}

    public function inventory_save()
	{
        $this->form_validation->set_rules('barcode','Barcode','required');
        $this->form_validation->set_rules('pengguna','Pengguna','required');
		$this->form_validation->set_rules('bidang_unit','Bidang / Unit','required');
        $this->form_validation->set_rules('seksi','Seksi','required');
        $this->form_validation->set_rules('jenis_infrastruktur','Jenis Infrastruktur','required');
        $this->form_validation->set_rules('kelengkapan','Kelengkapan','required');
        $this->form_validation->set_rules('kondisi','Kondisi','required');
        $this->form_validation->set_rules('lantai','Lantai','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->add_inventory();
        } else {
            $barcode	            = $this->input->post('barcode');
            $pengguna	            = $this->input->post('pengguna');
            $bidang_unit	        = $this->input->post('bidang_unit');
            $jenis_infrastruktur	= $this->input->post('jenis_infrastruktur');
            $kelengkapan	        = $this->input->post('kelengkapan');
            $serial_number	        = $this->input->post('serial_number');
            $nama_pc	            = $this->input->post('nama_pc');
            $kondisi	            = $this->input->post('kondisi');
            $tahun_pengadaan	    = $this->input->post('tahun_pengadaan');
            $seksi	                = $this->input->post('seksi');
            $lantai	                = $this->input->post('lantai');
            $sumber_dana	        = $this->input->post('sumber_dana');
            $pc_printer	            = $this->input->post('pc_printer');
            $processor	            = $this->input->post('processor');
            $sistem_operasi	        = $this->input->post('sistem_operasi');
            $ram_ddr	            = $this->input->post('ram_ddr');
            $ram_gb	                = $this->input->post('ram_gb');
            $hd_ssd	                = $this->input->post('hd_ssd');
            $hd_hdd	                = $this->input->post('hd_hdd');
            $grafik_card	        = $this->input->post('grafik_card');
            $ip_address	            = $this->input->post('ip_address');
            $mac_address	        = $this->input->post('mac_address');
    
            $data = array(
                'barcode'	            => $barcode,
                'pengguna'		        => $pengguna,
                'bidang_unit'		    => $bidang_unit,
                'jenis_infrastruktur'	=> $jenis_infrastruktur,
                'id_kelengkapan'		=> $kelengkapan,
                'serial_number'		    => $serial_number, 
                'nama_pc'		        => $nama_pc,
                'id_kondisi'		    => $kondisi,
                'tahun_pengadaan'	    => $tahun_pengadaan,
                'id_seksi'		        => $seksi,
                'lantai'		        => $lantai, 
                'sumber_dana'		    => $sumber_dana,
                'pc_printer'		    => $pc_printer,
                'processor'	            => $processor,
                'sistem_operasi'		=> $sistem_operasi,
                'ram_ddr'		        => $ram_ddr,                
                'ram_gb'	            => $ram_gb,
                'hd_ssd'		        => $hd_ssd,
                'hd_hdd'                => $hd_hdd,
                'grafik_card'		    => $grafik_card,
                'ip_address'            => $ip_address,
                'mac_address'	        => $mac_address
            );

            $this->m_inventory->insert('inventory_komputer',$data);
            $this->session->set_flashdata('success_addinv','Sukses, Data Inventory Berhasil Ditambah');
            redirect(base_url().'admin/inventory');
        }
    }

    public function edit_inventory($id)
	{
        $data['title'] 		= "Input Inventory";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/edit_inventory";

        $data['lokasi']             = $this->m_inventory->lokasi();
        $data['seksi']              = $this->m_inventory->seksi();
        $data['jenis']              = $this->m_inventory->jenis();
        $data['kelengkapan']        = $this->m_inventory->kelengkapan();
        $data['kondisi']            = $this->m_inventory->kondisi();
        $data['sumber_dana']        = $this->m_inventory->sumber();

        $data['inventory']     = $this->m_inventory->inventory($id);

        $this->load->view('admin/template/template', $data);
	}

    public function inventory_update()
	{
        $this->form_validation->set_rules('barcode','Barcode','required');
        $this->form_validation->set_rules('pengguna','Pengguna','required');
		$this->form_validation->set_rules('bidang_unit','Bidang / Unit','required');
        $this->form_validation->set_rules('seksi','Seksi','required');
        $this->form_validation->set_rules('jenis_infrastruktur','Jenis Infrastruktur','required');
        $this->form_validation->set_rules('kelengkapan','Kelengkapan','required');
        $this->form_validation->set_rules('kondisi','Kondisi','required');
        $this->form_validation->set_rules('lantai','Lantai','required');

        if($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            $this->edit_inventory();
        } else {
            $id				        = $this->input->post('id');
            $barcode	            = $this->input->post('barcode');
            $pengguna	            = $this->input->post('pengguna');
            $bidang_unit	        = $this->input->post('bidang_unit');
            $jenis_infrastruktur	= $this->input->post('jenis_infrastruktur');
            $kelengkapan	        = $this->input->post('kelengkapan');
            $serial_number	        = $this->input->post('serial_number');
            $nama_pc	            = $this->input->post('nama_pc');
            $kondisi	            = $this->input->post('kondisi');
            $tahun_pengadaan	    = $this->input->post('tahun_pengadaan');
            $seksi	                = $this->input->post('seksi');
            $lantai	                = $this->input->post('lantai');
            $sumber_dana	        = $this->input->post('sumber_dana');
            $pc_printer	            = $this->input->post('pc_printer');
            $processor	            = $this->input->post('processor');
            $sistem_operasi	        = $this->input->post('sistem_operasi');
            $ram_ddr	            = $this->input->post('ram_ddr');
            $ram_gb	                = $this->input->post('ram_gb');
            $hd_ssd	                = $this->input->post('hd_ssd');
            $hd_hdd	                = $this->input->post('hd_hdd');
            $grafik_card	        = $this->input->post('grafik_card');
            $ip_address	            = $this->input->post('ip_address');
            $mac_address	        = $this->input->post('mac_address');

            $where = array(
				'id' => $id
			);
    
            $data = array(
                'barcode'	            => $barcode,
                'pengguna'		        => $pengguna,
                'bidang_unit'		    => $bidang_unit,
                'jenis_infrastruktur'	=> $jenis_infrastruktur,
                'id_kelengkapan'		=> $kelengkapan,
                'serial_number'		    => $serial_number, 
                'nama_pc'		        => $nama_pc,
                'id_kondisi'		    => $kondisi,
                'tahun_pengadaan'	    => $tahun_pengadaan,
                'id_seksi'		        => $seksi,
                'lantai'		        => $lantai, 
                'sumber_dana'		    => $sumber_dana,
                'pc_printer'		    => $pc_printer,
                'processor'	            => $processor,
                'sistem_operasi'		=> $sistem_operasi,
                'ram_ddr'		        => $ram_ddr,                
                'ram_gb'	            => $ram_gb,
                'hd_ssd'		        => $hd_ssd,
                'hd_hdd'                => $hd_hdd,
                'grafik_card'		    => $grafik_card,
                'ip_address'            => $ip_address,
                'mac_address'	        => $mac_address
            );

            $this->m_inventory->update_data('inventory_komputer',$where,$data);
            $this->session->set_flashdata('success_updinv','Sukses, Berhasil Update Data Inventory');
            redirect(base_url().'admin/inventory');
        }
    }

    public function data_seksi()
    {
        $id_bidang = $_POST['bidang_unit'];
        if ($id_bidang == '') {
            exit;
        } else {
            $get_seksi = $this->db->query("SELECT * FROM seksi WHERE id_lokasi ='$id_bidang' ORDER BY id ASC")->result();
            echo '<option value="">--Pilih Seksi--</option>';
            foreach ($get_seksi as $data) {
                echo '<option value="' . $data->id . '">' . $data->seksi . '</option>';
            }
            exit;
        }
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
        $data['sub_lokasi']     = $this->m_inventory->sub_lokasi();
    
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
				$where .= "inventory_komputer.id_kondisi LIKE '%$kondisi%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.id_kondisi LIKE '%$kondisi%'";
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
				$where .= "inventory_komputer.id_kelengkapan LIKE '%$kelengkapan%'";	
				$ada = 1;	
			} else {
				$where .= "AND inventory_komputer.id_kelengkapan LIKE '%$kelengkapan%'";
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
        $data['data_inventory'] = $this->db->query("SELECT inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi, seksi.seksi
        FROM inventory_komputer 
        LEFT JOIN jenis_hardware ON inventory_komputer.jenis_infrastruktur = jenis_hardware.id
        LEFT JOIN kondisi ON inventory_komputer.id_kondisi = kondisi.id
        LEFT JOIN sumber_dana ON inventory_komputer.sumber_dana = sumber_dana.id
        LEFT JOIN kelengkapan ON inventory_komputer.id_kelengkapan = kelengkapan.id
        LEFT JOIN lokasi_infrastruktur ON inventory_komputer.bidang_unit = lokasi_infrastruktur.id
        LEFT JOIN seksi ON inventory_komputer.id_seksi = seksi.id
        WHERE $where 
        ORDER BY inventory_komputer.id ASC")->result();
    
        $this->load->view('admin/template/template', $data);
	}

	public function cetak_pencarian()
	{
		$where = $this->session->userdata('wherenya');
		// $data['data_inventory']  = $this->m_inventory->hasil_cari($where);
        $data['data_inventory'] = $this->db->query("SELECT inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi, seksi.seksi
        FROM inventory_komputer 
        LEFT JOIN jenis_hardware ON inventory_komputer.jenis_infrastruktur = jenis_hardware.id
        LEFT JOIN kondisi ON inventory_komputer.id_kondisi = kondisi.id
        LEFT JOIN sumber_dana ON inventory_komputer.sumber_dana = sumber_dana.id
        LEFT JOIN kelengkapan ON inventory_komputer.id_kelengkapan = kelengkapan.id
        LEFT JOIN lokasi_infrastruktur ON inventory_komputer.bidang_unit = lokasi_infrastruktur.id 
        LEFT JOIN seksi ON inventory_komputer.id_seksi = seksi.id
        WHERE $where 
        ORDER BY inventory_komputer.id ASC")->result();
		
		$this->load->view('admin/inventory/cetak', $data);
	}

    public function all_pemeliharaan()
    {
        $data['title'] 		= "Data Pemeliharaan";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/all_pemeliharaan";

        $data['data_pemeliharaan']  = $this->m_inventory->all_pemeliharaan();
    
        $this->load->view('admin/template/template', $data);
    }

    public function inv_pemeliharaan($barcode)
    {
        $data['title'] 		= "Data Pemeliharaan";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/inv_pemeliharaan";

        $data['barcode']            = $barcode;
        $data['data_pemeliharaan']  = $this->m_inventory->inv_pemeliharaan($barcode);
    
        $this->load->view('admin/template/template', $data);
    }

    public function add_pemeliharaan($barcode)
	{
        $data['title'] 		= "Input Pemeliharaan Inventory";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/add_pemeliharaan";

        $data['data_pemeliharaan']  = $this->m_inventory->pemeliharaan($barcode);

        $this->load->view('admin/template/template', $data);
	}

    public function pemeliharaan_save()
	{
        $this->form_validation->set_rules('keterangan','Keterangan','required');

        if($this->form_validation->run() == FALSE) {
            $this->add_pemeliharaan();
        } else {
            $barcode	        = $this->input->post('barcode');
            $keterangan	        = $this->input->post('keterangan');
            $tanggal	 		= date('Y-m-d H:i:s');

            $data = array(
                'barcode'	       => $barcode,
                'keterangan'	   => $keterangan,
                'date_update'	   => $tanggal
            );
            
            $this->m_inventory->insert('inventory_pemeliharaan',$data);
            $this->session->set_flashdata('success_addpemel','Sukses, Berhasil Tambah Data Pemeliharaan Inventory');
            redirect(base_url().'admin/inventory');
        }
	}

    public function edit_pemeliharaan($id)
	{
        $data['title'] 		= "Input Pemeliharaan Inventory";
        $data['navbar']     = "admin/template/navbar";
        $data['sidebar']	= "admin/template/sidebar";
        $data['body'] 		= "admin/inventory/edit_pemeliharaan";

        $data['data_pemeliharaan']  = $this->m_inventory->pemel($id);

        $this->load->view('admin/template/template', $data);
	}

    public function pemeliharaan_update()
	{
        $this->form_validation->set_rules('keterangan','Keterangan','required');

        if($this->form_validation->run() == FALSE) {
            $this->edit_pemeliharaan();
        } else {
            $id				    = $this->input->post('id');
            $barcode	        = $this->input->post('barcode');
            $keterangan	        = $this->input->post('keterangan');
            $tanggal	 		= date('Y-m-d H:i:s');

            $where = array(
				'id' => $id
			);

            $data = array(
                'barcode'	       => $barcode,
                'keterangan'	   => $keterangan,
                'date_update'	   => $tanggal
            );

            $this->m_inventory->update_data('inventory_pemeliharaan',$where,$data);
            $this->session->set_flashdata('success_updpemel','Sukses, Berhasil Update Data Pemeliharaan Inventory');
            redirect(base_url().'admin/inventory');
        }
	}

}
