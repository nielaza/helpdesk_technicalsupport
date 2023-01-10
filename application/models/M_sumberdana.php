<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sumberdana extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    function list_sumberdana()
	{
		$data = $this->db
			->select('*')
			->from('sumber_dana')
            ->order_by('sumber', 'ASC')
			->get()->result();
		return $data;
	}

	function insert($data)
	{
		$this->db->insert('jenis_infrastruktur',$data);
	}

}
?>
