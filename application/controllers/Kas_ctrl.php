<?php 

Defined("BASEPATH")or exit("Error");

class Kas_ctrl extends CI_controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kas_model');
        $this->load->library('datatables');
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $this->load->view('Kas_view');
        }else {
            $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect(site_url('home'));
        }
    }

    public function ajaxTable()
    {
        header('Content-Type: application/json');
        echo $this->Kas_model->get_kas_data();
    }

    public function tambah()
    {
        $nama = $this->input->post('addNama');
        $kategori = $this->input->post('addKategori');
        $jumlah = $this->input->post('addJumlah');
        $date = date('Y-m-d');

        $data = array(
            'nama' => $nama,
            'id_admin' => $_SESSION['id_admin'],
            'tipe' => $kategori,
            'jumlah' => $jumlah,
            'tanggal' => $date
        );
        try{
            $this->Kas_model->insertData('kas_masjid',$data);
            $this->session->set_flashdata('msg','Berhasil Menambah Data');
        }catch(Exception $e){
            $this->session->set_flashdata('error',"Gagal Tambah Data Segera Hubungi Operator");
        }

        redirect('kas_ctrl');
    }

    public function hapus($id)
    {
        $id = $id;
        try{
            $this->kas_model->deleteData('kas_model',$id);
            $this->session->set_flashdata('msg','Berhasil Delete Data');
        }catch (Exception $e){
            $this->session->set_flashdata('error','Gagal Hapus Data Segera Hubungi Operator');            
        }
        redirect('kas_ctrl');
    }

}