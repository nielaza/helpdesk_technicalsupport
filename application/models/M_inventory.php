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
			->select('inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi, seksi.seksi')
			->from('inventory_komputer')
			->join('jenis_hardware', 'inventory_komputer.jenis_infrastruktur = jenis_hardware.id', 'left')
			->join('kondisi', 'inventory_komputer.id_kondisi = kondisi.id', 'left')
			->join('sumber_dana', 'inventory_komputer.sumber_dana = sumber_dana.id', 'left')
			->join('kelengkapan', 'inventory_komputer.id_kelengkapan = kelengkapan.id', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->join('seksi', 'inventory_komputer.id_seksi = seksi.id', 'left')
            ->order_by('inventory_komputer.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function inventory($id)
	{
		$data = $this->db
			->select('inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi, seksi.seksi')
			->from('inventory_komputer')
			->join('jenis_hardware', 'inventory_komputer.jenis_infrastruktur = jenis_hardware.id', 'left')
			->join('kondisi', 'inventory_komputer.id_kondisi = kondisi.id', 'left')
			->join('sumber_dana', 'inventory_komputer.sumber_dana = sumber_dana.id', 'left')
			->join('kelengkapan', 'inventory_komputer.id_kelengkapan = kelengkapan.id', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->join('seksi', 'inventory_komputer.id_seksi = seksi.id', 'left')
			->where('inventory_komputer.id', $id)
			->get()->result();
		return $data;
	}

	public function all_pemeliharaan()
	{
		$data = $this->db
			->select('inventory_pemeliharaan.*, inventory_komputer.barcode, inventory_komputer.pengguna, inventory_komputer.bidang_unit, inventory_komputer.id_seksi, lokasi_infrastruktur.lokasi, seksi.seksi')
			->from('inventory_pemeliharaan')
			->join('inventory_komputer', 'inventory_pemeliharaan.barcode = inventory_komputer.barcode', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->join('seksi', 'inventory_komputer.id_seksi = seksi.id', 'left')
            ->order_by('inventory_pemeliharaan.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function inv_pemeliharaan($barcode)
	{
		$data = $this->db
			->select('inventory_pemeliharaan.*, inventory_komputer.barcode, inventory_komputer.pengguna, inventory_komputer.bidang_unit, inventory_komputer.id_seksi, lokasi_infrastruktur.lokasi, seksi.seksi')
			->from('inventory_pemeliharaan')
			->join('inventory_komputer', 'inventory_pemeliharaan.barcode = inventory_komputer.barcode', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->join('seksi', 'inventory_komputer.id_seksi = seksi.id', 'left')
			->where('inventory_pemeliharaan.barcode', $barcode)
            ->order_by('inventory_pemeliharaan.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function pemeliharaan($barcode)
	{
		$data = $this->db
			->select('inventory_komputer.barcode, inventory_komputer.pengguna, inventory_komputer.bidang_unit, inventory_komputer.id_seksi, lokasi_infrastruktur.lokasi, seksi.seksi')
			->from('inventory_komputer')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->join('seksi', 'inventory_komputer.id_seksi = seksi.id', 'left')
			->where('inventory_komputer.barcode', $barcode)
			->get()->result();
		return $data;
	}

	public function pemel($id)
	{
		$data = $this->db
			->select('inventory_pemeliharaan.*, inventory_komputer.barcode, inventory_komputer.pengguna, inventory_komputer.bidang_unit, inventory_komputer.id_seksi, lokasi_infrastruktur.lokasi, seksi.seksi')
			->from('inventory_pemeliharaan')
			->join('inventory_komputer', 'inventory_pemeliharaan.barcode = inventory_komputer.barcode', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->join('seksi', 'inventory_komputer.id_seksi = seksi.id', 'left')
			->where('inventory_pemeliharaan.id', $id)
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
			->select('inventory_komputer.*, jenis_hardware.jenis, kondisi.kondisi, sumber_dana.sumber, kelengkapan.kelengkapan, lokasi_infrastruktur.lokasi, seksi.seksi')
			->from('inventory_komputer')
			->join('jenis_hardware', 'inventory_komputer.jenis_infrastruktur = jenis_hardware.id', 'left')
			->join('kondisi', 'inventory_komputer.id_kondisi = kondisi.id', 'left')
			->join('sumber_dana', 'inventory_komputer.sumber_dana = sumber_dana.id', 'left')
			->join('kelengkapan', 'inventory_komputer.id_kelengkapan = kelengkapan.id', 'left')
			->join('lokasi_infrastruktur', 'inventory_komputer.bidang_unit = lokasi_infrastruktur.id', 'left')
			->join('seksi', 'inventory_komputer.id_seksi = seksi.id', 'left')
			->where('inventory_komputer.id_kondisi', $id_kondisi)
            ->order_by('inventory_komputer.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function insert($tabel,$data)
	{
		$this->db->insert($tabel,$data);
	}

	public function update_data($table,$where,$data){
		$this->db->where($where);
		$this->db->update($table,$data);
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
			->select('COUNT(*) AS jumlengkap, inventory_komputer.id_kelengkapan, kelengkapan.kelengkapan')
			->from('inventory_komputer')
            ->join('kelengkapan', 'inventory_komputer.id_kelengkapan = kelengkapan.id', 'left')
			->group_by('inventory_komputer.id_kelengkapan')
			->order_by('inventory_komputer.id_kelengkapan', 'ASC')
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
			->where('id_kondisi', 1)
			->get()->row();
		return $data;
    }

	public function bermasalah()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_bermasalah')
			->from('inventory_komputer')
			->where('id_kondisi', 2)
			->get()->row();
		return $data;
    }

	public function rusak()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_rusak')
			->from('inventory_komputer')
			->where('id_kondisi', 3)
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
            ->order_by('id', 'ASC')
			->get()->result();
		return $data;
	}

	public function sub_lokasi()
	{
		$data = $this->db
			->select('*')
			->from('sub_lokasi_infrastruktur')
            ->order_by('sub_lokasi', 'ASC')
			->get()->result();
		return $data;
	}

	public function seksi()
	{
		$data = $this->db
			->select('*')
			->from('seksi')
            ->order_by('seksi', 'ASC')
			->get()->result();
		return $data;
	}

}
?>
