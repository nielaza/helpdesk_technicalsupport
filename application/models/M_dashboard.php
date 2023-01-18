<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    public function list_jenis()
	{
		$data = $this->db
			->select('*')
			->from('jenis_infrastruktur')
            ->order_by('jenis', 'ASC')
			->get()->result();
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('jenis_infrastruktur',$data);
	}

	public function linebulan()
    {
		$data = $this->db
			->select('MONTHNAME(created) AS bulan, COUNT(*) AS jumbulan')
			->from('tiket')
			->where('YEAR(created)', date('Y'))
			->group_by('MONTHNAME(created)')
			->order_by('MONTH(created)', 'ASC')
			->get();
		return $data;
    }

	public function piestatus()
    {
		$data = $this->db
			->select('status, COUNT(*) AS jumstat')
			->from('tiket')
			->where('YEAR(created)', date('Y'))
			->group_by('status')
			->order_by('status', 'ASC')
			->get();
		return $data;
    }

	public function pieteknisi()
    {
		$data = $this->db
			->select('id_teknisi, COUNT(*) AS total')
			->from('tiket')
			->where('YEAR(created)', date('Y'))
			->group_by('id_teknisi')
			->order_by('id_teknisi', 'ASC')
			->get();
		return $data;
    }

    public function bar_jenis()
    {
		$data = $this->db
			->select('COUNT(*) AS total, jenis_infrastruktur.jenis')
			->from(' tiket')
            ->join('jenis_infrastruktur', ' tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->where('YEAR(tiket.created)', date('Y'))
			->where_not_in('tiket.status', 0)
			->group_by('tiket.id_jenis')
			->get();
		return $data;
    }

    public function bar_lokasi()
    {
		$data = $this->db
			->select('COUNT(*) AS total, lokasi_infrastruktur.lokasi')
			->from(' tiket')
            ->join('lokasi_infrastruktur', ' tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->where('YEAR(tiket.created)', date('Y'))
			->where_not_in('tiket.status', 0)
			->group_by('tiket.id_lokasi')
			->get();
		return $data;
    }

	public function all()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiket')
			->from('tiket')
			->get()->row();
		return $data;
    }

	public function unit_all($id_lokasi)
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiket')
			->from('tiket')
			->where('id_lokasi', $id_lokasi)
			->get()->row();
		return $data;
    }

	public function baru()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_newtiket')
			->from('tiket')
			->where('status', 1)
			->get()->row();
		return $data;
    }

	public function proses()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketproses')
			->from('tiket')
			->where('status', 2)
			->get()->row();
		return $data;
    }

	public function selesai()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketselesai')
			->from('tiket')
			->where('status', 3)
			->get()->row();
		return $data;
    }

	public function approved()
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketapproved')
			->from('tiket')
			->where('status', 4)
			->get()->row();
		return $data;
    }

	////////////////////// Teknisi //////////////////////

	public function processed($id_user)
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketproses, teknisi.id_user')
			->from('tiket')
			->join('teknisi', 'tiket.id_teknisi = teknisi.id', 'left')
			->where('tiket.status', 2)
			->where('tiket.id_teknisi', $id_user)
			->get()->row();
		return $data;
    }

	public function finished($id_user)
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketselesai, teknisi.id_user')
			->from('tiket')
			->join('teknisi', 'tiket.id_teknisi = teknisi.id', 'left')
			->where('tiket.status', 3)
			->where('tiket.id_teknisi', $id_user)
			->get()->row();
		return $data;
    }

	public function done($id_user)
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketapproved, teknisi.id_user')
			->from('tiket')
			->join('teknisi', 'tiket.id_teknisi = teknisi.id', 'left')
			->where('tiket.status', 4)
			->where('tiket.id_teknisi', $id_user)
			->get()->row();
		return $data;
    }

	////////////////////// Unit //////////////////////

	public function unit_new($id_lokasi)
    {
		$data = $this->db
			->select('COUNT(*) AS jml_newtiket')
			->from('tiket')
			->where('status', 1)
			->where('id_lokasi', $id_lokasi)
			->get()->row();
		return $data;
    }

	public function unit_processed($id_lokasi)
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketproses')
			->from('tiket')
			->where('status', 2)
			->where('id_lokasi', $id_lokasi)
			->get()->row();
		return $data;
    }

	public function unit_finished($id_lokasi)
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketselesai')
			->from('tiket')
			->where('status', 3)
			->where('id_lokasi', $id_lokasi)
			->get()->row();
		return $data;
    }

	public function unit_done($id_lokasi)
    {
		$data = $this->db
			->select('COUNT(*) AS jml_tiketapproved')
			->from('tiket')
			->where('status', 4)
			->where('id_lokasi', $id_lokasi)
			->get()->row();
		return $data;
    }

}
?>
