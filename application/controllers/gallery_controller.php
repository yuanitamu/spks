<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class gallery_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	
	public function tambah_gallery(){
		$this->load->model('gallery_model');
		$hasil=$this->gallery_model->tambah();
		if($hasil){
		redirect('gallery_controller/data_list_gallery');
	}else{
		echo "<script> alert('Gagal menambahkan barang!');</script>";
	}
	}
	public function delete_gallery(){
		$this->load->model('gallery_model');
		$this->gallery_model->delete();
		redirect('gallery_controller/data_list_gallery');
	}
	public function edit_gallery(){
		$this->load->model('gallery_model');
		$hasil=$this->gallery_model->edit();
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			redirect('gallery_controller/data_list_gallery');
		}
		else{
			echo "<script> alert('Edit gallery gagal!');</script>";
		}
	}
	public function data_list_gallery(){
		$this->load->library('session');
		$this->load->model('gallery_model');
		$hasil=$this->gallery_model->get_data_all();
		$level=$this->session->userdata('level');
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			if($level=='Seniman'){
			$this->load->view('gallery_umum_seniman',$data);}
			else if($level=='Pembeli'){
			$this->load->view('gallery_umum_pembeli',$data);
			}
		}
	}	
	public function deskripsi(){
		$this->load->library('session');
		$this->load->model('gallery_model');
		$hasil=$this->gallery_model->get_data_detail();
		$level=$this->session->userdata('level');
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			if($level=='Seniman'){
			$this->load->view('deskripsi_umum_seniman',$data);}
			else if($level=='Pembeli'){
			$this->load->view('deskripsi_umum_pembeli',$data);
			}
		}
		
	}
}