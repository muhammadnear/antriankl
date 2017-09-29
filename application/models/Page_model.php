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
		function insert_libur($data)
		{
			$this->db->insert("hari_libur",$data);
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
		function get_libur()
		{
			$value = $this->db->get('hari_libur')->result();
			return $value;
		}
		function get_pemohon_byKode($kode)
		{
			$this->db->where('kode_booking', $kode);
			$value = $this->db->get('pemohon')->result();
			return $value;
		}
		function get_pemohon_byPaspor($paspor)
		{
			$this->db->where('no_paspor_permit', $paspor);
			$value = $this->db->get('pemohon')->result();
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
		function update_konfig($data, $id)
		{
			$this->db->where('id', $id);
			$this->db->update('konfigurasi', $data);
		}
		//DELETE
		function delete_libur($id)
		{
			$this->db->where('id_hari_libur',$id);
			$this->db->delete('hari_libur');
		}
		
		function Custom_Query()
		{
			$value = $this->db->query("SELECT * from `table` where 1")->result();
			return $value;
		}
	}
?>