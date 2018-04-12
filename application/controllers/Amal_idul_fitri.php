<?php 
    defined('BASEPATH') or exit('Error');

    class Amal_idul_fitri extends CI_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Lap_idul_fitri_model');
           
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
                $data['data'] = $this->Lap_idul_fitri_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_idul_fitri_view',$data);
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
                $data['data'] = $this->Lap_idul_fitri_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_idul_fitri_view',$data);
            }
   
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }
     
    public function laporan_print($t1,$t2)
    {
        $pieces1 = explode(".",$t1);
        $pieces2 = explode(".",$t2);
        $t1 = $pieces1[2].$pieces1[1].$pieces1[0];
        $t2 = $pieces2[2].$pieces2[1].$pieces2[0];
        
        $data['t1'] = $pieces1[0].'-'.$pieces1[1].'-'.$pieces1[2];
        $data['t2'] = $pieces2[0].'-'.$pieces2[1].'-'.$pieces2[2];
    
        $data['data'] = $this->Lap_idul_fitri_model->sel_date($t1,$t2)->result();
        $this->load->view('prints/fitri_print',$data);
    }

    public function aksi()
    {
        $no = $this->input->post('nomor');
        $jum = $this->input->post('jumlah');
        $pcs = explode('-',$this->input->post('tanggal'));
        $tanggal = $pcs[2].'-'.$pcs[1].'-'.$pcs[0];
        $nama = $this->input->post('nama');
        $id_admin = $this->input->post('id_admin');
        $time = date('Y-m-d H:i:s');
        $action = $this->input->post('action');
        $jumlah = str_replace('.','',$jum);

        if ($action == 'add') {
            $data = array(
                'jumlah' => $jumlah,
                'tanggal' => $tanggal,
                'id_admin' => $id_admin,
                'log_time' => $time
            );
            $this->Lap_idul_fitri_model->add($data);
            $this->session->set_flashdata('msg','Berhasil Menambah Data');
            redirect(site_url('Amal_idul_fitri'));
        }else {
            $data = array(
                'jumlah' => $jumlah,
                'tanggal' => $tanggal,
                'id_admin' => $id_admin,
                'log_time' => $time
            );
            $this->Lap_idul_fitri_model->ganti($data,$no);
            $this->session->set_flashdata('msg', 'Berhasil Edit Data');
            redirect(site_url('Amal_idul_fitri'));
        }
    }
    public function hapus($key)
    {
        $this->Lap_idul_fitri_model->hapus($key);
            $this->session->set_flashdata('msg', 'Berhasil Hapus Data');
            redirect(site_url('Amal_idul_fitri'));
    }
    
 }
?>