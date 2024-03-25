<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Functions extends CI_Controller {
	public function __construct(){
	parent::__construct();
	$this->
	load->library('session');
	$this->load->library('Myinformation');
	$this->load->library('Mypage');
	$this->load->library('Mygeneral');
	$this->load->model('region_model');
	$this->load->model('User_model');
	$this->load->library('Youtube');
	$this->no_cache();
	$loggedInUser=$this->session->userdata('UserEmail');
	if($loggedInUser==""){
	$redirect=base_url()."_cpanel";
	redirect($redirect);
	}
}


//file-upload--///
public function do_upload($path)
	{
	$config['upload_path'] = $path;
	$config['allowed_types'] = 'gif|jpg|png|pdf';
	$config['max_size']	= '10000000';
	$config['max_width']  = '10240';
	$config['max_height']  = '7680';
	
	$this->load->library('upload', $config);
	
	if ( ! $this->upload->do_upload())
	{
	$error ="error";
	$error2="";
	return array($error,$error2);
	}
	else
	{
	
	$data = array('upload_data' => $this->upload->data());
	$msg= "success";
	return array($this->upload->data(), $msg);
	}
}

public function change_state()
	{
	$table = $this->uri->segment(3);
	$id = $this->uri->segment(4);
	$state= $this->uri->segment(5);
	$data = array(
	'state' => $state
	);
	
	$this->db->where('id', $id);
	$update_state = $this->db->update($table, $data); 
	if($update_state)
	{
	$data['msg'] = "State changed !!!";	
	}
	else{
	$data['msg'] = "Database error !!!";	
	}
	$this->session->set_userdata('sucess','State changed !!!');
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location'); 
	
}

public function insert_testimonial()
{

		$this->load->library('Mygeneral');
		/* this is upload image codd */
	
		$visible=($this->input->post('visible')=="Y")?'Y':'N';
		
		if(!empty($_FILES['testimonial_image']['name'])){		
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('testimonial_image'))
		{
		$datarw = $this->upload->data();		
		$datarw = $this->upload->data();		
		$data = array('testimonial_by'=>$this->input->post('testimonial_by'),'testimonial_address'=>$this->input->post('testimonial_address'),'testimonial_email'=>$this->input->post('testimonial_email'),'testimonial'=>$this->input->post('testimonial'),'testimonial_image'=>$datarw['raw_name'].$datarw['file_ext'],'visible'=>$visible);	
		$result=$this->db->insert('_testimonial', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/testimonial";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('testimonial_by'=>$this->input->post('testimonial_by'),'testimonial_address'=>$this->input->post('testimonial_address'),'testimonial_email'=>$this->input->post('testimonial_email'),'testimonial'=>$this->input->post('testimonial'),'visible'=>$visible);	
		$result=$this->db->insert('_testimonial', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/testimonial";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	
}


public function testimonialupdate()
	 {
						
		$this->load->library('Mygeneral');
		/* this is upload image codd */
		
		$visible=($this->input->post('visible')=="Y")?'Y':'N';
		
		
		if(!empty($_FILES['testimonial_image']['name'])){	
		$this->db->where('testimonial_id',$this->uri->segment('3'));
		$query = $this->db->get('_testimonial');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->testimonial_image)){
		@unlink("cmsimage/".$row_image->testimonial_image);
		}
			
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('testimonial_image'))
		{
		$datarw = $this->upload->data();		
		
		$data = array('testimonial_by'=>$this->input->post('testimonial_by'),'testimonial_address'=>$this->input->post('testimonial_address'),'testimonial_email'=>$this->input->post('testimonial_email'),'testimonial'=>$this->input->post('testimonial'),'testimonial_image'=>$datarw['raw_name'].$datarw['file_ext'],'visible'=>$visible);		
		$this->db->where('testimonial_id',$this->uri->segment('3'));											                                   
		$result=$this->db->update('_testimonial', $data);
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/testimonial";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('testimonial_by'=>$this->input->post('testimonial_by'),'testimonial_address'=>$this->input->post('testimonial_address'),'testimonial_address_fr'=>$this->input->post('testimonial_address_fr'),'testimonial_email'=>$this->input->post('testimonial_email'),'testimonial'=>$this->input->post('testimonial'),'testimonial_fr'=>$this->input->post('testimonial_fr'),'visible'=>$visible);	
		$this->db->where('testimonial_id',$this->uri->segment('3'));											                                   
		$result=$this->db->update('_testimonial', $data);
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/testimonial";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	}
public function dlt_testimonial()
	{
	$this->db->where('testimonial_id',$this->uri->segment('3'));
	$query = $this->db->get('_testimonial');
	$row_image = $query->row();
	if (file_exists("cmsimage/".$row_image->testimonial_image)){
	@unlink("cmsimage/".$row_image->testimonial_image);
	}
	
	$sql_dlttestimonial="DELETE FROM _testimonial where testimonial_id=".$this->uri->segment(3);
	$this->db->query($sql_dlttestimonial);	
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect("admin/testimonial",'location'); 
	
}

public function addtestimonial()
	{
		$this->load->library('Myinformation');
		$information_data["information_array"]=$this->myinformation->informationSelect(0,0);
	
		$this->load->view('admin/testimonial/add_testimonial',$information_data);
		
	}

public function edittestimonial(){
			$this->load->library('Myinformation');
			$data["information_array"]=$this->myinformation->informationSelect(0,0);
			
			$data['query'] = $this->db->query("SELECT * FROM _testimonial WHERE testimonial_id=".$this->uri->segment(3));
			$this->load->view('admin/testimonial/edit_testimonial',$data);
		}


/* this is for information */

public function add_information()
{
	$this->load->library('Myinformation');
	$information_data["information_array"]=$this->myinformation->informationSelect(0,0);	
	$this->load->view('admin/information/add_information',$information_data);
}

public function add_category()
{
	$this->load->library('Mycategory');
	$data["category_array"]=$this->mycategory->categorySelect(0,0);	
	$this->load->view('admin/category/add_category',$data);
}

public function add_product()
{
	$this->load->library('Mycategory');
	$data["category_array"]=$this->mycategory->categorySelect(0,0);	
	$data['query_partner'] = $this->db->query("SELECT * FROM partners ORDER BY PartnerID desc");
	$this->load->view('admin/product/add_product',$data);
}

public function add_partner()
{
	$this->load->library('Mycategory');
	$data["category_array"]=$this->mycategory->categorySelect(0,0);	
	$this->load->view('admin/partners/add_partner',$data);
}


 public function video_edit()
	 {		 
		 $this->load->library('Myinformation');
		 $data["information_array"]=$this->myinformation->informationSelect(0,0);
		 		
		 $data['query']=$this->db->query("SELECT * FROM video WHERE vid_id=".$this->uri->segment('3'));
		 $row=$data['query']->row();
		 $this->load->view('admin/video/video_edit',$data);
	 }
	 
	 public function update_video()
	 {
		$this->load->library('Mygeneral');
		$id=$this->uri->segment('3');
		$data = array(
				'video_title'  =>$this->input->post('video_title'),
				'clean_url'=>$this->mygeneral->toAscii($_POST['video_title']),
				'vid_caption'  =>$this->input->post('video_caption'),
				'parent_information'=>$this->input->post('parent_information'),
				'vid_link'  =>$this->input->post('video_link'),
				'vid_status'=>$this->input->post('visible'),
				'updated'=>date('Y-m-d')
				);

				$this->db->where('vid_id', $id);
				$result=$this->db->update('video', $data);			
				if($result)
				{
					$this->session->set_userdata('sucess',"Your video edited successfully.");
					$redirect= base_url()."admin/video";
					redirect($redirect);
				}
	 }
	 
	public function del_video()
	{
	
	$id=$this->uri->segment('3');
	
	
	$sql2="delete from video where vid_id='$id'";
	$query2= mysql_query($sql2) or die (mysql_error());
	
	$redirect= base_url()."admin/video";
	redirect($redirect);
	}


public function add_video()
			{
				$this->load->library('Myinformation');
				$data["information_array"]=$this->myinformation->informationSelect(0,0);	
				$this->load->view('admin/video/add_video',$data);
			}
			
			public function insert_video()
			{
				$this->load->library('Mygeneral');
				$data = array(
				'video_title'=>$this->input->post('video_title'),
				'clean_url'=>$this->mygeneral->toAscii($_POST['video_title']),
				'vid_caption'=>$this->input->post('video_caption'),
				'parent_information'=>$this->input->post('parent_information'),
				'vid_link'=>$this->input->post('video_link'),
				'vid_status'=>$this->input->post('visible'),
				'added'=>date('Y-m-d')
				);
				
				$result=$this->db->insert('video', $data); 
				if($result)
				{
					$this->session->set_userdata('sucess',"Your video added successfully.");
					$redirect=base_url()."admin/video";
					redirect($redirect);
				}
				else
				{
					echo "error";
				}
				
								
			}


public function movemenu123()
{

	//require_once("configure_admin.php");
		$action 				= $_POST['action'];
		$updateRecordsArray 	= $_POST['recordsArray'];
		
		if ($action == "updateRecordsListings"){
			
			$listingCounter = 1;
			foreach ($updateRecordsArray as $recordIDValue) {
		
				echo $query = "UPDATE _information SET displayOrder = " . $listingCounter . " WHERE information_id = " . $recordIDValue;
				 mysql_query($query) or die('Error, insert query failed');
				$listingCounter = $listingCounter + 1;
				
			}
			
		}

}




public function insert_information()
{

		$this->load->library('Mygeneral');
		/* this is upload image codd */
	
		
		$featured=($this->input->post('featuredInfo')=="Y")?'Y':'N';
		$show_on_menu=($this->input->post('show_on_menu')=="Y")?'Y':'N';
		$visible=($this->input->post('visible')=="Y")?'Y':'N';
		$tab=($this->input->post('as_tab')=="Y")?'Y':'N';
		
		if(!empty($_FILES['informationimage']['name'])){		
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('informationimage'))
		{
		$datarw = $this->upload->data();		
		$datarw = $this->upload->data();		
		$data = array('information_name'=>$this->input->post('information_name'),'information_title'=>$this->input->post('information_title'),'custom_link'=>$this->input->post('custom_link'),'clean_url'=>$this->mygeneral->toAscii($this->input->post('information_name')),'parentInfo'=>$this->input->post('parent_information'),'information_introduction'=>$this->input->post('information_introduction'),'information_description'=>$this->input->post('information_description'),'image'=>$datarw['raw_name'].$datarw['file_ext'],'image_caption'=>$this->input->post('image_caption'),'featured'=>$featured,'show_on_menu'=>$show_on_menu,'as_tab'=>$tab,'visible'=>$visible
						);	
		$result=$this->db->insert('_information', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/information";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('information_name'=>$this->input->post('information_name'),
				  'information_title'=>$this->input->post('information_title'),
				  'clean_url'=>$this->mygeneral->toAscii($this->input->post('information_name')),
				   'parentInfo'=>$this->input->post('parent_information'),
				   'information_introduction'=>$this->input->post('information_introduction'),
				   'information_description'=>$this->input->post('information_description'),
				   'image_caption'=>$this->input->post('image_caption'),
				   'featured'=>$this->input->post('featuredInfo'),
				   'show_on_menu'=>$this->input->post('show_on_menu'),
				   'as_tab'=>$tab,
				   'visible'=>$this->input->post('visible')
					);	
		$result=$this->db->insert('_information', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/information";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	
}


public function insert_category()
{

		$this->load->library('Mygeneral');
		/* this is upload image codd */
	
		
		
		$Nevigation=($this->input->post('Nevigation')=="Y")?'Y':'N';
		$Visible=($this->input->post('Visible')=="Y")?'Y':'N';
		$CMS=($this->input->post('CMS')=="Y")?'Y':'N';
		$Services=($this->input->post('Services')=="Y")?'Y':'N';
		
		if(!empty($_FILES['CategoryImage']['name'])){		
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('CategoryImage'))
		{
		$datarw = $this->upload->data();		
		$datarw = $this->upload->data();		
		$data = array('CategoryName'=>$this->input->post('CategoryName'),'clean_url'=>$this->mygeneral->toAscii($this->input->post('CategoryName')),'ParentCategory'=>$this->input->post('ParentCategory'),'Introduction'=>$this->input->post('Introduction'),'Description'=>$this->input->post('Description'),'CategoryImage'=>$datarw['raw_name'].$datarw['file_ext'],'image_caption'=>$this->input->post('image_caption'),'Nevigation'=>$Nevigation,'Visible'=>$Visible,"CMS"=>$CMS,'Services'=>$Services);
			
		$result=$this->db->insert('productcategories', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/category";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('CategoryName'=>$this->input->post('CategoryName'),'clean_url'=>$this->mygeneral->toAscii($this->input->post('CategoryName')),'ParentCategory'=>$this->input->post('ParentCategory'),'Introduction'=>$this->input->post('Introduction'),'Description'=>$this->input->post('Description'),'image_caption'=>$this->input->post('image_caption'),'Nevigation'=>$Nevigation,'Visible'=>$Visible,"CMS"=>$CMS,'Services'=>$Services);
		$result=$this->db->insert('productcategories', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/category";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	
}


public function insert_programme()
{

		$this->load->library('Mygeneral');
		/* this is upload image codd */	
		$ProgrammeLive=($this->input->post('ProgrammeLive')=="Y")?'Y':'N';
	
		
		if(!empty($_FILES['ProgrammeImage']['name'])){		
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('ProgrammeImage'))
		{
		$datarw = $this->upload->data();		
		$data = array('ProgrammeName'=>$this->input->post('ProgrammeName'),'ProgrammeSlug'=>$this->mygeneral->toAscii($this->input->post('ProgrammeName')),'parent_information'=>$this->input->post('parent_information'),'ProgrammeShortDesc'=>$this->input->post('ProgrammeShortDesc'),'ProgrammeLongDesc'=>$this->input->post('ProgrammeLongDesc'),'ProgrammeImage'=>$datarw['raw_name'].$datarw['file_ext'],'ProgrammeLive'=>$ProgrammeLive,'ProgrammeDate'=>$this->input->post('ProgrammeDate'),'ProgrammeLocation'=>$this->input->post('ProgrammeLocation'),'PageTitle'=>$this->input->post('PageTitle'),'PageDescription'=>$this->input->post('PageDescription'),'PageKeywords'=>$this->input->post('PageKeywords'));	
		$result=$this->db->insert('programmes', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/programmes";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('ProgrammeName'=>$this->input->post('ProgrammeName'),'ProgrammeSlug'=>$this->mygeneral->toAscii($this->input->post('ProgrammeName')),'parent_information'=>$this->input->post('parent_information'),'ProgrammeShortDesc'=>$this->input->post('ProgrammeShortDesc'),'ProgrammeLongDesc'=>$this->input->post('ProgrammeLongDesc'),'ProgrammeLive'=>$ProgrammeLive,'ProgrammeDate'=>$this->input->post('ProgrammeDate'),'ProgrammeLocation'=>$this->input->post('ProgrammeLocation'),'PageTitle'=>$this->input->post('PageTitle'),'PageDescription'=>$this->input->post('PageDescription'),'PageKeywords'=>$this->input->post('PageKeywords'));	
		$result=$this->db->insert('programmes', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/programmes";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	
}

public function insert_product()
{

		$this->load->library('Mygeneral');
		/* this is upload image codd */	
		$ProductLive=($this->input->post('ProductLive')=="Y")?'Y':'N';
		$Featured=($this->input->post('Featured')=="Y")?'Y':'N';
		$onSale=($this->input->post('onSale')=="Y")?'Y':'N';
		$Latest=($this->input->post('Latest')=="Y")?'Y':'N';
				
		if(!empty($_FILES['ProductImage']['name'])){		
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('ProductImage'))
		{
		$datarw = $this->upload->data();		
		$data = array('PrductName'=>$this->input->post('PrductName'),'ProductSlug'=>$this->mygeneral->toAscii($this->input->post('PrductName').'-'.$this->input->post('ModelNo')),'category'=>$this->input->post('category'),'PartnerID'=>$this->input->post('PartnerID'),'PrductName'=>$this->input->post('PrductName'),"ModelNo"=>$this->input->post('ModelNo'),'Material'=>$this->input->post('Material'),'Colour'=>$this->input->post('Colour'),'Size'=>$this->input->post('Size'),'ProductLongDesc'=>$this->input->post('ProductLongDesc'),'Stock'=>$this->input->post('Stock'),'Latest'=>$this->input->post('Latest'),'onSale'=>$this->input->post('onSale'),"Featured"=>$Featured,'ProductImage'=>$datarw['raw_name'].$datarw['file_ext'],'ProductLive'=>$ProductLive,'Warranty'=>$this->input->post('Warranty'));	
		$result=$this->db->insert('product', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/product";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('PrductName'=>$this->input->post('PrductName'),'ProductSlug'=>$this->mygeneral->toAscii($this->input->post('PrductName').'-'.$this->input->post('ModelNo')),'category'=>$this->input->post('category'),'PartnerID'=>$this->input->post('PartnerID'),'PrductName'=>$this->input->post('PrductName'),"ModelNo"=>$this->input->post('ModelNo'),'Material'=>$this->input->post('Material'),'Colour'=>$this->input->post('Colour'),'Size'=>$this->input->post('Size'),'ProductLongDesc'=>$this->input->post('ProductLongDesc'),'Stock'=>$this->input->post('Stock'),'Latest'=>$this->input->post('Latest'),'onSale'=>$this->input->post('onSale'),"Featured"=>$Featured,'ProductLive'=>$ProductLive,'Warranty'=>$this->input->post('Warranty'));
			
		$result=$this->db->insert('product', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/product";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	
}

public function insert_partner()
{

		$this->load->library('Mygeneral');
		/* this is upload image codd */	
		$PartnerLive=($this->input->post('PartnerLive')=="Y")?'Y':'N';
	
		
		if(!empty($_FILES['PartnerImage']['name'])){		
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('PartnerImage'))
		{
		$datarw = $this->upload->data();		
		$data = array('PartnerName'=>$this->input->post('PartnerName'),'PartnerSlug'=>$this->mygeneral->toAscii($this->input->post('PartnerName')),'Category'=>$this->input->post('Category'),'PartnerImage'=>$datarw['raw_name'].$datarw['file_ext'],'PartnerLive'=>$PartnerLive,'Partner_link'=>$this->input->post('Partner_link'));	
		$result=$this->db->insert('partners', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/partners";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('PartnerName'=>$this->input->post('PartnerName'),'PartnerSlug'=>$this->mygeneral->toAscii($this->input->post('PartnerName')),'Category'=>$this->input->post('Category'),'PartnerLive'=>$PartnerLive,'Partner_link'=>$this->input->post('Partner_link'));
		$result=$this->db->insert('partners', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/partners";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	
}
	
	
public function insert_social()
{

		$this->load->library('Mygeneral');
		/* this is upload image codd */	
		$SocialLive=($this->input->post('SocialLive')=="Y")?'Y':'N';
	
		
		if(!empty($_FILES['SocialImage']['name'])){		
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('SocialImage'))
		{
		$datarw = $this->upload->data();		
		$data = array('SocialName'=>$this->input->post('SocialName'),'SocialSlug'=>$this->mygeneral->toAscii($this->input->post('SocialName')),'parent_information'=>$this->input->post('parent_information'),'SocialImage'=>$datarw['raw_name'].$datarw['file_ext'],'SocialLive'=>$SocialLive,'Social_link'=>$this->input->post('Social_link'));	
		$result=$this->db->insert('socials', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/sociallinks";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('SocialName'=>$this->input->post('SocialName'),'SocialSlug'=>$this->mygeneral->toAscii($this->input->post('SocialName')),'parent_information'=>$this->input->post('parent_information'),'SocialLive'=>$SocialLive,'Social_link'=>$this->input->post('Social_link'));
		$result=$this->db->insert('socials', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/sociallinks";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	
}






public function edit_information()
	 {
		 $this->load->library('Myinformation');
		 $information_id=$this->uri->segment('3');
		 $data["information_array"]=$this->myinformation->informationSelect(0,0);
		 $data['query']=$this->db->query("SELECT * FROM _information WHERE information_id=".$information_id);
		 $this->load->view('admin/information/edit_information',$data);
	 }
	 
public function edit_category()
	 {
		 $this->load->library('Mycategory');		 
		 $data["category_array"]=$this->mycategory->categorySelect(0,0);
		 $data['query']=$this->db->query("SELECT * FROM productcategories WHERE CategoryID=".$this->uri->segment('3'));
		 $this->load->view('admin/category/edit_category',$data);
	 }

public function edit_product()
	 {
		 $this->load->library('Mycategory');		 
		 $data["category_array"]=$this->mycategory->categorySelect(0,0);
		 $data['query_partner'] = $this->db->query("SELECT * FROM partners ORDER BY PartnerID desc");
		 $data['query']=$this->db->query("SELECT * FROM product WHERE ProductID=".$this->uri->segment('3'));
		 $this->load->view('admin/product/edit_product',$data);
	 }
	 
public function edit_partner()
	 {
		 $this->load->library('Mycategory');		 
		 $data["category_array"]=$this->mycategory->categorySelect(0,0);
		 $data['query']=$this->db->query("SELECT * FROM partners WHERE PartnerID=".$this->uri->segment('3'));
		 $this->load->view('admin/partners/edit_partner',$data);
	 }
	
	
	
public function edit_social()
	 {
		 $this->load->library('Myinformation');
		 $data["information_array"]=$this->myinformation->informationSelect(0,0);
		 $data['query']=$this->db->query("SELECT * FROM socials WHERE SocialID=".$this->uri->segment('3'));
		 $this->load->view('admin/sociallinks/edit_social',$data);
	 }


	 public function informationupdate()
	 {
						
		$this->load->library('Mygeneral');
		/* this is upload image codd */
		$featured=($this->input->post('featuredInfo')=="Y")?'Y':'N';
		$show_on_menu=($this->input->post('show_on_menu')=="Y")?'Y':'N';
		$visible=($this->input->post('visible')=="Y")?'Y':'N';
		$tab=($this->input->post('as_tab')=="Y")?'Y':'N';
		
		if(!empty($_FILES['informationimage']['name'])){
		
		$this->db->where('information_id',$this->uri->segment('3'));
		$query = $this->db->get('_information');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->image)){
		@unlink("cmsimage/".$row_image->image);
		}
			
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);	
						
		if ($this->upload->do_upload('informationimage'))
		{
		$datarw = $this->upload->data();		
		$data = array('information_name'=>$this->input->post('information_name'),'information_title'=>$this->input->post('information_title'),'custom_link'=>$this->input->post('custom_link'),'clean_url'=>$this->mygeneral->toAscii($this->input->post('information_name')),'parentInfo'=>$this->input->post('parent_information'),'information_introduction'=>$this->input->post('information_introduction'),'information_description'=>$this->input->post('information_description'),'image'=>$datarw['raw_name'].$datarw['file_ext'],'image_caption'=>$this->input->post('image_caption'),'featured'=>$featured,'show_on_menu'=>$show_on_menu,'as_tab'=>$tab,'visible'=>$visible
						);	
		$this->db->where('information_id',$this->uri->segment('3'));											                                   
		$result=$this->db->update('_information', $data);
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/information";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		
		$data = array('information_name'=>$this->input->post('information_name'),
				  'information_title'=>$this->input->post('information_title'),'custom_link'=>$this->input->post('custom_link'),
				  'clean_url'=>$this->mygeneral->toAscii($this->input->post('information_name')),
				   'parentInfo'=>$this->input->post('parent_information'),
				   'information_introduction'=>$this->input->post('information_introduction'),
				   'information_description'=>$this->input->post('information_description'),
					'image_caption'=>$this->input->post('image_caption'),
				   'featured'=>$this->input->post('featuredInfo'),
				   'show_on_menu'=>$this->input->post('show_on_menu'),
				   'as_tab'=>$tab,				   
				   'visible'=>$this->input->post('visible')
					);	
					
		
		$this->db->where('information_id',$this->uri->segment('3'));											                                   
		$result=$this->db->update('_information', $data);
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/information";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	}
	
	public function categoryupdate()
	 {
						
		$this->load->library('Mygeneral');
		/* this is upload image codd */
		$Nevigation=($this->input->post('Nevigation')=="Y")?'Y':'N';
		$Visible=($this->input->post('Visible')=="Y")?'Y':'N';
		$CMS=($this->input->post('CMS')=="Y")?'Y':'N';
		$Services=($this->input->post('Services')=="Y")?'Y':'N';
		
				
		if(!empty($_FILES['CategoryImage']['name'])){		
		$this->db->where('CategoryID',$this->uri->segment('3'));
		$query = $this->db->get('productcategories');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->CategoryImage)){
		@unlink("cmsimage/".$row_image->CategoryImage);
		}
			
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);	
						
		if ($this->upload->do_upload('CategoryImage'))
		{
		$datarw = $this->upload->data();		
		$data = array('CategoryName'=>$this->input->post('CategoryName'),'clean_url'=>$this->mygeneral->toAscii($this->input->post('CategoryName')),'ParentCategory'=>$this->input->post('ParentCategory'),'Introduction'=>$this->input->post('Introduction'),'Description'=>$this->input->post('Description'),'CategoryImage'=>$datarw['raw_name'].$datarw['file_ext'],'image_caption'=>$this->input->post('image_caption'),'Nevigation'=>$Nevigation,'Visible'=>$Visible,"CMS"=>$CMS,'Services'=>$Services);
		$this->db->where('CategoryID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('productcategories', $data);
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/category";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		
		$data = array('CategoryName'=>$this->input->post('CategoryName'),'clean_url'=>$this->mygeneral->toAscii($this->input->post('CategoryName')),'ParentCategory'=>$this->input->post('ParentCategory'),'Introduction'=>$this->input->post('Introduction'),'Description'=>$this->input->post('Description'),'image_caption'=>$this->input->post('image_caption'),'Nevigation'=>$Nevigation,'Visible'=>$Visible,"CMS"=>$CMS,'Services'=>$Services);
		$this->db->where('CategoryID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('productcategories', $data);
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/category";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	}

	 public function productupdate()
	 {
						
		$this->load->library('Mygeneral');
		/* this is upload image codd */
		$ProductLive =($this->input->post('ProductLive')=="Y")?'Y':'N';
		$Featured =($this->input->post('Featured')=="Y")?'Y':'N';
		$onSale=($this->input->post('onSale')=="Y")?'Y':'N';
		$Latest=($this->input->post('Latest')=="Y")?'Y':'N';
		
		
		if(!empty($_FILES['ProductImage']['name'])){	
		$this->db->where('ProductID',$this->uri->segment('3'));
		$query = $this->db->get('product');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->ProductImage)){
		@unlink("cmsimage/".$row_image->ProductImage);
		}
			
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('ProductImage'))
		{
		$datarw = $this->upload->data();		
		$data = array('PrductName'=>$this->input->post('PrductName'),'ProductSlug'=>$this->mygeneral->toAscii($this->input->post('PrductName').'-'.$this->input->post('ModelNo')),'category'=>$this->input->post('category'),'PartnerID'=>$this->input->post('PartnerID'),'PrductName'=>$this->input->post('PrductName'),"ModelNo"=>$this->input->post('ModelNo'),'Material'=>$this->input->post('Material'),'Colour'=>$this->input->post('Colour'),'Size'=>$this->input->post('Size'),'ProductLongDesc'=>$this->input->post('ProductLongDesc'),'Stock'=>$this->input->post('Stock'),'Latest'=>$this->input->post('Latest'),'onSale'=>$this->input->post('onSale'),"Featured"=>$Featured,'ProductImage'=>$datarw['raw_name'].$datarw['file_ext'],'ProductLive'=>$ProductLive,'Warranty'=>$this->input->post('Warranty'));	
		$this->db->where('ProductID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('product', $data);
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/product";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('PrductName'=>$this->input->post('PrductName'),'ProductSlug'=>$this->mygeneral->toAscii($this->input->post('PrductName').'-'.$this->input->post('ModelNo')),'category'=>$this->input->post('category'),'PartnerID'=>$this->input->post('PartnerID'),'PrductName'=>$this->input->post('PrductName'),"ModelNo"=>$this->input->post('ModelNo'),'Material'=>$this->input->post('Material'),'Colour'=>$this->input->post('Colour'),'Size'=>$this->input->post('Size'),'ProductLongDesc'=>$this->input->post('ProductLongDesc'),'Stock'=>$this->input->post('Stock'),'Latest'=>$this->input->post('Latest'),'onSale'=>$this->input->post('onSale'),"Featured"=>$Featured,'ProductLive'=>$ProductLive,'Warranty'=>$this->input->post('Warranty'));
		//print_r($data);
		//die();	
		$this->db->where('ProductID',$this->uri->segment('3'));							                                   
		$result=$this->db->update('product', $data);
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/product";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	}


public function insert_product_image()
	{
	
	$this->load->library('upload');
	$config['upload_path'] = 'gallery/';
	$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
	$config['max_size'] = '10000000';								
	$this->upload->initialize($config);					
	if ($this->upload->do_upload('ProductImage'))
		{
			$data = $this->upload->data();
			$data = array('caption'=>$this->input->post('caption'),"image"=>$data['raw_name'].$data['file_ext'],"ProductID"=>$this->uri->segment(3));
			$result=$this->db->insert('productimage', $data); 
			if($result)
			{
				$this->session->set_userdata('sucess',"Your Information post successfully.");
				$redirect=base_url()."admin/product_image/".$this->uri->segment(3);
				redirect($redirect);
				exit;
			}
			else
			{
				$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
				$ref = $this->input->server('HTTP_REFERER', TRUE);
				redirect($ref, 'location');
			}
		}
	else
	{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
	}							
	
}

public function delete_productimage()
	{
	$query=$this->db->query("SELECT * FROM productimage WHERE image_id=".$this->uri->segment(4));
	$row=$query->row();
	$path_to_file = 'gallery/'.$row->image;
	if(unlink($path_to_file)) 
	{
	$this->db->where('image_id',$this->uri->segment(4));
	$this->db->delete('productimage'); 
	$redirect=base_url()."admin/product_image/".$this->uri->segment(3);
	redirect($redirect);
	}
	else
	{
	$this->db->where('image_id',$this->uri->segment(4));
	$this->db->delete('productimage'); 
	$redirect=base_url()."admin/product_image/".$this->uri->segment(3);
	redirect($redirect);
	}
}

public function finishproductadd()
	{
	$redirect=base_url()."admin/product";
	redirect($redirect);
}


 public function partnerupdate()
	 {
						
		$this->load->library('Mygeneral');
		/* this is upload image codd */
		$PartnerLive=($this->input->post('PartnerLive')=="Y")?'Y':'N';
		
		if(!empty($_FILES['PartnerImage']['name'])){	
		$this->db->where('PartnerID',$this->uri->segment('3'));
		$query = $this->db->get('partners');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->PartnerImage)){
		@unlink("cmsimage/".$row_image->PartnerImage);
		}
			
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('PartnerImage'))
		{
		$datarw = $this->upload->data();		
		$data = array('PartnerName'=>$this->input->post('PartnerName'),'PartnerSlug'=>$this->mygeneral->toAscii($this->input->post('PartnerName')),'Category'=>$this->input->post('Category'),'PartnerImage'=>$datarw['raw_name'].$datarw['file_ext'],'PartnerLive'=>$PartnerLive,'Partner_link'=>$this->input->post('Partner_link'));	
		$this->db->where('PartnerID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('partners', $data);
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/partners";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('PartnerName'=>$this->input->post('PartnerName'),'PartnerSlug'=>$this->mygeneral->toAscii($this->input->post('PartnerName')),'Category'=>$this->input->post('Category'),'PartnerLive'=>$PartnerLive,'Partner_link'=>$this->input->post('Partner_link'));
		$this->db->where('PartnerID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('partners', $data);
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/partners";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	}
	
 public function socialupdate()
	 {
						
		$this->load->library('Mygeneral');
		/* this is upload image codd */
		$SocialLive=($this->input->post('SocialLive')=="Y")?'Y':'N';
		
		if(!empty($_FILES['SocialImage']['name'])){	
		$this->db->where('SocialID',$this->uri->segment('3'));
		$query = $this->db->get('socials');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->SocialImage)){
		@unlink("cmsimage/".$row_image->SocialImage);
		}
			
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('SocialImage'))
		{
		$datarw = $this->upload->data();		
		$data = array('SocialName'=>$this->input->post('SocialName'),'SocialSlug'=>$this->mygeneral->toAscii($this->input->post('SocialName')),'parent_information'=>$this->input->post('parent_information'),'SocialImage'=>$datarw['raw_name'].$datarw['file_ext'],'SocialLive'=>$SocialLive,'Social_link'=>$this->input->post('Social_link'));	
		$this->db->where('SocialID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('socials', $data);
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/sociallinks";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('SocialName'=>$this->input->post('SocialName'),'SocialSlug'=>$this->mygeneral->toAscii($this->input->post('SocialName')),'parent_information'=>$this->input->post('parent_information'),'SocialLive'=>$SocialLive,'Social_link'=>$this->input->post('Social_link'));
		$this->db->where('SocialID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('socials', $data);
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/sociallinks";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	}

	
	
	public function delinfoimage()
	 {
		$this->db->where('information_id',$this->uri->segment('3'));
		$query = $this->db->get('_information');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->image)){
		@unlink("cmsimage/".$row_image->image);
		}
		$this->db->where('information_id',$this->uri->segment('3'));
		$data = array('image'=>'');											                                   
		$result=$this->db->update('_information', $data);
		$redirect=base_url()."functions/edit_information/".$this->uri->segment('3');
		redirect($redirect);		
	 }
	 
	 public function delcategoryimage()
	 {
		$this->db->where('CategoryID',$this->uri->segment('3'));
		$query = $this->db->get('productcategories');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->CategoryImage)){
		@unlink("cmsimage/".$row_image->CategoryImage);
		}
		$this->db->where('CategoryID',$this->uri->segment('3'));
		$data = array('CategoryImage'=>'');											                                   
		$result=$this->db->update('productcategories', $data);
		$redirect=base_url()."functions/edit_category/".$this->uri->segment('3');
		redirect($redirect);		
	 }
	 
	 public function delprogrammeimage()
	 {
		$this->db->where('ProgrammeID',$this->uri->segment('3'));
		$query = $this->db->get('programmes');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->ProgrammeImage)){
		@unlink("cmsimage/".$row_image->ProgrammeImage);
		}
		$this->db->where('ProgrammeID',$this->uri->segment('3'));
		$data = array('ProgrammeImage'=>'');											                                   
		$result=$this->db->update('programmes', $data);
		$redirect=base_url()."functions/edit_programme/".$this->uri->segment('3');
		redirect($redirect);		
	 }
	 
	 public function delproductimage()
	 {
		$this->db->where('ProductID',$this->uri->segment('3'));
		$query = $this->db->get('product');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->ProductImage)){
		@unlink("cmsimage/".$row_image->ProductImage);
		}
		$this->db->where('ProductID',$this->uri->segment('3'));
		$data = array('ProductImage'=>'');											                                   
		$result=$this->db->update('product', $data);
		$redirect=base_url()."functions/edit_product/".$this->uri->segment('3');
		redirect($redirect);		
	 }
	 
	 public function delpartnerimage()
	 {
		$this->db->where('PartnerID',$this->uri->segment('3'));
		$query = $this->db->get('partners');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->PartnerImage)){
		@unlink("cmsimage/".$row_image->PartnerImage);
		}
		$this->db->where('PartnerID',$this->uri->segment('3'));
		$data = array('PartnerImage'=>'');											                                   
		$result=$this->db->update('partners', $data);
		$redirect=base_url()."functions/edit_partner/".$this->uri->segment('3');
		redirect($redirect);		
	 }
	 
	 
	

public function dlt_information()
	{
	$sql_dltinformation="DELETE FROM _information where information_id=".$this->uri->segment(3);
	$this->db->query($sql_dltinformation);	
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect("admin/information",'location'); 
	
}

public function dlt_category()
	{
	$sql_dltcategory="DELETE FROM productcategories where CategoryID=".$this->uri->segment(3);
	$this->db->query($sql_dltcategory);	
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect("admin/category",'location'); 
	
}
	
public function dlt_social()
	{
	$sql_dltsocial="DELETE FROM socials where SocialID=".$this->uri->segment(3);
	$this->db->query($sql_dltsocial);	
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect("admin/sociallinks",'location'); 
	
}
	
public function dlt_partner()
	{
	$sql_dltpartner="DELETE FROM partners where PartnerID=".$this->uri->segment(3);
	$this->db->query($sql_dltpartner);	
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect("admin/partners",'location'); 
	
}
	
public function dlt_programme()
	{
	$sql_dltprogramme="DELETE FROM programmes where ProgrammeID=".$this->uri->segment(3);
	$this->db->query($sql_dltprogramme);	
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect("admin/programmes",'location'); 
	
}




/* This is end for Information */


public function dlt_page()
	{
	$sql_dltpage="DELETE FROM page where page_id=".$this->uri->segment(4);
	$this->db->query($sql_dltpage);	
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect("admin/page",'location'); 
	
}


public function dlt_row()
	{
		$table = $this->uri->segment(3);
		$id = $this->uri->segment(4);
		$flag=0;
			
		$this->db->where('Id',$id);
		$query_dlt = $this->db->get($table);
		foreach($query_dlt->result() as $row)
		{
			
			if(isset($row->slider_image))
			{
				$link = "file/slider/".$row->slider_image;
				$flag=1;
			}
			if(isset($row->demand))
			{
				$link = "file/demand_letter/".$row->demand;
				$flag=1;
			}
			if(isset($row->icon))
			{
				$link = "file/job_icon/".$row->icon;
				$flag=1;
			}
			if(isset($row->img))
			{
				$link = "file/photo/".$row->img;
				$flag=1;
			}
			
			if(isset($row->c_logo))
			{
				$link = "file/c_logo/".$row->c_logo;
				$flag=1;
			}
			if(isset($row->document))
			{
				$link = "file/temp_file/".$row->document;
				$flag=1;
			}
			
					}
		$query = $this->db->delete($table,array('Id'=>$id));
		if($query)
		{
			$sMsg = "Slider image deleted from database !!!";
			if($flag==1){
			@unlink(@$link);
			$this->session->set_userdata('sucess','Slider image deleted from database !!!');
			}
		}
		else{
			$data['msg'] = "Error in database !!!";
		}
		
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location'); 
		
	}



public function add_page()
	{
	$page_data["page_array"]=$this->mypage->pageSelect(0,0);	
	$this->load->view('admin/page/add_page',$page_data);
}


public function insert_page()
	{
	
	$data = array('name'=>$this->input->post('name'),
	'title'=>$this->input->post('title'),
	"clean_url"=>$this->mygeneral->toAscii($this->input->post('name')),
	'parent_page'=>$this->input->post('parent_page'),
	'introduction'=>$this->input->post('introduction'),
	'description'=>$this->input->post('description'),
	'image'=>str_replace(base_url(),"",$this->input->post('image')),
	'featured'=>$this->input->post('featuredInfo'),
	'show_on_menu'=>$this->input->post('show_on_menu'),
	'visible'=>$this->input->post('visible'),
	'page_title'=>$this->input->post('page_title'),
	'page_keywords'=>$this->input->post('page_keywords'),
	'page_description'=>$this->input->post('page_description')
	);
	
	$result=$this->db->insert('page', $data);
	$redirect=base_url()."admin/page";
	redirect($redirect);	
}


public function edit_page()
	{
	$page_id=$this->uri->segment('3');
	$data["page_array"]=$this->mypage->pageSelect(0,0);
	$data['query']=$this->db->query("SELECT * FROM page WHERE page_id=".$page_id);
	$this->load->view('admin/page/edit_page',$data);
}


public function edit_user()
	{
	$user_id=$this->uri->segment('3');
	$data['query_country'] = $this->User_model->getCountry();
	$data['query']=$this->db->query("SELECT * FROM users WHERE UserID=".$user_id);
	$this->load->view('admin/user/edit_user',$data);
}



public function pageupdate()
	{
	$id= $this->uri->segment('3');
	$data = array('name'=>$this->input->post('name'),
	'title'=>$this->input->post('title'),
	"clean_url"=>$this->mygeneral->toAscii($this->input->post('name')),
	'parent_page'=>$this->input->post('parent_page'),
	'introduction'=>$this->input->post('introduction'),
	'description'=>$this->input->post('description'),
	'image'=>str_replace(base_url(),"",$this->input->post('image')),
	'featured'=>$this->input->post('featured'),
	'show_on_menu'=>$this->input->post('show_on_menu'),
	'visible'=>$this->input->post('visible'),
	'page_title'=>$this->input->post('page_title'),
	'page_keywords'=>$this->input->post('page_keywords'),
	'page_description'=>$this->input->post('page_description'),
	);
	$this->db->where('page_id', $id);											                                   
	$result=$this->db->update('page', $data);			
	if($result)
	{
	$this->session->set_userdata('sucess',"Your page edited successfully.");
	$redirect=base_url()."admin/page";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't edited .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}
}

public function userupdate()
	{
	$id= $this->uri->segment('3');
	$data = array('UserEmail'=>$this->input->post('UserEmail'),
	'UserFirstName'=>$this->input->post('UserFirstName'),
	'UserLastName'=>$this->input->post('UserLastName'),
	'UserEmail'=>$this->input->post('UserEmail'),
	'UserDescription'=>$this->input->post('UserDescription'),
	'UserCity'=>$this->input->post('UserCity'),
	'UserCountry'=>$this->input->post('Country'),
	'UserPassword'=>$this->encrypt->encode($this->input->post('UserPassword')),
	'UserState'=>$this->input->post('UserState'));
	$this->db->where('UserID', $id);											                                   
	$result=$this->db->update('users',$data);			
	if($result)
	{
	$this->session->set_userdata('sucess',"Your information edited successfully.");
	$redirect=base_url()."admin/users";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't edited .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}
}


//slider//

 //slider//
	 
	 public function addslider()
	{
		$this->load->library('Myinformation');
		$information_data["information_array"]=$this->myinformation->informationSelect(0,0);
	
		$this->load->view('admin/slider/addform',$information_data);
		
	}
	public function insertslider()
	{
				
		/* this is upload slider coad */
		$status=($this->input->post('status')=="1")?"1":"0";
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('sliderimage'))
		{
		$datarw = $this->upload->data();				
		$data = array('title'=>$this->input->post('title'),"caption"=>$this->input->post('caption'),"slider_image"=>$datarw['raw_name'].$datarw['file_ext'],"slider_url"=>$this->input->post('slider_url'),'state'=>$status);		
		$result=$this->db->insert('slider', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/slider";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}	
		
		/* End of upload slider */
		
	}

		public function sliderEdit(){
			$id=$this->uri->segment(3);
			$this->load->library('Myinformation');
			$data["information_array"]=$this->myinformation->informationSelect(0,0);
			
			$data['query'] = $this->db->query("SELECT * FROM slider WHERE Id='$id'");
			$this->load->view('admin/slider/edit',$data);
		}

		public function sliderUpdate(){
						
		/* this is upload slider coad */
		
		$status=($this->input->post('status')=="1")?"1":"0";
		if(!empty($_FILES['sliderimage']['name'])){	
		$this->db->where('Id',$this->uri->segment('3'));
		$query = $this->db->get('slider');
		$row_image = $query->row();
		@unlink("cmsimage/".$row_image->slider_image);
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('sliderimage'))
		{
		$datarw = $this->upload->data();				
		$data = array('title'=>$this->input->post('title'),"caption"=>$this->input->post('caption'),"slider_image"=>$datarw['raw_name'].$datarw['file_ext'],"slider_url"=>$this->input->post('slider_url'),'state'=>$status);	
		
		$this->db->where('Id',$this->uri->segment('3'));	
		$result=$this->db->update('slider', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/slider";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array('title'=>$this->input->post('title'),"caption"=>$this->input->post('caption'),"slider_image"=>$this->input->post('previmage'),"slider_url"=>$this->input->post('slider_url'),'state'=>$status);		
		$this->db->where('Id',$this->uri->segment('3'));	
		$result=$this->db->update('slider', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/slider";
		redirect($redirect);
		exit;
		}
		
			/* End of upload slider */
				
		}
		///PAGE CATEGORY//

   		public function deleteslider()
		{
			$this->db->where('Id',$this->uri->segment('3'));
			$query = $this->db->get('slider');
			$row_image = $query->row();
			@unlink("cmsimage/".$row_image->slider_image);
			$this->db->where('Id',$this->uri->segment('3'));
			$this->db->delete('slider'); 
			$redirect=base_url()."admin/slider";
			redirect($redirect);
		}
		




public function inverseimageat()
	{
	$query = $this->db->query("SELECT * FROM packageimage WHERE image_id=".$this->uri->segment('4')." AND PackageID=".$this->uri->segment('3'));
	$res_img = $query->result();  // this returns an object of all results
	$row_img = $res_img[0];  
	$imgat_row=$row_img->ImageAt;
	
	if($imgat_row=="Thumbnail"){
		$data=array("ImageAt"=>'Banner');
	}
	else
	{
		$data=array("ImageAt"=>'Thumbnail');
	}
	
	$this->db->where('PackageID',$this->uri->segment('3'));
	$this->db->where('image_id',$this->uri->segment('4'));
	$result=$this->db->update('packageimage',$data);  
	if($result)
	{
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/package_image";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}
}





function delete_user()
	{		
	$this->db->where('UserID',$this->uri->segment(3));
	$this->db->delete('users'); 
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/users";
	redirect($redirect);
	
}





		
public function add_news()
	{
	$this->load->library('Myinformation');		
	$data["information_array"]=$this->myinformation->informationSelect(0,0);	
	$this->load->view('admin/news/add_news',$data);
}


public function add_gallery()
	{
	$this->load->library('Myinformation');		
	$data["information_array"]=$this->myinformation->informationSelect(0,0);	
	$this->load->view('admin/gallery/add_gallery',$data);
}


public function insert_gallery()
	{
	$Visible=($this->input->post('Visible')=="Y")?"Y":"N";
	
	$data = array('Gallery'=>$this->input->post('Gallery'),'GallerySlug'=>$this->mygeneral->toAscii($this->input->post('Gallery')),"parent_information"=>$this->input->post('parent_information'),'Description'=>$this->input->post('Description'),'Visible'=>$Visible,"added"=>date('Y/m/d'));
	$result=$this->db->insert('gallery', $data);		
	if($result)
	{
	$this->session->set_userdata('InsertGalleryid',$this->db->insert_id()); 
	$redirect=base_url()."admin/gallery_image";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}
	
	
}


public function insert_news()
	{
	$NewsLive=($this->input->post('NewsLive')=="Y")?"Y":"N";	
	
	if(!empty($_FILES['newsimage']['name'])){		
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('newsimage'))
		{
		$datarw = $this->upload->data();		
		$datarw = $this->upload->data();	
		
		$data = array("UserID"=>$this->session->userdata('UserID'),'NewsName'=>$this->input->post('NewsName'),'NewsLocation'=>$this->input->post('NewsLocation'),"netype"=>$this->input->post('netype'),'NewsSlug'=>$this->mygeneral->toAscii($this->input->post('NewsName')),"parent_information"=>$this->input->post('parent_information'),'NewsShortDesc'=>$this->input->post('NewsShortDesc'),'NewsLongDesc'=>$this->input->post('NewsLongDesc'),"NewsLive"=>$NewsLive ,'NewsImage'=>$datarw['raw_name'].$datarw['file_ext'],"NewsDate"=>$this->input->post('NewsDate'),"PageTitle"=>$this->input->post('PageTitle'),"PageDescription"=>$this->input->post('PageDescription'),"PageKeywords"=>$this->input->post('PageKeywords'));
			
		
		$result=$this->db->insert('news', $data); 
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/news";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		$data = array("UserID"=>$this->session->userdata('UserID'),'NewsName'=>$this->input->post('NewsName'),'NewsLocation'=>$this->input->post('NewsLocation'),"netype"=>$this->input->post('netype'),'NewsSlug'=>$this->mygeneral->toAscii($this->input->post('NewsName')),"parent_information"=>$this->input->post('parent_information'),'NewsShortDesc'=>$this->input->post('NewsShortDesc'),'NewsLongDesc'=>$this->input->post('NewsLongDesc'),"NewsLive"=>$NewsLive,"NewsDate"=>$this->input->post('NewsDate'),"PageTitle"=>$this->input->post('PageTitle'),"PageDescription"=>$this->input->post('PageDescription'),"PageKeywords"=>$this->input->post('PageKeywords'));
		$result=$this->db->insert('news', $data); 
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/news";
		redirect($redirect);
		exit;
		}
		/* end of image upload image codd */
	
	
}

public function insert_news_image()
	{
	
	$this->load->library('upload');
	$config['upload_path'] = 'news/';
	$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
	$config['max_size'] = '10000000';								
	$this->upload->initialize($config);					
	if ($this->upload->do_upload('NewsImage'))
	{
	$data = $this->upload->data();
	$data = array('caption'=>$this->input->post('caption'),"image"=>$data['raw_name'].$data['file_ext'],"NewsID"=>$this->session->userdata('InsertNewsid'));
	$result=$this->db->insert('newsimage', $data); 
	if($result)
	{
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/news_image";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}
	}
	else
	{
	echo $this->upload->display_errors();
	$this->session->set_userdata('error',$this->upload->display_errors());
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}							
	
}


public function insert_gallery_image()
	{
	
	$this->load->library('upload');
	$config['upload_path'] = 'gallery/';
	$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
	$config['max_size'] = '10000000';								
	$this->upload->initialize($config);					
	if ($this->upload->do_upload('GalleryImage'))
	{
	$data = $this->upload->data();
	$data = array('caption'=>$this->input->post('caption'),"image"=>$data['raw_name'].$data['file_ext'],"GalleryId"=>$this->session->userdata('InsertGalleryid'));
	$result=$this->db->insert('galleryimage', $data); 
	if($result)
	{
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/gallery_image";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}
	}
	else
	{
	echo $this->upload->display_errors();
	$this->session->set_userdata('error',$this->upload->display_errors());
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}							
	
}

public function gallerymakemain()
	{
	$data=array("Main"=>'N');
	$this->db->where('GalleryId',$this->uri->segment('3'));
	$result=$this->db->update('galleryimage',$data);
	
	$data=array("Main"=>'Y');
	$this->db->where('GalleryId',$this->uri->segment('3'));
	$this->db->where('image_id',$this->uri->segment('4'));
	$result=$this->db->update('galleryimage',$data);  
	if($result)
	{
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/gallery_image";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}
}


public function makemain()
	{
	$data=array("Main"=>'N');
	$this->db->where('NewsID',$this->uri->segment('3'));
	$result=$this->db->update('newsimage',$data);
	
	$data=array("Main"=>'Y');
	$this->db->where('NewsID',$this->uri->segment('3'));
	$this->db->where('image_id',$this->uri->segment('4'));
	$result=$this->db->update('newsimage',$data);  
	if($result)
	{
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/news_image";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}
}

public function delete_newsimage()
	{
	$query=$this->db->query("SELECT * FROM newsimage WHERE image_id=".$this->uri->segment(4));
	$row=$query->row();
	$path_to_file = 'news/'.$row->image;
	if(unlink($path_to_file)) 
	{
	$this->db->where('image_id',$this->uri->segment(4));
	$this->db->delete('newsimage'); 
	$redirect=base_url()."admin/news_image";
	redirect($redirect);
	}
	else
	{
	$this->db->where('image_id',$this->uri->segment(4));
	$this->db->delete('newsimage'); 
	$redirect=base_url()."admin/news_image";
	redirect($redirect);
	}
}


public function delete_galleryimage()
	{
	$query=$this->db->query("SELECT * FROM galleryimage WHERE image_id=".$this->uri->segment(4));
	$row=$query->row();
	$path_to_file = 'gallery/'.$row->image;
	if(unlink($path_to_file)) 
	{
	$this->db->where('image_id',$this->uri->segment(4));
	$this->db->delete('galleryimage'); 
	$redirect=base_url()."admin/gallery_image";
	redirect($redirect);
	}
	else
	{
	$this->db->where('image_id',$this->uri->segment(4));
	$this->db->delete('galleryimage'); 
	$redirect=base_url()."admin/gallery_image";
	redirect($redirect);
	}
}

function dlt_product()
	{
	$query=$this->db->query("SELECT * FROM productimage WHERE ProductID=".$this->uri->segment(3));
	
	foreach($query->result() as $KPIList)
	{
	
	$path_to_file = 'cmsimage/'.$KPIList->image;
	if(file_exists($path_to_file))
	{
	unlink($path_to_file);
	}
	$this->db->where('image_id',$KPIList->image_id);
	$this->db->delete('productimage'); 
	}
	
	$this->db->where('ProductID',$this->uri->segment(3));
	$this->db->delete('product'); 
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/product";
	redirect($redirect);
	
}



function dlt_gallery()
	{
	$query=$this->db->query("SELECT * FROM galleryimage WHERE GalleryId=".$this->uri->segment(3));
	
	foreach($query->result() as $KPIList)
	{
	
	$path_to_file = 'gallery/'.$KPIList->image;
	if(file_exists($path_to_file))
	{
	unlink($path_to_file);
	}
	$this->db->where('image_id',$KPIList->image_id);
	$this->db->delete('galleryimage'); 
	}
	
	$this->db->where('GalleryId',$this->uri->segment(3));
	$this->db->delete('gallery'); 
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/gallery";
	redirect($redirect);
	
}

public function finishnewsadd()
	{
	$this->session->unset_userdata('InsertNewsid');
	$redirect=base_url()."admin/news";
	redirect($redirect);
}


public function finishgalleryadd()
	{
	$this->session->unset_userdata('InsertGalleryid');
	$redirect=base_url()."admin/gallery";
	redirect($redirect);
}



public function news_edit()
	{
	$this->load->library('Myinformation');		
	$data["information_array"]=$this->myinformation->informationSelect(0,0);	
	
	$data['query']=$this->db->query("SELECT * FROM news WHERE NewsID=".$this->uri->segment('3'));
	$this->load->view('admin/news/edit_news',$data);
}



public function gallery_edit()
	{
	$this->load->library('Myinformation');
	$information_id=$this->uri->segment('3');
	$data["information_array"]=$this->myinformation->informationSelect(0,0);	
	$data['query']=$this->db->query("SELECT * FROM gallery WHERE GalleryId=".$this->uri->segment('3'));
	$this->load->view('admin/gallery/edit_gallery',$data);
}

public function galleryupdate()
	{
	$Visible=($this->input->post('Visible')=="Y")?"Y":"N";
	
	$data = array('Gallery'=>$this->input->post('Gallery'),'GallerySlug'=>$this->mygeneral->toAscii($this->input->post('Gallery')),"parent_information"=>$this->input->post('parent_information'),'Description'=>$this->input->post('Description'),'Visible'=>$Visible,"updated"=>date('Y/m/d'));
	$this->db->where('GalleryId',$this->uri->segment(3));
	$result=$this->db->update('gallery', $data); 
	if($result)
	{
	$this->session->set_userdata('InsertGalleryid',$this->uri->segment(3)); 
	$this->session->set_userdata('sucess',"Your Information post successfully.");
	$redirect=base_url()."admin/gallery_image";
	redirect($redirect);
	exit;
	}
	else
	{
	$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
	$ref = $this->input->server('HTTP_REFERER', TRUE);
	redirect($ref, 'location');
	}	
}

public function newsupdate()
	{
	$this->load->library('Mygeneral');
	$NewsLive=($this->input->post('NewsLive')=="Y")?"Y":"N";
	
	
		/* this is upload image codd */
	
		if(!empty($_FILES['newsimage']['name'])){	
		$this->db->where('NewsID',$this->uri->segment('3'));
		$query = $this->db->get('news');
		$row_image = $query->row();
		if (file_exists("cmsimage/".$row_image->NewsImage)){
		@unlink("cmsimage/".$row_image->NewsImage);
		}
			
		$this->load->library('upload');
		$config['upload_path'] = 'cmsimage/';
		$config['allowed_types'] = 'gif|jpg|png|PNG|jpeg';
		$config['max_size'] = '10000000';								
		$this->upload->initialize($config);					
		if ($this->upload->do_upload('newsimage'))
		{
		$datarw = $this->upload->data();		
		$data = array("UserID"=>$this->session->userdata('UserID'),'NewsName'=>$this->input->post('NewsName'),'NewsName'=>$this->input->post('NewsName'),'NewsLocation'=>$this->input->post('NewsLocation'),"netype"=>$this->input->post('netype'),'NewsSlug'=>$this->mygeneral->toAscii($this->input->post('NewsName')),"parent_information"=>$this->input->post('parent_information'),'NewsShortDesc'=>$this->input->post('NewsShortDesc'),'NewsLongDesc'=>$this->input->post('NewsLongDesc'),"NewsLive"=>$NewsLive ,'NewsImage'=>$datarw['raw_name'].$datarw['file_ext'],"NewsDate"=>$this->input->post('NewsDate'),"PageTitle"=>$this->input->post('PageTitle'),"PageDescription"=>$this->input->post('PageDescription'),"PageKeywords"=>$this->input->post('PageKeywords'));
		
		$this->db->where('NewsID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('news', $data);
		if($result)
		{
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/news";
		redirect($redirect);
		exit;
		}
		else
		{
		$this->session->set_userdata('error',"Your data isn't upload .Try it again.");
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}
		}
		else
		{
		echo $this->upload->display_errors();
		$this->session->set_userdata('error',$this->upload->display_errors());
		$ref = $this->input->server('HTTP_REFERER', TRUE);
		redirect($ref, 'location');
		}}
		else
		{
		
		$data = array("UserID"=>$this->session->userdata('UserID'),'NewsName'=>$this->input->post('NewsName'),'NewsLocation'=>$this->input->post('NewsLocation'),"netype"=>$this->input->post('netype'),'NewsSlug'=>$this->mygeneral->toAscii($this->input->post('NewsName')),"parent_information"=>$this->input->post('parent_information'),'NewsShortDesc'=>$this->input->post('NewsShortDesc'),'NewsLongDesc'=>$this->input->post('NewsLongDesc'),"NewsLive"=>$NewsLive,"NewsDate"=>$this->input->post('NewsDate'),"PageTitle"=>$this->input->post('PageTitle'),"PageDescription"=>$this->input->post('PageDescription'),"PageKeywords"=>$this->input->post('PageKeywords'));
		
		$this->db->where('NewsID',$this->uri->segment('3'));											                                   
		$result=$this->db->update('news', $data);
		$this->session->set_userdata('sucess',"Your data post successfully.");
		$redirect=base_url()."admin/news";
		redirect($redirect);
		exit;
		}	
}

public function moveslider()
{
	//require_once("configure_admin.php");
	$action 				= $_POST['action'];
	$updateRecordsArray 	= $_POST['recordsArray'];
	
	if ($action == "updateRecordsListings"){
	
	$listingCounter = 1;
	foreach ($updateRecordsArray as $recordIDValue) {
	
	 $query = "UPDATE slider SET displayOrder = " . $listingCounter . " WHERE Id = " . $recordIDValue;
		 mysql_query($query) or die('Error, insert query failed');
		$listingCounter = $listingCounter + 1;
	}
	}

}



/** Clear the old cache (usage optional) **/ 
protected function no_cache(){
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache'); 
}

}