<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	
	public function __construct(){
			parent::__construct();
				$this->load->library('session');
				$this->no_cache();
				$loggedInUser=$this->session->userdata('username');
				if($loggedInUser==""){
				$redirect=base_url()."_cpanel";
				redirect($redirect);
				}
	}

    public function index()
	{
		$this->load->view('admin/index');
	}
	

	public function pCategory(){
	$this->load->view('admin/category/index');
	}	

	public function  pContent()
	  { 
	  	$this->load->view('admin/content/all');
	  }
  
	
	public function temp_users()
	{
		$data['query']=$this->db->query("SELECT * FROM temp_users ORDER BY id DESC");
		$this->load->view('admin/temp/index',$data);
		
	}
	public function job()
	{
		$data['query']=$this->db->query("SELECT * FROM jobs ORDER BY Id DESC");
		$this->load->view('admin/jobs/index',$data);
		
	}
	
	public function information()
	{	
		$data['query']=$this->db->query("SELECT * FROM _information ORDER BY displayOrder asc");
		$this->load->view('admin/information/index',$data);
		
	}
	
	public function menu()
	{	
	
		$this->load->library('Myinformation');
		$data["menu_order_array"]=$this->myinformation->getMenuAtadmin(0,0);
		//$data['query']=$this->db->query("SELECT * FROM _information ORDER BY information_id desc");
		$this->load->view('admin/menu/index',$data);
		
	}
	
	public function testimonial()
	{	
		$data['query']=$this->db->query("SELECT * FROM _testimonial ORDER BY testimonial_id asc");
		$this->load->view('admin/testimonial/index',$data);
		
	}
	
	
	public function job_list()
	{
		$cat=$this->uri->segment('3');
		$data['query']=$this->db->query("SELECT * FROM jobs WHERE cat='$cat'");
		$this->load->view('admin/jobs/job_list',$data);
		
	}
	public function client()
	{
	$data['query']=$this->db->query("SELECT * FROM client");
    $this->load->view('admin/client/index',$data);
	}
	
	
	public function company_pro()
	{
     $data['query']=$this->db->query("SELECT * FROM content WHERE cat='pro'");
    $this->load->view('admin/company_pro/index',$data);
		
	}
	
	public function resource()
	{
		$data['query']=$this->db->query("SELECT * FROM content WHERE cat='resource'");
		$this->load->view('admin/resource/index',$data);
	}
	
	public function news()
	{
     $data['query']=$this->db->query("SELECT * FROM content WHERE cat='news'");
     $this->load->view('admin/news/index',$data);
	}
	
	public function msg()
	{
     $data['query']=$this->db->query("SELECT * FROM content WHERE cat='msg'");
     $this->load->view('admin/msg/index',$data);
	}
	public function slider() {
        $data['query'] = $this->db->query("SELECT * FROM slider ORDER BY post_date DESC");
        $this->load->view('admin/slider/index', $data);
    }
	
	public function services()
	{
	$data['query']=$this->db->query("SELECT * FROM services");
    $this->load->view('admin/services/index',$data);
	}
	public function services_det()
	{
	$cat= $this->uri->segment('3');
    $data['query']=$this->db->query("SELECT * FROM services_det WHERE cat='$cat'");
    $this->load->view('admin/services/services_det',$data);
	}
	 public function head()
	 {
     $cat= $this->uri->segment('3');
	 $data['query']=$this->db->query("SELECT Id,heading FROM content WHERE cat='$cat'");
		 $this->load->view('admin/heading/index',$data);
	 }
	 public function country()
	  {
		  $data['query']=$this->db->query("SELECT *FROM country ORDER BY Id DESC");
		  $this->load->view('admin/country/index',$data);
	  }
	public function job_post($offset=0)
	{
		 $this->load->library('pagination');
            $config['base_url'] = base_url()."admin/job_post";
            $config['total_rows']=$this->db->count_all_results('employers');;
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 
            $data['query'] = $this->db->limit(20,$offset)->order_by('Id', 'desc')->get('employers')->result();
		
		
		
		
		
        //$data['query'] = $this->db->query("SELECT * FROM news ORDER BY post_date DESC");
        $this->load->view('admin/job_post/index', $data);
	}
	
	
	public function company($offset=0)
	{
		    $this->load->library('pagination');
            $config['base_url'] = base_url()."admin/company";
            $config['total_rows']=$this->db->count_all_results('company');;
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 
            $data['query'] = $this->db->limit(20,$offset)->order_by('Id', 'desc')->get('company')->result();
        	//$data['query'] = $this->db->query("SELECT * FROM news ORDER BY post_date DESC");
        	$this->load->view('admin/company/index', $data);
	}
	
	public function product($offset=0)
	{
		    
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/company";
            $config['total_rows']=$this->db->count_all_results('_product');;
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 
						
			/*$this->db->select('_product.product_id,_product.company_id,_product.product,_product.visible,company.Id,company.name ');
			$this->db->from('_product,company');
			$this->db->order_by("_product.product_id", "asc");
			$this->db->limit(20,$offset);
			$data["query"] = $this->db->get()->result();*/
			$data["query"]=$this->db->query("select * from _product order by product_id asc limit ".$offset." ,20 ")->result();
			
        	$this->load->view('admin/product/index', $data);
	}
	
	
	
	public function logout(){
            $this->session->sess_destroy();
            $redirectLog = base_url()."_cpanel";
			redirect($redirectLog);
           
        }
		/** Clear the old cache (usage optional) **/ 
protected function no_cache(){
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache'); 
}
	
}