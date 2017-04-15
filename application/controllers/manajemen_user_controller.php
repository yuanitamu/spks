<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class manajemen_user_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	public function data_member(){
		$this->load->model('manajemen_user_model');
		$hasil=$this->manajemen_user_model->get_data();
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			$this->load->view('manajemen_user',$data);
		}
		else{
			echo "<script> alert('gagal menampilkan daftar member!');</script>";
		}
	}
	public function delete_member(){
		$this->load->model('manajemen_user_model');
		$hasil=$this->manajemen_user_model->delete();
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			$this->load->view('manajemen_user',$data);
		}
		else{
			echo "<script> alert('gagal menampilkan daftar member!');</script>";
		}
	}
	public function verifikasi_seniman(){
		$this->load->model('manajemen_user_model');
		$hasil=$this->manajemen_user_model->get_data_register();
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			$this->load->view('verifikasi_seniman',$data);
		}
		else{
			echo "<script> alert('gagal menampilkan data!');</script>";
		}
	}
	public function terima_seniman(){
		$this->load->model('manajemen_user_model');
		$hasil=$this->manajemen_user_model->terima();
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			$this->load->view('verifikasi_seniman',$data);
		}
		else{
			echo "<script> alert('Verifikasi gagal!');</script>";
		}
	}
	public function tolak_seniman(){
		$this->load->model('manajemen_user_model');
		$hasil=$this->manajemen_user_model->tolak();
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			$this->load->view('verifikasi_seniman',$data);
		}
		else{
			echo "<script> alert('Verifikasi gagal!');</script>"
		}
	}

}