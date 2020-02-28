<?php

class Jadwal_jumat_model extends CI_model
{
    public function sel_date($t1, $t2)
    {
        return $this->db->query("SELECT *,date_format(tanggal, '%d-%M-%Y') as tgl FROM jadwal
          WHERE kode_jadwal = 2
          AND date_format(tanggal, '%Y%m%d') >= '$t1'
          AND date_format(tanggal, '%Y%m%d') <= '$t2'
          ORDER BY tanggal ASC")->result();
    }

    public function setDatatables($tanggalAwal,$tanggalAkhir)
    {
        $this->datatables->select("id,kode_jadwal,imam,bilal,ceramah,tanggal");
        $this->datatables->from("jadwal");
        $this->datatables->where("kode_jadwal", 2);
        $this->datatables->where("tanggal >=", $tanggalAwal);
        $this->datatables->where("tanggal <=", $tanggalAkhir);
        function callback_ceramah($kode){
            if ($kode == 1) {
                $ceramah = "Ceramah";
            }else{
                $ceramah = "Tidak";
            }
            return $ceramah;
        }
        $this->datatables->add_column("ceramah_convert","$1","callback_ceramah(ceramah)");
        $this->datatables->add_column("action",
        "<a href='javascript:void(0)' class='btnEdit btn btn-warning btn-xs' title='Edit' data-id='$1' data-imam='$3' data-bilal='$4' data-ceramah='$5' data-tanggal='$6'><i class='fa fa-edit'></i></a> <a href='javascript:void(0)' class='btnDelete btn btn-danger btn-xs' data-id='$1' data-imam='$3' data-bilal='$4' data-tanggal='$6'><i class='fa fa-trash-alt'></i></a>",
        'id,kode_jadwal,imam,bilal,ceramah,tanggal');
        return $this->datatables->generate();
   }

    public function InsertJadwal($table, $data)
    {
        return $this->db->insert($table, $data);
    }

    public function UpdateJadwal($table, $data, $id, $kode)
    {
        return $this->db->update($table, $data, array('id' => $id, 'kode_jadwal' => $kode));
    }

    public function DeleteData($table, $id)
    {
        return $this->db->delete($table, array('id' => $id));
    }
}