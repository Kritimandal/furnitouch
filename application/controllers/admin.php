<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin extends CI_Controller {
	
	public function __construct(){
			parent::__construct();
				$this->load->library('session');
				$this->no_cache();
				$loggedInUser=$this->session->userdata('UserEmail');
				if($loggedInUser==""){
				$redirect=base_url()."_cpanel";
				redirect($redirect);
				}
	}

    public function index()
	{
		$this->load->view('admin/index');
	}
	
	

	public function  pContent()
	  { 
	  	$this->load->view('admin/content/all');
	  }
	  
	public function testimonial() {
        $data['query'] = $this->db->query("SELECT * FROM _testimonial ORDER BY testimonial_id desc");
        $this->load->view('admin/testimonial/index', $data);
    }
  
	
	public function users($offset=0)
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url()."admin/users";
		$config['total_rows']=$this->db->count_all_results('users');;
		$config['per_page'] = 40;
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>'; 
		$this->pagination->initialize($config); 
		$data['query'] = $this->db->limit(40,$offset)->order_by('UserID', 'desc')->get('users')->result();
		//$data['query']=$this->db->query("SELECT * FROM page ORDER BY displayOrder asc");
		$this->load->view('admin/user/index',$data);
		
	}
	
	
	public function video()
	{	
		$data['query']=$this->db->query("SELECT * FROM video ORDER BY vid_id desc");
		$this->load->view('admin/video/index',$data);
		
	}
	
	public function news($offset=0)
	{
		$srchKy=$this->input->post('searchKey');
		if(isset($srchKy)){
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/news";
            $config['total_rows']=$this->db->like('NewsName',$srchKy)->count_all_results('news');
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 			
			$data['query'] = $this->db->like('NewsName',$srchKy)->limit(20,$offset)->order_by('NewsID','desc')->get('news')->result();
			$data["searchkey"]=$srchKy;
		}
		else
		{
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/news";
            $config['total_rows']=$this->db->count_all_results('news');;
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 		
			$data['query'] = $this->db->limit(20,$offset)->order_by('NewsID', 'desc')->get('news')->result();				
		}
        	$this->load->view('admin/news/index', $data);
	}

	public function product($offset=0)
	{
		$srchKy=$this->input->post('searchKey');
		if(!empty($srchKy)){
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/product";
            $config['total_rows']=$this->db->like('PrductName',$srchKy)->count_all_results('product');
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 			
			$data['query'] = $this->db->like('PrductName',$srchKy)->limit(2000,$offset)->order_by('ProductID','desc')->get('product')->result();
			$data["searchkey"]=$srchKy;
		}
		else
		{
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/product";
            $config['total_rows']=$this->db->count_all_results('product');;
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config);
			$data['query'] = $this->db->limit(2000,$offset)->order_by('ProductID', 'desc')->get('product')->result();				
		}
        	$this->load->view('admin/product/index', $data);
	}
	
	public function product_image()
	{
		$data["query_product"]=$this->db->query("select * from product where ProductID=".$this->uri->segment(3));
		$data["query_product_image"]=$this->db->query("select * from productimage where ProductID=".$this->uri->segment(3));
		$this->load->view('admin/product/product_image',$data);
	}

	public function partners($offset=0)
	{
		$srchKy=$this->input->post('searchKey');
		if(!empty($srchKy)){
			
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/partners";
            $config['total_rows']=$this->db->like('PartnerName',$srchKy)->count_all_results('partners');
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 			
			$data['query'] = $this->db->like('PartnerName',$srchKy)->limit(20,$offset)->order_by('displayOrder','asc')->get('partners')->result();
			$data["searchkey"]=$srchKy;
		}
		else
		{
			
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/partners";
            $config['total_rows']=$this->db->count_all_results('partners');;
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 		
			
			$data['query'] = $this->db->limit(20,$offset)->order_by('displayOrder', 'asc')->get('partners')->result();				
		}
        	$this->load->view('admin/partners/index', $data);
	}
	
	public function sociallinks($offset=0)
	{
		$srchKy=$this->input->post('searchKey');
		if(!empty($srchKy)){
			
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/sociallinks";
            $config['total_rows']=$this->db->like('SocialName',$srchKy)->count_all_results('socials');
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 			
			$data['query'] = $this->db->like('SocialName',$srchKy)->limit(20,$offset)->order_by('SocialID','desc')->get('partners')->result();
			$data["searchkey"]=$srchKy;
		}
		else
		{
			
			$this->load->library('pagination');
            $config['base_url'] = base_url()."admin/sociallinks";
            $config['total_rows']=$this->db->count_all_results('socials');;
            $config['per_page'] = 20;
            $config['full_tag_open']='<div class="pagination">';
            $config['full_tag_close']='</div>'; 
            $this->pagination->initialize($config); 		
			
			$data['query'] = $this->db->limit(20,$offset)->order_by('SocialID', 'desc')->get('socials')->result();				
		}
        	$this->load->view('admin/sociallinks/index', $data);
	}
	
	
	public function news_image()
	{	
		
		$news_id=$this->session->userdata('InsertNewsid');
		if(empty($news_id))
		$this->session->set_userdata('InsertNewsid',$this->uri->segment(3)); 		
		$data["query_news"]=$this->db->query("select * from news where NewsID=".$this->session->userdata('InsertNewsid'));
		$data["query_news_image"]=$this->db->query("select * from newsimage where NewsID=".$this->session->userdata('InsertNewsid'));
		$this->load->view('admin/news/news_image',$data);
	}
	
	
	public function information()
	{	
		$data['query']=$this->db->query("SELECT * FROM _information ORDER BY displayOrder asc");
		$this->load->view('admin/information/index',$data);		
	}
	
	public function category()
	{	
		$data['query']=$this->db->query("SELECT * FROM productcategories ORDER BY DisplayOrder asc");
		$this->load->view('admin/category/index',$data);		
	}
	
	
	
	public function page($offset=0)
	{	
		$this->load->library('pagination');
		$config['base_url'] = base_url()."admin/page";
		$config['total_rows']=$this->db->count_all_results('page');;
		$config['per_page'] = 40;
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>'; 
		$this->pagination->initialize($config); 
		$data['query'] = $this->db->limit(40,$offset)->order_by('page_id', 'desc')->get('page')->result();
		//$data['query']=$this->db->query("SELECT * FROM page ORDER BY displayOrder asc");
		$this->load->view('admin/page/index',$data);
		
	}
	
	public function gallery($offset=0)
	{	
		$this->load->library('pagination');
		$config['base_url'] = base_url()."admin/gallery";
		$config['total_rows']=$this->db->count_all_results('gallery');;
		$config['per_page'] = 40;
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>'; 
		$this->pagination->initialize($config); 
		$data['query'] = $this->db->limit(40,$offset)->order_by('GalleryId', 'desc')->get('gallery')->result();
		//$data['query']=$this->db->query("SELECT * FROM page ORDER BY displayOrder asc");
		$this->load->view('admin/gallery/index',$data);
		
	}

	
	public function menu()
	{	
	
		$this->load->library('Mycategory');
		$data["menu_order_array"]=$this->mycategory->getMenuAtadmin(0,0);

		$this->load->view('admin/menu/index',$data);
		
	}
	

	
	
	public function slider() {
        $data['query'] = $this->db->query("SELECT * FROM slider ORDER BY displayOrder asc");
        $this->load->view('admin/slider/index', $data);
    }	
	
	public function update_partnerorder()
		{
			$action 				= $_POST['action'];
			$updateRecordsArray 	= $_POST['recordsArray'];
			
			if ($action == "updateRecordsListings"){
						
			$listingCounter = 1;
			foreach ($updateRecordsArray as $recordIDValue) {
			
				$query = "UPDATE partners SET displayOrder = " . $listingCounter . " WHERE PartnerID = " . $recordIDValue;
				//$q.="UPDATE newah_information SET displayOrder = " . $listingCounter . " WHERE information_id = " . $recordIDValue . "  AND parentInfo=".$parent;
				mysql_query($query) or die('Error, insert query failed');
				$listingCounter = $listingCounter + 1;
			
				}
			}
		}
	
	
	
	
	
	public function gallery_image()
	{			
		$gallery_id=$this->session->userdata('InsertGalleryid');
		if(empty($gallery_id))
		$this->session->set_userdata('InsertGalleryid',$this->uri->segment(3)); 		
		$data["query_gallery"]=$this->db->query("select * from gallery where GalleryId=".$this->session->userdata('InsertGalleryid'));
		
		$data["query_gallery_image"]=$this->db->query("select * from galleryimage where GalleryId=".$this->session->userdata('InsertGalleryid'));
		$this->load->view('admin/gallery/gallery_image',$data);
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