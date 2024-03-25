<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class RecentUpdates extends CI_Controller{
	public function index()
	{
		$this->load->view('recentUpdates/index');
	}
	
	public function view()
	{
		$id = $this->uri->segment(3);
		$queryCon = $this->db->query("SELECT * FROM content WHERE  id =$id");
		foreach($queryCon->result() as $row){
			$data['heading'] = $headingRow = $row->heading;
			$data['content'] = $row->description;
			$data['id']= $row->id;
		}	
	
		$this->load->view('recentUpdates/view',$data);

	}
	
}