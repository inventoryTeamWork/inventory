<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class base extends CI_Controller {
     function __construct(){
			parent::__construct();
			$this->load->helper('url'); 
			$this->load->helper('form');
			$this->load->library('form_validation');
	
	//$this->load->helper(array('url', 'form'));
		}
    public function index($username)
    {
	/*
	$pagename="dashboard";
	$data = array(
 
    'title'     =>   'Sistem Inventory',
	'username'     =>  $username,
	'pagename'     =>  $pagename,
    'content'   =>   'This is the content',
    'posts'     =>   array('Post 1', 'Post 2', 'Post 3')
 
		);
	
	
	 $this->load->view('header');
	    $this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('breadcrumbs',$data);
        $this->load->view('pagecontent');
		//content web
		// $this->load->view('barang');
		//content web
		
		$this->load->view('footercontent');
		$this->load->view('footer');
		*/
    }
	
	
	
	 public function login($username)
    {
	
	$data = array(
 
    'title'     =>   'Sistem Inventory',
	'pagename'     =>   'beranda',
	 'username'     =>  $username,
    'content'   =>   'This is the content',
    'posts'     =>   array('Post 1', 'Post 2', 'Post 3')
 
		);
	
	 $this->load->view('header',$data);
	    $this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('breadcrumbs',$data);
        $this->load->view('pagecontent');
		//content web
		// $this->load->view('barang');
		//content web
		
		$this->load->view('footercontent');
		$this->load->view('footer');
    }
	
	function getpage($pagename=null,$username=null,$pagelink=null){
	$this->load->model('barang_model');
	$totalrecord=$this->barang_model->gettotalrecord();
	$pagelink=$this->create_pagging_barang();
	$data = array(
    'title'     =>   'Sistem Inventory',
	'username'     =>  $username,
	'pagename'     =>  $pagename,
	'totalrecord'=> $totalrecord,
	'pagelink'=> $pagelink,
    'content'   =>   'This is the content',
    'posts'     =>   array('Post 1', 'Post 2', 'Post 3')
 
		);
	
	
		$this->load->view('header',$data);
	    $this->load->view('navbar');
		$this->load->view('sidebar');
		$this->load->view('breadcrumbs',$pagename);
        $this->load->view('pagecontent',$pagename);
		//content web
		/*
		if($pagename=="barang"){
		 $this->load->view('barang',$data);
		 }else if( $pagename=="supplier"){
		  $this->load->view('supplier');
		 }else if( $pagename=="customer"){
		  $this->load->view('customer');
		 }else if( $pagename=="dashboard"){
		  $this->load->view('dashboard');
		 }
		 */
		  $this->load->view($pagename,$data);
		//content web
		
		$this->load->view('footercontent');
		$this->load->view('footer');
	
	}
	
	
	
	function create_pagging_barang(){
	$this->load->model('barang_model');
	$totalrecord=$this->barang_model->gettotalrecord();
	$this->load->library('pagination');
	$config['base_url'] = 'http://localhost/github/inventory/index.php/barang_controller/pindahpage2/';
	$config['per_page'] = 1;
	$config['uri_segment'] = 3;
	$config['total_rows'] =($totalrecord[0]->totalrecord/5)-1;
	$config['use_page_numbers'] = TRUE;
	$config['full_tag_open'] = '<div ><ul class="pagination">';
	$config['full_tag_close'] = '</ul></div><!--pagination-->';
	$config['first_link'] = '&laquo; First';
	$config['first_tag_open'] = '<li class="prev page">';
	$config['first_tag_close'] = '</li>';
	$config['last_link'] = 'Last &raquo;';
	$config['last_tag_open'] = '<li class="next page">';
	$config['last_tag_close'] = '</li>';
	$config['next_link'] = 'Next &rarr;';
	$config['next_tag_open'] = '<li class="next page">';
	$config['next_tag_close'] = '</li>';
	$config['prev_link'] = '&larr; Previous';
	$config['prev_tag_open'] = '<li class="prev page">';
	$config['prev_tag_close'] = '</li>';
	$config['cur_tag_open'] = '<li class="active"><a href="">';
	$config['cur_tag_close'] = '</a></li>';
	$config['num_tag_open'] = '<li class="page">';
	$config['num_tag_close'] = '</li>';
	$this->pagination->initialize($config);
	return $this->pagination->create_links();
	}
	
	
	
	
	
	
}