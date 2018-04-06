<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//nama controler
class Hak_akses_ctrl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();		
        $this->load->model('Cabang_model');
		$this->load->model('Hak_akses_model');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
			$data['data'] = $this->Hak_akses_model->tampil_data()->result();
			$data['cabang'] = $this->Cabang_model->tampil_data()->result();
			$this->load->view('Hak_akses_view',$data);
		}
		else{
			redirect(site_url().'/Auth/logout');
		}
    }

    public function update()
    {
        //$this->output->enable_profiler(TRUE);
        $kode_cabang = $this->input->post('kode_cabang');
        $kode_akses = $this->input->post('kode_akses');
        $hak_akses = $this->input->post('hak_akses');
        $keterangan = $this->input->post('keterangan');
        $data = array(
                'kode_cabang' => $kode_cabang,
                'kode_akses' => $kode_akses,
                'hak_akses' => $hak_akses,
                'keterangan' => $keterangan
                );
        if ($this->input->post('action')=="add"){
            $this->Hak_akses_model->input_data($data, 'menu_hak_akses');	
            $this->session->set_flashdata('msg', 'Berhasil Simpan');
        }else{
            $this->Hak_akses_model->update_data($data, 'menu_hak_akses', $kode_akses);	
            $this->session->set_flashdata('msg', 'Berhasil Update');
        }
	redirect(site_url() . '/Hak_akses_ctrl');
    }
	
	public function inactive()
    {
        //$this->output->enable_profiler(TRUE);
		$data = array('status_aktif' => 'NO');
        $kode_akses_delete = $this->input->post('kode_akses_delete');
		$this->Hak_akses_model->inactive_data($data,'menu_hak_akses',$kode_akses_delete);
		$this->session->set_flashdata('msg', 'Berhasil Didelete');		
		redirect(site_url() . '/Hak_akses_ctrl');
	}
}
?>
