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
            'nama' => htmlspecialchars($p['AddNama']),
            'alamat' => htmlspecialchars($p['AddAlamat']),
            'no_hp' => htmlspecialchars($p['AddHP']),
            'no_telp' => htmlspecialchars($p['AddTelp']),
            'jenis_kelamin' => $p['AddJK']
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

    public function TambahTakmir()
    {
        $p = $this->input->post();
        if ($p['ActType'] == 'add') {
            $data = array(
                'id_anggota' => $p['addAnggotaTakmir'],
                'id_jabatan' => $p['addJabatan']
            );
            $query = $this->Takmir_model->InsertDataTakmir('takmir', $data);
            if ($query != null) {
                $this->session->set_flashdata('msg', 'Berhasil Tambah Data Takmir');
                redirect('Takmir_ctrl');
            } else {
                $this->session->set_flashdata('err', 'Gagal Tambah Takmir, Segera Hubungi Admin');
                redirect('Takmir_ctrl');
            }
        }else {
            $data = array(
                'id_anggota' => $p['addAnggotaTakmir'],
                'id_jabatan' => $p['addJabatan']
            );
            $mainID = $p['MainID'];
            if ($p['SecondID'] == $p['addAnggotaTakmir']) { //Cek jika anggotanya tidak diganti
                $query = $this->Takmir_model->UpdateDataTakmir('takmir', $data, $mainID);
                if ($query != null) {
                    $this->session->set_flashdata('msg', 'Berhasil Tambah Data Takmir');
                    redirect('Takmir_ctrl');
                } else {
                    $this->session->set_flashdata('err', 'Gagal Tambah Takmir, Segera Hubungi Admin');
                    redirect('Takmir_ctrl');
                }
            }else{
                $setUpdateAnggotaLama = array('status' => 0); //set untuk anggota sebelum di ganti
                $setUpdateAnggotaBaru = array('status' => 1); //set untuk anggota sesudah diganti
                $this->Takmir_model->UpdateDataAnggota('list_anggota', $setUpdateAnggotaBaru, $p['addAnggotaTakmir']);
                $this->Takmir_model->UpdateDataAnggota('list_anggota', $setUpdateAnggotaLama, $p['SecondID']);
                $query = $this->Takmir_model->UpdateDataTakmir('takmir', $data, $mainID);
                if ($query != null) {
                    $this->session->set_flashdata('msg', 'Berhasil Tambah Data Takmir');
                    redirect('Takmir_ctrl');
                } else {
                    $this->session->set_flashdata('err', 'Gagal Tambah Takmir, Segera Hubungi Admin');
                    redirect('Takmir_ctrl');
                }
            }
        }
    }
    
    public function EditAnggota()
    {
        $post = $this->input->post();
        $data = array(
            'nama' => htmlspecialchars($post['EditNama']),
            'alamat' => htmlspecialchars($post['EditAlamat']),
            'no_hp' => htmlspecialchars($post['EditHP']),
            'no_telp' => htmlspecialchars($post['EditTelp']),
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

    public function HapusTakmir($idTakmir, $idAnggota)
    {
        $query = $this->Takmir_model->DeleteDataTakmir('takmir', $idTakmir, $idAnggota);
        if ($query != null) {
            $this->session->set_flashdata('msg', 'Berhasil Hapus Data Takmir');
            redirect('Takmir_ctrl');
        } else {
            $this->session->set_flashdata('err', 'Gagal Hapus Takmir, Segera Hubungi Admin');
            redirect('Takmir_ctrl');
        }
    }
    
    public function getAjaxAnggota()
    {
        $query = $this->Takmir_model->getAnggotaAjax('list_anggota');
        echo json_encode($query);
    }

    public function getAnggotaAjaxKhusus()
    {
        $query = $this->Takmir_model->setAnggotaAjaxKhusus('list_anggota');
        echo json_encode($query);
    }
    
    public function getAjaxTakmir()
    {
        $query = $this->Takmir_model->getTakmirAjax('jabatan');
        echo json_encode($query);
    }

    public function print()
    {
        $data['data'] = $this->Takmir_model->Get_all()->result();
        $this->load->view("prints/Takmir_print",$data);
    }
    
}