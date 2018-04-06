<?php
defined("BASEPATH") or exit("Some Error");

	class Home extends CI_controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Lap_zakat_model');
		}

		public function index(){
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date("Y-m-d");
			$data['data'] = $this->Lap_zakat_model->select_zakat($tanggal)->result();
			$this->load->view('home',$data);
		}

		public function insert_zakat(){
			date_default_timezone_set('Asia/Jakarta');
			$tanggal = date("Y-m-d");
			$log_time = date("Y-m-d H:i:s");
			$data = array(
			'id_admin' 		=> $_SESSION['id_admin'],
			'tanggal' 		=> $tanggal,
			'nama' 			=> $this->input->post('nama'),
			'alamat' 		=> $this->input->post('alamat'),
			'zakat_fitrah' 	=> $this->input->post('zakatF'),
			'beli' 			=> $this->input->post('select'),
			'zakat_mall' 	=> $this->input->post('zakatM'),
			'infaq' 		=> $this->input->post('infaq'),
			'log_time' 		=> $log_time);
			$this->db->insert('list_zakat', $data);
			redirect('home');
		}

		public function view_zakat(){
			
		}
	}

?>