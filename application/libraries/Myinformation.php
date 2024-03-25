<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Myinformation {
	var $informationArray=array();
	var $child=array();
	var $value="";
	var $flag=0;
   /* public function some_function()
    {
    }
	*/
	
	public function informationSelect($parentInfo,$level)
		{
		    $sql="select information_id,information_title from _information where parentInfo=".$parentInfo; 
			$rs=mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($rs)>0)
				{
					while($row=mysql_fetch_array($rs))
						{
							$this->informationArray[]=array("information_id"=>$row["information_id"],"information_title"=>$row["information_title"],"level"=>$level);
							$this->informationSelect($row["information_id"],$level+1);
						
						}
						
						
				}
			
			return($this->informationArray);
		}
		
		public function collectInfoChild($id)
			{
				$sql="select * from _information where parentInfo=".$id;
				$rs=mysql_query($sql);
				if(mysql_num_rows($rs)>0)
					{
						while($row=mysql_fetch_array($rs))
						{
						$this->child[]=array("information_id"=>$row["information_id"]);
						$this->collectInfoChild($row["information_id"]);
						}
					}
					return $this->child;
			}
			
	public function childInparent($id)
			{
				$sql="select * from _information where parentInfo=".$id;
				$rs=mysql_query($sql) or die(mysql_error());
				if(mysql_num_rows($rs)>0)
					{
						while($row=mysql_fetch_array($rs))
						{
						$child[]=array("information_id"=>$row["information_id"],"information_name"=>$row["information_name"],"information_introduction"=>$row["information_introduction"]);
						}
					}
					return $child;
			}
	public function informationTitle($information_id)
		{
			$sql="select * from _information where information_id=".$information_id;
			$rs=$this->select($sql) or die(mysql_error());
			$row=$this->get_row($rs);
			return ($row['information_title']);
		}
		
	public function getMenu($parent='0',$level='0')
		{
		
			$sql="select * from _information where parentInfo=".$parent." AND show_on_menu='Y' AND visible='Y' order by displayOrder asc"; 
			$rs=mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($rs)>0)
				{
					if($this->flag==0)
					{
					$this->value.="<ul class='nav navbar-nav'>";
					$this->value.="<li><a href='".base_url()."'>Home</a></li>";
					$this->flag=1;
					}
					else
					{
					$this->value.="<ul class='sub-dropdown'>";
					}
					while($row=mysql_fetch_array($rs))
					{
					//if($row['information_id']==$information_id)
					//$this->value.='<li class="active">';
					//else
					$this->value.="<li>";
					if($this->checkforchild($row['information_id'])=="true"){
					$this->value.="<a href='#'>".$row['information_title']."</a>";
					}
					else
					{ 
					if(strtolower(stripslashes($row['information_title']))=="blog"){
					$this->value.="<a href='".base_url('blog')."'>".stripslashes($row['information_title'])."</a>";
					}
					else
					{
						$this->value.="<a href='".base_url('information/'.$row['clean_url'])."'>".stripslashes($row['information_title'])."</a>";
					}
					}
					$level=$level+1;
					$this->getMenu($row['information_id'],$level);
					$this->value.="</li>";
					}
					$this->value.="</ul>";
				}
				
			
			return($this->value);
		}
		
	public function checkforchild($information_id)
	{
		$sql="select * from _information where parentInfo=".$information_id." and show_on_menu='Y'";
		$rs=mysql_query($sql) or die(mysql_error());
		//$rs=$this->select($sql) or die(mysql_error());
		if(mysql_num_rows($rs)==0)
		return "false";
		else
		return "true";
	}
			
