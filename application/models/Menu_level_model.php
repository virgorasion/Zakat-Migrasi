<?php
defined('BASEPATH') or exit('ERROR');
	class Menu_level_model extends CI_model
	{

		public function data_index()
		{
			return $this->db->get('menu_hak_akses');
		}

		public function Data_setting($kode_akses)
		{
			$sql = "SELECT c.kode_menu_child, c.menu_name,
					(select l.akses_insert from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_insert,
					(select l.akses_view from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_view,
					(select l.akses_edit from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_edit,
					(select l.akses_delete from menu_level l where l.kode_menu_child= c.kode_menu_child and l.kode_akses = '".$kode_akses."')akses_delete
					FROM `menu_child` c WHERE c.status_aktif='YES'";
			$result = $this->db->query($sql);
			return $result;
		}
	}