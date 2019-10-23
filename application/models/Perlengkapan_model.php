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
        $get = $this->db->select("*")->from("perlengkapan")->where("id_ruang", $kode_ruangan)->get();
        return $get;
    }

    public function dataRuangan()
    {
        $get = $this->db->select("*")->from("ruangan_masjid")->get();
        return $get;
    }
}
