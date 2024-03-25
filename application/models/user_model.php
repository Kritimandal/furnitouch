<?php
class User_model extends CI_Model{
    
	function mail_exists($key)
	{
		$this->db->where('UserEmail',$key);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
	
	function getCountry()
	{
		$this->db->select('id,iso,name,nicename');
		$query = $this->db->get('country');
		return $query;
	}
	
	function getuserdetail($UserID)
	{
		$this->db->where('UserID',$UserID);
		$query = $this->db->get('users');
		if ($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}
	
	
	function profileImage($UserID)
	{
		$this->db->select('image_id, caption,image');
		$this->db->where('UserID',$UserID);
		$this->db->where('profile','Y');
		$query = $this->db->get('users');
		if ($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}
	
	function checkforpassword($UserPassword,$UserID)
	{
		$this->db->where('UserID',$UserID);
		$query = $this->db->get('users');
		$row=$query->row();
		if ($query->num_rows() > 0){
			return $query->row();
		}
		else{
			return false;
		}
	}
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
