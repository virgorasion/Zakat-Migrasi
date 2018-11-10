<?php

defined('BASEPATH')or exit('ERROR');

class Jabatan_ctrl extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jabatan_model');
    }

    public function index()
    {
        if($_SESSION['username'] != null){
            $data['items'] = $this->Jabatan_model->getAll();
            $this->load->view('Jabatan_view', $data);
        }else{
            redirect('auth');
        }
    }
    
}