<?php

class Lap_kotak_amal_model extends CI_model
{
    public function SelectAll()
    {
        return $this->db->select('*,date_format(tanggal, "%d-%M-%Y") as tgl')
                ->from('kas_masjid')
                ->join('master_login', 'master_login.id_admin = kas_masjid.id_admin')
                ->join('tipe_donasi', 'tipe_donasi.id_tipe = kas_masjid.id_tipe')
                ->where('kas_masjid.kategori = 1')
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
    
    public function Update($table,$data,$id)
    {
        return $this->db->where('id', $id)->update($table,$data);
    }
}