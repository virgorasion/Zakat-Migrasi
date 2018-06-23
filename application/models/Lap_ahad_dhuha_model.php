<?php 
    defined('BASEPATH') or exit('ERROR');

    class Lap_ahad_dhuha_model extends CI_model{

       public function sel_date($t1,$t2){
        return $this->db->query("SELECT l.nomor,l.id_admin,date_format(l.tanggal,'%d/%m/%Y') as tanggal_transaksi, l.tanggal,l.jumlah,l.log_time, m.id_admin,m.nama AS admin,m.username
          FROM lap_ahad_dhuha l, master_login m
          WHERE l.id_admin = m.id_admin
          AND m.nama = '".$_SESSION['nama']."'
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal");
       }
       public function getNomor(){
        $sql = "SELECT MAX(nomor) as nomor FROM lap_ahad_dhuha limit 1";
        return $query = $this->db->query($sql);

       }
       public function insert($no,$table,$data){
        $this->db->where('nomor',$no);
        $this->db->insert($table,$data);
        return true;
       }

       public function delete($no,$table){
        $this->db->where('nomor',$no);
        $this->db->delete($table);
        return true;
       }

       public function update($no,$table,$data){
        $this->db->where('nomor',$no);
        $this->db->update($table,$data);
        return true;
       }
       public function data_struk(){
          $sql = "SELECT * FROM lap_ahad_dhuha";
          return $this->db->query($sql);
       }
    }
?>