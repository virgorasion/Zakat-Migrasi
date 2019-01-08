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
        $kategori = $this->input->post('addTipe');
        $jml = explode('.', $this->input->post('addJumlah'));
        $jumlah = implode('', $jml);
        $d = $this->input->post('addTanggal');
        $e = date_create($d);
        $date = date_format($e,"Y-m-d");
        $keterangan = $this->input->post('addKeterangan');

        $data = array(
            'nama_donatur' => $nama,
            'id_admin' => $_SESSION['id_admin'],
            'id_tipe' => $kategori,
            'jumlah' => $jumlah,
            'tanggal' => $date,
            'keterangan' => $keterangan
        );
        try{
            $this->Kas_model->insertData('kas_masjid',$data);
            $this->session->set_flashdata('msg','Berhasil Menambah Data');
        }catch(Exception $e){
            $this->session->set_flashdata('error',"Gagal Tambah Data Segera Hubungi Operator");
        }

        redirect('kas_ctrl');
    }

    public function edit()
    {
        $post = $this->input->post();
        $jml = explode('.', $post['editJumlah']);
        $jumlah = implode('',$jml);
        $data = array(
            'id_admin' => $_SESSION['id_admin'],
            'nama_donatur' => $post['editDonatur'],
            'jumlah' => $jumlah,
            'keterangan' => $post['editKeterangan'],
            'tanggal' => $post['editTanggal'],
            'id_tipe' => $post['editTipe']
        );
        $id = $post['idEdit'];
        $this->Kas_model->updateData('kas_masjid', $data, $id);
        redirect('Kas_ctrl');
    }

    public function hapus($id)
    {
        $id = $id;
        try{
            $this->Kas_model->deleteData('kas_model',$id);
            $this->session->set_flashdata('msg','Berhasil Delete Data');
        }catch (Exception $e){
            $this->session->set_flashdata('error','Gagal Hapus Data Segera Hubungi Operator');            
        }
        redirect('kas_ctrl');
    }

}