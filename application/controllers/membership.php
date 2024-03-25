<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Membership extends CI_Controller{
	
	public function index()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->my_client_menu();		
		$data["query_latest_news"]=$this->db->query("SELECT * FROM news WHERE netype='News' order by NewsID desc");
		$data["information_detail"] = $this->db->from('_information')->where('clean_url', 'home')->get()->row_array();
		$this->load->view('membership',$data);
	}
	
	public function membershipresult()
	{
	    $this->load->library('Myinformation');
	    $data["menu"]=$this->myinformation->my_client_menu();
	    $data["query_latest_news"]=$this->db->query("SELECT * FROM news WHERE netype='News' order by NewsID desc");
	    $data["information_detail"] = $this->db->from('_information')->where('clean_url', 'home')->get()->row_array();
	    $this->load->view('membershipresult',$data);
	}
		
		 
	public function sendmembership()
	{
	    
			$this->load->library('email');
            $config['protocol'] = 'mail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
			
            $this->email->initialize($config);
			$email_setting  = array('mailtype'=>'html');
			$this->email->initialize($email_setting);
			$this->email->subject('Membership information from '.$this->input->post('fullname')." on ".date('Y/m/d'));
            //echo $this->input->post('email')die();
			
			$data["membership_fullname"]=$this->input->post('fullname');
			$data["membership_email"]=$this->input->post('email');
			$data["membership_address"]=$this->input->post('address');
			$data["membership_zone"]=$this->input->post('zone');
			
			$data["membership_district"]=$this->input->post('district');
			$data["membership_VDCMunicipality"]=$this->input->post('VDCMunicipality');
			$data["membership_dateofbirth"]=$this->input->post('dateofbirth');
			$data["membership_citizenshipno"]=$this->input->post('citizenshipno');
			$data["membership_issuefrom"]=$this->input->post('issuefrom');
			$data["membership_contact"]=$this->input->post('contact');
			
			$message = $this->load->view('membership_template',$data,TRUE);
			
			$this->email->from($this->input->post('email'),$this->input->post('fullname'));
			$this->email->to('sranabhat@gmail.com');
			$this->email->message($message);
			$this->email->send();
			
			
			if($this->email->send())
			{
			?>
				<script>
					alert("Your membership Information has been sent. Thank you !!!");
					window.location='<?php echo base_url();?>donate/membershipresult/success'
				</script>
			<?php
			}
			else
			{
				?>
				<script>
					alert("Your membership Information can nto sent. Thank you !!!");
					window.location='<?php echo base_url();?>donate/membershipresult/error'
				</script>
			<?php
			}

	}
}