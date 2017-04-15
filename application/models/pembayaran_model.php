<?php
class pembayaran_model extends CI_Model
{
	function __contruct()
	{
		parent::__construct();
	}
	function get_data_all(){
		$query=$this->db->query("select * from pembayaran");
		$data['item']=$query->result();
		return $query;
	}
	function bukti_pembayaran(){
		$config['upload_path']='aset/img/';
		$config['allowed_types']='gif|jpg|png|jpeg';
		$id_barang=$this->input->post('id_barang');
		$id_user=$this->session->userdata('id_user');
		$config['file_name']=url_title($id_barang);
		$this->upload->initialize($config);
		if(!$this->upload->do_upload('bukti_pembayaran')){
			echo $this->upload->display_errors();
		}
		else{
			$this->db->query("update pembayaran set bukti_pembayaran='$id_barang' where id_barang='$id_barang' and id_pembeli='$id_user'");
			$type=$this->db->query("select type from pembayaran where id_barang='$id_barang' and id_pembeli='$id_user'");
			if($type=='lelang'){
			$this->db->query("delete from pelelangan where id_barang='$id_barang'");
		}else if($type=='jual'){
			$this->db->query("delete from penjualan where id_barang='$id_barang'");
		}
			$query=$this->db->query("select * from pembayaran");
			return $query;
		}
	}
}