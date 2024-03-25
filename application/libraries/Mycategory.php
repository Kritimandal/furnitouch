  <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
  
  class Mycategory {
  var $categoryArray=array();
  var $child=array();
  var $child_catid=array();
  var $parent=array();
  var $value="";
  var $flag=0;
  /* public function some_function()
  {
  }
  */
  
  public function categorySelect($ParentCategory,$level)
  {
	  $sql="select CategoryID,CategoryName from productcategories where ParentCategory=".$ParentCategory; 
	  $rs=mysql_query($sql) or die(mysql_error());
	  if(mysql_num_rows($rs)>0)
		  {
			  while($row=mysql_fetch_array($rs))
				  {
					  $this->categoryArray[]=array("CategoryID"=>$row["CategoryID"],"CategoryName"=>$row["CategoryName"],"level"=>$level);
					  $this->categorySelect($row["CategoryID"],$level+1);
				  
				  }
				  
				  
		  }
	  
	  return($this->categoryArray);
  }
  
  public function collectChild($CategoryID)
	  {
		  $sql="select * from productcategories where ParentCategory=".$CategoryID;
		  $rs=mysql_query($sql);
		  if(mysql_num_rows($rs)>0)
			  {
				  while($row=mysql_fetch_array($rs))
				  {
				  $this->child[]=array("CategoryID"=>$row["CategoryID"],"CategoryName"=>$row["CategoryName"],"clean_url"=>$row["clean_url"],"CategoryImage"=>$row["CategoryImage"]);
				  $this->collectChild($row["CategoryID"]);
				  }
			  }
			  return $this->child;
	  }
	  
	  public function collectChild_CatID($CategoryID)
	  {
		  $sql="select * from productcategories where ParentCategory=".$CategoryID;
		  $rs=mysql_query($sql);
		  if(mysql_num_rows($rs)>0)
			  {
				  while($row=mysql_fetch_array($rs))
				  {
				  $this->child_catid[]=$row["CategoryID"];
				  $this->collectChild_CatID($row["CategoryID"]);
				  }
			  }
			  return $this->child_catid;
	  }
	  
  public function childInparent($CategoryID)
	  {
		  $sql="select * from productcategories where ParentCategory=".$CategoryID;
		  $rs=mysql_query($sql);
		  if(mysql_num_rows($rs)>0)
			  {
				  while($row=mysql_fetch_array($rs))
				  {
				  $child[]=array("CategoryID"=>$row["CategoryID"],"CategoryName"=>$row["CategoryName"],"clean_url"=>$row["clean_url"]);
				  }
			  }
			  return $child;
	  }
	  
  
  public function checkforchild($CategoryID)
  {
	  $sql="select * from productcategories where ParentCategory=".$information_id." and Nevigation='Y'";
	  $rs=mysql_query($sql) or die(mysql_error());
	  //$rs=$this->select($sql) or die(mysql_error());
	  if(mysql_num_rows($rs)==0)
	  return "false";
	  else
	  return "true";
  }
	  
  public function collectParents($CategoryID)
  {
	  $sql="select * from productcategories where CategoryID=".$CategoryID;
	  $rs=mysql_query($sql) or die(mysql_error());
	  if(mysql_num_rows($rs)>0)
		  {
			  while($row=mysql_fetch_array($rs)){			 
			  $this->parent[]=array("CategoryID"=>$row["CategoryID"],"CategoryName"=>$row["CategoryName"],"clean_url"=>$row["clean_url"],"ParentCategory"=>$row['ParentCategory']);
			  $this->collectParents($row['ParentCategory']);
			  }
		  }
	  return $this->parent;
  }
  
  
  
  
  public function getMenuAtadmin($parent='0',$level='0')
  {	
	  $sql="select * from productcategories where ParentCategory=".$parent." AND Nevigation='Y' AND Visible='Y' order by DisplayOrder asc";
	  $rs=mysql_query($sql) or die(mysql_error());
	  $totalMenu=mysql_num_rows($rs);
	  if(mysql_num_rows($rs)>0)
		  {					
			  $this->value.="<ul>";
			  while($row=mysql_fetch_array($rs))
			  {
				  
				  $this->value.="<li id='recordsArray_".$row['CategoryID']."'>";						
				  $this->value.=$row['CategoryName'];						
				  $level=$level+1;
				  $this->getMenuAtadmin($row['CategoryID'],$level);
				  $this->value.="</li>";
			  }
			  $this->value.="</ul>";
		  }
	  return($this->value);
  }
  
  
  
  public function my_client_menu()
  {
	  $sql_1st="select * from productcategories where ParentCategory=0 AND Nevigation='Y' AND Visible='Y' order by DisplayOrder asc"; 
	  $rs_1st=mysql_query($sql_1st) or die(mysql_error());
	  if(mysql_num_rows($rs_1st)>0){
		  $client_menu='<ul class="navigation clearfix">';
		  $client_menu.='<li class="current"><a href="'.base_url().'">Home</a></li>';
		  while($row_1st=mysql_fetch_array($rs_1st))
		  {					
		  $sql_2nd="select * from productcategories where ParentCategory=".$row_1st["CategoryID"]." AND Nevigation='Y' AND Visible='Y' order by displayOrder asc"; 
		  $rs_2nd=mysql_query($sql_2nd) or die(mysql_error());				
		  
			  if(mysql_num_rows($rs_2nd)>0){
			  $client_menu.='<li class="dropdown"><a href="#">'.$row_1st['CategoryName'].'</a>';
			  $client_menu.='<ul>';					
						  
				  while($row_2nd=mysql_fetch_array($rs_2nd))	
				  {
					  
					  $client_menu.='<li><a href="'.base_url("category/".$row_2nd['clean_url']).'">'.$row_2nd['CategoryName'].'</a></li>';
					  
					  $sql_3rd="select * from productcategories where ParentCategory=".$row_2nd["CategoryID"]." AND Nevigation='Y' AND Visible='Y' order by displayOrder asc"; 
					  $rs_3rd=mysql_query($sql_3rd) or die(mysql_error());
					  
						  if(mysql_num_rows($rs_3rd)>0){
						  $client_menu.='<li><a href="#">'.$row_2nd['CategoryName'].'</a>';
						  $client_menu.='<ul>';
						  
							  while($row_3rd=mysql_fetch_array($rs_3rd))	
							  {
							  
							  $client_menu.='<li><a href="'.base_url("category/".$row_3rd['clean_url']).'">'.$row_3rd['CategoryName'].'</a></li>';
							  
							  }
							  $client_menu.='</ul></li>';
						  }
						  
				  }				
				  $client_menu.='</ul></li>';
			  }
			  else
			  {						
				  $client_menu.='<li><a href="'.base_url("category/".$row_1st['clean_url']).'">'.$row_1st['CategoryName'].'</a></li>';						
			  }
		  }				
		  $client_menu.='</ul>';
	  }
	  return $client_menu;
  }
  
  }
  
  /* End of file Myinformation.class.php */