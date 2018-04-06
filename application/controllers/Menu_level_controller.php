<?php 

class Menu_level_controller extends CI_controller{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Menu_level_model');
	}

	public function index()
	{
		$data['data'] = $this->Menu_level_model->data_index()->result();
		$this->load->view('Menu_level_view',$data);
	}

	public function Menu_setting($kode_akses){
		$data['data'] =  $this->Menu_level_model->Data_setting($kode_akses)->result();
		$data['kode_akses'] = $kode_akses;

		$this->load->view('Menu_level_edit_view', $data);
	}

}