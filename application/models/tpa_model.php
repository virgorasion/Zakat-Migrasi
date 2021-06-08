<?php
defined("BASEPATH")or exit("ERROR");

class Tpa_model extends CI_model
{
    public function insert($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function update($table,$data,$id)
    {
        return $this->db->update($table,$data,$id);
    }

    public function delete($table,$id)
    {
        return $this->db->delete($table,$id);
    }

    public function getDataDaftarSantri()
    {
        return $this->db->get("tpq_santri");
    }

    public function getRaportSantri($id_santri)
    {
        $res = $this->db->select("tpq_raport.*,tpq_santri.nama,tpq_santri.id,tpq_guru.nama as nama_guru,tpq_guru.id,tpq_matapelajaran.id,tpq_matapelajaran.nama as mapel")
                        ->from("tpq_santri")
                        ->join("tpq_raport","tpq_raport.id_santri = tpq_santri.id","left")
                        ->join("tpq_guru","tpq_raport.id_guru = tpq_guru.id","left")
                        ->join("tpq_matapelajaran","tpq_matapelajaran.id = tpq_raport.id_mapel","left")
                        ->where("tpq_santri.id = $id_santri")
                        ->get();
        return $res;
    }

    public function getMapel()
    {
        return $this->db->get("tpq_matapelajaran")->result();
    }

    public function getDataDaftarKelas()
    {
        return $this->db->select("tpq_kelas.*,tpq_guru.nama,tpq_guru.id")
                        ->from("kelas")
                        ->join("tpq_guru","tpq_guru.id = tpq_kelas.id_guru","left")
                        ->get();
    }
}
