<?php
class Kas_model extends CI_model 
{

    public function get_kas_data_print($t1,$t2)
    {
        return $this->db->select("kas_masjid.nama_donatur,tipe_donasi.id_tipe,tipe_donasi.tipe,kas_masjid.jumlah,DATE_FORMAT(kas_masjid.tanggal, '%d-%M-%Y') as tanggal,master_login.nama,kas_masjid.id,kas_masjid.keterangan")
                ->from("kas_masjid")
                ->join("master_login", "master_login.id_admin = kas_masjid.id_admin")
                ->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe")
                ->where("kas_masjid.tanggal >=", $t1)
                ->where("kas_masjid.tanggal <=", $t2)
                ->get()->result();
    }

    public function get_total_kas_print($t1,$t2)
    {
        return $this->db->select("sum(kas_masjid.jumlah) as total")
                ->from("kas_masjid")
                ->join("master_login", "master_login.id_admin = kas_masjid.id_admin")
                ->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe")
                ->where("kas_masjid.tanggal >=", $t1)
                ->where("kas_masjid.tanggal <=", $t2)
                ->get()->result();
    }

    public function sel_date($t1,$t2)
    {
        $this->datatables->select('kas_masjid.nama_donatur,tipe_donasi.id_tipe,tipe_donasi.tipe,kas_masjid.jumlah,kas_masjid.tanggal,master_login.nama,kas_masjid.id,kas_masjid.keterangan');
        $this->datatables->from('kas_masjid');
        $this->datatables->join('master_login', 'master_login.id_admin = kas_masjid.id_admin');
        $this->datatables->join('tipe_donasi', 'tipe_donasi.id_tipe = kas_masjid.id_tipe');
        $this->datatables->where("DATE_FORMAT(kas_masjid.tanggal, \"%Y-%m-%d\") >=", $t1);
        $this->datatables->where("DATE_FORMAT(kas_masjid.tanggal, \"%Y-%m-%d\") <=", $t2);
        function callback_tanggal($tanggal){
            $date = date_create($tanggal);
            $format = date_format($date, "d-F-Y");
            return $format;
        }
        $this->datatables->add_column("tanggal","$1","callback_tanggal(tanggal)");
        $this->datatables->add_column('action', '<a href="javascript:void(0)" class="edit_data btn btn-warning btn-xs" data-donatur="$1" data-tipe="$2" data-jumlah="$3" data-keterangan="$8" data-tanggal="$4" data-kategori="$6" data-id=$7><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" class="delete_data btn btn-danger btn-xs" data-tanggal="$4" data-id="$7"><i class="fa fa-remove"></i></a>', 
        'nama_donatur,
        id_tipe,
        jumlah,
        tanggal,
        kategori,
        nama,
        id,
        keterangan');
        return $this->datatables->generate();
    }

    public function insertData($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function updateData($table,$data,$id)
    {
        return $this->db->where('id', $id)->update($table, $data);
    }

    public function deleteData($table,$id)
    {
        $this->db->where('id',$id);
        return $this->db->delete('kas_masjid');
    }  
}