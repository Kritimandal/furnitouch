<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller{
	public function index()
	{
		$data['pageId'] = $id = $this->uri->segment(3);
		$breadcumCategory = $this->db->query("SELECT * FROM category WHERE id='$id'");
		if($breadcumCategory->num_rows()>0){
			foreach($breadcumCategory->result() as $rowBreadcum){
				$data['breadcumCategory']=ucwords(strtolower($rowBreadcum->name));
			}
		}

		$query = $this->db->query("SELECT * FROM content WHERE category = $id");
		

		foreach($query->result() as $rowPage){
			$data['pageHeading'] = $rowPage->heading;
			$data['pageContent'] = $rowPage->description;
		}
		$this->load->view('pageCat',$data);
	}
	
	public function view()
	{
		$data['pageId'] = $pageId = $this->uri->segment(3);
		$data['pageSubId'] = $pageSubId = $this->uri->segment(4);
		$breadcumCategory = $this->db->query("SELECT * FROM category WHERE id='$pageId'");
		if($breadcumCategory->num_rows()>0){
			foreach($breadcumCategory->result() as $rowBreadcum){
				$data['breadcumCategory']=ucwords(strtolower($rowBreadcum->name));
			}
		}
		$query = $this->db->query("SELECT * FROM content WHERE sub_category_id = $pageSubId");
		

		foreach($query->result() as $rowPage){
			$data['pageHeading'] = $rowPage->heading;
			$data['pageContent'] = $rowPage->description;
		}

		$this->load->view('page',$data);
	}
	
	
	public function detail()
	{
		$this->load->library('Mycategory');
		$data["nevigation"]=$this->mycategory->nevigation_menu();
		$data["query_recent_news"]=$this->db->query("SELECT * FROM news WHERE NewsLive='Y' order by NewsID desc limit 0,8");
		$data["cms_page"]=$this->db->query("SELECT * FROM page where visible='Y'");
		
		$data["query_recent_news"]=$this->db->query("SELECT * FROM news WHERE NewsLive='Y' order by NewsID desc limit 0,8");
		$data["page_detail"] = $this->db->from('page')->where('page_id',$this->uri->segment(2))->get()->row_array();
		$this->load->view('page',$data);
	}
	
}