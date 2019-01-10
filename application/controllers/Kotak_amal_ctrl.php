<?php

defined('BASEPATH')or exit('ERROR');

class Kotak_amal_ctrl extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Lap_kotak_amal_model");
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $data['data'] = $this->Lap_kotak_amal_model->SelectAll()->result();
            $data['tanggal'] = date('d-F-Y');
            $this->load->view('Lap_kotak_amal_view',$data);
        }else {
            $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect(site_url('home'));
        }
    }

    public function input_data()
    {
        $tipe = $this->input->post('addTipe');
        $jml = explode('.', $this->input->post('addJumlah'));
        $jumlah = implode('', $jml);
        $keterangan = htmlspecialchars($this->input->post('addKeterangan'));
        $admin = $_SESSION['id_admin'];
        $d = $this->input->post('addTanggal');
        $conv = date_create($d);
        $date = date_format($conv, "Y-m-d");
        $data = array(
            'id_admin' => $admin,
            'keterangan' => $keterangan,
            'tanggal' => $date,
            'id_tipe' => $tipe,
            'jumlah' => $jumlah,
            'kategori' => 1,
            'nama_donatur' => '-'
        );

        try{
            $query = $this->Lap_kotak_amal_model->inputAll('kas_masjid',$data);
            $this->session->set_flashdata('succ', 'Berhasil Menambah Data');
            redirect('Kotak_amal_ctrl');
        }catch (Exception $e){
            $this->session->set_flashdata('fail', 'Gagal Hapus Data, Segera Hubungi Operator');
            redirect('Kotak_amal_ctrl');
        }
    }

    public function hapus_data($id)
    {
        try{
            $this->Lap_kotak_amal_model->deleteData('kas_masjid',$id);
            $this->session->set_flashdata('succ', 'Berhasil Hapus Data');
            redirect('Kotak_amal_ctrl');
        }catch (Exception $e){
            $this->session->set_flashdata('fail', 'Gagal Hapus Data, Segera Hubungi Operator');
            redirect('Kotak_amal_ctrl');
        }
    }

    public function edit_data()
    {
        $tipe = $this->input->post('editTipe');
        $jml = explode('.', $this->input->post('editJumlah'));
        $jumlah = implode('', $jml);
        $keterangan = htmlspecialchars($this->input->post('editKeterangan'));
        $id = $this->input->post('idEdit');
        $d = $this->input->post('editTanggal');
        $conv = date_create($d);
        $date = date_format($conv, "Y-m-d");
        $data = array(
            'id_admin' => $_SESSION['id_admin'],
            'keterangan' => $keterangan,
            'tanggal' => $date,
            'id_tipe' => $tipe,
            'jumlah' => $jumlah 
        );

        try {
            $this->Lap_kotak_amal_model->Update("kas_masjid", $data, $id);
            $this->session->set_flashdata('succ', 'Berhasil Edit Data');
            redirect('Kotak_amal_ctrl');
        } catch (Exception $e) {
            $this->session->set_flashdata('fail', 'Gagal Edit Data, Segera Hubungi Operator');
            redirect('Kotak_amal_ctrl');
        }
    }
}