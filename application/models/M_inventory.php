<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventory extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    function list_inventory()
	{
		$data = $this->db
			->select('inventory_komputer.*, jenis_infrastruktur.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi')
			->from('inventory_komputer')
			->join('jenis_infrastruktur', 'inventory_komputer.jenis_infrastruktur = jenis_infrastruktur.id', 'left')
			->join('kondisi', 'inventory_komputer.kondisi = kondisi.id', 'left')
			->join('sumber_dana', 'inventory_komputer.sumber_dana = sumber_dana.id', 'left')
			->join('kelengkapan', 'inventory_komputer.kelengkapan = kelengkapan.id', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
            ->order_by('inventory_komputer.no_barang', 'ASC')
			->get()->result();
		return $data;
	}

	function insert($data)
	{
		$this->db->insert('jenis_infrastruktur',$data);
	}

}
?>
