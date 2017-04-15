<?php
class manajemen_user_model extends CI_Model
{
	function __contruct()
	{
		parent::__construct();
	}
	function delete(){
		$id_user=$this->uri->segment(3);
		$this->db->query("delete from user where id_user='$id_user'");
		$query=$this->db->query("select * from user");
		return $query;
	}
	function get_data(){
		$query=$this->db->query("select * from user");
		return $query;
	}
	function get_data_register(){
		$query=$this->db->query("select * from verifikasi");
		return $query;
	}
	function terima(){
		$id_user=$this->uri->segment(3);
		$query=$this->db->query("select * from verifikasi where id_user='$id_user'");
		$data['item']=$query->result();
		foreach ($data['item'] as $key) {
			$newdata=array(
				'username'=>$key->username,
				'password'=>$key->password,
				'nama'=>$key->nama,
				'alamat'=>$key->alamat,
				'jenis_kelamin'=>$key->jenis_kelamin,
				'tgl_lahir'=>$key->tgl_lahir,
				'no_tlp'=>$key->no_tlp,
				'email'=>$key->email,
				'level'=>$key->level,
				'foto'=>$key->foto);
			$this->db->insert('user',$newdata);
		}
		$this->db->query("delete from verifikasi where id_user='$id_user'");
		$query2=$this->db->query("select * from verifikasi");
		return $query2;
	}
	function tolak(){
		$id_user=$this->uri->segment(3);
		$this->db->query("delete from verifikasi where id_user='$id_user'");
		$query=$this->db->query("select * from verifikasi");
		return $query;
	}
}
?>