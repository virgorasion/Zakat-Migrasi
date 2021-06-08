<?php
defined("BASEPATH") or exit("Error");

class Santri_ctrl extends CI_controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tpa_model");
    }

    public function index()
    {
        $data['getSantri'] = $this->tpa_model->getDataDaftarSantri()->result();
        $this->load->view("daftar_santri_view",$data);
    }
    
    public function tambah_santri()
    {
        $this->load->view("tambah_santri_view");  
    }

    public function raport($id_santri)
    {
        $data['getRaportSantri'] = $this->tpa_model->getRaportSantri($id_santri)->result();
        $data['getMapel'] = $this->tpa_model->getMapel();
        $this->load->view("form_raport_view",$data);
    }

    public function post_santri()
    {
        $p = $this->input->post();
        $data = [
            'nama' => $p['addNama'],
            'alamat' => $p['addAlamat'],
            'nama_wali' => $p['addWali'],
            'tanggal_masuk' => date("Y-m-d"),
            'tgl_lahir' => $p['addLahir'],
            'nomor_hp' => $p['addNomor']
        ];
        $this->tpa_model->insert("tpq_murid",$data);
        $this->session->set_flashdata("msg","Berhasil Menambahkan Santri");
        redirect("Santri");
    }
}
