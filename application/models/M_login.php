<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{
    public function login_cek($data)
    {
        return $this->db->get_where('user', $data);
    }

    public function update_data($res, $data, $table)
    {
        $this->db->where($res);
        $this->db->update($table, $data);
    }
}
?>
