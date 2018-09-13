<?php

class Kas_model extends CI_model 
{
    public function select_data()
    {
        $query = "SELECT k.*, m.nama as nama_admin FROM kas_masjid k, master_login m WHERE k.id_admin = m.id_admin";
        return $this->db->query($query)->result();
    }

    public function insertData($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function deleteData($table,$id)
    {
        $this->db->where('id',$id);
        $this->db->delete('kas_masjid');
        return true;
    }
    
    
}