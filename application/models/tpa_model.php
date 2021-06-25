<?php
defined("BASEPATH")or exit("ERROR");

class Tpa_model extends CI_model
{
    public function insert($table,$data)
    {
        $this->db->insert($table,$data);
        return $this->db->insert_id();
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
        return $this->db->select("s.*,k.nama_kelas,k.id as id_kelas")->from("tpq_santri s")->join("tpq_kelas k","k.id = s.id_kelas","left")->get();
    }

    public function getRaportSantri($id_santri)
    {
        $res = $this->db->select("tpq_raport.*,tpq_santri.nama,tpq_santri.id,tpq_guru.nama as nama_guru,tpq_guru.id,tpq_matapelajaran.id,tpq_matapelajaran.nama as mapel,tpq_kelas.nama_kelas")
                        ->from("tpq_raport")
                        ->join("tpq_santri","tpq_raport.id_santri = tpq_santri.id","right")
                        ->join("tpq_kelas","tpq_kelas.id = tpq_santri.id_kelas","right")
                        ->join("tpq_guru","tpq_raport.id_guru = tpq_guru.id","left")
                        ->join("tpq_matapelajaran","tpq_matapelajaran.id = tpq_raport.id_mapel","left")
                        ->where("tpq_santri.id = $id_santri")
                        ->get();
        return $res;
    }

    public function getRaportSantriForOrtu($lahir,$pin)
    {
        return $this->db->select("tpq_raport.*,tpq_santri.nama,tpq_santri.id,tpq_guru.nama as nama_guru,tpq_guru.id,tpq_matapelajaran.id,tpq_matapelajaran.nama as mapel,tpq_kelas.nama_kelas")
                    ->from("tpq_raport")
                    ->join("tpq_santri","tpq_raport.id_santri = tpq_santri.id","right")
                    ->join("tpq_kelas","tpq_kelas.id = tpq_santri.id_kelas","right")
                    ->join("tpq_guru","tpq_raport.id_guru = tpq_guru.id","left")
                    ->join("tpq_matapelajaran","tpq_matapelajaran.id = tpq_raport.id_mapel","left")
                    ->where("tpq_santri.tgl_lahir = '$lahir'")
                    ->where("tpq_santri.kode_akses = $pin")
                    ->get();
    }

    public function getAbsensiSantriForOrtu($lahir,$pin)
    {
        return $this->db->select("a.absen,a.tanggal")->from("tpq_absen a")->join("tpq_santri s","s.id = a.id_santri","right")->where("s.tgl_lahir = '$lahir'")->where("s.kode_akses = $pin")->get();
    }

    public function getKelasBySantri($id_santri)
    {
        return $this->db->select("k.*")->from("tpq_kelas k")->join("tpq_santri s","s.id_kelas = k.id")->where("s.id = $id_santri")->get()->result();
    }

    public function getMapel()
    {
        return $this->db->get("tpq_matapelajaran");
    }

    public function getMapelById($id)
    {
        return $this->db->select("*")->from("tpq_matapelajaran")->where("id = $id")->get()->result();
    }

    public function getMapelByKelas($key)
    {
        return $this->db->select("m.*")
                        ->from("tpq_rombel r")
                        ->join("tpq_kelas k","k.id = r.id_kelas","left")
                        ->join("tpq_matapelajaran m","m.id = r.id_mapel")
                        ->where("k.id = $key")->get();
    }

    public function getSantriById($id)
    {
        return $this->db->select("*")->from("tpq_santri")->where("id = $id")->get()->result();
    }

    public function getGuru()
    {
        return $this->db->get("tpq_guru")->result();
    }

    public function getDataDaftarKelas()
    {
        return $this->db->select("tpq_kelas.*,tpq_guru.nama as nama_guru,tpq_guru.id as guru_id")
                        ->from("tpq_kelas")
                        ->join("tpq_guru","tpq_guru.id = tpq_kelas.id_guru","left")
                        ->get();
    }

    public function getKelas()
    {
        return $this->db->get("tpq_kelas")->result();
    }
    public function getSantri($key)
    {
        return $this->db->select("*")->from("tpq_santri")->where("id_kelas = $key")->get()->result();
    }

    public function getDataDaftarMapel()
    {
        return $this->db->select("m.id,m.nama,k.nama_kelas,k.metode,k.tingkatan")
                        ->from("tpq_matapelajaran m")
                        ->join("tpq_rombel r","r.id_mapel = m.id","left")
                        ->join("tpq_kelas k","k.id = r.id_kelas","left")
                        ->get();
    }

    public function getMapelKelas($key)
    {
        return $this->db->select("r.id as id_rombel,m.id, m.nama")
                        ->from("tpq_rombel r")
                        ->join("tpq_matapelajaran m","m.id = r.id_mapel","left")
                        ->where("r.id_kelas = $key")
                        ->get();
    }

    public function getDataRiwayatAbsensi()
    {
        return $this->db->select("s.id,s.id_kelas,s.nama,s.jk,s.alamat,s.nama_wali,a.absen,a.tanggal,k.nama_kelas")
                        ->from("tpq_absen a")
                        ->join("tpq_santri s","s.id = a.id_santri")
                        ->join("tpq_kelas k","k.id = s.id_kelas")
                        ->order_by("a.tanggal","DESC")
                        ->get()->result();
    }

    public function getJumlahSantriCowo()
    {
        return $this->db->select("count(tpq_santri.id) as cowo, tpq_santri.tgl_lahir,tpq_kelas.nama_kelas")->from("tpq_santri")->join("tpq_kelas","tpq_kelas.id = tpq_santri.id_kelas","left")->where("jk","L")->get()->result();
    }

    public function getJumlahSantriCewe()
    {
        return $this->db->select("count(id) as cewe")->from("tpq_santri")->where("jk","P")->get()->result();
    }

    public function getJumlahSantriTotal()
    {
        return $this->db->select("count(id) as total")->from("tpq_santri")->get()->result();
    }

    public function getJumlahSantriLulus()
    {
        return $this->db->select("count(id) as jumlah_lulus")->from("tpq_santri")->where("tanggal_keluar != 'NULL'")->get()->result();
    }

    public function getSantriCowo()
    {
        return $this->db->select("tpq_santri.nama,tpq_santri.tanggal_masuk,tpq_santri.tgl_lahir,tpq_kelas.nama_kelas,tpq_santri.alamat")->from("tpq_santri")->join("tpq_kelas","tpq_kelas.id = tpq_santri.id_kelas","left")->where("jk","L")->limit(5)->get()->result();
    }

    public function getSantriCewe()
    {
        return $this->db->select("tpq_santri.nama,tpq_santri.tanggal_masuk,tpq_santri.tgl_lahir,tpq_kelas.nama_kelas,tpq_santri.alamat")->from("tpq_santri")->join("tpq_kelas","tpq_kelas.id = tpq_santri.id_kelas","left")->where("jk","P")->limit(5)->get()->result();
    }

    public function getKelasLimit($limit)
    {
        return $this->db->select("tpq_kelas.*,tpq_guru.nama")->from("tpq_kelas")->join("tpq_guru","tpq_guru.id = tpq_kelas.id_guru","left")->limit($limit)->get()->result();
    }

    public function getGuruLimit($limit)
    {
        return $this->db->select("*")->from("tpq_guru")->limit($limit)->get()->result();
    }
}
