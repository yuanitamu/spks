<?php
class user_model extends CI_Model
{
	function __contruct()
	{
		parent::__construct();
	}
	function edit(){
		$config['upload_path']='aset/img/user/';
		$config['allowed_types']='gif|jpg|png|jpeg';
		$username=$this->input->post('username');
		$config['file_name']=url_title($username);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('foto')){
			echo $this->upload->display_errors();
		}
		else{
			$id_user=$this->input->post('id_user');
			$username=$this->input->post('username');
			$password=$this->input->post('password');
			$nama=$this->input->post('nama');
			$alamat=$this->input->post('alamat');
			$jenis_kelamin=$this->input->post('jenis_kelamin');
			$tgl_lahir=$this->input->post('tgl_lahir');
			$no_tlp=$this->input->post('no_tlp');
			$email=$this->input->post('email');
			$foto=$this->upload->file_name;
			$this->db->query("update user set username='$username', password='$password', nama='$nama', alamat='$alamat', jenis_kelamin='$jenis_kelamin', tgl_lahir='$tgl_lahir', no_tlp='$no_tlp', email='$email', foto='$foto'
				where id_user='$id_user'");
			$query=$this->db->query("select * from  user where id_user='$id_user'");
			if($query->num_rows()>0){
				foreach ($query -> result() as $rows) {
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
	}
	
function get_data(){
	$this->load->library('session');
	$id_user=$this->session->userdata('id_user');
	$query=$this->db->query("select * from user where id_user='$id_user'");
	return $query;
}
}
?>