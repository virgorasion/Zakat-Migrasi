<?php 
    defined('BASEPATH') or exit('Error');

    class Ahad_dhuha extends CI_controller{

        public function __construct(){
            parent::__construct();
            $this->load->model('Lap_ahad_dhuha_model');
           
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
                $data['no'] = $this->getNomor();
                $data['data'] = $this->Lap_ahad_dhuha_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_ahad_dhuha_view',$data);
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
                $data['no'] = $this->getnomor();
                $data['data'] = $this->Lap_ahad_dhuha_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_ahad_dhuha_view',$data);
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
    
        $data['data'] = $this->Lap_ahad_dhuha_model->sel_date($t1,$t2)->result();
        $this->load->view('prints/dhuha_print',$data);
    }
        public function update(){
        $no = $this->input->post('nomor');
        $kode_user = $this->input->post('kode_user');
        $tanggal = $this->input->post('tanggal');
        $alih = explode("-", $tanggal);
        $tanggal = $alih[2] .'-'. $alih[1] .'-'. $alih[0];        
        $jumlah = str_replace('.', '', $this->input->post('jumlah'));
        date_default_timezone_set("Asia/Jakarta");
        $logtime = date('Y-m-d H:i:s');
        $data = array(
            'nomor'=>$no,
            'id_admin'=>$kode_user,
            'tanggal'=>$tanggal,
            'jumlah'=>$jumlah,
            'log_time'=>$logtime
        );
        if ($this->input->post('action')=="add") {
            $this->Lap_ahad_dhuha_model->insert($no,'lap_ahad_dhuha',$data);
            $this->session->set_flashdata('msg','Berhasil Membuat');
        }else{
            $this->Lap_ahad_dhuha_model->update($no,'lap_ahad_dhuha',$data);
            $this->session->set_flashdata('msg','Berhasil Update');
        }
        redirect(site_url('/ahad_dhuha'));
    }

    public function delete(){
        $no = $this->uri->segment(3);
        $this->Lap_ahad_dhuha_model->delete($no,'lap_ahad_dhuha');
        $this->session->set_flashdata('msg','Berhasil Delete');
        redirect(site_url('/ahad_dhuha'));
    }
    public function printstruk($no)
    {   $no = $no;
        //$this->output->enable_profiler(TRUE);
        // $data['t1'] = $this->input->post('t1');
        // $data['t2'] = $this->input->post('t2');
        // $t1 = str_replace("-","",$this->input->post('t1'));
        // $t2 = str_replace("-","",$this->input->post('t2'));
        $data['data'] = $this->Lap_ahad_dhuha_model->data_struk()->result();
        $data['act'] = "add";
        $this->load->view('prints/lap_ahad_dhuha_struk.php',$data);
    }

    public function getNomor()
    {
        $nomor = $this->Lap_ahad_dhuha_model->getNomor()->result();
        foreach($nomor as $no){
            $nomor_baru = $no->nomor;
        }
        $pecah = substr($nomor_baru,-1);
        if ($nomor == 0) {
            $createNomor = "DHUHA".str_pad("1", 5, 0, STR_PAD_LEFT);
        }else{
            $createNomor = "DHUHA".str_pad($pecah+1, 5,0,STR_PAD_LEFT);
        }

        return $createNomor;
    }

 }
?>