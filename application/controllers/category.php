<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller{
	public function detail()
	{
		$this->load->model('category_model');
		$this->load->library('Mycategory');
		$data["menu"]=$this->mycategory->my_client_menu();					
		
						
		$data["c_category_detail"] = $this->db->from('productcategories')->where('clean_url', $this->uri->segment(2))->get()->row_array();
		
		$data["parents"]=$this->mycategory->collectParents($data["c_category_detail"]["CategoryID"]);
		$data["childs"]=$this->mycategory->collectChild_CatID($data["c_category_detail"]["CategoryID"]);
		
		//$data["products_in_categories"]=$this->category_model->products_in_categories($data["childs"],$data["c_category_detail"]["CategoryID"]);
		
		$data["products_in_categories"]=$this->category_model->category_product($data["c_category_detail"]["CategoryID"]);
		
		$data['childcategories']= $this->category_model->child_category($data["c_category_detail"]["CategoryID"]);			
		
		$data["query_service_category"]=$this->db->query("SELECT * FROM productcategories WHERE Services='Y' AND Visible='Y' AND CMS='Y' order by CategoryID desc Limit 0,6");
		
		if(count($data['childcategories']) == 0) 
		$data['childcategories']= $this->category_model->child_category($data["c_category_detail"]["ParentCategory"]);
		
		$this->load->view('category_detail',$data);
	}

	
	public function pagenotfound()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->client_menu();
		$this->load->view('pagenotfound',$data);
	}
	
	
}