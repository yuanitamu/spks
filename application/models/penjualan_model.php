<?php
class penjualan_model extends CI_Model
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
				'id_user' => $this->session->userdata('id_user'),
				'nama_barang'=>$this->input->post('nama_barang'),
				'deskripsi_barang'=>$this->input->post('deskripsi_barang'),
				'harga_barang'=>$this->input->post('harga_barang'),
				'foto'=>$this->upload->file_name
				);
			$this->db->insert('penjualan',$data);
			$query = $this->db->query("select * from penjualan where nama_barang='$nama_barang'");
			return $query;
		}
	}
	function delete(){
		$this->load->library('session');
		$id_barang=$this->uri->segment(3);
		$id_user=$this->session->userdata('id_user');
		$query=$this->db->query("delete from penjualan where id_barang='$id_barang' and id_user='$id_user'");
		return $query;
	}
	function edit(){
		$this->load->library('session');
		$id_barang=$this->input->post('id_barang');
		$nama_barang=$this->input->post('nama_barang');
		$harga_barang=$this->input->post('harga_barang');
		$deskripsi_barang=$this->input->post('deskripsi_barang');
		$id_user=$this->session->userdata('id_user');
		$this->db->query("update penjualan set nama_barang='$nama_barang', deskripsi_barang='$deskripsi_barang', harga_barang='$harga_barang'
			where id_barang='$id_barang' and id_user='$id_user'");
		$query=$this->db->query("select * from penjualan where id_barang='$id_barang'");
		return $query;
	}
	function get_data(){
		$id_barang=$this->input->post('id_barang');
		$query=$this->db->query("select * from penjualan where id_barang='$id_barang'");
		return $query;
	}
	function get_data_all(){
		$query=$this->db->query("select * from penjualan");
		return $query;
	}
	function get_data_detail(){
		$id_barang=$this->uri->segment(3);
		$query=$this->db->query("select * from penjualan where id_barang='$id_barang'");
		return $query;
	}
	function beli(){
		$this->load->library('session');
		$id_barang=$this->uri->segment(3);
		$dt=$this->db->query("select * from penjualan where id_barang='$id_barang'");
		$newdata['item']=$dt->result();
		foreach ($newdata['item'] as $key) {
			$data=array('id_pembeli'=>$this->session->userdata('id_user'),
				'id_seniman'=>$key->id_user,
				'id_barang'=>$key->id_barang,
				'nama_barang'=>$key->nama_barang,
				'harga_barang'=>$key->harga_barang,
				'foto'=>$key->foto,
				'alamat'=>$this->session->userdata('alamat'),
				'no_tlp'=>$this->session->userdata('no_tlp'),
				'type'=>'jual');
		}
		$this->db->insert('pembayaran',$data);
		$query=$this->db->query("select * from pembayaran");
		return $query;
	}
}
?>