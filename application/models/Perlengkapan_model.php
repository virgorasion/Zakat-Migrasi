<?php

class Perlengkapan_model extends CI_Model
{
    private $nama_db = "perlengkapan";

    public function dataPerlengkapan()
    {
        $get = $this->db->select("p.id,r.nama_ruang,p.nama_barang,p.kondisi,p.jumlah")->from("perlengkapan p, ruangan_masjid r")->where("p.id_ruang = r.id")->get();
        return $get;
    }

    public function dataPerlengkapanTiapRuangan($kode_ruangan)
    {
        $this->datatables->select('p.id,p.id_ruang,p.nama_barang,p.kondisi,p.jumlah,r.nama_ruang');
        $this->datatables->from("perlengkapan p, ruangan_masjid r");
        $this->datatables->where("p.id_ruang = r.id");
        $this->datatables->where("p.id_ruang", $kode_ruangan);
        $this->datatables->add_column('action', 
        '<a href="javascript:void(0)" class="edit_data btn btn-warning btn-xs" title="Edit" data-id="$1" data-id_ruang="$2" data-barang="$3" data-kondisi="$4" data-jumlah="$5" data-ruang="$6"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" class="delete_data btn btn-danger btn-xs" data-id="$1" data-barang="$3" data-ruang="$6"><i class="fa fa-remove"></i></a>', 
        'id,
        id_ruang,
        nama_barang,
        kondisi,
        jumlah,
        nama_ruang');
        return $this->datatables->generate();
    }

    public function dataRuangan()
    {
        $get = $this->db->select("*")->from("ruangan_masjid")->get();
        return $get;
    }
}
