<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lokasi extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    public function list_lokasi()
	{
		$data = $this->db
			->select('*')
			->from('lokasi_infrastruktur')
            ->order_by('lokasi', 'ASC')
			->get()->result();
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('lokasi',$data);
	}

}
?>
