<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Programme extends CI_Controller{
	
	public function index()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->my_client_menu();	
		$data["query_latest_news"]=$this->db->query("SELECT * FROM news WHERE netype='News' order by NewsID desc Limit 0,5");
		$data["query_latest_programme"]=$this->db->query("SELECT * FROM programmes WHERE ProgrammeLive='Y' order by ProgrammeID desc");
		$this->load->view('programme',$data);
	}
	
	public function detail()
	{
		$this->load->library('Myinformation');
		$data["menu"]=$this->myinformation->my_client_menu();		
		$data["query_latest_news"]=$this->db->query("SELECT * FROM news WHERE netype='News' order by NewsID desc Limit 0,5");
		$data["query_latest_programme"]=$this->db->query("SELECT * FROM programmes WHERE ProgrammeLive='Y' order by ProgrammeID desc Limit 0,7");		
		$data["programme_detail"] = $this->db->from('programmes')->where('ProgrammeID',$this->uri->segment(2))->get()->row_array();
		$this->load->view('programme_detail',$data);
	}
	
		 
	public function sendinquiry()
	{
			$this->load->library('email');
            $config['protocol'] = 'mail';
            $config['mailpath'] = '/usr/sbin/sendmail';
            $config['charset'] = 'iso-8859-1';
            $config['wordwrap'] = TRUE;
			
            $this->email->initialize($config);
			$email_setting  = array('mailtype'=>'html');
			$this->email->initialize($email_setting);
			$this->email->subject('Inquiry for '.$this->input->post('inquiry_product')." from ".$this->input->post('inquiry_name'));
            //echo $this->input->post('email')die();
			
			$data["inquiry_name"]=$this->input->post('inquiry_name');
			$data["inquiry_email"]=$this->input->post('inquiry_email');
			$data["inquiry_address"]=$this->input->post('inquiry_address');
			$data["inquiry_message"]=$this->input->post('inquiry_message');
			
			$message = $this->load->view('inquiry_template',$data,TRUE);
			
			$this->email->from($this->input->post('inquiry_email'),$this->input->post('inquiry_name'));
			$this->email->to('sranabhat@gmail.com');
			$this->email->to('chandrackd@gmail.com');
			$this->email->message($message);
			$this->email->send();
			
			
			if($this->email->send())
			{
			?>
				<script>
					alert("Your mail has been sent. Thank you !!!");
					window.location='<?php echo base_url();?>product/detail/<?=$this->input->post("product_id")?>'
				</script>
			<?php
			}
			else
			{
				?>
				<script>
					alert("Your mail has not been sent. Thank you !!!");
					window.location='<?php echo base_url();?>product/detail/<?=$this->input->post("product_id")?>'
				</script>
			<?php
			}

	}
}