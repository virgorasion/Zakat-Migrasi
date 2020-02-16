<?php

class Lap_kotak_amal_model extends CI_model
{
    public function getDataTableKotakAmal()
    {
        $this->datatables->select("kas_masjid.id,kas_masjid.id_admin,master_login.nama,kas_masjid.nama_donatur,kas_masjid.jumlah,kas_masjid.keterangan,kas_masjid.tanggal,tipe_donasi.tipe");
        $this->datatables->from("kas_masjid");
        $this->datatables->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe");
        $this->datatables->join("master_login", "master_login.id_admin = kas_masjid.id_admin");
        $this->datatables->where("kas_masjid.kategori",1);
        function callback_tanggal($tanggal){
            $date = date_create($tanggal);
            $format = date_format($date, "d-F-Y");
            return $format;
        }
        $this->datatables->add_column("tanggal","$1","callback_tanggal(tanggal)");
        $this->datatables->add_column('action', '<a href="javascript:void(0)" class="edit_data btn btn-warning btn-xs" data-id="$1" data-id_admin="$2" data-donatur="$3" data-jumlah="$4" data-keterangan="$5" data-tanggal="$6" data-tipe="$7" data-nama_admin="$8"><i class="far fa-edit"></i></a> <a href="javascript:void(0)" class="delete_data btn btn-danger btn-xs" data-id="$1" data-donatur="$3" data-jumlah="$4" data-tanggal="$6" data-tipe="$7"><i class="fas fa-trash-alt"></i></a>', 
        'id,id_admin,nama_donatur,jumlah,keterangan,tanggal,tipe,nama');
        return $this->datatables->generate();
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