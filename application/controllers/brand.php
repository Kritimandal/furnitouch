<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand extends CI_Controller{
	public function detail()
	{
		$this->load->model('category_model');
		$this->load->model('product_model');
		$this->load->library('Mycategory');
		$data["menu"]=$this->mycategory->my_client_menu();	
		$data["query_partners"]=$this->db->query("SELECT * FROM partners WHERE PartnerLive='Y' order by PartnerID desc");					
		$data["brand_detail"] = $this->db->from('partners')->where('PartnerSlug', $this->uri->segment(2))->get()->row_array();
		
		//$data["parents"]=$this->mycategory->collectParents($data["c_category_detail"]["CategoryID"]);
		//$data["childs"]=$this->mycategory->collectChild_CatID($data["c_category_detail"]["CategoryID"]);
		
		$data["products_in_brands"]=$this->product_model->products_in_brand($data["brand_detail"]["PartnerID"]);	
		$this->load->view('brand_detail',$data);
	}

	
	public function pagenotfound()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->client_menu();
		$this->load->view('pagenotfound',$data);
	}
	
	
}