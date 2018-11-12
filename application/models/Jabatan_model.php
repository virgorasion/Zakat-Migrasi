<?php

class Jabatan_model extends CI_model
{
    public function getAll()
    {
        return $this->db->select('*')->from('jabatan')->get()->result();
    }

    public function InsertDataJabatan($table, $data)
    {
        return $this->db->insert($table,$data);
    }
    
    public function UpdateDataJabatan($table,$data,$id)
    {
        return $this->db->update($table,$data, array('id' => $id));
    }
    
    public function DeleteDataJabatan($table, $id)
    {
        $this->db->delete($table, array('id' => $id));
    }
    
}