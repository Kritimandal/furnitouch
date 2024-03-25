<?php
class Gallery_model extends CI_Model{	
	function gallery_mainimage($GalleryId)
	{
		$this->db->select('image');
		$this->db->where('GalleryId',$GalleryId);
		$this->db->where('Main','Y');
		$query = $this->db->get('galleryimage');
		if ($query->num_rows() > 0){
			$row=$query->row();
			return $row->image;
		}
		else{
			return false;
		}
	}
	
	function gallery_totalimage($GalleryId)
	{
		$this->db->select('*');
		$this->db->where('GalleryId',$GalleryId);
		$query = $this->db->get('galleryimage');
		echo $query->num_rows() ;		
	}
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
