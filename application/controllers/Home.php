<?php
defined("BASEPATH") or exit("Some Error");

	class Home extends CI_controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Home_model');
		}

		public function index(){
			if(isset($_SESSION['username'])){
				date_default_timezone_set('Asia/Jakarta');
				$masuk = $this->Home_model->tot_masuk();
				$keluar = $this->Home_model->tot_keluar();
				$tot_kas = $this->Home_model->tot_kas();
				$tot_pengeluaran = $this->Home_model->tot_pengeluaran();
				$tot_zakat = $this->Home_model->tot_zakat();
				$tot_kurban = $this->Home_model->tot_kurban();
				$tanggal_chart = $this->Home_model->getTanggalChart();
				$labels_masuk = '';
				foreach ($tanggal_chart as $item) {
					$labels_masuk .= "'".$item->tanggal."', ";
				}
				$tot_masuk = '';
				foreach ($masuk as $item){
					$tot_masuk .=  "{ x: '".$item->tanggal."', y: '".$item->jumlah."'}, ";
				}
				$tot_keluar = '';
				foreach ($keluar as $item) {
					$tot_keluar .= "{ x: '".$item->tanggal."', y: '".$item->jumlah."'}, ";
				}
				$tot_masuk = substr($tot_masuk,0,-2);
				$tot_keluar = substr($tot_keluar,0,-2);
				$labels_masuk = substr($labels_masuk,0,-2);
				
				$data['tot_masuk'] = $tot_masuk;
				$data['labels_masuk'] = $labels_masuk;
				$data['tot_keluar'] = $tot_keluar;
				$data['tot_kas'] = $tot_kas[0]->jumlah - $tot_pengeluaran[0]->jumlah;
				$data['tot_pengeluaran'] = $tot_pengeluaran[0]->jumlah;
				$data['tot_zakat'] = $tot_zakat[0]->zakat;
				$data['tot_kurban'] = $tot_kurban;
				// var_dump($tot_zakat);
				// var_dump($labels_masuk);
				// die();
				$this->load->view("home",$data);
			}else{
				redirect('Auth/logout');
			}
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