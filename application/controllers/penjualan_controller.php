<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class penjualan_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	public function tambah_penjualan(){
		$this->load->model('penjualan_model');
		$hasil=$this->penjualan_model->tambah();
		if($hasil){
		redirect('penjualan_controller/data_list_penjualan');
	}else{
		echo "<script> alert('Gagal menambahkan barang!');</script>";
	}
	}
	public function delete_penjualan(){
		$this->load->model('penjualan_model');
		$hasil=$this->penjualan_model->delete();
		if($hasil){
			redirect('penjualan_controller/data_list_penjualan');
		}else{
			echo "<script> alert('This user not allowed to delete this items!');</script>";
		}
	}
	public function edit_penjualan(){
		$this->load->model('penjualan_model');
		$this->penjualan_model->edit();
		redirect('penjualan_controller/data_list_penjualan');
	}
	public function data_list_penjualan(){
		$this->load->library('session');
		$this->load->model('penjualan_model');
		$hasil=$this->penjualan_model->get_data_all();
		$level=$this->session->userdata('level');
		if(count($hasil)>0){
			$data['item']=$hasil->result();
			if($level=='Seniman'){
				$this->load->view('penjualan_seniman',$data);}
				elseif($level=='Pembeli'){
					$this->load->view('penjualan_pembeli',$data);
				}
			}
		}
		public function deskripsi(){
			$this->load->library('session');
			$this->load->model('penjualan_model');
			$this->load->model('user_model');
			$hasil2=$this->user_model->get_data();
			$hasil=$this->penjualan_model->get_data_detail();
			$level=$this->session->userdata('level');
			if(count($hasil)>0){
				$data['item']=$hasil->result();
				$data['seniman']=$hasil2->result();
				if($level=='Seniman'){
					$this->load->view('deskripsi_penjualan_seniman',$data);}
					elseif($level=='Pembeli'){
						$this->load->view('deskripsi_penjualan_pembeli',$data);
					}
				}

			}
			public function beli(){
				$this->load->model('penjualan_model');
				$hasil=$this->penjualan_model->beli();
				if(count($hasil)>0){
					$data['item']=$hasil->result();
					$this->load->view('pembayaran',$data);
				}
			}
		}