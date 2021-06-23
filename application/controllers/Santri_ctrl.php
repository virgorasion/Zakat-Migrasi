<?php
defined("BASEPATH") or exit("Error");

class Santri_ctrl extends CI_controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tpa_model");
        if (empty($_SESSION['username'])) {
            redirect("auth");
        }
    }

    public function index()
    {
        $data['getSantri'] = $this->tpa_model->getDataDaftarSantri()->result();
        $data['getKelas'] = $this->tpa_model->getKelas();
        $this->load->view("daftar_santri_view",$data);
    }
    
    public function tambah_santri()
    {
        $this->load->view("tambah_santri_view");  
    }

    public function post_santri()
    {
        $p = $this->input->post();
        $data = [
            'nama' => $p['addNama'],
            'alamat' => $p['addAlamat'],
            'nama_wali' => $p['addWali'],
            'jk' => $p['addJk'],
            'tanggal_masuk' => date("Y-m-d"),
            'tgl_lahir' => $p['addLahir'],
            'nomor_hp' => $p['addNomor'],
            'kode_akses' => rand(000000,999999)
        ];
        $this->tpa_model->insert("tpq_santri",$data);
        $this->session->set_flashdata("msg","Berhasil Menambahkan Santri");
        redirect("Santri");
    }

    public function update_santri(){
        $p = $this->input->post();
        var_dump($p);
        $data = [
            'nama' => $p['editNama'],
            'id_kelas' => $p['editKelas'],
            'alamat' => $p['editAlamat'],
            'nama_wali' => $p['editWali'],
            'nomor_hp' => $p['editNope'],
            'tgl_lahir' => $p['editLahir'],
            'tanggal_keluar'=> (empty($p['editKeluar']))? NULL : $p['editKeluar']
        ];
        $id = ['id' => $p['idEditSantri']];
        $this->tpa_model->update("tpq_santri",$data,$id);
        $this->session->set_flashdata("msg","Berhasil Mengubah Data Santri");
        redirect("Santri");
    }

    public function raport($id_santri)
    {
        $santri = $this->tpa_model->getSantriById($id_santri);
        $data['idSantri'] = $id_santri;
        $data['dataKelasBySantri'] = $this->tpa_model->getKelasBySantri($id_santri);
        $data['getRaportSantri'] = $this->tpa_model->getRaportSantri($id_santri)->result();
        $data['dataMapelByKelas'] = $this->tpa_model->getMapelByKelas($santri[0]->id_kelas)->result();
        $data['dataMapelLength'] = $this->tpa_model->getMapelByKelas($santri[0]->id_kelas)->num_rows();
        $this->load->view("form_raport_view",$data);
    }

    public function kelas()
    {
        $data['dataDaftarKelas'] = $this->tpa_model->getDataDaftarKelas()->result();
        $data['dataMapel'] = $this->tpa_model->getMapel()->result();
        $data['getDataGuru'] = $this->tpa_model->getGuru();
        $this->load->view("daftar_kelas_view",$data);
    }

    public function post_raport()
    {
        $p = $this->input->post();
        $id_santri = $p['idSantri'];
        for ($i=0; $i < count($p['mapel']); $i++) { 
            $data = [
                'id_santri' => $p['idSantri'],
                'id_mapel' => $p['idMapel'][$i],
                'nilai' => $p['mapel'][$i],
                'id_guru' => $p['idGuru'],
                'tanggal' => date("Y-m-d"),
                'keterangan' => "-",
                'publish' => 1
            ];
            $this->tpa_model->insert("tpq_raport",$data);
        }
        redirect("Raport/".$id_santri);
    }

    public function mapel()
    {
        $data['dataDaftarMapel'] = $this->tpa_model->getMapel()->result();
        $this->load->view("daftar_matapelajaran_view",$data);
    }

    public function absensi()
    {
        $data['dataKelas'] = $this->tpa_model->getKelas();
        $this->load->view("absensi_santri_view",$data);
    }

    public function riwayat_absensi()
    {
        $data['dataRiwayatAbsensi'] = $this->tpa_model->getDataRiwayatAbsensi();
        $this->load->view("riwayat_absensi_view",$data);
    }

    public function ustadz()
    {
        $data['dataDaftarGuru'] = $this->tpa_model->getGuru();
        $this->load->view("daftar_guru_view",$data);
    }

    public function post_guru()
    {
        $p = $this->input->post();
        $data = [
            'nama' => $p['addNama'],
            'alamat' => $p['addAlamat'],
            'no_telp' => $p['addNope'],
            'syahadah' => $p['addSyahadah']
        ];
        $this->tpa_model->insert("tpq_guru",$data);
        $this->session->set_flashdata("msg","Berhasil Menambahkan Guru");
        redirect("Ustadz");
    }

    public function post_absensi()
    {
        $p = $this->input->post();
        foreach ($p['absen'] as $absen) {
            $data = [
                'id_santri' => $p['idSantri'],
                'absen' => $absen,
                'tanggal' => date("Y-m-d")
            ];
            $this->tpa_model->insert("tpq_absen",$data);
        }
        redirect("Absensi");
    }

    public function post_kelas()
    {
        $p = $this->input->post();
        var_dump($p);
        $data = [
            'nama_kelas' => $p['addKelas'],
            'metode' => $p['addMetode'],
            'jumlah_santri' => 0,
            'tingkatan' => $p['addTingkatan'],
            'id_guru' => @$p['addGuru'],
            'keterangan' => $p['addKeterangan']
        ];
        $id = $this->tpa_model->insert("tpq_kelas",$data);
        $count = $this->tpa_model->getMapel()->num_rows();
        for ($i=0; $i < $count; $i++) {
            $data = ['id_kelas' => $id];
            $this->tpa_model->insert("tpq_rombel",$data);
        }
        $this->session->set_flashdata("msg","Berhasil Menambahkan Kelas");
        redirect("Kelas");
    }

    public function update_kelas()
    {
        $p = $this->input->post();
        $data = [
            'nama_kelas' => $p['editKelas'],
            'metode' => $p['editMetode'],
            'tingkatan' => $p['editTingkatan'],
            'id_guru' => $p['editGuru'],
            'keterangan' => $p['editKeterangan']
        ];
        $idKelas = ['id'=>$p['idKelasEdit']];
        $this->tpa_model->update("tpq_kelas",$data,$idKelas);
        $this->session->set_flashdata("msg","Berhasil Edit Kelas");
        redirect("Kelas");
    }

    public function delete_kelas($id)
    {
        $this->tpa_model->delete("tpq_kelas",["id"=>$id]);
        $this->session->set_flashdata("msg","Berhasil Menghapus Kelas");
        redirect("Kelas");
    }

    public function post_mapel_kelas()
    {
        $p = $this->input->post();
        $this->tpa_model->delete("tpq_rombel",['id_kelas'=>$p['idKelas']]);
        $jumlahMapel = $this->tpa_model->getMapel()->num_rows();
        for ($i=0; $i < $jumlahMapel; $i++) { 
            $data = [
                'id_kelas' => $p['idKelas'],
                'id_mapel' => ($i > count($p['addMapelKelas']))? NULL : $p['addMapelKelas'][$i]
            ];
            $this->tpa_model->insert("tpq_rombel",$data);
        }
        $this->session->set_flashdata("msg","Berhasil Menambahkan Jenis Penilaian");
        redirect("Kelas");
    }

    public function post_mapel()
    {
        $p = $this->input->post();
        $data = [
            'nama' => $p['addMapel']
        ];
        $this->tpa_model->insert("tpq_matapelajaran",$data);
        $this->session->set_flashdata("msg","Berhasil Menambahkan Mapel");
        redirect("Mapel");
    }

    public function update_mapel()
    {
        $p = $this->input->post();
        $data = [
            'nama' => $p['editMapel']
        ];
        $id = [
            'id' => $p['idEditMapel']
        ];
        $this->tpa_model->update("tpq_matapelajaran",$data,$id);
        $this->session->set_flashdata("msg","Berhasil Mengubah Mapel");
        redirect("Mapel");
    }

    public function delete_mapel($id)
    {
        $this->tpa_model->delete("tpq_matapelajaran",['id'=>$id]);
        $this->session->set_flashdata("msg",'Berhasil Menghapus Mapel');
        redirect("Mapel");
    }

    public function getMapelKelas()
    {
        $key = $this->input->post("key");
        $result = $this->tpa_model->getMapelKelas($key)->result();
        if (empty($result)) {
            echo json_encode(NULL);
        }else{
            echo json_encode($result);
        }
    }

    public function getMapelById()
    {
        $id = $this->input->post("id");
        $result = $this->tpa_model->getMapelById($id);
        if (empty($result)) {
            echo json_encode(NULL);
        }else{
            echo json_encode($result);
        }
    }

    public function getSantriCowo()
    {
       $res = $this->tpa_model->getSantriCowo();
       var_dump($res);
    }
    
}
