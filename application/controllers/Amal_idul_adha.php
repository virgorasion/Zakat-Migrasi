<?php 
    defined('BASEPATH') or exit('Error');

    class Amal_idul_adha extends CI_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Lap_idul_adha_model');
           
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
                $data['data'] = $this->Lap_idul_adha_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_idul_adha_view.php',$data);
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
                $data['data'] = $this->Lap_idul_adha_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_idul_adha_view',$data);
            }
   
        }
        else{
            redirect(site_url().'/Auth/logout');
        }
    }

    public function aksi()
    {
        $admin = $this->input->post('id_admin');
        $tanggal = $this->input->post('tanggal');
        $jumlah = $this->input->post('jumlah');
        $log_time = date('Y-m-d H:i:s');
        $id = $this->input->post('nomor');
        $action = $this->input->post('action');

        if ($action == "add") {
            $data = array(
                'nomor' => '',
                'id_admin' => $admin,
                'tanggal' => $tanggal,
                'jumlah' => $jumlah,
                'log_time' => $log_time
            );
            
            $this->Lap_idul_adha_model->insert_data('lap_idul_adha',$data);
            redirect('Amal_idul_adha');
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
    
        $data['data'] = $this->Lap_idul_adha_model->sel_date($t1,$t2)->result();
        $this->load->view('prints/adha_print',$data);
    }
    
 }
?>