<?php
class pelelangan_model extends CI_Model
{
	function __contruct()
	{
		parent::__construct();
	}
	function tambah(){
		$this->load->library('session');
		$config['upload_path']='aset/img/';
		$config['allowed_types']='gif|jpg|png|jpeg';
		$nama_barang=$this->input->post('nama_barang');
		$config['file_name']=url_title($nama_barang);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('foto')){
			echo $this->upload->display_errors();
		}
		else{
			$data=array(
				'id_user'=>$this->session->userdata('id_user'),
				'nama_barang'=>$this->input->post('nama_barang'),
				'deskripsi_barang'=>$this->input->post('deskripsi_barang'),
				'harga_barang'=>$this->input->post('harga_barang'),
				'batas_pelelangan'=>$this->input->post('batas_pelelangan'),
				'foto'=>$this->upload->file_name);
			$this->db->insert('pelelangan',$data);
			$query = $this->db->query("select * from pelelangan where nama_barang='$nama_barang'");
			return $query;
		}
		}
		function delete(){
			$this->load->library('session');
			$id_user=$this->session->userdata('id_user');
			$id_barang=$this->uri->segment(3);
			$query=$this->db->query("delete from pelelangan where id_barang='$id_barang' and id_user='$id_user'");
			return $query;
		}
		function edit(){
			$this->load->library('session');
			$id_barang=$this->input->post('id_barang');
			$nama_barang=$this->input->post('nama_barang');
			$deskripsi_barang=$this->input->post('deskripsi_barang');
			$harga_barang=$this->input->post('harga_barang');
			$batas_pelelangan=$this->input->post('batas_pelelangan');
			$id_user=$this->session->userdata('id_user');
			$this->db->query("update pelelangan set nama_barang='$nama_barang', deskripsi_barang='$deskripsi_barang',
				harga_barang='$harga_barang', batas_pelelangan='$batas_pelelangan'
				where id_barang='$id_barang' and id_user='$id_user'");
			$query=$this->db->query("select * from pelelangan where id_barang='$id_barang'");
			return $query;
		}
		function get_data_all(){
			$query=$this->db->query("select * from pelelangan");
			return $query;
		}
		function get_data_detail(){
			$id_barang=$this->uri->segment(3);
			$query=$this->db->query("select * from pelelangan where id_barang='$id_barang'");
			return $query;
		}
		function tawar(){
		$this->load->library('session');
		$harga_barang=$this->input->post('harga_barang');
		$id_barang=$this->input->post('id_barang');
		$harga_barang2=$this->db->query("select harga_barang from pelelangan where id_barang='$id_barang'");
		if($harga_barang>$harga_barang2){
		$data=array('id_pembeli'=>$this->session->userdata('id_user'),
			'id_seniman'=>$this->input->post('id_user'),
			'id_barang'=>$this->input->post('id_barang'),
			'nama_barang'=>$this->input->post('nama_barang'),
			'harga_barang'=>$this->input->post('harga_barang'),
			'foto'=>$this->input->post('foto'),
			'alamat'=>$this->session->userdata('alamat'),
			'no_tlp'=>$this->session->userdata('no_tlp'),
			'type'=>'lelang'
			);
		$this->db->insert('pembayaran',$data);
		$this->db->query("update pelelangan set harga_barang='$harga_barang' where id_barang='$id_barang'");
	}
		$query=$this->db->query("select * from pembayaran");
		return $query;
	}
	}