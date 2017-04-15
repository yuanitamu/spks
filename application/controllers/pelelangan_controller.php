<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class pelelangan_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	public function tambah_pelelangan(){
		$this->load->model('pelelangan_model');
		$hasil=$this->pelelangan_model->tambah();
		if($hasil){
		redirect('pelelangan_controller/data_list_pelelangan');
	}else{
		echo "<script> alert('Gagal menambahkan barang!');</script>";
	}
	}
	public function delete_pelelangan(){
		$this->load->model('pelelangan_model');
		$this->pelelangan_model->delete();
		redirect('pelelangan_controller/data_list_pelelangan');
	}
	public function edit_pelelangan(){
		$this->load->model('pelelangan_model');
		$this->pelelangan_model->edit();
		redirect('pelelangan_controller/data_list_pelelangan');
	}
	public function data_list_pelelangan(){
		$this->load->library('session');
		$this->load->model('pelelangan_model');
		$hasil=$this->pelelangan_model->get_data_all();
		$level=$this->session->userdata('level');
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			if($level=='Seniman'){
				$this->load->view('pelelangan_seniman',$data);}
				else if($level=='Pembeli'){
					$this->load->view('pelelangan_pembeli',$data);
				}
			}
		}
		public function deskripsi(){
			$this->load->library('session');
			$this->load->model('pelelangan_model');
			$this->load->model('user_model');
			$hasil2=$this->user_model->get_data();
			$hasil=$this->pelelangan_model->get_data_detail();
			$level=$this->session->userdata('level');
			if(count($hasil)>0){
				$data['item']=$hasil->result();
				$data['seniman']=$hasil2->result();
				if($level=='Seniman'){
					$this->load->view('deskripsi_pelelangan_seniman',$data);}
					else if($level=='Pembeli'){
						$this->load->view('deskripsi_pelelangan_pembeli',$data);
					}
				}
			}
			public function tawar(){
				$this->load->model('pelelangan_model');
				$hasil=$this->pelelangan_model->tawar();
				if(count($hasil)>0){
					$data['item']=$hasil->result();
					$this->load->view('pembayaran',$data);
				}

			}
		}