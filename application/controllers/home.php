<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller{
	public function index()
	{
		$this->load->library('Mycategory');
		$data["menu"]=$this->mycategory->my_client_menu();		
		$data["query_slider"]=$this->db->query("SELECT * FROM slider where state='1' order by displayOrder asc");		
		$data["query_latest_news"]=$this->db->query("SELECT * FROM news WHERE netype='News' order by NewsID desc Limit 0,2");
		$data["featured_product"]=$this->db->query("SELECT * FROM product WHERE Featured='Y' AND ProductLive='Y' order by ProductID desc Limit 0,6");
		$data["query_latest_events"]=$this->db->query("SELECT * FROM news WHERE netype='Event' order by NewsID desc");
		$data["query_latest_gallery"]=$this->db->query("SELECT * FROM gallery WHERE Visible='Y' order by GalleryId desc Limit 0,1");
		$data["query_latest_galleryimg"]=$this->db->query("SELECT * FROM galleryimage  order by image_id desc Limit 0,6");
		$data["query_latest_testimonial"]=$this->db->query("SELECT * FROM _testimonial WHERE visible='Y' order by testimonial_id desc ");
		
		$data["query_service_category"]=$this->db->query("SELECT * FROM productcategories WHERE Services='Y' AND Visible='Y' AND CMS='Y' order by CategoryID desc Limit 0,6");
		$data["query_partners"]=$this->db->query("SELECT * FROM partners WHERE PartnerLive='Y' order by displayOrder asc Limit 0,4");
		
		
		$data["category_detail"] = $this->db->from('productcategories')->where('CategoryID', '4')->get()->row_array();
		
		$this->load->view('firstpage',$data);
	}
	
	public function pagenotfound($offset=0)
	{
		$this->load->library('Mycategory');
		$data["nevigation"]=$this->mycategory->nevigation_menu();
		$data["cms_page"]=$this->db->query("SELECT * FROM page where visible='Y'");
		
		$data["query_recent_news"]=$this->db->query("SELECT * FROM news WHERE NewsLive='Y' order by NewsID desc limit 0,8");
		
		
		$this->load->library('pagination');
		$config['base_url'] = base_url()."cinews/".$this->uri->segment(2);
		$config['total_rows']=$this->db->where('CategoryID',$this->uri->segment(2))->count_all_results('news');;
		$config['per_page'] = 10;
		$config['full_tag_open']='<div class="pagination">';
		$config['full_tag_close']='</div>'; 
		$this->pagination->initialize($config); 
		$data['query_featured_news'] = 
		$this->db->where('NewsLive','Y');
		$this->db->where('NewsFeatured','Y');
		$this->db->limit(10,$offset);
		$this->db->order_by('NewsID','desc');
		$data["query_featured_news"]=$this->db->get('news');		
		//$data["query_featured_news"]=$this->db->query("SELECT * FROM news WHERE NewsLive='Y' AND NewsFeatured='Y' order by NewsID desc");
		$this->load->view('pagenotfound',$data);
	}
	
}