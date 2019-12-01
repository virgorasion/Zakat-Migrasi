<?php
defined("BASEPATH") OR exit("Error");

class Perlengkapan_ctrl extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Perlengkapan_model");
        $this->load->library("datatables");
    }

    public function index()
    {
        $data['data_ruangan'] = $this->Perlengkapan_model->dataRuangan()->result();
        $this->load->view("Perlengkapan_view", $data);
    }

    public function dataSemuaPerlengkapan()
    {
        header("Content-type: application/json");
        echo $this->Perlengkapan_model->dataSemuaPerlengkapan();
    }

    public function dataPerlengkapanTiapRuangan($kode_ruang)
    {
        header("Content-type: application/json");
        echo $this->Perlengkapan_model->dataPerlengkapanTiapRuangan($kode_ruang);
    }

    public function tambahDataPerlengkapan()
    {
        $get = $this->input->post();
        $id = $get['id'];
        $data = [
            
        ];
    }

    public function hapusDataPerlengkapan($id)
    {
        $where = ["id" => $id];
        $hapus = $this->Perlengkapan_model->hapusData("perlengkapan", $where);
        if (hapus) {
            $this->session->set_flashdata("succ", "Data perlengkapan berhasil dihapus");
            redirect("Perlengkapan");
        }else{
            $this->session->set_flashdata("fail", "Data gagal dihapus, segera hubungi admin");
            redirect("Perlengkapan");
        }
    }

    public function updateDataPerlengkapan()
    {
        $get = $this->input->post();
        $data = [
            "nama_barang" => $get["nama_barang"],
            "kondisi" => $get["kondisi_barang"],
            "jumlah" => $get["jumlah"],
            "updated_at" => date("Y-m-d H:i:s")
        ];
        $where = ["id" => $get["id_perlengkapan"]];
        $update = $this->Perlengkapan_model->updateData("perlengkapan",$data,$where);

        if ($update) {
            $this->session->set_flashdata("succ", "Berhasil update data perlengkapan");
            redirect("Perlengkapan");
        }else{
            $this->session->set_flashdata("fail", "Gagal update data perlengkapan, segera hubungi admin");
            redirect("Perlengkapan");
        }
    }
}