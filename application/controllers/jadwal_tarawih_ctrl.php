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
    public function PrintLaporan($t1, $t2)
    {
        $date1 = date_create($t1);
        $date2 = date_create($t2);
        $t1 = date_format($date1, "Ymd");
        $t2 = date_format($date2, "Ymd");

        $data['data'] = $this->Lap_zakat_model->sel_date($t1, $t2)->result();
        $this->load->view('prints/jadwal_tarawih_print', $data);
    }
}
