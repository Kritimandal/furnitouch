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
		$data["menu"]=$this->myinformation->my_client_menu();			
		
		$data["query_latest_news"]=$this->db->query("SELECT * FROM news WHERE netype='News' order by NewsID desc");	
		$data["query_latest_programme"]=$this->db->query("SELECT * FROM programmes WHERE ProgrammeLive='Y' order by ProgrammeID desc Limit 0,7");	
				
		$data["c_information_detail"] = $this->db->from('_information')->where('clean_url', $this->uri->segment(2))->get()->row_array();	
			
		$data["query_info_news"]=$this->db->query("SELECT * FROM news WHERE NewsLive='Y' AND parent_information=".$data["c_information_detail"]["information_id"]." order by NewsID desc");	
		$data["information_gallery"] = $this->db->query("SELECT * FROM gallery where parent_information=".$data["c_information_detail"]["information_id"]." AND Visible='Y'");		
		$data["information_video"] = $this->db->query("SELECT * FROM video where parent_information=".$data["c_information_detail"]["information_id"]." AND vid_status='Y'");
		$data["information_detail"] = $this->db->from('_information')->where('clean_url', 'home')->get()->row_array();
	
		$this->load->view('information_detail',$data);
	}
	
	
	
	public function send_contact()
	{
			
			
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->client_menu();		
		$data["query_trips"]=$this->db->query("SELECT * FROM package WHERE PackageLive='Y'  order by PackageID desc limit 0,8");		
		$data["information_detail"] = $this->db->from('_information')->where('clean_url', 'contact-us')->get()->row_array();		
		$data["information_package"]=$this->db->query("SELECT * FROM package where information_id=".$data["information_detail"]["information_id"]." AND PackageLive='Y'");
	
			
						
			$to = 'info@arnavholiday.com';			
			$subject = "You have an inquiry from website by ".$_POST['name'];			
			$headers = "From: " . strip_tags($_POST['email']) . "\r\n";
			$headers .= "Reply-To: ". strip_tags($_POST['email']) . "\r\n";
			$headers .= "CC: suresh92@hotmail.com\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";			
			
			$message = '<html><body>';
			$message .= '<img src="http://arnavholiday.com/arnav-new/assets/images/logo.png" alt="inquiry from website" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';			
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['name']) . "</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['email']) . "</td></tr>";
			$message .= "<tr><td><strong>Telephone:</strong> </td><td>" . strip_tags($_POST['telephone']) . "</td></tr>";
			$message .= "<tr><td><strong>Message:</strong> </td><td>" . $_POST['message'] . "</td></tr>";			
			$message .= "</table>";
			$message .= "</body></html>";
			
			//send email
			if (mail($to, $subject, $message, $headers)) {
			echo "Thank You! $name Your message has been sent. We will respond you within 12 hrs.";
			} else {
			echo 'There was a problem sending the email.';
			}

    
	}
	
	public function pagenotfound()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->client_menu();
		$this->load->view('pagenotfound',$data);
	}
	
	
}