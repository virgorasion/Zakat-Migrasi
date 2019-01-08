<?php
defined("BASEPATH") or exit("Some Error");

	class Home extends CI_controller{

		public function __construct(){
			parent::__construct();
			$this->load->model('Lap_zakat_model');
		}

		public function index(){
			if(isset($_SESSION['username'])){
				date_default_timezone_set('Asia/Jakarta');
				$query = $this->db->select("SUM(kas_masjid.jumlah) as jumlah, kas_masjid.tanggal")
                            ->from("kas_masjid")
                            // ->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe")
							->order_by("kas_masjid.tanggal")
                            ->group_by("kas_masjid.tanggal")
                            ->get()->result();
            $dataset = '';
			$labels = '';
            foreach ($query as $item){
                $dataset .= "'".number_format((double)$item->jumlah,0,".",".")."', ";
				$dc = date_create($item->tanggal);
				$date = date_format($dc,"M d Y");
				$labels .= "'".$date."', ";
            }
            $dataset = substr($dataset,0,-2);
			$labels = substr($labels,0,-2);
            $data['chart'] = $dataset;
			$data['labels'] = $labels;
            // var_dump($dataset);
			// var_dump($labels);
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