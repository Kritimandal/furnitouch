<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Information extends CI_Controller{
	
	public function index()
	{
		$data['pageId'] = '0';
		$data["query_slider"]=$this->db->query("SELECT * FROM slider");
		$data["query_company"]=$this->db->query("SELECT * FROM company where visible='Y'");
		$data["query_product"]=$this->db->query("SELECT * FROM _product WHERE visible='Y'");
		$data["header_navigation"]=$this->db->query("SELECT * FROM _information WHERE visible='Y' AND show_on_menu='Y' AND parentInfo='0'");
		$this->load->view('information',$data);
	}
	
	public function detail()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$data["information_detail"] = $this->db->from('_information')->where('information_id', $this->uri->segment(2))->get()->row_array();
		$data["query_product"]=$this->db->query("SELECT * FROM _product WHERE visible='Y' AND parent_information=".$this->uri->segment(2));
		$data["query_news"]=$this->db->query("SELECT * FROM content WHERE visible='Y' AND cat='news' AND parent_information=".$this->uri->segment(2));
		$this->load->view('information_detail',$data);
	}
	
	
}