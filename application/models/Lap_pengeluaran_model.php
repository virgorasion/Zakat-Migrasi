<?php 
   defined('BASEPATH') or exit('ERROR');

   class Lap_pengeluaran_model extends CI_model{

      public function sel_date($t1,$t2){
      return $this->db->query("SELECT l.id_pengeluaran,l.id_admin,date_format(l.tanggal,'%d-%M-%Y') as tanggal,l.jumlah,l.keterangan,l.log_time, m.id_admin,m.nama AS admin,m.username
         FROM lap_pengeluaran l, master_login m
         WHERE l.id_admin = m.id_admin
         AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
         AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
         ORDER BY tanggal");
      }

      public function get_total_pengeluaran_print($t1,$t2)
      {
         return $this->db->query("SELECT sum(l.jumlah) as total
         FROM lap_pengeluaran l, master_login m
         WHERE l.id_admin = m.id_admin
         AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
         AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
         ORDER BY tanggal");
      }

      public function getDataPengeluaran($tanggalAwal, $tanggalAkhir)
      {
         $this->datatables->select("lap_pengeluaran.id_pengeluaran, lap_pengeluaran.id_admin, date_format(lap_pengeluaran.tanggal, '%d-%M-%Y') as tanggal, lap_pengeluaran.jumlah, lap_pengeluaran.keterangan, lap_pengeluaran.log_time, master_login.nama as admin, master_login.username");
         $this->datatables->from("lap_pengeluaran");
         $this->datatables->join("master_login", "master_login.id_admin = lap_pengeluaran.id_admin");
         $this->datatables->where("lap_pengeluaran.tanggal >=", $tanggalAwal);
         $this->datatables->where("lap_pengeluaran.tanggal <=", $tanggalAkhir);
         $this->datatables->add_column("aksi", 
         "<a href='javascript:void(0)' class='btnEdit btn btn-warning btn-xs' title='Edit' data-id_pengeluaran='$1' data-id_admin='$2' data-tanggal='$3' data-jumlah='$4' data-keterangan='$5' data-log_time='$6' data-admin='$7' data-username='$8'><i class='fa fa-pencil'></i></a> <a href='javascript:void(0)' class='btnDelete btn btn-danger btn-xs' data-id_pengeluaran='$1' data-tanggal='$3' data-ruang='$6'><i class='fa fa-remove'></i></a>",
         'id_pengeluaran,
         id_admin,
         tanggal,
         jumlah,
         keterangan,
         log_time,
         admin,
         username');
         return $this->datatables->generate();
      }

      public function InsertData($table,$data)
      {
         return $this->db->insert($table,$data);
      }

      public function UpdateData($table,$data,$id)
      {
         return $this->db->update($table,$data,array("id_pengeluaran" => $id));
      }
      
      public function DeleteData($table,$id)
      {
         return $this->db->delete($table,array("id_pengeluaran" => $id));
      }
      
   }
?>