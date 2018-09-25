<?php

defined('BASEPATH')or exit('ERROR');

class Lap_kotak_amal_controller extends CI_controller
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
        $jumlah = $this->input->post('addJumlah');
        $keterangan = $this->input->post('addKeterangan');
        $admin = $_SESSION['id_admin'];
        $tanggal = $this->input->post('addTanggal');

        $data = array(
            'id_admin' => $admin,
            'keterangan' => $keterangan,
            'tanggal' => $tanggal,
            'tipe' => $tipe,
            'jumlah' => $jumlah
        );

        try{
            $query = $this->Lap_kotak_amal_model->inputAll('lap_kotak_amal',$data);
            $this->session->set_flashdata('msg', 'Berhsil Menambah Data');
            redirect('Laporan/Kotak_amal');
        }catch (Exception $e){
            $this->session->set_flashdata('msg', 'Gagal Hapus Data, Segera Hubungi Operator');
            redirect('Laporan/Kotak_amal');
        }
    }

    public function hapus_data($id)
    {
        try{
            $query = $this->Lap_kotak_amal_model->deleteData('lap_kotak_amal',$id);
            $this->session->set_flashdata('msg', 'Berhasil Hapus Data');
            redirect('Laporan/Kotak_amal');
        }catch (Exception $e){
            $this->session->set_flashdata('msg', 'Gagal Hapus Data, Segera Hubungi Operator');
            redirect('Laporan/Kotak_amal');
        }
    }
}