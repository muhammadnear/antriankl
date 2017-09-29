<?php
	class Page_model extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		//CREATE
		function insert_pemohon($data)
		{
			$this->db->insert("pemohon",$data);
			return $this->db->insert_id();
		}
		//READ
		function get_kode_booking($string)
		{
			$this->db->where('kode_booking', $string);
			$value = $this->db->get('pemohon')->result();
			return $value;
		}
		function get_konfig()
		{
			$value = $this->db->get('konfigurasi')->result();
			return $value;
		}
		//COUNT
		function hitung_jam($tanggal, $jam)
		{
			$this->db->where('jadwal_hari', $tanggal);
			$this->db->where('jadwal_jam', $jam);
			$this->db->from('pemohon');
			return $this->db->count_all_results();
		}
		//UPDATE
		function update_pemohon($data, $id)
		{
			$this->db->where('id_pemohon', $id);
			$this->db->update('pemohon', $data);
		}
		//DELETE
		function Delete($id)
		{
			$this->db->where('id_pk',$id);
			$this->db->delete('table');
		}
		
		function Custom_Query()
		{
			$value = $this->db->query("SELECT * from `table` where 1")->result();
			return $value;
		}
	}
?>