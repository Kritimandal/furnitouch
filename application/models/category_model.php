<?php
class Category_model extends CI_Model{
    
	function get_CategoryName($CategoryID)
	{
		$this->db->select('CategoryName');
		$this->db->where('CategoryID',$CategoryID);
		$query = $this->db->get('productcategories');
		if ($query->num_rows() > 0){
			$row=$query->row();
			return $row->CategoryName;
		}
		else{
			return false;
		}
	}
	
	

	

public function category_title($CategoryID)

	{	

		$this->db->where('CategoryID',$CategoryID);

		$query = $this->db->get('productcategories');		

		if ($query->num_rows() > 0){		

			foreach($query->result() as $row)

			{

				$CategoryName=$row->CategoryName;

			}			

			return $CategoryName;

		}

		

	}
	
	
public function category_image($CategoryID)

	{	

		$this->db->where('CategoryID',$CategoryID);

		$query = $this->db->get('CategoryImage');		

		if ($query->num_rows() > 0){		

			foreach($query->result() as $row)

			{

				$CategoryImage=$row->CategoryImage;

			}			

			return $CategoryImage;

		}

		

	}
	
public function child_category($CategoryID)
	{
		$this->db->where('ParentCategory',$CategoryID);
		$query = $this->db->get('productcategories');
		if ($query->num_rows() > 0){
			foreach($query->result() as $row)
			{
				$Child_category[]=array("CategoryID"=>$row->CategoryID,"clean_url"=>$row->clean_url,"CategoryName"=>$row->CategoryName,"CategoryImage"=>$row->CategoryImage);
			}
			return $Child_category;
		}		

	}
	
	
public function products_in_categories($Category,$Parent)
	{
		$product_in_category = array();
		$count=1;
		$this->db->select("*");	
		$this->db->where('category',$Parent);
		$this->db->order_by("ProductID","desc");
		if(count($Category)>0){
		foreach($Category as $KCCList)
			{
				$this->db->or_where('category',$KCCList);			
			}
		}
			$query = $this->db->get("product");
		
		if ($query->num_rows() > 0){
			foreach($query->result() as $row)
			{
				$product_in_category[]=array("ProductID"=>$row->ProductID,"PrductName"=>$row->PrductName,"ProductSlug"=>$row->ProductSlug,"ModelNo"=>$row->ModelNo,"ProductImage"=>$row->ProductImage,"ProductSlug"=>$row->ProductSlug);
			}			
			
		}	
		return $product_in_category;

	}
	
	
public function category_product($Category)
	{
		$product_in_category = array();
		$count=1;
		$this->db->select("*");	
		$this->db->where('category',$Category);
		$this->db->order_by("ProductID","desc");
		
			$query = $this->db->get("product");
		
		if ($query->num_rows() > 0){
			foreach($query->result() as $row)
			{
				$product_in_category[]=array("ProductID"=>$row->ProductID,"PrductName"=>$row->PrductName,"ProductSlug"=>$row->ProductSlug,"ModelNo"=>$row->ModelNo,"ProductImage"=>$row->ProductImage,"ProductSlug"=>$row->ProductSlug);
			}			
			
		}	
		return $product_in_category;

	}
	
	
	
	

	
	

	

	


}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
