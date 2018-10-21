<?php 
defined("BASEPATH") or exit("ERROR");

class Hak_akses_model extends CI_model{

    public function select_data()
    {
        return $this->db->get('menu_hak_akses');
    }

    public function insert_data($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function update_data($table,$data,$id)
    {
        $this->db->where('kode_akses', $id);
        return $this->db->update($table,$data);
    }
    
    public function delete_data($table,$id)
    {
        $this->db->where('kode_akses',$id);
        $this->db->delete($table);
    }
}