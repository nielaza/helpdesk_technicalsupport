<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tiket extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    public function jenis()
	{
		$data = $this->db
			->select('*')
			->from('jenis_infrastruktur')
            ->order_by('jenis', 'ASC')
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

	public function getkodetiket()
    {
        $query 	= $this->db->query("SELECT max(kode_tiket) AS max_code FROM tiket");
        $row 	= $query->row_array();

        $max_id 	= $row['max_code'];
        $max_fix 	= (int) substr($max_id, 9, 4);

        $max_kode 	= $max_fix + 1;

        $tanggal 	= date("d");
        $bulan 		= date("m");
        $tahun 		= date("Y");
		$short 		= substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3);

        $kode_tiket = "T" . $tahun . $bulan . $tanggal . sprintf("%03s", $max_kode) . $short;
        return $kode_tiket;
    }

	public function insert($data)
	{
		$this->db->insert('tiket',$data);
	}

	public function daftar_tiket()
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->order_by('tiket.id', 'ASC')
			->get()->result();
		return $data;
	}

    public function list_tiket()
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->order_by('tiket.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function unit_tiket($id_lokasi)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->where('tiket.id_lokasi', $id_lokasi)
			->order_by('tiket.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function tiket($id)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->where('tiket.id', $id)
			->get()->result();
		return $data;
	}

	public function cetak_teknisi($id_tiket)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->where('tiket.id', $id_tiket)
			->get()->result();
		return $data;
	}

	public function tiket_status($status)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->where('tiket.status', $status)
			->order_by('tiket.id', 'ASC')
			->get()->result();
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

	public function tiket_teknisi($status, $id_user)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->where('tiket.status', $status)
			->where('tiket.id_teknisi', $id_user)
			->order_by('tiket.id', 'ASC')
			->get()->result();
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

	public function tiket_unit($status, $id_lokasi)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->where('tiket.status', $status)
			->where('tiket.id_lokasi', $id_lokasi)
			->order_by('tiket.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function update($table, $data, $where){
		$this->db->update($table, $data, $where);
	}

	public function insert_review($data)
	{
		$this->db->insert('review_user',$data);
	}

	public function tiket_review()
	{
		$data = $this->db
			->select('review_user.*, tiket.kode_tiket, tiket.user_pemohon, tiket.created as tgl_tiket, user.nama_lengkap')
			->from('review_user')
            ->join('tiket', 'review_user.id_tiket = tiket.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->order_by('review_user.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function list_teknisi()
	{
		$data = $this->db
			->select('*')
			->from('user')
			->where('level', 'Teknisi')
            ->order_by('id', 'ASC')
			->get()->result();
		return $data;
	}

	public function tiket_group($kode_tiket)
	{
		$data = $this->db
			->select('tiket.*, tiket_group.kode_tiket as kodetiket_group, tiket_group.group_tiket as tiket_group, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
			->join('tiket_group', 'tiket.kode_tiket = tiket_group.group_tiket', 'left')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->where('tiket.group_tiket', $kode_tiket)
			->order_by('tiket.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function group_tiket($kode_tiket)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
			->from('tiket')
			// ->join('tiket_group', 'tiket.kode_tiket = tiket_group.group_tiket', 'left')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('user', 'tiket.id_teknisi = user.id', 'left')
			->where('tiket.kode_tiket', $kode_tiket)
			->order_by('tiket.id', 'ASC')
			->get()->result();
		return $data;
	}

	public function insert_group($data)
	{
		$this->db->insert('tiket_group',$data);
	}

	// public function rekap_tiket($where)
	// {
	// 	$data = $this->db
	// 		->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, user.nama_lengkap')
	// 		->from('tiket')
    //         ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
	// 		->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
	// 		->join('user', 'tiket.id_teknisi = user.id', 'left')
	// 		->order_by('tiket.id', 'DESC')
	// 		->get()->result();
	// 	return $data;
	// }

}
?>
