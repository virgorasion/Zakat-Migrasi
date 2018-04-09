<?php 
    defined('BASEPATH') or exit('Error');

    
    class Tarawih_php extends CI_controller{
        private $model = "Lap_tarawih_model";

        public function __construct(){
            parent::__construct();
            $this->load->model('Lap_tarawih_model');
           
        }

        public function index(){
           if(isset($_SESSION['username'])){
            if($this->input->post('t1')=="" && $this->input->post('t2')==""){
                $data['t1'] = date("01-m-Y");
                $data['t2'] = date("t-m-Y");
                $t1 = str_replace("-","",$data['t1']);
                $t2 = str_replace("-","",$data['t2']);
                $pieces1 = explode("-",$data['t1']);
                $pieces2 = explode("-",$data['t2']);
                $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
                $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
                $data['data'] = $this->Lap_tarawih_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_tarawih_view',$data);
            }
            else{
                $data['t1'] = $this->input->post('t1');
                $data['t2'] = $this->input->post('t2');
                $t1 = str_replace("-","",$this->input->post('t1'));
                $t2 = str_replace("-","",$this->input->post('t2'));
                $pieces1 = explode("-",$data['t1']);
                $pieces2 = explode("-",$data['t2']);
                $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
                $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
                $data['data'] = $this->Lap_tarawih_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_tarawih_view',$data);
            }
   
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }
     
    public function laporan_print($t1,$t2)
    {
        error_reporting(0);
        $pieces1 = explode("-",$t1);
        $pieces2 = explode("-",$t2);
        $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
        $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
        
        $data['t1'] = $pieces1[0].'-'.$pieces1[1].'-'.$pieces1[2];
        $data['t2'] = $pieces2[0].'-'.$pieces2[1].'-'.$pieces2[2];
    
        $data['data'] = $this->Lap_tarawih_model->sel_date($t1,$t2)->result();
        $this->load->view('prints/tarawih_print',$data);
    }

    public function tambah(){
        $pcs = explode('.',$this->input->post('addJumlah'));
        $jumlah = $pcs[0].$pcs[1].$pcs[2];

        $data = array(
            'id_admin' => $_SESSION['id_admin'],
            'petugas' => $this->input->post('addPetugas'),
            'tanggal' => date('Y-m-d'),
            'jumlah' => $jumlah
        );
        $this->Lap_tarawih_model->tambah($data);
        $this->session->set_flashdata('msg','Berhasil Menambah Data');
        redirect(site_url('tarawih_php'));
    }

    public function hapus($id)
    {
        $this->Lap_tarawih_model->hapus($id);
        $this->session->set_flashdata('msg','Berhasil Hapus Data');
        redirect(site_url('tarawih_php'));
    }

    public function editData()
    {
        $pcs = explode('.',$this->input->post('editJumlah'));
        $jumlah = $pcs[0].$pcs[1].$pcs[2];

        $data = array(
            'id_admin' => $_SESSION['id_admin'],
            'petugas' => $this->input->post('editPetugas'),
            'jumlah' => $jumlah,
            'log_time' => date('Y-m-d H:i:s')
        );
        $key = $this->input->post('idEdit');
        $this->Lap_tarawih_model->editData($data,$key);
        $this->session->set_flashdata('msg','Berhasil Edit Data');
        redirect(site_url('tarawih_php'));
    }
    
 }
?>