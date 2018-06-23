<?php
defined('BASEPATH') or exit('ERROR');
	class Menu_level_model extends CI_model
	{

		public function data_index()
		{
			return $this->db->get('menu_hak_akses');
		}

		function tampil_data(){
        if (($_SESSION['kode_cabang'] == 1) || ($_SESSION['kode_cabang'] == 2))
        {
        return $this->db->query("SELECT mh.kode_akses, mh.kode_cabang, mc.nama_cabang, mh.hak_akses, mh.keterangan
        FROM menu_hak_akses mh, master_cabang mc
        WHERE mh.kode_cabang = mc.kode_cabang
        AND mh.status_aktif = 1
        ORDER BY mh.kode_akses DESC");
        }
        else
        {
        $kode_cabang = $_SESSION['kode_cabang'];
        return $this->db->query("SELECT mh.kode_akses, mh.kode_cabang, mc.nama_cabang, mh.hak_akses, mh.keterangan
        FROM menu_hak_akses mh, master_cabang mc
        WHERE mh.kode_cabang = mc.kode_cabang
        AND mh.status_aktif = 1
        AND mh.kode_cabang not in (1,2)
        AND mh.kode_cabang = ".$kode_cabang."
        ORDER BY mh.kode_akses DESC");
        }
    }


		public function Data_setting($kode_akses)
		{
			$sql = "SELECT c.kode_menu_child, c.menu_name,
					(select l.akses_insert from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_insert,
					(select l.akses_view from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_view,
					(select l.akses_edit from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_edit,
					(select l.akses_delete from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_delete
                    FROM `menu_child` c 
                    WHERE c.status_aktif='YES'";
			$result = $this->db->query($sql);
			return $result;
		}

	function get_menu_child(){
        return $this->db->query("SELECT `kode_menu_child`, `kode_menu_header`, `menu_name`, `file_php`, `status_aktif`
		FROM `menu_child` WHERE status_aktif='YES'");
    }

    function input_data($data,$table){
        //$this->output->enable_profiler(TRUE);
        return $this->db->insert($table,$data);
    }
    function update_data($data,$table,$where){
        $this->db->where('kode_menu_child',$where);
        $this->db->update($table,$data);
        return true;
    }
    function delete_data($table,$where){
        $this->db->where('kode_akses',$where);
        $this->db->delete($table);
        return true;
    }
	}