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
        $data['data_perlengkapan'] = $this->Perlengkapan_model->dataPerlengkapan()->result();
        $this->load->view("Perlengkapan_view", $data);
    }

    public function dataSemuaPerlengkapan()
    {
        $get = $this->Perlengkapan_model->dataPerlengkapan()->result();
        echo json_encode($get);
    }

    public function dataPerlengkapanTiapRuangan($kode_ruang)
    {
        $get = $this->Perlengkapan_model->dataPerlengkapanTiapRuangan($kode_ruang);
        echo $get;
    }
}
