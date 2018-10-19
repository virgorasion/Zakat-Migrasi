<?php

class Kas_model extends CI_model 
{

    public function get_kas_data()
    {
        $this->datatables->select('kas_masjid.nama_donatur,kas_masjid.tipe,kas_masjid.jumlah,kas_masjid.tanggal,kas_masjid.kategori,master_login.nama,kas_masjid.id,kas_masjid.keterangan');
        $this->datatables->from('kas_masjid');
        $this->datatables->join('master_login', 'master_login.id_admin = kas_masjid.id_admin');
        $this->datatables->add_column('action', '<a href="javascript:void(0)" class="edit_data btn btn-warning btn-xs" data-donatur="$1" data-tipe="$2" data-jumlah="$3" data-keterangan="$8" data-tanggal="$4" data-kategori="$6" data-id=$7><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" class="delete_data btn btn-danger btn-xs" data-id="$7"><i class="fa fa-remove"></i></a>', 
        'nama_donatur,
        tipe,
        jumlah,
        tanggal,
        kategori,
        nama,
        id,
        keterangan');
        // $this->datatables->add_column('newTipe', $this->tipe('$1'), 'tipe');
        return $this->datatables->generate();

    }

    public function tipe($tipes)
    {
        if ($tipes == 1) {
            return "asdsad";
        }else {
            return "falses";
        }
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