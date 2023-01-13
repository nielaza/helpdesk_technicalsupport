<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_hardware extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    public function list_hardware()
	{
		$data = $this->db
			->select('*')
			->from('jenis_hardware')
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
