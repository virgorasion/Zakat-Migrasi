<?php

class Takmir_model extends CI_model
{
    public function getUsers()
    {
        return $this->db->select('*')->from('list_anggota')->where('status_aktif', 1)->get();
    }

    public function getPetugas()
    {
        $query = $this->db->select('*')
                    ->from('list_petugas')
                    ->join('list_anggota', 'list_anggota.id_anggota = list_petugas.id_anggota')
                    ->where('list_anggota.status_aktif', 1)
                    ->get();
        return $query;
    }
    
    
}