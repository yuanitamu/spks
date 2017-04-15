<?php
class register_model extends CI_Model
{
	function __contruct()
	{
		parent::__construct();
	}
	function register()
	{
		$config['upload_path']='aset/img/user/';
		$config['allowed_types']='gif|jpg|png|jpeg';
		$username=$this->input->post('username');
		$config['file_name']=url_title($username);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('foto')){
			echo $this->upload->display_errors();
		}
		else{
			$query=$this->db->query("select * from user");
			$dt['item']=$query->result();
			$username=$this->input->post('username');
			$email=$this->input->post('email');
			$level=$this->input->post('level');
			$password=$this->input->post('password');
			$md5=md5($password);
			foreach ($dt['item'] as $key) {
				if(($username==$key->username)|($email==$key->email)){
					echo "Username/email sudah digunakan.";
				}}
				if(($username!=$key->username)&&($email!=$key->email)){
					$data=array(
						'username'=>$this->input->post('username'),
						'password'=>$md5,
						'nama'=>$this->input->post('nama'),
						'alamat'=>$this->input->post('alamat'),
						'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
						'tgl_lahir'=>$this->input->post('tgl_lahir'),
						'no_tlp'=>$this->input->post('no_tlp'),
						'email'=>$this->input->post('email'),
						'level'=>$this->input->post('level'),
						'foto'=>$this->upload->file_name);
					if($level=='Seniman'){
						$query=$this->db->insert('verifikasi',$data);
					}else{
						$query=$this->db->insert('user',$data);
					}
				}
			}
			return $query;
		}
		function login(){
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$md5=md5($password);
			$query = $this->db->query("select * from user where username='$username' and password='$md5'");
			if ($query->num_rows() > 0) {
				foreach ($query->result() as $rows) {
                //add all data to session
					$data = array(
						'id_user' => $rows->id_user,
						'username' => $rows->username,
						'nama' => $rows->nama,
						'email' => $rows->email,
						'alamat' => $rows->alamat,
						'no_tlp' => $rows->no_tlp,
						'jenis_kelamin' => $rows->jenis_kelamin,
						'foto' => $rows->foto,
						'tgl_lahir' => $rows->tgl_lahir,
						'level' => $rows->level
						);
				}
				$this->load->library('session');
				$this->session->set_userdata($data);
				return true;
			}else
			return false;
		}
	}?>