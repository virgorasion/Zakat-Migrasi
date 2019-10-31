<?php
defined("BASEPATH")or exit("error");

class Home_model extends CI_model{

    public function tot_masuk()
    {
        $date1 = date("Y-01-01");
        $date2 = date("Y-12-31");
        return $this->db->select("SUM(kas_masjid.jumlah) as jumlah, date_format(kas_masjid.tanggal, '%M') as tanggal")
                            ->from("kas_masjid")
                            // ->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe")
                            ->where("kas_masjid.tanggal >= '".$date1."' ")
                            ->where("kas_masjid.tanggal <= '".$date2."'")
							->order_by("kas_masjid.tanggal")
                            ->group_by("MONTH(kas_masjid.tanggal)")
                            ->get()->result();
    }
    
    function tot_keluar()
    {
        $date1 = date("Y-01-01");
        $date2 = date("Y-12-31");
        return $this->db->select("SUM(lap_pengeluaran.jumlah) as jumlah, date_format(lap_pengeluaran.tanggal, '%M') as tanggal")
                            ->from("lap_pengeluaran")
                            // ->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe")
                            ->where("lap_pengeluaran.tanggal >= '".$date1."' ")
                            ->where("lap_pengeluaran.tanggal <= '".$date2."'")
							->order_by("lap_pengeluaran.tanggal")
                            ->group_by("MONTH(lap_pengeluaran.tanggal)")
                            ->get()->result();
    }

    function tot_kas()
    {
        $date2 = date("Y");
        return $this->db->query("SELECT SUM(kas_masjid.jumlah) as jumlah FROM kas_masjid WHERE date_format(kas_masjid.tanggal, '%Y') = '".$date2."' ")->result();
    }

    function tot_pengeluaran()
    {
        $date2 = date("Y");
        return $this->db->query("SELECT SUM(lap_pengeluaran.jumlah) as jumlah FROM lap_pengeluaran WHERE date_format(lap_pengeluaran.tanggal, '%Y') = '".$date2."' ")->result();
    }

    function tot_zakat()
    {
        $date = date("Y");
        return $this->db->query("SELECT SUM(list_zakat.zakat_fitrah) as zakat FROM list_zakat WHERE date_format(list_zakat.tanggal, '%Y') = '".$date."' ")->result();
    }

    function tot_kurban()
    {
        $date = date("Y");
        return $this->db->query("SELECT SUM(hewan_kurban.jumlah) as jumlah, hewan_kurban.jenis FROM hewan_kurban WHERE date_format(hewan_kurban.tanggal,'%Y') = '".$date."' GROUP BY hewan_kurban.jenis")->result();
    }
}