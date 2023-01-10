<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_teknisi extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    function list_teknisi()
	{
		$data = $this->db
			->select('*')
			->from('teknisi')
            ->order_by('id', 'ASC')
			->get()->result();
		return $data;
	}

	function insert($data)
	{
		$this->db->insert('teknisi',$data);
	}

}
?>
