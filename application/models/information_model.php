<?php
class Information_model extends CI_Model{
	
public function information_title($information_id)
	{	
		$this->db->where('information_id',$information_id);
		$query = $this->db->get('_information');		
		if ($query->num_rows() > 0){		
			foreach($query->result() as $row)
			{
				$information_title=$row->information_title;
			}			
			return $information_title;
		}
		
	}
}
?>
