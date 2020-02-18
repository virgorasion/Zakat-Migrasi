<?php

defined('BASEPATH')or exit('ERROR');

class Kotak_amal_ctrl extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Lap_kotak_amal_model");
        $this->load->library("datatables");
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $data['url'] = "Kotak_amal_ctrl/dataTableKotakAmal";
            $this->load->view('Lap_kotak_amal_view',$data);
        }else {
            $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect(site_url('home'));
        }
    }

    public function dataTableKotakAmal()
    {
        header('Content-Type: application/json');
        echo $this->Lap_kotak_amal_model->getDataTableKotakAmal();
    }

    public function input_data()
    {
        $this->form_validation->set_rules('addTipe', 'Tipe', 'required');
        $this->form_validation->set_rules('addTanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('addJumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('addKeterangan', 'Keterangan', 'max_length[100]',['max_length'=>'{field} tidak boleh lebih dari {param} karakter']);

        $tipe = $this->input->post('addTipe');
        $jml = explode('.', $this->input->post('addJumlah'));
        $jumlah = implode('', $jml);
        $keterangan = htmlspecialchars($this->input->post('addKeterangan'));
        $admin = $_SESSION['id_admin'];
        $d = $this->input->post('addTanggal');
        $conv = date_create($d);
        $date = date_format($conv, "Y-m-d");
        $data_input = array(
            'id_admin' => $admin,
            'keterangan' => $keterangan,
            'tanggal' => $date,
            'id_tipe' => $tipe,
            'jumlah' => $jumlah,
            'kategori' => 1,
            'nama_donatur' => '-'
        );

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("form_error","Form Error");
            $data['url'] = "Kotak_amal_ctrl/dataTableKotakAmal";
            $this->load->view('Lap_kotak_amal_view',$data);
        }else {
            if ($this->Lap_kotak_amal_model->inputAll('kas_masjid', $data_input)) {
                $this->session->set_flashdata('succ', 'Berhasil Menambah Data');
                redirect('Kotak_amal_ctrl');
            }else {
                $this->session->set_flashdata('fail', 'Gagal Hapus Data, Segera Hubungi Operator');
                redirect('Kotak_amal_ctrl');
            }
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
        $this->form_validation->set_rules('editTipe', 'Tipe', 'required');
        $this->form_validation->set_rules('editTanggal', 'Tanggal', 'required');
        $this->form_validation->set_rules('editJumlah', 'Jumlah', 'required');
        $this->form_validation->set_rules('editKeterangan', 'Keterangan', 'max_length[100]',['max_length'=>'{field} tidak boleh lebih dari {param} karakter']);

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

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata("form_error","Form Error");
            $data['url'] = "Kotak_amal_ctrl/dataTableKotakAmal";
            $this->load->view('Lap_kotak_amal_view',$data);
        }else {
            if ($this->Lap_kotak_amal_model->Update("kas_masjid", $data, $id)) {
                $this->session->set_flashdata('succ', 'Berhasil Edit Data');
                redirect('Kotak_amal_ctrl');
            }else {
                $this->session->set_flashdata("fail","Gagal Edit Data, Segera Hubungi Operator");
                redirect("Kotak_amal_ctrl");
            }
        }
    }
}