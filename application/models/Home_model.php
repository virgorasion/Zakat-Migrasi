<?php
defined("BASEPATH")or exit("error");

class Home_model extends CI_model{

    public function tot_masuk()
    {
        $date1 = date("Y-01-01");
        $date2 = date("Y-12-31");
        return $this->db->select("SUM(kas_masjid.jumlah) as jumlah, date_format(kas_masjid.tanggal, '%M-%Y') as tanggal")
                            ->from("kas_masjid")
                            // ->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe")
                            ->join("bulan", "bulan.id = date_format(kas_masjid.tanggal,'%m')")
                            ->where("date_format(kas_masjid.tanggal,'%m') >=",1)
                            ->where("date_format(kas_masjid.tanggal,'%m') <=",11)
                            ->group_by("bulan.id")
                            ->get()->result();
    }

    public function getTanggalChart()
    {
        $date1 = date("Y-01-01");
        $date2 = date("Y-12-31");
        return $this->db->query("SELECT date_format(kas_masjid.tanggal, '%d-%M-%Y') AS tanggal, kas_masjid.tanggal AS urut FROM kas_masjid WHERE kas_masjid.tanggal BETWEEN '".$date1."' AND '".$date2."'
                                UNION
                                SELECT date_format(lap_pengeluaran.tanggal, '%d-%M-%Y') AS tanggal, lap_pengeluaran.tanggal AS urut FROM lap_pengeluaran WHERE lap_pengeluaran.tanggal BETWEEN '".$date1."' AND '".$date2."'
                                ORDER BY urut")->result();
    }
    
    function tot_keluar()
    {
        $date1 = date("Y-01-01");
        $date2 = date("Y-12-31");
        return $this->db->select("SUM(lap_pengeluaran.jumlah) as jumlah, date_format(lap_pengeluaran.tanggal, '%M-%Y') as tanggal")
                            ->from("lap_pengeluaran")
                            // ->join("tipe_donasi", "tipe_donasi.id_tipe = kas_masjid.id_tipe")
                            ->join("bulan", "bulan.id = date_format(lap_pengeluaran.tanggal,'%m')")
                            ->where("lap_pengeluaran.tanggal >= '".$date1."' ")
                            ->where("lap_pengeluaran.tanggal <= '".$date2."'")
                            ->group_by("bulan.id")
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