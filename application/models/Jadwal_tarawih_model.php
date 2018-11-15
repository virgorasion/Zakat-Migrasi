<?php

class Jadwal_tarawih_model extends CI_model
{
    public function sel_date($t1, $t2)
    {
        return $this->db->query("SELECT *,date_format(tanggal, '%d-%M-%Y') as tgl FROM jadwal
          WHERE kode_jadwal = 1
          AND date_format(tanggal, '%Y%m%d') >= '$t1'
          AND date_format(tanggal, '%Y%m%d') <= '$t2'
          ORDER BY tanggal ASC")->result();
    }
    
}