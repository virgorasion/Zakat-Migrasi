<?php

defined('BASEPATH') or exit('error');

class Takmir_ctrl extends CI_controller 
{
    public function __construct(){
        parent::__construct();
        $this->load->model('Takmir_model');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $data['users'] = $this->Takmir_model->getUsers()->result();
            $data['petugas'] = $this->Takmir_model->getPetugas()->result();
            $this->load->view('view_takmir', $data);
        }else {
            redirect('home');
        }
    }

    public function AjaxTableAnggota()
    {
        header('Content-Type: application/json');
        echo $this->Takmir_model->get_data_anggota();

    }

    public function TambahAnggota()
    {
        $p = $this->input->post();
        $data = array(
            'nama' => $p['AddNama'],
            'alamat' => $p['AddAlamat'],
            'no_hp' => $p['AddHP'],
            'no_telp' => $p['AddTelp'],
            'jenis_kelamin' => $p['AddJK'],
            'status_aktif' => 1
        );
        $query = $this->Takmir_model->InsertDataAnggota('list_anggota',$data);
        if ($query != null) {
            $this->session->set_flashdata('msg', 'Berhasil Tambah Data Anggota');
            redirect('Takmir_ctrl');
        } else {
            $this->session->set_flashdata('err', 'Gagal Tambah Anggota, Segera Hubungi Admin');
            redirect('Takmir_ctrl');
        }
    }

    public function EditAnggota()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => $post['EditNama'],
            'alamat' => $post['EditAlamat'],
            'no_hp' => $post['EditHP'],
            'no_telp' => $post['EditTelp'],
            'jenis_kelamin' => $post['EditJK']
        );
        $id = $post['EditIDAnggota'];
        $query = $this->Takmir_model->UpdateDataAnggota('list_anggota',$data,$id);
        if ($query != null) {
            $this->session->set_flashdata('msg','Berhasil Edit Data Anggota');
            redirect('Takmir_ctrl');
        }else{
            $this->session->set_flashdata('err', 'Gagal Edit Anggota, Segera Hubungi Admin');
            redirect('Takmir_ctrl');
        }
    }

    public function HapusDataAnggota($id_anggota)
    {
        $query = $this->Takmir_model->HapusDataAnggota('list_anggota',$id_anggota);
        if ($query != null) {
            $this->session->set_flashdata('msg', 'Berhasil Hapus Data Anggota');
            redirect('Takmir_ctrl');
        } else {
            $this->session->set_flashdata('err', 'Gagal Hapus Anggota, Segera Hubungi Admin');
            redirect('Takmir_ctrl');
        }
    }

    public function getAjaxAnggota()
    {
        $query = $this->Takmir_model->getAnggotaAjax('list_anggota');
        echo json_encode($query);
    }
    
    
}
