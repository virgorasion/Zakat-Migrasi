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

    public function Get_all()
    {
        return $this->db->select("jabatan.nama as jabatan,list_anggota.id_anggota,list_anggota.nama,list_anggota.alamat,list_anggota.no_hp,list_anggota.no_telp,list_anggota.jenis_kelamin")
                ->from("list_anggota")
                ->join("takmir", "takmir.id_anggota = list_anggota.id_anggota")
                ->join("jabatan", "jabatan.id = takmir.id_jabatan")
                ->where("status", 1)
                ->get();
    }

    public function getPetugas()
    {
        $query = $this->db->select('takmir.id,list_anggota.id_anggota,jabatan.id as jabatan_id,list_anggota.nama as nama_anggota, jabatan.nama as nama_jabatan')
                    ->from('takmir')
                    ->join('jabatan', 'jabatan.id = takmir.id_jabatan')
                    ->join('list_anggota', 'list_anggota.id_anggota = takmir.id_anggota')
                    ->order_by('jabatan.id', 'ASC')
                    ->get();
        return $query;
    }

    public function InsertDataAnggota($table,$data)
    {
        return $this->db->insert($table,$data);
    }
    
    public function InsertDataTakmir($table,$data)
    {
        $this->db->set('status', 1);
        $this->db->where('id_anggota', $data['id_anggota']);
        $this->db->update('list_anggota');
        return $this->db->insert($table,$data);
    }
    
    public function UpdateDataTakmir($table, $data, $id)
    {
        return $this->db->update($table, $data, array('id' => $id));
    }
    
    public function getAnggotaAjax($table)
    {
        return $this->db->select('id_anggota,nama')->from($table)->get()->result();
    }
    public function setAnggotaAjaxKhusus($table)
    {
        return $this->db->select('id_anggota,nama')->from($table)->where('status', 0)->get()->result();
    }

    public function getTakmirAjax($table)
    {
        return $this->db->select('id,nama')->from($table)->where('status_aktif', 1)->get()->result();
    }
    
    public function UpdateDataAnggota($table,$data,$id)
    {
        return $this->db->update($table,$data,array('id_anggota' => $id));
    }

    public function HapusDataAnggota($table,$id_anggota)
    {
        return $this->db->delete($table, array('id_anggota' => $id_anggota));
    }
    
    public function DeleteDataTakmir($table,$idTakmir, $idAnggota)
    {
        $this->db->set('status', 0);
        $this->db->where('id_anggota', $idAnggota);
        $this->db->update('list_anggota');
        return $this->db->delete($table, array('id' => $idTakmir));
    }
    
}