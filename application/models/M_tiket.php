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

    public function list_tiket()
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, teknisi.nama_teknisi')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('teknisi', 'tiket.id_teknisi = teknisi.id', 'left')
			->order_by('tiket.created', 'DESC')
			->get()->result();
		return $data;
	}

	public function tiket_cetak($id)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, teknisi.nama_teknisi')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('teknisi', 'tiket.id_teknisi = teknisi.id', 'left')
			->where('tiket.id', $id)
			->get()->result();
		return $data;
	}

	public function tiket_status($status)
	{
		$data = $this->db
			->select('tiket.*, jenis_infrastruktur.jenis, lokasi_infrastruktur.lokasi, teknisi.nama_teknisi')
			->from('tiket')
            ->join('jenis_infrastruktur', 'tiket.id_jenis = jenis_infrastruktur.id', 'left')
			->join('lokasi_infrastruktur', 'tiket.id_lokasi = lokasi_infrastruktur.id', 'left')
			->join('teknisi', 'tiket.id_teknisi = teknisi.id', 'left')
			->where('tiket.status', $status)
			->order_by('tiket.created', 'DESC')
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


}
?>
