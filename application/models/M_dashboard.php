<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_dashboard extends CI_Model 
{
	// constrcutor
	function __construct(){
		parent::__construct();
	}

    function list_jenis()
	{
		$data = $this->db
			->select('*')
			->from('jenis_infrastruktur')
            ->order_by('jenis', 'ASC')
			->get()->result();
		return $data;
	}

	function insert($data)
	{
		$this->db->insert('jenis_infrastruktur',$data);
	}

	public function linebulan()
    {
        $query = $this->db->query("SELECT MONTHNAME(created) AS bulan, COUNT(*) AS jumbulan FROM tiket 
                                   WHERE YEAR(created)=YEAR(NOW())
                                   GROUP BY MONTHNAME(created) 
                                   ORDER BY MONTH(created) ASC");
        return $query;
    }

	// public function bar_teknisi()
    // {
	// 	$query = $this->db->query("SELECT B.nama_teknisi, COUNT(*) AS total FROM tiket A 
    //                                LEFT JOIN teknisi B ON A.id_teknisi = B.id 
    //                                WHERE YEAR(A.created)=YEAR(NOW()) AND A.status NOT IN (0)
    //                                GROUP BY A.id");
    //     return $query;
    // }

	public function piestatus()
    {
      $query = $this->db->query("SELECT status, COUNT(*) AS jumstat FROM tiket 
                                  WHERE YEAR(created)=YEAR(NOW()) 
                                  GROUP BY status ORDER BY status ASC");
      return $query;
    }

	public function pieteknisi()
    {
      $query = $this->db->query("SELECT id_teknisi, COUNT(*) AS total FROM tiket 
                                  WHERE YEAR(created)=YEAR(NOW()) 
                                  GROUP BY id_teknisi ORDER BY id_teknisi ASC");
      return $query;
    }

    public function bar_jenis()
    {
        $query = $this->db->query("SELECT B.jenis, COUNT(*) AS total FROM tiket A 
                                   LEFT JOIN jenis_infrastruktur B ON A.id_jenis = B.id 
                                   WHERE YEAR(A.created)=YEAR(NOW()) AND A.status NOT IN (0)
                                   GROUP BY A.id_jenis");
        return $query;
    }

    public function bar_lokasi()
    {
        $query = $this->db->query("SELECT B.lokasi, COUNT(*) AS total FROM tiket A 
                                   LEFT JOIN lokasi_infrastruktur B ON A.id_lokasi = B.id 
                                   WHERE YEAR(A.created)=YEAR(NOW()) AND A.status NOT IN (0)
                                   GROUP BY A.id_lokasi");
        return $query;
    }

}
?>
