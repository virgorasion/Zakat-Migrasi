<?php

class Lap_kotak_amal_model extends CI_model
{
    public function SelectAll()
    {
        return $this->db->select('*')
                ->from('lap_kotak_amal')
                ->join('master_login', 'master_login.id_admin = lap_kotak_amal.id_admin')
                ->get();
    }

    public function inputAll($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function deleteData($table,$id)
    {
        $this->db->where('id', $id);
        $this->db->delete($table);
        return true;
    }
}