<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pembayaran_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->library('session');
	}
	public function data_list_pembayaran(){
		$this->load->model('pembayaran_model');
		$hasil=$this->pembayaran_model->get_data_all();
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			// $id_pembeli=$item->id_pembeli;
			// $id_seniman=$item->id_seniman;
			// $seniman=("select * from user where id_user='$id_seniman'");
			// $pembeli=("select * from user where id_user='$id_pembeli'");
			// $data['pembeli']=$pembeli->result();
			// $data['seniman']=$seniman->result();
			if($this->session->userdata('level')=='Pembeli'){
				$this->load->view('pembayaran',$data);
			}else{
				$this->load->view('pembayaran_seniman',$data);
			}
		}
	}
	public function bukti_pembayaran(){
		$this->load->model('pembayaran_model');
		$this->load->model('penjualan_model');
		$hasil=$this->pembayaran_model->bukti_pembayaran();
		if($hasil){
			$this->penjualan_model->delete();
		}
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			$this->load->view('pembayaran',$data);
		}
	}
}