<?php 
session_start();

if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
   public function index(){
        		
				$userEmail =  $this->input->post('userEmail') ;
				$password =  $this->input->post('password');
								
                $query_user=$this->db->query("SELECT * FROM users WHERE UserEmail='".$userEmail."' AND UserType='Admin'");	
				$row_user=$query_user->row();
								
				if($this->encrypt->decode($row_user->UserPassword)==$this->input->post('password'))
				{ 
					foreach($query_user->result() as $rowUser)
					{ 
						if($password==$this->encrypt->decode($rowUser->UserPassword)){
        						//password is correct user logged in
        						$this->session->set_userdata('UserEmail',$userEmail);
								$this->session->set_userdata('UserID',$rowUser->UserID);
								$_SESSION["filemanager_authorization"]="Yes";
								$data=array("UserIP"=>$_SERVER['REMOTE_ADDR'],"UserLastActive"=>date("Y-m-d h:i:sa"));
								$this->db->where('UserID',$rowUser->UserID);											                                   
								$result=$this->db->update('users', $data);	
                             	$redirect=base_url()."admin";
                				redirect($redirect);
        					}
							
					}
					
				}
				else
				{
					$redirect= base_url()."_cpanel";
					redirect($redirect);
				}
        }
		
		
		
		
		
 }