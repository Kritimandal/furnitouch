<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends CI_Controller {
	

	   public function detail()
	   {	   
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->my_client_menu();	
		$data["gallery_detail"] = $this->db->from('gallery')->where('GalleryId', $this->uri->segment(2))->get()->row_array();		
		$data["gallery_image"]=$this->db->query("SELECT * FROM galleryimage where GalleryId=".$data["gallery_detail"]["GalleryId"]);		
		$this->load->view('gallery_detail',$data);
	   }
}
                            