<?php

class Takmir_model extends CI_model
{
    public function getUsers()
    {
        return $this->db->select('*')->from('list_anggota')->get();
    }

    public function get_data_anggota()
    {
        $this->datatables->select('id_anggota, nama, alamat, no_hp, no_telp, jenis_kelamin');
        $this->datatables->from('list_anggota');
        $this->datatables->add_column(
            'action',
            '<a href="javascript:void(0)" class="edit_data btn btn-warning btn-xs" data-id="$1" data-nama="$2" data-alamat="$3" data-hp="$4" data-telp="$5" data-jk="$6"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" class="delete_data btn btn-danger btn-xs" data-nama="$2" data-id="$1"><i class="fa fa-remove"></i></a>',
        'id_anggota,
        nama,
        alamat,
        no_hp,
        no_telp,
        jenis_kelamin'
        );
        return $this->datatables->generate();
    }

    public function getPetugas()
    {
        $query = $this->db->select('*')
                    ->from('takmir')
                    ->join('list_anggota', 'list_anggota.id_anggota = takmir.id_anggota')
                    ->get();
        return $query;
    }

    public function InsertDataAnggota($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    
    public function getAnggotaAjax($table)
    {
        return $this->db->select('id_anggota,nama')->from($table)->where('status', 0)->get()->result();
    }
    
    public function UpdateDataAnggota($table,$data,$id)
    {
        return $this->db->update($table,$data,array('id_anggota' => $id));
    }

    public function HapusDataAnggota($table,$id_anggota)
    {
        return $this->db->delete($table, array('id_anggota' => $id_anggota));
    }
    
}