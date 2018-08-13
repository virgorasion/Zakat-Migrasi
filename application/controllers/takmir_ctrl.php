<?php

defined('BASEPATH') or exit('error');

class Takmir_ctrl extends CI_controller 
{
    public function __construct(){
        parent::__construct();
        $this->load->model('tamkir_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('takmir_view');
        }else {
            redirect('home');
        }
    }

    public function tambah()
    {
        $id_anggota = $this->input->post('id_anggota');
        $jabatan = $this->input->post('jabatan');

        $data = array(
            'id' => '',
            'id_anggota' => $id_anggota,
            'jabatan' => $jabatan,
            'status_aktif' => '1'
        );

        $this->takmir_model->insert_data('takmir',$data);
        $this->session->set_flashdata('msg', 'Berhasil Menambah Takmir');
        redirect('takmir_ctrl');
    }

    public function edit()
    {
        $id = $this->input->post('nomor');
        
        
    }
}
