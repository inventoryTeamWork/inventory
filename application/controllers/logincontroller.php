
		<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
		class logincontroller extends CI_Controller{
		function __construct(){
			parent::__construct();
			$this->load->helper('url'); 
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->helper(array('url', 'form'));
		}
		
		public function getloginall(){
		$this->load->model('login_model');
		$datalogin=$this->login_model->getloginall();
		echo json_encode($datalogin);	
			
		
		}
		
		function logout(){
			$this->load->view('login_view');
		}
		
		function login(){
		$this->load->model('login_model');
		$logresult=$this->login_model->login($_POST['username'],$_POST['password']);
		echo $logresult;
			//if($logresult > 0){
				//echo $_POST['username'].' dan '.$_POST['password']."bukan password yang benar, password salah!";
				//echo "password ok";
				//echo base_url()."index.php/logincontroller/tampilmenuutama";
				//$this->load->view('welcome_message');
				//echo $logresult;
			//}else{
				//echo "login berhasil";
				//header("localhost");
				//echo $logresult;
				// $this->load->view('welcome_message');
			//}
		}
		function tampilmenuutama()
		{
			$this->load->view('home');
		}
		public function index()
		{
			//$this->load->helper("url");
			//$this->load->model('pegawai_model');
			$this->view_login();
		}
		function view_login()
		{
			//$this->load->model('pegawai_model');
			//$data['judul'] = 'Data Pegawai';
			//$data['data_pegawai'] = $this->pegawai_model->get_pegawai_all();
			$this->load->view('login_view');
		}
		
		function myAjaxTest(){
			echo ("hi client");
		}
		
	}
	
	 