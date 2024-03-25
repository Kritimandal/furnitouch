<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mycompany {
	public function compnay_detail($Id)
		{
		    $query_company=$this->db->query("select * from company where Id=".$Id);
			return $query_company;
		}

}

/* End of file Myinformation.class.php */