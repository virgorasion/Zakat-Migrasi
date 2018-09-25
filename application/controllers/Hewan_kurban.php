<?php
	defined('BASEPATH') or exit('ERROR');

	class Hewan_kurban extends CI_controller{
		public function __construct(){
			parent::__construct();
			$this->load->model('Lap_kurban_model');

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
                $data['data'] = $this->Lap_kurban_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_hewan_kurban_view',$data);
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
                $data['data'] = $this->Lap_kurban_model->sel_date($t1,$t2)->result();
                $this->load->view('lap_hewan_kurban_view',$data);
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
    
        $data['data'] = $this->Lap_kurban_model->sel_date($t1,$t2)->result();
        $this->load->view('print/hewan_print',$data);
    }

    public function aksi()
    {
        $action = $this->input->post('action');
        $nomor = $this->input->post('nomor');
        $id = $this->input->post('id_admin');
        $penyumbang = $this->input->post('penyumbang');
        $alamat = $this->input->post('alamat');
        $jenisHewan = $this->input->post('jenisHewan');
        $jumlah = $this->input->post('jumlah');
        $log_time = date('Y-m-d H:i:s');
        $tanggal = date('Y-m-d');

        if($action == 'add'){
            $data = array(
                'nomor' => '',
                'id_admin' => $id,
                'tanggal' => $tanggal,
                'penyumbang' => $penyumbang,
                'alamat' => $alamat,
                'jenis' => $jenisHewan,
                'jumlah' => $jumlah,
                'log_time' => $log_time
            );

            $this->Lap_kurban_model->insert_data('lap_hewan_kurban',$data);
            redirect(site_url('Laporan/Hewan_kurban'));
        }else{
            $nomor =  $nomor;
            $data = array(
                'penyumbang' => $penyumbang,
                'jenis' => $jenisHewan,
                'alamat' => $alamat,
                'jumlah' => $jumlah
            );

            $this->Lap_kurban_model->update_data('lap_hewan_kurban',$data,$nomor);
            redirect(site_url('Laporan/Hewan_kurban'));
        }
    }
    
    public function hapus($id)
    {
        $this->Lap_kurban_model->delete_data('lap_hewan_kurban',$id);
        redirect(site_url('Laporan/Hewan_kurban'));
    }
 }
?>