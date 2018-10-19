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

        function tipe($tipe)
        {
            switch ($tipe) {
                case '1':
                    $tipe = "Amal Jumatan";
                    break;
                case '2':
                    $tipe = "Amal Ahad Ddhuha";
                    break;
                case '3':
                    $tipe = "Amal Tarawih";
                    break;
                case '4':
                    $tipe = "Amal Idul Fitri";
                    break;
                case '5':
                    $tipe = "Amal Idul Adha";
                    break;
                case '6':
                    $tipe = "Donatur Tetap";
                    break;
                case '7':
                    $tipe = "Donatur Tidak Tetap";
                    break;
                case '8':
                    $tipe = "Infaq";
                    break;
                default:
                    $tipe = "Undifined";
                    break;
            }
            return $tipe;
        }

        $this->datatables->add_column('newTipe', '$1', 'tipe(tipe)');
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