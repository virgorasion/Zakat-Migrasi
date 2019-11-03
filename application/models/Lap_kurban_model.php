<?php
	defined('BASEPATH') or exit('ERROR');

	class Lap_kurban_model extends CI_model{

		public function sel_date($t1,$t2){
		return $this->db->query("SELECT h.id,h.id_admin,h.penyumbang,h.jenis,h.jumlah,date_format(h.tanggal,'%d-%M-%Y') as tanggal_transaksi, h.tanggal,h.alamat,h.log_time, m.id_admin,m.nama AS admin,m.username
          FROM hewan_kurban h, master_login m
          WHERE h.id_admin = m.id_admin
          AND date_format(h.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(h.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal");
        }

        public function getDataKurban($tanggalAwal, $tanggalAkhir)
        {
            $this->datatables->select("hewan_kurban.id, hewan_kurban.penyumbang, hewan_kurban.jenis, hewan_kurban.jumlah, date_format(hewan_kurban.tanggal, '%d-%M-%Y') as tanggal_transaksi, hewan_kurban.tanggal, hewan_kurban.alamat, hewan_kurban.log_time, master_login.id_admin, master_login.nama as admin, master_login.username");
            $this->datatables->from("hewan_kurban");
            $this->datatables->join("master_login", "master_login.id_admin = hewan_kurban.id_admin");
            $this->datatables->where("date_format(hewan_kurban.tanggal, '%Y%m%d') >=", $tanggalAwal);
            $this->datatables->where("date_format(hewan_kurban.tanggal, '%Y%m%d') <=", $tanggalAkhir);
            function callback_jenis($jenis){
                $hewan = "";
                if ($jenis == 1) {
                    $hewan = "Kambing";
                }else if($jenis == 2){
                    $hewan = "Sapi";
                }else{
                    $hewan = "Undefined";
                }
                return $hewan;
            }
            $this->datatables->add_column("jenis_hewan","$1","callback_jenis(jenis)");
            $this->datatables->add_column("aksi", 
            "<a href='javascript:void(0)' class='btnEdit btn btn-warning btn-xs' title='Edit' data-id='$1' data-penyumbang='$2' data-alamat='$7' data-jumlah='$4' data-hewan='$3'><i class='fa fa-pencil'></i></a> <a href='javascript:void(0)' class='btnDelete btn btn-danger btn-xs' data-id='$1' data-tanggal='$5' data-penyumbang='$2' data-hewan='$12'><i class='fa fa-remove'></i></a>",
            "id,
            penyumbang,
            jenis,
            jumlah,
            tanggal_transaksi,
            tanggal,
            alamat,
            log_time,
            id_admin,
            admin,
            username,
            callback_jenis(jenis)");
            return $this->datatables->generate();
        }
        
        public function insert_data($table,$data)
        {
            return $this->db->insert($table,$data);
        }

        public function update_data($table,$data,$id)
        {
            $this->db->where('id',$id);
            return $this->db->update($table,$data);
        }

        public function delete_data($table,$id)
        {
            $this->db->where('id',$id);
            return $this->db->delete($table);
        }
	}

?>