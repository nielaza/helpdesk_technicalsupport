<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jenis extends CI_Model 
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

}
?>
