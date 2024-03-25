<?php
class Package_model extends CI_Model{
    
		
	function package_thumbnail($PackageID)
	{
		$this->db->select('image');
		$this->db->where('PackageID',$PackageID);
		$this->db->where('ImageAt','Thumbnail');
		$query = $this->db->get('packageimage');
		if ($query->num_rows() > 0){
			$row=$query->row();
			return $row->image;
		}
		else{
			return false;
		}
	}
	
	function package_banner($PackageID)
	{
		$this->db->select('image');
		$this->db->where('PackageID',$PackageID);
		$this->db->where('ImageAt','Banner');
		$query = $this->db->get('packageimage');
		if ($query->num_rows() > 0){
			$row=$query->row();
			return $row->image;
		}
		else{
			return false;
		}
	}
	
	function package_image($PackageID)
	{
		$package_image=array();
		$this->db->select('*');
		$this->db->where('PackageID',$PackageID);
		$this->db->where('Main !=','Y');
		$this->db->where('Map !=','Y');
		$query = $this->db->get('packageimage');
		if ($query->num_rows() > 0){
			foreach($query->result() as $KPIList){
			$package_image[]=array("caption"=>$KPIList->caption,"image"=>$KPIList->image);
		}}
		
		
		return $package_image;		
	}
	
	function package_allimage($PackageID)
	{
		$package_image=array();
		$this->db->select('*');
		$this->db->where('PackageID',$PackageID);
		$this->db->where('Map !=','Y');
		$query = $this->db->get('packageimage');
		if ($query->num_rows() > 0){
			foreach($query->result() as $KPIList){
			$package_image[]=array("caption"=>$KPIList->caption,"image"=>$KPIList->image);
		}}
		
		
		return $package_image;		
	}
	
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
