<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kondisi extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    function list_kondisi()
	{
		$data = $this->db
			->select('*')
			->from('kondisi')
            ->order_by('kondisi', 'ASC')
			->get()->result();
		return $data;
	}

	function insert($data)
	{
		$this->db->insert('jenis_infrastruktur',$data);
	}

}
?>
