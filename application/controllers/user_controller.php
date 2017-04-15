<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class user_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	public function profil(){
		$this->load->library('session');
		$this->load->model('user_model');
		$this->load->model('gallery_model');
		$this->load->model('penjualan_model');
		$this->load->model('pelelangan_model');
		$hasil=$this->user_model->get_data();
		$hasil2=$this->gallery_model->get_data_all();
		$hasil3=$this->penjualan_model->get_data_all();
		$hasil4=$this->pelelangan_model->get_data_all();
		$level=$this->session->userdata('level');
		$data['umum']=$hasil2->result();
		$data['jual']=$hasil3->result();
		$data['lelang']=$hasil4->result();
		if(count($hasil)>0){
			if($level=='Seniman'){
			$this->load->view('profil_seniman',$data);}
			else if($level=='Pembeli'){
				$this->load->view('profil_pembeli');}
			}else echo "<script> alert('Login gagal!');</script>";
	}
	public function edit_profil(){
		$this->load->library('session');
		$this->load->model('user_model');
		$hasil=$this->user_model->edit();
		$level=$this->session->userdata('level');
		if($hasil){
			if($level=='Seniman'){
			$this->load->view('profil_seniman');}
			else if($level=='Pembeli'){
			$this->load->view('profil_pembeli');
			}
		}else echo "<script> alert('Edit profil gagal!');</script>";
	}
}