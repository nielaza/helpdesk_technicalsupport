<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kelengkapan extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    function list_kelengkapan()
	{
		$data = $this->db
			->select('*')
			->from('kelengkapan')
            ->order_by('kelengkapan', 'ASC')
			->get()->result();
		return $data;
	}

	function insert($data)
	{
		$this->db->insert('jenis_infrastruktur',$data);
	}

}
?>
