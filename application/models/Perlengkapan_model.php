<?php

class Perlengkapan_model extends CI_Model
{
    public function dataRuangan()
    {
        $get = $this->db->select("id,nama_ruang")->from("ruangan_masjid")->get();
        return $get;
    }

    public function hapusData(string $table, array $id)
    {
        $delete = $this->db->delete($table, $id);
        return $delete;
    }

    public function UpdateData(string $table, array $data, array $id)
    {
        $this->db->where($id);
        $update = $this->db->update($table, $data);
        return $update;
    }

    public function dataPerlengkapanTiapRuangan($kode_ruangan)
    {
        $this->datatables->select('perlengkapan.id,perlengkapan.id_ruang,perlengkapan.nama_barang,perlengkapan.kondisi,perlengkapan.jumlah,ruangan_masjid.nama_ruang');
        $this->datatables->from("perlengkapan");
        $this->datatables->join("ruangan_masjid","perlengkapan.id_ruang = ruangan_masjid.id");
        $this->datatables->where("perlengkapan.id_ruang", $kode_ruangan);
        $this->datatables->add_column('action',
        '<a href="javascript:void(0)" class="edit_data btn btn-warning btn-xs" title="Edit" data-id="$1" data-id_ruang="$2" data-barang="$3" data-kondisi="$4" data-jumlah="$5" data-ruang="$6"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" class="delete_data btn btn-danger btn-xs" data-id="$1" data-barang="$3" data-ruang="$6"><i class="fa fa-remove"></i></a>', 
        'id,
        id_ruang,
        nama_barang,
        kondisi,
        jumlah,
        nama_ruang');
        return $this->datatables->generate();
    }

    public function dataSemuaPerlengkapan()
    {
        $this->datatables->select('perlengkapan.id,perlengkapan.id_ruang,perlengkapan.nama_barang,perlengkapan.kondisi,perlengkapan.jumlah,ruangan_masjid.nama_ruang');
        $this->datatables->from("perlengkapan");
        $this->datatables->join("ruangan_masjid","perlengkapan.id_ruang = ruangan_masjid.id");
        $this->datatables->add_column('action',
        '<a href="javascript:void(0)" class="edit_data btn btn-warning btn-xs" title="Edit" data-id="$1" data-id_ruang="$2" data-barang="$3" data-kondisi="$4" data-jumlah="$5" data-ruang="$6"><i class="fa fa-pencil"></i></a> <a href="javascript:void(0)" class="delete_data btn btn-danger btn-xs" data-id="$1" data-barang="$3" data-ruang="$6"><i class="fa fa-remove"></i></a>', 
        'id,
        id_ruang,
        nama_barang,
        kondisi,
        jumlah,
        nama_ruang');
        return $this->datatables->generate();
    }
}
