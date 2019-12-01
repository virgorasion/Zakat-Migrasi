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
                $data['t1'] = date("01-F-Y");
                $data['t2'] = date("t-F-Y");
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
                $this->load->view('lap_zakat_view', $data);
            }
        }
        else{
            redirect('home');
        }
    }
     
    public function laporan_print($t1,$t2)
    {
        $c1 = date_create($t1);
        $c2 = date_create($t2);
        $tgl1 = date_format($c1, "Ymd");
        $tgl2 = date_format($c2, "Ymd");
        $data['t1'] = $t1;
        $data['t2'] = $t2;
        $data['selBeli'] = $this->Lap_zakat_model->sel_beli($tgl1,$tgl2)->result();
        $data['data'] = $this->Lap_zakat_model->sel_date($tgl1,$tgl2)->result();
        $this->load->view('prints/zakat_print',$data);
    }

    public function tambahData()
    {
        $nama = htmlspecialchars($this->input->post('nama'));
        $alamat = htmlspecialchars($this->input->post('alamat'));
        $zakatFitrah = htmlspecialchars($this->input->post('zakatFitrah'));
        $pembelian = htmlspecialchars($this->input->post('pembelian'));
        $Mal = $this->input->post('zakatMal');
        $pecah1 = explode('.',$Mal);
        $zakatMal = implode("",$pecah1);
        $faq = $this->input->post('infaq');
        $pecah2 = explode('.',$faq);
        $infaq = implode("", $pecah2);
        $tanggal = date('Y-m-d');

        $this->Lap_zakat_model->input('list_zakat',$nama,$alamat,$zakatFitrah,$pembelian,$zakatMal,$infaq,$tanggal);
        $this->session->set_flashdata('msg', 'Berhasil Menambah Data');
        redirect(site_url('zakat_ctrl'));
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
        redirect(site_url('zakat_ctrl'));
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
        $zakatMalEdt = implode("",$pecah1);
        $faq = $this->input->post('infaqEdt');
        $pecah2 = explode('.',$faq);
        $infaqEdt = implode("",$pecah2);
        $this->Lap_zakat_model->ganti($nomor,$namaEdt,$alamatEdt,$zakatFitrahEdt,$pembelianEdt,$zakatMalEdt,$infaqEdt);
        $this->session->set_flashdata('msg','Data Berhasil di Edit');
        redirect(site_url('zakat_ctrl'));
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