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

	public function piejenis()
    {
		$data = $this->db
			->select('COUNT(*) AS jumjenis, inventory_komputer.jenis_infrastruktur, jenis_infrastruktur.jenis')
			->from(' inventory_komputer')
            ->join('jenis_infrastruktur', ' inventory_komputer.jenis_infrastruktur = jenis_infrastruktur.id', 'left')
			->group_by('inventory_komputer.jenis_infrastruktur')
			->order_by('inventory_komputer.jenis_infrastruktur', 'ASC')
			->get();
		return $data;
    }

	public function piesumber()
    {
		$data = $this->db
			->select('COUNT(*) AS jumsumber, inventory_komputer.sumber_dana, sumber_dana.sumber')
			->from('inventory_komputer')
            ->join('sumber_dana', 'inventory_komputer.sumber_dana = sumber_dana.id', 'left')
			->group_by('inventory_komputer.sumber_dana')
			->order_by('inventory_komputer.sumber_dana', 'ASC')
			->get();
		return $data;
    }

	public function piekelengkapan()
    {
		$data = $this->db
			->select('COUNT(*) AS jumlengkap, inventory_komputer.kelengkapan, kelengkapan.kelengkapan')
			->from('inventory_komputer')
            ->join('kelengkapan', 'inventory_komputer.kelengkapan = kelengkapan.id', 'left')
			->group_by('inventory_komputer.kelengkapan')
			->order_by('inventory_komputer.kelengkapan', 'ASC')
			->get();
		return $data;
    }

    public function bar_tahun()
    {
		$data = $this->db
			->select('COUNT(*) AS jumtahun, tahun_pengadaan')
			->from('inventory_komputer')
			->group_by('tahun_pengadaan')
			->order_by('tahun_pengadaan', 'ASC')
			->get();
		return $data;
    }

    public function bar_lokasi()
    {
        $data = $this->db
			->select('COUNT(*) AS jumlokasi, inventory_komputer.bidang_unit, lokasi_infrastruktur.lokasi')
			->from('inventory_komputer')
            ->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->group_by('inventory_komputer.bidang_unit')
			->order_by('inventory_komputer.bidang_unit', 'ASC')
			->get();
		return $data;
    }

}
?>
