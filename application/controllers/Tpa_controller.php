<?php
defined("BASEPATH")or exit("Error");

class Tpa_controller extends CI_controller 
{
    public function __construct(){
        parent::__construct();
        $this->load->model("tpa_model");
    }

    public function index(){
        $data['dataJumlahSantriCowo'] = $this->tpa_model->getJumlahSantriCowo();
        $data['dataJumlahSantriCewe'] = $this->tpa_model->getJumlahSantriCewe();
        $data['dataJumlahSantriTotal'] = $this->tpa_model->getJumlahSantriTotal();
        $data['dataJumlahSantriLulus'] = $this->tpa_model->getJumlahSantriLulus();
        $data['dataSantriCowo'] = $this->tpa_model->getSantriCowo();
        $data['dataSantriCewe'] = $this->tpa_model->getSantriCewe();
        $data['dataKelasLimit'] = $this->tpa_model->getKelasLimit(5);
        $data['dataGuruLimit'] = $this->tpa_model->getGuruLimit(5);

        $this->load->view("dashboard_tpa",$data);
    }
}
