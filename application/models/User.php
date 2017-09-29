<?php
	
	class User extends CI_Model
	{
		function __construct()
		{
			parent::__construct();
		}
		function GetLogin()
		{
			$value = $this->db->query('SELECT * FROM  `login` WHERE 1')->result();
			return $value;
		}
		function LastVisit($data, $id)
		{
			$this->db->where('id_login', $id);
			$this->db->update('login', $data);
		}
		function GetloginById($id)
		{
			$value = $this->db->query("SELECT * FROM  `login` WHERE id_login='$id'")->result();
			return $value;
		}
		function updatelogin($data, $id)
		{
			$this->db->where('id_login', $id);
			$this->db->update('login', $data);
		}
		function hapuslogin($id)
		{
			$this->db->where('id_login',$id);
			$this->db->delete('login');
		}
		function insertlogin($data)
		{
			return $this->db->insert("login",$data);
		}
	}
?>