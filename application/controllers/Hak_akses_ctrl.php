<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//nama controler
class Hak_akses_ctrl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Hak_akses_model');		
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
            $data['utama'] = $this->Hak_akses_model->select_data()->result();
			$this->load->view('Hak_akses_view',$data);
		}
		else{
			redirect(site_url().'/Auth/logout');
		}
    }

    public function aksi()
    {
        $action = $this->input->post('action');
        $hakAkses = $this->input->post('hakAkses');
        $keterangan = $this->input->post('keterangan');
        $status = $this->input->post('status');
        $kodeAkses = $this->input->post('kodeAkses');
        if ($action == "add") {
            $data = array(
                'kode_cabang' => '',
                'hak_akses' => $hakAkses,
                'keterangan' => $keterangan,
                'status_aktif' => $status
            );
            $this->Hak_akses_model->insert_data('menu_hak_akses',$data);
        }else{
            $id = $kodeAkses;
            $data = array(
                'kode_cabang' => '',
                'hak_akses' => $hakAkses,
                'keterangan' => $keterangan,
                'status_aktif' => $status
            );
            $this->Hak_akses_model->update_data('menu_hak_akses',$data, $id);
        }
            redirect(site_url('Hak_akses_ctrl'));

    }

    
}
?>
