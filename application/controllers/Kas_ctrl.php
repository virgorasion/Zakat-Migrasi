<?php 

Defined("BASEPATH")or exit("Error");

class Kas_ctrl extends CI_controller 
{   
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kas_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            $data['data'] = $this->Kas_model->select_data();
            $this->load->view('Kas_view',$data);
        }else {
            $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect(site_url('home'));
        }
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