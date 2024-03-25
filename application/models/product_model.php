<?php
class Product_model extends CI_Model{
    
	function product_mainimage($ProductID)
	{
		$this->db->select('image');
		$this->db->where('ProductID',$ProductID);
		$this->db->where('Main','Y');
		$query = $this->db->get('productimage');
		if ($query->num_rows() > 0){
			$row=$query->row();
			return $row->image;
		}
		else{
			return false;
		}
	}
	
	function product_images($ProductID)
	{
		$this->db->select('image');
		$this->db->select('caption');
		$this->db->where('ProductID',$ProductID);
		$query = $this->db->get('productimage');
		if ($query->num_rows() > 0){
			foreach($query->result() as $PIList){
			$product_image[]=array("image"=>$PIList->image,"caption"=>$PIList->caption);
			}
			return $product_image;
		}
		else{
			return false;
		}
	}
	
	public function products_in_brand($PartnerID)
	{
		
		$product_in_brand = array();
		$count=1;
		$this->db->select("*");	
		$this->db->where('PartnerID',$PartnerID);	
		$query = $this->db->get("product");		
		
		if ($query->num_rows() > 0){
			foreach($query->result() as $row)
			{
				$product_in_brand[]=array("ProductID"=>$row->ProductID,"PrductName"=>$row->PrductName,"ProductSlug"=>$row->ProductSlug,"ProductImage"=>$row->ProductImage,"ProductSlug"=>$row->ProductSlug);
			}			
			
		}	
		return $product_in_brand;

	}
	
	public function products_in_related($category)
	{
		$product_in_brand = array();
		$count=1;
		$this->db->select("*");	
		$this->db->where('category',$category);	
		$query = $this->db->get("product");		
		
		if ($query->num_rows() > 0){
			foreach($query->result() as $row)
			{
				$products_in_related[]=array("ProductID"=>$row->ProductID,"PrductName"=>$row->PrductName,"ProductSlug"=>$row->ProductSlug,"ProductImage"=>$row->ProductImage,"ProductSlug"=>$row->ProductSlug);
			}			
			
		}	
		return $products_in_related;

	}

}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
