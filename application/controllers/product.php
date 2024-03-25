<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller{
	public function detail()
	{
		$this->load->model('category_model');
		$this->load->model('product_model');
		$this->load->library('Mycategory');
		$data["menu"]=$this->mycategory->my_client_menu();					
		
		
		$data["featured_product"]=$this->db->query("SELECT * FROM product WHERE Featured='Y' AND ProductLive='Y' order by ProductID desc Limit 0,3");
						
		$data["product_detail"] = $this->db->from('product')->where('ProductSlug', $this->uri->segment(2))->get()->row_array();
		
		$data["parents"]=$this->mycategory->collectParents($data["product_detail"]["category"]);
		$data["childs"]=$this->mycategory->collectChild_CatID($data["product_detail"]["category"]);
		
		$data["products_in_categories"]=$this->category_model->products_in_categories($data["childs"],$data["product_detail"]["category"]);
		
		$data['childcategories']= $this->category_model->child_category($data["product_detail"]["category"]);
		$data['productimages']= $this->product_model->product_images($data["product_detail"]["ProductID"]);	
		
		$data['products_in_related']= $this->product_model->products_in_related($data["product_detail"]["category"]);
		
		$data["related_product"]=$this->db->query("SELECT * FROM product WHERE category=".$data["product_detail"]["category"]." AND ProductLive='Y' order by ProductID desc Limit 0,3");	
				
		
		if(count($data['childcategories']) == 0) 
		$data['childcategories']= $this->category_model->child_category($data["product_detail"]["category"]);
		
		$this->load->view('product_detail',$data);
	}

	
	public function pagenotfound()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->client_menu();
		$this->load->view('pagenotfound',$data);
	}
	
	
}