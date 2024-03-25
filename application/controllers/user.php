<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{
	
	public function __construct(){
		        parent::__construct();
					$this->load->library('session');
					$this->load->library('Myinformation');
					$this->load->library('Mypage');
					$this->load->library('Mygeneral');
					$this->load->model('User_model');
					$this->load->library('form_validation');
		}
	
	public function index()
	{
		$data['pageId'] = '0';
		$data["query_slider"]=$this->db->query("SELECT * FROM slider");
		$data["query_company"]=$this->db->query("SELECT * FROM company where visible='Y'");
		$data["query_product"]=$this->db->query("SELECT * FROM _product WHERE visible='Y'");
		$data["header_navigation"]=$this->db->query("SELECT * FROM _information WHERE visible='Y' AND show_on_menu='Y' AND parentInfo='0'");
		$this->load->view('information',$data);
	}
	
	public function register()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$data['query'] = $this->User_model->getCountry();
		$this->load->view('registration',$data);
	}
	
	public function iregcomplete()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$this->load->view('iregistration_complete',$data);
	}
	
	public function pagenotfound()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$this->load->view('pagenotfound',$data);
	}
	
	public function makeregister()
	{
		$this->form_validation->set_rules('oldpasswrod', 'Old Password', 'required');
		$this->form_validation->set_rules('new_pass', 'New Password', 'required');
		$this->form_validation->set_rules('con_pass', 'Confirm Password', 'required');
		
		
		if($this->User_model->mail_exists($this->input->post('UserEmail'))==false){
		$this->load->helper('string');
		$VerificationCode=random_string('numeric',6);
		$data_user = array('UserEmail'=>$this->input->post('UserEmail'),
		'UserFirstName'=>$this->input->post('UserFirstName'),
		'UserLastName'=>$this->input->post('UserLastName'),
		'UserPhone'=>$this->input->post('UserPhone'),
		'UserAddress'=>$this->input->post('UserAddress'),
		'UserCountry'=>$this->input->post('Country'),		
		'UserPassword'=>$this->encrypt->encode($this->input->post('UserPassword')),
		'UserEmailVerified'=>'N',
		'UserVerificationCode'=>$VerificationCode,
		'UserRegistrationDate'=>date('Y/m/d'),
		'RegistrationType'=>'Individual',
		'UserType'=>'User'		
		);
		$result=$this->db->insert('users',$data_user);
		$UserID=$this->db->insert_id();
		if($result)
		{
		
		$this->load->library('PHPMailer');
		$mail = new PHPMailer();
		$link="<a href='".base_url("user/activate/".$UserID."/".$VerificationCode)."'>Activate Your Account</a>";
		
		$body = file_get_contents('individual_registration_complete.html');
		$body = str_replace("[\]",'',$body);
		
		$body = str_replace("##FirstName##",$_POST['UserFirstName'],$body);
		$body = str_replace("##LastName##",$_POST['UserLastName'],$body);
		$body = str_replace("##link##",$link,$body);
		
		
		$to=$this->input->post('UserEmail');			
		$subject = "Activation link for account";	
		$headers = "From: info@buddhistcircuits.com\r\n";
		$headers .= "Reply-To: info@buddhistcircuits.com\r\n";
		$headers .= "CC: suresh92@hotmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
					
		if(mail($to,$subject,$body,$headers))
		{
			$redirect=base_url()."user/iregcomplete";
	  		redirect($redirect);
			
		}
		else
		{
			$this->session->set_userdata('error',"Email cannot send please check for email");
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref, 'location');
		}
		}	
	   			
		}
		else
		{
			$this->session->set_userdata('error',"Please use another email!!!");
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref, 'location');
		}
	}
	
	
	public function activate()
	{
	   $this->db->where('UserID',$this->uri->segment(3)); 
	   $this->db->where('UserVerificationCode',$this->uri->segment(4)); 
	   $data = array("UserEmailVerified"=>'Y'); 
	   if($this->db->update('users',$data))
	   {
		   $this->session->set_userdata('verification_message',"Verified");
		   $redirect=base_url()."user/verification";
	  	   redirect($redirect);
	   }
	   else
	   {
		   $this->session->set_userdata('verification_message',"Notverified");
		   $redirect=base_url()."user/verification";
	  	   redirect($redirect);
	   }
	}
	
	public function verification()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$this->load->view('verification',$data);
	}
	
	public function login()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$this->load->view('user_login',$data);
	}
	
	public function forgot_password()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$this->load->view('forgot_password',$data);
	}
	
	public function get_password()
	{
		//$result=$this->db->select('UserID','UserPassword')->from('users')->where('UserEmail',$this->input->post('UserEmail'))->get()->row();
		$query = $this->db->query("select * from users where UserEmail='".$this->input->post('UserEmail')."'");
		if($query->num_rows()>0){
		$row = $query->row();
		$this->load->library('PHPMailer');
		$mail = new PHPMailer();
				
		$body = file_get_contents('password-send.html');
		$body = str_replace("[\]",'',$body);
		
		//$body = str_replace("##FirstName##",$row->UserFirstName,$body);
		//$body = str_replace("##LastName##",$row->UserLastName,$body);
		$body = str_replace("##password##",$plaintext_string = $this->encrypt->decode($row->UserPassword),$body);
		
		$to=$this->input->post('UserEmail');			
		$subject = "Password for our website kaves closet";	
		$headers = "From: info@buddhistcircuits.com\r\n";
		$headers .= "Reply-To: info@buddhistcircuits.com\r\n";
		$headers .= "CC: suresh92@hotmail.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";	
					
		if(mail($to,$subject,$body,$headers))
		{
			$redirect=base_url()."user/passwordsent";
	  		redirect($redirect);
			
		}
		else
		{
			$this->session->set_userdata('error',"Email cannot send please check for email");
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref, 'location');
		}}
		else
		{
			$this->session->set_userdata('error',"Email you entered is not available!!");
			$ref = $this->input->server('HTTP_REFERER', TRUE);
			redirect($ref, 'location');
		}
		
	}	
	public function passwordsent()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$this->load->view('passwordsent',$data);
	}
	
	public function make_login()
	{        		
				$userEmail =  $this->input->post('UserEmail') ;
				$password =  $this->input->post('UserPassword');
								
                $query_user=$this->db->query("SELECT * FROM users WHERE UserEmail='".$userEmail."' AND UserType='User' AND UserEmailVerified='Y'" );	
				$row_user=$query_user->row();
								
				if($this->encrypt->decode($row_user->UserPassword)==$this->input->post('UserPassword'))
				{ 
					foreach($query_user->result() as $rowUser)
					{ 
						if($password==$this->encrypt->decode($rowUser->UserPassword)){
        						//password is correct user logged in
        						$this->session->set_userdata('User_UserEmail',$userEmail);
								$this->session->set_userdata('User_UserID',$rowUser->UserID);
								$this->session->set_userdata('User_RegistrationType',$rowUser->RegistrationType);
								$this->session->set_userdata('User_Authorized?',"Yes");
								
								
								$this->session->set_userdata('User_UserFirstName',$rowUser->UserFirstName);
								$this->session->set_userdata('User_UserLastName',$rowUser->UserLastName);
								$this->session->set_userdata('User_UserGender',$rowUser->UserGender);
								$this->session->set_userdata('User_UserDescription',$rowUser->UserDescription);
								$this->session->set_userdata('User_UserCity',$rowUser->UserCity);
								$this->session->set_userdata('User_DOB',$rowUser->DOB);
								$this->session->set_userdata('User_UserAddress',$rowUser->UserAddress);
								$this->session->set_userdata('User_UserAddress2',$rowUser->UserAddress2);
								$this->session->set_userdata('User_UserType',$rowUser->UserType);
								$this->session->set_userdata('User_RegistrationType',$rowUser->RegistrationType);
								$this->session->set_userdata('User_UserLastActive',$rowUser->UserLastActive);
								$this->session->set_userdata('User_Cellphone',$rowUser->Cellphone);
								$this->session->set_userdata('User_Country',$rowUser->UserCountry);
																
								
								$data=array("UserIP"=>$_SERVER['REMOTE_ADDR'],"UserLastActive"=>date("Y-m-d h:i:sa"));
								$this->db->where('UserID',$rowUser->UserID);											                                   
								$result=$this->db->update('users', $data);	
                             	$redirect=base_url()."profile";
                				redirect($redirect);
        					}
							
					}
					
				}
				else
				{
					$this->session->set_userdata('error',"Email and Password you entered is not matched!!");
					$ref = $this->input->server('HTTP_REFERER', TRUE);
					redirect($ref, 'location');
				}
        
	}
	
	public function logout()
	{ 
								
                $query_user=$this->db->query("SELECT * FROM users WHERE UserEmail='".$this->session->userdata('User_UserEmail')."' AND UserType='User' AND UserEmailVerified='Y'" );	
				$row_user=$query_user->row();								
				foreach($query_user->result() as $rowUser)
					{ 
						
        						//password is correct user logged in
        						$this->session->unset_userdata('User_UserEmail');
								$this->session->unset_userdata('User_UserID');
								$this->session->unset_userdata('User_RegistrationType');
								$this->session->unset_userdata('User_Authorized?');								
                             	$redirect=base_url()."user/login";
                				redirect($redirect);
				
	}}
	
	public function userdetail()
	{	
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->getMenu(0,0);
		$data["userinformation"]=$this->User_model->getuserdetail($this->uri->segment(3));
		$data["query_user_blog"]=$this->db->query("select * from blog where UserID=".$this->uri->segment(3));
		$this->load->view('userdetail',$data);
	}
}