public function collectParents($id)
		{
			$sql="select parentInfo from _information where information_id=".$id;
			$rs=mysql_query($sql);
			if(mysql_num_rows($rs)>0)
				{
					$row=mysql_fetch_array($rs);
					$this->parents[]=$row['parentInfo'];
					$this->collectParents($row['parentInfo']);
				}
			return $this->parents;
		}
		
		
	public function getMenuAtadmin($parent='0',$level='0')
		{	
			$sql="select * from _information where parentInfo=".$parent." AND show_on_menu='Y' AND visible='Y' order by displayOrder asc";
			$rs=mysql_query($sql) or die(mysql_error());
			$totalMenu=mysql_num_rows($rs);
			if(mysql_num_rows($rs)>0)
				{
					
					$this->value.="<ul>";
					while($row=mysql_fetch_array($rs))
					{
						
						$this->value.="<li id='recordsArray_".$row['information_id']."'>";
						
						$this->value.=$row['information_title'];
						
						$level=$level+1;
						$this->getMenuAtadmin($row['information_id'],$level);
						$this->value.="</li>";
					}
					$this->value.="</ul>";
				}
			return($this->value);
		}
		
		
		function getMenuSitemap($parent='0',$level='0')

		{

			$sql="select * from _information where parentInfo=".$parent." AND show_on_menu='Y' AND visible='Y' order by displayOrder asc";
			$rs=mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($rs)>0)

				{

					if($this->flag==0)

					{

					$this->value3.="<ul id='' class=''>";
					$this->value3.="<li><a href='".base_url()."'>Home</a></li>";
					$this->flag=1;

					}

					else

					{

					$this->value3.="<ul>";

					}

					while($row=mysql_fetch_array($rs))

					{

					$this->value3.="<li>";

					if($this->checkforchild($row['information_id'])=="true")

					$this->value3.="<a href='#'>".$row['information_title']."</a>";

					else 

					$this->value3.="<a href='".base_url('information/'.$row['information_id'])."'>".stripslashes($row['information_title'])."</a>";

					$level=$level+1;

					$this->getMenuSitemap($row['information_id'],$level);

					$this->value3.="</li>";

					}

					$this->value3.="</ul>";

				}

				

			

			return($this->value3);

		}
		
  
		
  public function client_menu()
	{
			$sql_1st="select * from _information where parentInfo=0 AND show_on_menu='Y' AND visible='Y' order by displayOrder asc"; 
			$rs_1st=mysql_query($sql_1st) or die(mysql_error());
			if(mysql_num_rows($rs_1st)>0){
				$client_menu='<ul class="nav navbar-nav navbar-right">';
				$client_menu.='<li class="active"><a href="'.base_url().'">Home</a></li>';
				while($row_1st=mysql_fetch_array($rs_1st))
				{					
				$sql_2nd="select * from _information where parentInfo=".$row_1st["information_id"]." AND show_on_menu='Y' AND visible='Y' order by displayOrder asc"; 
				$rs_2nd=mysql_query($sql_2nd) or die(mysql_error());
				
				$sql_package="select * from package where information_id=".$row_1st["information_id"]." AND PackageLive='Y'"; 
				$rs_package=mysql_query($sql_package) or die(mysql_error());
				
				if(mysql_num_rows($rs_package)>0)
				{
					$client_menu.='<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$row_1st['information_title'].'<span class="caret"></span></a>';
					$client_menu.='<ul class="dropdown-menu">';
					
					$sql_package="select * from package where information_id=".$row_1st["information_id"]." AND PackageLive='Y'"; 
					$rs_package=mysql_query($sql_package) or die(mysql_error());
					if(mysql_num_rows($rs_package)>0)
					{
						while($row_package=mysql_fetch_array($rs_package))	
						{
							$client_menu.='<li><a href="'.base_url("package/".$row_package['PackageSlug']).'">'.$row_package['PackageName'].'</a></li>';
						}
					}
					$client_menu.='</ul></li>';
				}
				else
				{
					if(mysql_num_rows($rs_2nd)>0){
					$client_menu.='<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">'.$row_1st['information_title'].'<span class="caret"></span></a>';
					$client_menu.='<ul class="dropdown-menu">';					
								
						while($row_2nd=mysql_fetch_array($rs_2nd))	
						{
							$client_menu.='<li><a href="'.base_url("information/".$row_2nd['clean_url']).'">'.$row_2nd['information_title'].'</a></li>';
						}
				
						$client_menu.='</ul></li>';
					}
					else
					{
						$client_menu.='<li><a href="'.base_url("information/".$row_1st['clean_url']).'">'.$row_1st['information_title'].'</a></li>';
					} 
					}
				}
				
				
				$client_menu.='</ul>';
			}
			return $client_menu;
	}
	
	
	public function my_client_menu()
	{
			$sql_1st="select * from _information where parentInfo=0 AND show_on_menu='Y' AND visible='Y' order by displayOrder asc"; 
			$rs_1st=mysql_query($sql_1st) or die(mysql_error());
			if(mysql_num_rows($rs_1st)>0){
				$client_menu='<ul>';
				$client_menu.='<li class="active"><a href="'.base_url().'">Home</a></li>';
				while($row_1st=mysql_fetch_array($rs_1st))
				{					
				$sql_2nd="select * from _information where parentInfo=".$row_1st["information_id"]." AND show_on_menu='Y' AND visible='Y' order by displayOrder asc"; 
				$rs_2nd=mysql_query($sql_2nd) or die(mysql_error());			
				
				
					if(mysql_num_rows($rs_2nd)>0){
					$client_menu.='<li><a href="#">'.$row_1st['information_title'].'</a>';
					$client_menu.='<ul class="has-sub">';					
								
						while($row_2nd=mysql_fetch_array($rs_2nd))	
						{
							if(empty($row_2nd['custom_link'])){
							$client_menu.='<li><a href="'.base_url("information/".$row_2nd['clean_url']).'">'.$row_2nd['information_title'].'</a></li>';
							}
							else
							{
								$client_menu.='<li><a href="'.$row_2nd['custom_link'].'" target="_blank">'.$row_2nd['information_title'].'</a></li>';
							}
							$sql_3rd="select * from _information where parentInfo=".$row_2nd["information_id"]." AND show_on_menu='Y' AND visible='Y' order by displayOrder asc"; 
							$rs_3rd=mysql_query($sql_3rd) or die(mysql_error());
							
								if(mysql_num_rows($rs_3rd)>0){
								$client_menu.='<li><a href="#">'.$row_2nd['information_title'].'</a>';
								$client_menu.='<ul>';
								
									while($row_3rd=mysql_fetch_array($rs_3rd))	
									{
									if(empty($row_3rd['custom_link'])){
									$client_menu.='<li><a href="'.base_url("information/".$row_3rd['clean_url']).'">'.$row_3rd['information_title'].'</a></li>';
									}
									else
									{
										$client_menu.='<li><a href="'.$row_3rd['custom_link'].'" target="_blank">'.$row_3rd['information_title'].'</a></li>';
									}
									}
									$client_menu.='</ul></li>';
								}
								
						}				
						$client_menu.='</ul></li>';
					}
					else
					{
						if(empty($row_1st['custom_link'])){
						$client_menu.='<li><a href="'.base_url("information/".$row_1st['clean_url']).'">'.$row_1st['information_title'].'</a></li>';
						}
						else
						{							
						$client_menu.='<li><a href="'.$row_1st['custom_link'].'" target="_blank">'.$row_1st['information_title'].'</a></li>';
						}
					} 
					
				
				}
				
				
				$client_menu.='</ul>';
			}
			return $client_menu;
	}
	
 

}

/* End of file Myinformation.class.php */