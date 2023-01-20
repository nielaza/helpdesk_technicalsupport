<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_inventory extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    public function list_inventory()
	{
		$data = $this->db
			->select('inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi')
			->from('inventory_komputer')
			->join('jenis_hardware', 'inventory_komputer.jenis_infrastruktur = jenis_hardware.id', 'left')
			->join('kondisi', 'inventory_komputer.kondisi = kondisi.id', 'left')
			->join('sumber_dana', 'inventory_komputer.sumber_dana = sumber_dana.id', 'left')
			->join('kelengkapan', 'inventory_komputer.kelengkapan = kelengkapan.id', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
            ->order_by('inventory_komputer.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function kondisi()
    {
		$data = $this->db
			->select('*')
			->from('kondisi')
			->order_by('kondisi', 'ASC')
			->get()->result();
		return $data;
    }

	public function kondisi_inventory($id_kondisi)
	{
		$data = $this->db
			->select('inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi')
			->from('inventory_komputer')
			->join('jenis_hardware', 'inventory_komputer.jenis_infrastruktur = jenis_hardware.id', 'left')
			->join('kondisi', 'inventory_komputer.kondisi = kondisi.id', 'left')
			->join('sumber_dana', 'inventory_komputer.sumber_dana = sumber_dana.id', 'left')
			->join('kelengkapan', 'inventory_komputer.kelengkapan = kelengkapan.id', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->where('inventory_komputer.kondisi', $id_kondisi)
            ->order_by('inventory_komputer.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('jenis_hardware',$data);
	}

	public function piejenis()
    {
		$data = $this->db
			->select('COUNT(*) AS jumjenis, inventory_komputer.jenis_infrastruktur, jenis_hardware.jenis')
			->from(' inventory_komputer')
            ->join('jenis_hardware', ' inventory_komputer.jenis_infrastruktur = jenis_hardware.id', 'left')
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

	public function all()
    {
		$data = $this->db
			->select('COUNT(*) AS total')
			->from('inventory_komputer')
			->get()->row();
		return $data;
    }

	public function baik()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_baik')
			->from('inventory_komputer')
			->where('kondisi', 1)
			->get()->row();
		return $data;
    }

	public function bermasalah()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_bermasalah')
			->from('inventory_komputer')
			->where('kondisi', 2)
			->get()->row();
		return $data;
    }

	public function rusak()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_rusak')
			->from('inventory_komputer')
			->where('kondisi', 3)
			->get()->row();
		return $data;
    }

	public function jenis()
	{
		$data = $this->db
			->select('*')
			->from('jenis_hardware')
            ->order_by('jenis', 'ASC')
			->get()->result();
		return $data;
	}

	public function sumber()
	{
		$data = $this->db
			->select('*')
			->from('sumber_dana')
            ->order_by('sumber', 'ASC')
			->get()->result();
		return $data;
	}

	public function kelengkapan()
	{
		$data = $this->db
			->select('*')
			->from('kelengkapan')
            ->order_by('kelengkapan', 'ASC')
			->get()->result();
		return $data;
	}

	public function lokasi()
	{
		$data = $this->db
			->select('*')
			->from('lokasi_infrastruktur')
            ->order_by('lokasi', 'ASC')
			->get()->result();
		return $data;
	}

	public function hasil_cari($where)
	{
		$data = $this->db
			->select('inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi')
			->from('inventory_komputer')
			->join('jenis_hardware', 'inventory_komputer.jenis_infrastruktur = jenis_hardware.id', 'left')
			->join('kondisi', 'inventory_komputer.kondisi = kondisi.id', 'left')
			->join('sumber_dana', 'inventory_komputer.sumber_dana = sumber_dana.id', 'left')
			->join('kelengkapan', 'inventory_komputer.kelengkapan = kelengkapan.id', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
            ->order_by('inventory_komputer.no_barang', 'ASC')
			->get()->result();
		return $data;
	}

}
?>
