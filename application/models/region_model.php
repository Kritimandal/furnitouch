<?php
class Region_model extends CI_Model{
    
    function get_allregion()
	{
		return $query = $this->db->get('_regions');
	}
}
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
