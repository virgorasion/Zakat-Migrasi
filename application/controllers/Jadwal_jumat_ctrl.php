<?php
defined('BASEPATH') or exit('ERROR');

class Jadwal_Jumat_ctrl extends CI_controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Jadwal_jumat_model');
        $this->load->library("datatables");
    }

    public function index()
    {
        if (isset($_SESSION['username'])) {
            if($this->input->post('searchByDate')==""){
                $t1 = date("Y-m-01");
                $t2 = date("Y-m-t");
                $data['date'] = date("m-01-Y - m-t-Y");
                $data['data'] = "Jadwal_jumat_ctrl/getDatatables/".$t1."/".$t2;
                $this->load->view('Jadwal_jumat_view', $data);
            } else {
                $getDate = $this->input->post('searchByDate');
                $split = explode(" - ", $getDate);
                $date1 = date_create($split[0]);
                $date2 = date_create($split[1]);
                $t1 = date_format($date1, "Y-m-d");
                $t2 = date_format($date2, "Y-m-d");
                $data['date'] = $getDate;
                $data['data'] = "Jadwal_jumat_ctrl/getDatatables/".$t1."/".$t2;
                $this->load->view('Jadwal_jumat_view', $data);
            }
        } else {
            redirect('home');
        }
    }

    public function ActionJadwal()
    {
        $p = $this->input->post("tanggal");
        foreach ($p as $key => $value) {
            $imam = htmlspecialchars($this->input->post("imam[$key]"));
            $bilal = htmlspecialchars($this->input->post("bilal[$key]"));
            $ceramah = htmlspecialchars($this->input->post("ceramah[$key]"));
            $tanggal = htmlspecialchars($this->input->post("tanggal[$key]"));
            $data = array(
                'kode_jadwal' => 2,
                'imam' => $imam,
                'bilal' => $bilal,
                'ceramah' => $ceramah,
                'tanggal' => $tanggal
            );
            $this->Jadwal_jumat_model->InsertJadwal('jadwal', $data);
        }
        $this->session->set_flashdata('succ', "Berhasil tambah jadwal");
        redirect('Jadwal_jumat_ctrl');
    }

    public function getDatatables($t1,$t2)
    {
        header("Content-Type: application/json");
        echo $this->Jadwal_jumat_model->setDatatables($t1,$t2);
    }

    public function EditJadwal()
    {
        $p = $this->input->post();
        $a = date_create($p['edtTgl']);
        $tgl = date_format($a, "Y-m-d");
        $data = array(
            'imam' => htmlspecialchars($p['edtImam']),
            'bilal' => htmlspecialchars($p['edtBilal']),
            'ceramah' => htmlspecialchars($p['edtCeramah']),
            'tanggal' => $tgl
        );
        $id = $p['editID'];
        $kode = $p['kodeJadwal'];
        $query = $this->Jadwal_jumat_model->UpdateJadwal('jadwal', $data, $id, $kode);
        if ($query == 1) {
            $this->session->set_flashdata('succ', 'Berhasil ubah data');
            redirect('Jadwal_jumat_ctrl');
        } else {
            $this->session->set_flashdata('err', 'Gagal ubah data, segera hubungi admin !');
            redirect('Jadwal_jumat_ctrl');
        }
    }

    public function HapusData($id)
    {
        $query = $this->Jadwal_jumat_model->DeleteData('jadwal', $id);
        if ($query == 1) {
            $this->session->set_flashdata('succ', 'Berhasil hapus data');
            redirect('Jadwal_jumat_ctrl');
        } else {
            $this->session->set_flashdata('err', 'Gagal hapus data, segera hubungi admin !');
            redirect('Jadwal_jumat_ctrl');
        }
    }

    public function laporanPrint($t1, $t2)
    {
        $c1 = date_create($t1);
        $c2 = date_create($t2);
        $tgl1 = date_format($c1, "Ymd");
        $tgl2 = date_format($c2, "Ymd");
        $data['t1'] = $t1;
        $data['t2'] = $t2;
        $data['datas'] = $this->Jadwal_jumat_model->sel_date($tgl1, $tgl2);
        $this->load->view("prints/jadwal_tarawih_print", $data);
    }
}