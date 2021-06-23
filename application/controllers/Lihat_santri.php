<?php
defined("BASEPATH")or exit("ERROR");

class Lihat_santri extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("tpa_model");
    }

    public function index($lahir = "",$pin = "")
    {
        $lahir = $this->input->get("cariTanggal");
        $pin = $this->input->get("cariKode");
        $data['dataRaportSantri'] = $this->tpa_model->getRaportSantriForOrtu($lahir,$pin)->result();
        $data['dataAbsensiSantri'] = $this->tpa_model->getAbsensiSantriForOrtu($lahir,$pin)->result();
        $data['status'] = (!empty($data['dataRaportSantri']) && !empty($data['dataAbsensiSantri']));
        $data['submit'] = $this->input->get("submit");
        $this->load->view("pantau_santri_view",$data);
    }
    
}
