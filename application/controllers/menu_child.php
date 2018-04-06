<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//nama controler
class Menu_child_ctrl extends CI_Controller {

    public function __construct()
    {
        parent::__construct();		
        $this->load->model('Menu_header_model');
		$this->load->model('Menu_child_model');
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
			$data['data'] = $this->Menu_child_model->tampil_data()->result();
			$data['menu_header'] = $this->Menu_header_model->tampil_data()->result();
			$this->load->view('Menu_child_view',$data);
		}
		else{
			redirect(site_url().'/Auth/logout');
		}
    }

    public function update()
    {
        $this->output->enable_profiler(TRUE);
        $kode_menu_header = $this->input->post('kode_menu_header');
        $kode_menu_child = $this->input->post('kode_menu_child');
        $menu_name = $this->input->post('menu_name');
        $file_php = $this->input->post('file_php');
        $data = array(
                'kode_menu_child' => $kode_menu_child,
                'kode_menu_header' => $kode_menu_header,
                'menu_name' => $menu_name,
                'file_php' => $file_php
                );
        if ($this->input->post('action')=="add"){
            $this->Menu_child_model->input_data($data, 'menu_child');	
            $this->session->set_flashdata('msg', 'Berhasil Simpan');
        }else{
            $this->Menu_child_model->update_data($data, 'menu_child', $kode_menu_child);	
            $this->session->set_flashdata('msg', 'Berhasil Update');
        }
	redirect(site_url() . '/Menu_child_ctrl');
    }
	
	public function inactive()
    {
        $this->output->enable_profiler(TRUE);
		$data = array('status_aktif' => 'NO');
        $kode_menu_child_delete = $this->input->post('kode_menu_child_delete');
		$this->Menu_child_model->inactive_data($data,'menu_child',$kode_menu_child_delete);
		$this->session->set_flashdata('msg', 'Berhasil Didelete');		
		redirect(site_url() . '/Menu_child_ctrl');
	}
}
?>
