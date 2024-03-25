<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mypage {
	var $pageArray=array();
	var $child=array();
	var $value="";
	var $flag=0;
   /* public function some_function()
    {
    }
	*/
	
	public function pageSelect($parent_page,$level)
		{
		    $sql="select page_id,title from page where parent_page=".$parent_page; 
			$rs=mysql_query($sql) or die(mysql_error());
			if(mysql_num_rows($rs)>0)
				{
					while($row=mysql_fetch_array($rs))
						{
							$this->pageArray[]=array("page_id"=>$row["page_id"],"title"=>$row["title"],"level"=>$level);
							$this->pageSelect($row["page_id"],$level+1);						
						}					
				}			
			return($this->pageArray);
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
					$this->value.="<ul class='sf-menu'>";
					$this->value.="<li><a href='".base_url()."'>Home</a></li>";
					$this->flag=1;
					}
					else
					{
					$this->value.="<ul>";
					}
					while($row=mysql_fetch_array($rs))
					{
					//if($row['information_id']==$information_id)
					//$this->value.='<li class="active">';
					//else
					$this->value.="<li>";
					if($this->checkforchild($row['information_id'])=="true"){
					$this->value.="<a href='#'>".$row['information_title']."<span class='sf-sub-indicator'>
                           <i class='icon-angle-down'></i>
                           </span></a>";
					}
					else
					{ 
					$this->value.="<a href='".base_url('information/'.$row['clean_url'])."'>".stripslashes($row['information_title'])."</a>";
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
			$rs=$this->select($sql);
			if(mysql_num_rows($rs)>0)
				{
					$row=$this->get_row($rs);
					$this->parent[]=$row['parentInfo'];
					$this->collectParents($row['parentInfo']);
				}
			return $this->parent;
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

}

/* End of file Myinformation.class.php */