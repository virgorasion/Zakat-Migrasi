<?php

class Kas_model extends CI_model 
{

    public function get_kas_data()
    {
        $this->datatables->select('kas_masjid.nama_donatur,kas_masjid.tipe,kas_masjid.jumlah,kas_masjid.tanggal,kas_masjid.kategori,master_login.nama,kas_masjid.id');
        $this->datatables->from('kas_masjid');
        $this->datatables->join('master_login', 'master_login.id_admin = kas_masjid.id_admin');
        $this->datatables->add_column('action','<a href="#" data-namaDonatur="$1" data-tipe="$2" data-jumlah="$3" data-keterangan="$4" data-tanggal="$5" data-kategori="$6">
                                                <span data-placement="top" data-toggle="tooltip" title="Edit"></span>
                                                <button id="btnEdit" class="btn btn-warning btn-xs btnEdit" data-title="Edit">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </button>
                                            </a>
                                            <a href="#" data-id="$7">
                                                <span data-placement="top" data-toggle="tooltip" title="Delete"></span>
                                                <button id="btnDelete" class="btn btn-danger btn-xs btnDelete" data-title="Delete">
                                                    <span class="glyphicon glyphicon-remove"></span>
                                                </button>
                                            </a>', 'kas_masjid.nama_donatur,kas_masjid.tipe,kas_masjid.jumlah,kas_masjid.tanggal,kas_masjid.kategori,master_login.nama');
        return $this->datatables->generate();

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