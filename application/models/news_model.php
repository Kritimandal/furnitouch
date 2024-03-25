<?php
class News_model extends CI_Model{
    
	function news_mainimage($ProductID)
	{
		$this->db->select('image');
		$this->db->where('NewsID',$ProductID);
		$this->db->where('Main','Y');
		$query = $this->db->get('newsimage');
		if ($query->num_rows() > 0){
			$row=$query->row();
			return $row->image;
		}
		else{
			return false;
		}
	}
	
	function category_newslatest($CategoryID)
	{	
		$this->db->select('NewsID,UserID,NewsName,NewsShortDesc');
		$this->db->where('CategoryID',$CategoryID);
		$this->db->where('NewsLive','Y');
		$query = $this->db->get('news',4,0);
		if ($query->num_rows() > 0){
			foreach($query->result() as $row){
			$category_newslatest[]=array('NewsID'=>$row->NewsID,'UserID'=>$row->UserID,'NewsName'=>$row->NewsName,'NewsShortDesc'=>$row->NewsShortDesc);
			}			
			return $category_newslatest;
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
