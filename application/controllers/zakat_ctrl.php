<?php 
    defined('BASEPATH') or exit('Error');

    class Zakat_ctrl extends CI_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Lap_zakat_model');
           
        }

        public function index(){
           if(isset($_SESSION['username'])){
            if($this->input->post('t1')=="" && $this->input->post('t2')==""){
                $data['t1'] = date("01-m-Y");
                $data['t2'] = date("t-m-Y");
                $date1 = date_create($data['t1']);
                $date2 = date_create($data['t2']);
                $t1 = date_format($date1, "Ymd");
                $t2 = date_format($date2, "Ymd");
                $data['data'] = $this->Lap_zakat_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_zakat_view',$data);
            }
            else{
                $data['t1'] = $this->input->post('t1');
                $data['t2'] = $this->input->post('t2');
                $date1 = date_create($data['t1']);
                $date2 = date_create($data['t2']);
                $t1 = date_format($date1, "Ymd");
                $t2 = date_format($date2, "Ymd");
                $data['data'] = $this->Lap_zakat_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_zakat_view',$data);
            }
   
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }
     
    public function laporan_print($t1,$t2)
    {
        $pieces1 = explode('-',$t1);
        $pieces2 = explode('-',$t2);        
        $data['t1'] = $pieces1[0].'-'.$pieces1[1].'-'.$pieces1[2];
        $data['t2'] = $pieces2[0].'-'.$pieces2[1].'-'.$pieces2[2];
    
        $data['selBeli'] = $this->Lap_zakat_model->sel_beli($t1,$t2)->result();
        $data['data'] = $this->Lap_zakat_model->sel_date($t1,$t2)->result();
        $this->load->view('prints/zakat_print',$data);
    }

    public function tambahData()
    {
        $nama = $this->input->post('nama');
        $alamat = $this->input->post('alamat');
        $zakatFitrah = $this->input->post('zakatFitrah');
        $pembelian = $this->input->post('pembelian');
        $Mal = $this->input->post('zakatMal');
        $pecah1 = explode('.',$Mal);
        $zakatMal = $pecah1[0].$pecah1[1].$pecah1[2];
        $faq = $this->input->post('infaq');
        $pecah2 = explode('.',$faq);
        $infaq = $pecah2[0].$pecah2[1].$pecah2[2];
        $tanggal = date('Y-m-d');

        $this->Lap_zakat_model->input('list_zakat',$nama,$alamat,$zakatFitrah,$pembelian,$zakatMal,$infaq,$tanggal);
        $this->session->set_flashdata('msg', 'Berhasil Menambah Data');
        redirect(site_url('Laporan/Zakat_fitrah'));
    }

    public function edit($nomor)
    {
        $data = $this->Lap_zakat_model->select_zakat($nomor)->result();
        echo json_encode($data);
    }

    public function hapus($nomor)
    {
        $data = $this->Lap_zakat_model->hapus($nomor);
        $this->session->set_flashdata('msg','Data Berhasil di Hapus');
        redirect(site_url('Laporan/Zakat_fitrah'));
    }

    public function simpanEdit()
    {
        $nomor = $this->input->post('nomor');
        $namaEdt = $this->input->post('namaEdt');
        $alamatEdt = $this->input->post('alamatEdt');
        $zakatFitrahEdt = $this->input->post('zakatFitrahEdt');
        $pembelianEdt = $this->input->post('pembelianEdt');
        $Mal = $this->input->post('zakatMalEdt');
        $pecah1 = explode('.',$Mal);
        $zakatMalEdt = $pecah1[0].$pecah1[1].$pecah1[2];
        $faq = $this->input->post('infaqEdt');
        $pecah2 = explode('.',$faq);
        $infaqEdt = $pecah2[0].$pecah2[1].$pecah2[2];
        $this->Lap_zakat_model->ganti($nomor,$namaEdt,$alamatEdt,$zakatFitrahEdt,$pembelianEdt,$zakatMalEdt,$infaqEdt);
        $this->session->set_flashdata('msg','Data Berhasil di Edit');
        redirect(site_url('Laporan/Zakat_fitrah'));
    }

    public function synchronize($t1,$t2)
    {
        $data['t1'] = $t1;
        $data['t2'] = $t2;
        $t1 = str_replace("-","",$data['t1']);
        $t2 = str_replace("-","",$data['t2']);
        $pieces1 = explode("-",$data['t1']);
        $pieces2 = explode("-",$data['t2']);
        $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
        $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
        $data['data'] = $this->Lap_zakat_model->sel_date($t1,$t2)->result();

        echo json_encode($data['data']);
    }

 }
?>