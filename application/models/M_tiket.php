<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_tiket extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    function jenis()
	{
		$data = $this->db
			->select('*')
			->from('jenis_infrastruktur')
            ->order_by('jenis', 'ASC')
			->get()->result();
		return $data;
	}

    function lokasi()
	{
		$data = $this->db
			->select('*')
			->from('lokasi_infrastruktur')
            ->order_by('lokasi', 'ASC')
			->get()->result();
		return $data;
	}

	function insert($data)
	{
		$this->db->insert('tiket',$data);
	}

    function list_tiket()
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

}
?>
