<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_teknisi extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    public function list_teknisi()
	{
		$data = $this->db
			->select('*')
			->from('teknisi')
            ->order_by('id', 'ASC')
			->get()->result();
		return $data;
	}

	public function insert($data)
	{
		$this->db->insert('teknisi',$data);
	}

}
?>
