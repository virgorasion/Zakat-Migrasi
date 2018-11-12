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

    public function ActionJabatan()
    {
        $p = $this->input->post();
        if ($p['Type'] == 'add') {
            $data = array(
                'nama' => $p['AddNama'],
                'keterangan' => $p['AddKeterangan'],
                'status_aktif' => 1
            );
            $query = $this->Jabatan_model->InsertDataJabatan('jabatan', $data);
            if ($query == true) {
                $this->session->set_flashdata('msg', 'Berhasil Tambah Jabatan');
                redirect('Jabatan_ctrl');
            } else {
                $this->session->set_flashdata('msg', 'Gagal Tambah Jabatan, Segera Hubungi Admin');
                redirect('Jabatan_ctrl');
            }
        }else{
            $data = array(
                'nama' => $p['AddNama'],
                'keterangan' => $p['AddKeterangan']
            );
            $id = $p['ID'];
            $query = $this->Jabatan_model->UpdateDataJabatan('jabatan',$data,$id);
            if ($query == true) {
                $this->session->set_flashdata('msg', 'Berhasil Edit Jabatan');
                redirect('Jabatan_ctrl');
            } else {
                $this->session->set_flashdata('msg', 'Gagal Edit Jabatan, Segera Hubungi Admin');
                redirect('Jabatan_ctrl');
            }
        }
    }
    
    public function HapusJabatan($id)
    {
        $query = $this->Jabatan_model->DeleteDataJabatan('jabatan',$id);
        if ($query == true) {
            $this->session->set_flashdata('msg', 'Berhasil Delete Jabatan');
            redirect('Jabatan_ctrl');
        } else {
            $this->session->set_flashdata('msg', 'Gagal Delete Jabatan, Segera Hubungi Admin');
            redirect('Jabatan_ctrl');
        }
    }
    
}