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
            $this->load->view('Kas_view');
        }else {
            $this->session->set_flashdata('msg','Anda Harus Login Terlebih Dahulu !');
            redirect(site_url('home'));
        }
    }

    public function ajaxTable()
    {
        $list = $this->Kas_model->get_datatables();
        $data = array();
        $no = 1;
        foreach($list as $item){
            $row[] = array();
            $row[] = $no;
            $row[] = $item->nama_donatur;
            $row[] = $item->tipe;
            $row[] = $item->jumlah;
            $row[] = $item->tanggal;
            $data[] = $row;
            $no++;
        }

        $result = array(
            "draw" => $_POST['draw'],
            'recordsTotal' => $this->Kas_model->count_all(),
            'recordsFiltered' => $this->Kas_model->count_filtered(),
            'data' => $data
        );

        echo json_encode($result);
    }

    public function tambah()
    {
        $nama = $this->input->post('addNama');
        $kategori = $this->input->post('addKategori');
        $jumlah = $this->input->post('addJumlah');
        $date = $this->input->post('addTanggal');

        $data = array(
            'nama_donatur' => $nama,
            'id_admin' => $_SESSION['id_admin'],
            'tipe' => $kategori,
            'jumlah' => $jumlah,
            'tanggal' => $date,
            'kategori' => 0
        );

        $this->Kas_model->insertData('kas_masjid',$data);
        $this->session->set_flashdata('msg','Berhasil Menambah Data');
        redirect('kas_ctrl');
    }

    public function hapus($id)
    {
        $this->Kas_model->deleteData('kas_masjid',$id);
        $this->session->set_flashdata('msg','Berhasil Delete Data');
        redirect('kas_ctrl');
    }

}