<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class register_controller extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	public function index()
	{
		$this->load->library('session');
		$this->load->model('gallery_model');
		$this->load->model('penjualan_model');
		$this->load->model('pelelangan_model');
		$hasil2=$this->gallery_model->get_data_all();
		$hasil3=$this->penjualan_model->get_data_all();
		$hasil4=$this->pelelangan_model->get_data_all();
		$data['umum']=$hasil2->result();
		$data['jual']=$hasil3->result();
		$data['lelang']=$hasil4->result();
		if ($this->session->userdata('username') != "") {
			$level=$this->session->userdata('level');
			if($level=='Seniman'){
				$this->load->view('profil_seniman',$data);}
				else if($level=='Pembeli'){
					$this->load->view('profil_pembeli');
				}else if ($level=='Admin') {
					$this->load->model('manajemen_user_model');
					$hasil2=$this->manajemen_user_model->get_data();
					if(count($hasil2)>0){
						$data['item']=$hasil2->result();
						$this->load->view('manajemen_user',$data);
					}
				}
			}else{
				$hasil=$this->gallery_model->get_data_all();
				if(count($hasil)>0){
					$data['item']=$hasil->result();
					$this->load->view('index',$data);
				}
			}
		}	
	public function register(){
		$this->load->model('register_model');
		$hasil=$this->register_model->register();
		if($hasil){
			redirect('register_controller/index');
	}
	else{
		echo "<script> alert('Registrasi Gagal!');</script>";
	}
	}
	public function login(){
		$this->load->library('session');
		$this->load->model('register_model');
		$this->load->model('gallery_model');
		$this->load->model('penjualan_model');
		$this->load->model('pelelangan_model');
		$hasil=$this->register_model->login();
		$hasil2=$this->gallery_model->get_data_all();
		$hasil3=$this->penjualan_model->get_data_all();
		$hasil4=$this->pelelangan_model->get_data_all();
		$data['umum']=$hasil2->result();
		$data['jual']=$hasil3->result();
		$data['lelang']=$hasil4->result();
		$level=$this->session->userdata('level');
		if($hasil){
			if($level=='Seniman'){
			$this->load->view('profil_seniman',$data);}
			else if($level=='Pembeli'){
			$this->load->view('profil_pembeli');
			}
			else if ($level=='Admin') {
				$this->load->model('manajemen_user_model');
				$hasil2=$this->manajemen_user_model->get_data();
				if(count($hasil2)>0){
					$data['item']=$hasil2->result();
				$this->load->view('manajemen_user',$data);
			}
			}
		}
		else{
		echo "<script> alert('Login gagal!Periksa username dan password Anda.');</script>";
		// redirect('register_controller/index');
	}
	}
	public function logout(){
		$this->load->library('session');
		$data = array(
                    'id_user' => '',
                    'username' => '',
                    'password' => '',
                    'nama' => '',
                    'email' => '',
                    'alamat' => '',
                    'no_tlp' =>'',
                    'jenis_kelamin' => '',
                    'foto' =>'',
                    'tgl_lahir' => '',
                    'level' =>''
                );
		$this->session->unset_userdata($data);
        $this->session->sess_destroy();
        $this->index();
	}
}