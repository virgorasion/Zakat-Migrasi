<?php 
    defined('BASEPATH') or exit('ERROR');

    class lap_idul_adha_model extends CI_model{

       public function sel_date($t1,$t2){
        return $this->db->query("SELECT l.nomor,l.id_admin,date_format(l.tanggal,'%d/%m/%Y') as tanggal_transaksi, l.tanggal,l.jumlah,l.log_time, m.id_admin,m.nama AS admin,m.username
          FROM lap_idul_adha l, master_login m
          WHERE l.id_admin = m.id_admin
          AND m.nama = '".$_SESSION['nama']."'
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal");
       }

       public function insert_data($table,$data)
       {
           $this->db->insert($table,$data);
           return true;
       }

       public function update_data($table,$data,$id)
       {
           $this->db->where('nomor',$id);
           return $this->db->update($table,$data);
       }

       public function delete_data($table,$id)
       {
           $this->db->where('nomor',$id);
           return $this->db->delete($table);
       }
    }
?>