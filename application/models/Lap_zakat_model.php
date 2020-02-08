<?php 
    defined('BASEPATH') or exit('ERROR');

    class Lap_zakat_model extends CI_model{

       public function select_zakat($nomor){
            $this->db->where('nomor', $nomor);
            return $this->db->get('list_zakat');
               
       }

       public function sel_date($t1,$t2){
        return $this->db->query("SELECT l.nomor,l.id_admin,date_format(l.tanggal,'%d/%m/%Y') as tanggal_transaksi, l.tanggal, l.nama,l.alamat,l.zakat_fitrah,l.beli,l.zakat_mall,l.infaq,l.log_time, m.id_admin,m.nama AS admin,m.username
          FROM list_zakat l, master_login m
          WHERE l.id_admin = m.id_admin
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          GROUP BY l.nomor
          ORDER BY l.tanggal DESC");
       }

       public function sel_beli($t1, $t2)
       {
        return $this->db->query("SELECT SUM(l.zakat_fitrah) as zakat, m.id_admin,m.nama, l.id_admin 
          FROM list_zakat l, master_login m 
          WHERE l.id_admin = m.id_admin 
          AND m.nama = '".$_SESSION['nama']."' 
          AND l.beli = 'Beli'
          AND date_format(l.tanggal,'%Y%m%d') >= '$t1'
          AND date_format(l.tanggal,'%Y%m%d') <= '$t2'
          ORDER BY tanggal");
       }

       public function input($table,$nama,$alamat,$zakatFitrah,$pembelian,$zakatMal,$infaq,$tanggal)
       {
           $data = array(
            'id_admin' => $_SESSION['id_admin'],
            'tanggal' => $tanggal,
            'nama' => $nama,
            'alamat' => $alamat,
            'zakat_fitrah' => $zakatFitrah,
            'beli' => $pembelian,
            'zakat_mall' => $zakatMal,
            'infaq' => $infaq
           );
           $this->db->insert($table,$data);
       }
       public function ganti($nomor,$namaEdt,$alamatEdt,$zakatFitrahEdt,$pembelianEdt,$zakatMalEdt,$infaqEdt)
       {
            $data = array(
                'nama' => $namaEdt,
                'alamat' => $alamatEdt,
                'zakat_fitrah' => $zakatFitrahEdt,
                'beli' => $pembelianEdt,
                'zakat_mall' => $zakatMalEdt,
                'infaq' => $infaqEdt
            );
            $this->db->where('nomor', $nomor);
            $this->db->update('list_zakat',$data);
            return true;
       }

       public function hapus($nomor)
       {
           $this->db->where('nomor',$nomor);
           $this->db->delete('list_zakat');
           return true;
       }

    //    public function sync_data($t1,$t2)
    //    {
    //        $sql = 'SELECT l.nomor,l.id_admin,date_format(l.tanggal,"d/m/Y") as tanggal_transaksi, l.tanggal, l.nama,l.alamat,l.zakat_fitrah,l.beli,l.zakat_mall,l.infaq,l.log_time, m.id_admin,m.nama AS admin,m.username
    //       FROM list_zakat l, master_login m
    //       WHERE m.nama = "'.$_SESSION['nama'].'"
    //       AND date_format(l.tanggal,"Y-m-d") >= '.$t1.'
    //       AND date_format(l.tanggal,"Y-m-d") <= '.$t2.'
    //       ORDER BY tanggal,nomor DESC ';

    //        return $this->db->get('list_zakat');
    //        //nomor, id_admin, tanggal_trnsaksi, tanggal, nama, alamat, zakat_fitrah, beli, zkat_mall, infaq,
    //        //log_time, id_admin, admin, username
    //    }
    }
?>