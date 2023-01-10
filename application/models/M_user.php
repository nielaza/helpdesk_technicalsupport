<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    function list_user()
	{
		$data = $this->db
			->select('*')
			->from('user')
            ->order_by('id', 'ASC')
			->get()->result();
		return $data;
	}

	function insert($data)
	{
		$this->db->insert('user',$data);
	}

}
?>
