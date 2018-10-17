<?php

class Kas_model extends CI_model 
{

    var $column_order = array(null, 'nama_donatur','tipe','jumlah','tanggal'); //set column field database for datatable orderable
	var $column_search = array('nama_donatur','nama','tipe','jumlah','tanggal'); //set column field database for datatable searchable 
	var $order = array('id' => 'desc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->from('Kas_masjid');
        $i = 0;

        foreach ($this->column_search as $item) {
            if (@$_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, @$_POST['search']['value']);
                }else{
                    $this->db->or_like($item, @$_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[@$_POST['order']['0']['column']], @$_POST['order']['o']['dir']);
        } else if(isset($this->order)){
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if (@$_POST['lenght'] != -1) {
            $this->db->limit(@$_POST['length'], @$_POST['start']);
            $query = $this->db->get();
            return $query->result();
        }
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    function count_all()
    {
        return $this->db->count_all('Kas_masjid');
    }

    public function insertData($table,$data)
    {
        return $this->db->insert($table,$data);
    }

    public function deleteData($table,$id)
    {
        $this->db->where('id',$id);
        $this->db->delete('kas_masjid');
        return true;
    }  
}