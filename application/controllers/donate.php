<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Donate extends CI_Controller{
	
	public function index()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->my_client_menu();		
		$data["query_latest_news"]=$this->db->query("SELECT * FROM news WHERE netype='News' order by NewsID desc");
		$data["information_detail"] = $this->db->from('_information')->where('clean_url', 'home')->get()->row_array();
		$this->load->view('donate',$data);
	}
	
	public function donationresult()
	{
	    $this->load->library('Myinformation');
	    $data["menu"]=$this->myinformation->my_client_menu();
	    $data["query_latest_news"]=$this->db->query("SELECT * FROM news WHERE netype='News' order by NewsID desc");
	    $data["information_detail"] = $this->db->from('_information')->where('clean_url', 'home')->get()->row_array();
	    $this->load->view('donationresult',$data);
	}
		
		 
	public function senddonation()
	{
	    
			$this->load->library('email');
            $config['protocol'] = 'mail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
			
            $this->email->initialize($config);
			$email_setting  = array('mailtype'=>'html');
			$this->email->initialize($email_setting);
			$this->email->subject('Donation information from '.$this->input->post('fullname')." on ".date('Y/m/d'));
            //echo $this->input->post('email')die();
			
			$data["donation_fullname"]=$this->input->post('fullname');
			$data["donation_email"]=$this->input->post('email');
			$data["donation_address"]=$this->input->post('address');
			$data["donation_phoneno"]=$this->input->post('phoneno');
			
			$data["donation_amount"]=$this->input->post('amount');
			$data["donation_amountinword"]=$this->input->post('amountinword');
			$data["donation_voucherno"]=$this->input->post('voucherno');
			$data["donation_bankname"]=$this->input->post('bankname');
			
			$message = $this->load->view('donation_template',$data,TRUE);
			
			$this->email->from($this->input->post('email'),$this->input->post('fullname'));
			$this->email->to('sranabhat@gmail.com');
			$this->email->message($message);
			$this->email->send();
			
			
			if($this->email->send())
			{
			?>
				<script>
					alert("Your donation Information has been sent. Thank you !!!");
					window.location='<?php echo base_url();?>donate/donationresult/success'
				</script>
			<?php
			}
			else
			{
				?>
				<script>
					alert("Your donation Information can nto sent. Thank you !!!");
					window.location='<?php echo base_url();?>donate/donationresult/error'
				</script>
			<?php
			}

	}
}