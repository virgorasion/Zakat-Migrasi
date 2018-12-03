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