<?php 
defined('BASEPATH') or exit('error');

class Jadwal_tarawih_ctrl extends CI_controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_tarawih_model');
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            if ($this->input->post('t1') == "" && $this->input->post('t2') == "") {
                $data['t1'] = date("01-F-Y");
                $data['t2'] = date("t-F-Y");
                $date1 = date_create($data['t1']);
                $date2 = date_create($data['t2']);
                $t1 = date_format($date1, "Ymd");
                $t2 = date_format($date2, "Ymd");
                $data['datas'] = $this->Jadwal_tarawih_model->sel_date($t1, $t2);
                $this->load->view('jadwal_tarawih_view', $data);
            } else {
                $data['t1'] = $this->input->post('t1');
                $data['t2'] = $this->input->post('t2');
                $date1 = date_create($data['t1']);
                $date2 = date_create($data['t2']);
                $t1 = date_format($date1, "Ymd");
                $t2 = date_format($date2, "Ymd");
                $data['datas'] = $this->Jadwal_tarawih_model->sel_date($t1, $t2);
                $this->load->view('jadwal_tarawih_view', $data);
            }
        }else{
            redirect('home');
        }
    }

    public function ActionJadwal()
    {
        $p = $this->input->post("tanggal");
        // $t = $this->input->post("imam");
        // $h = list($key, $value) = $p;
        // var_dump($t);
        // echo $value;
        // die();
        foreach ($p as $key => $value) {
            $imam = $this->input->post("imam[$key]");
            $bilal = $this->input->post("bilal[$key]");
            $ceramah = $this->input->post("ceramah[$key]");
            $tanggal = $this->input->post("tanggal[$key]");
            $data = array(
                'kode_jadwal' => 1,
                'imam' => htmlspecialschars($imam),
                'bilal' => htmlspecialschars($bilal),
                'ceramah' => htmlspecialschars($ceramah),
                'tanggal' => $tanggal
            );
            $this->Jadwal_tarawih_model->InsertJadwal('jadwal',$data);
        }
        $this->session->set_flashdata('msg', "Berhasil tambah jadwal");
        redirect('jadwal_tarawih_ctrl');
    }

    public function EditJadwal()
    {
        $p = $this->input->post();
        $a = date_create($p['edtTgl']);
        $tgl = date_format($a, "Y-m-d");
        $data = array(
            'imam' => htmlspecialschars($p['edtImam']),
            'bilal' => htmlspecialschars($p['edtBilal']),
            'ceramah' => htmlspecialschars($p['edtCeramah']),
            'tanggal' => $tgl
        );
        $id = $p['editID'];
        $kode = $p['kodeJadwal'];
        $query = $this->Jadwal_tarawih_model->UpdateJadwal('jadwal',$data,$id,$kode);
        if ($query == 1) {
            $this->session->set_flashdata('msg','Berhasil ubah data');
            redirect('jadwal_tarawih_ctrl');
        }else {
            $this->session->set_flashdata('err', 'Gagal ubah data, segera hubungi admin !');
            redirect('jadwal_tarawih_ctrl');
        }
    }
    
    public function HapusData($id,$kode)
    {
        $query = $this->Jadwal_tarawih_model->DeleteData('jadwal',$id,$kode);
        if ($query == 1) {
            $this->session->set_flashdata('msg', 'Berhasil hapus data');
            redirect('jadwal_tarawih_ctrl');
        } else {
            $this->session->set_flashdata('err', 'Gagal hapus data, segera hubungi admin !');
            redirect('jadwal_tarawih_ctrl');
        }
    }
    
    public function laporanPrint($t1,$t2)
    {
        $c1 = date_create($t1);
        $c2 = date_create($t2);
        $tgl1 = date_format($c1, "Ymd");
        $tgl2 = date_format($c2, "Ymd");
        $data['t1'] = $t1;
        $data['t2'] = $t2;
        $data['datas'] = $this->Jadwal_tarawih_model->sel_date($tgl1, $tgl2);
        $this->load->view("prints/jadwal_tarawih_print", $data);
    }
}