<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

class Mygeneral {
	//PAGING
	function Pager($task,$option,$id,$MaxPage,$CounterStart,$StartRow,$PageNo,$PageSize,$CounterEnd){
		$paging = "";
		 //Print First & Previous Link is necessary
        if($CounterStart != 1){
            $PrevStart = $CounterStart - 1;
            $paging .= "<a href=index.php?task=$task&option=$option&id=$id&PageNo=1><< Start</a> ";
            $paging .= "<a href=index.php?task=$task&option=$option&id=$id&PageNo=$PrevStart>< Previous </a>";
        }
        $c = 0;
        //Print Page No
        for($c=$CounterStart;$c<=$CounterEnd;$c++){
            if($c < $MaxPage){
                if($c == $PageNo){
                    if($c % $PageSize == 0){
                        $paging .=  "$c ";
                    }else{
                        $paging .=  "$c ,";
                    }
                }elseif($c % $PageSize == 0){
                    $paging .=  "<a href=index.php?task=$task&option=$option&id=$id&PageNo=$c>$c</a> ";
                }else{
                    $paging .=  "<a href=index.php?task=$task&option=$option&id=$id&PageNo=$c>$c</a> ,";
                }//END IF
            }else{
                if($PageNo == $MaxPage){
                    $paging .=  "$c ";
                    break;
                }else{
                    $paging .=  "<a href=index.php?task=$task&option=$option&id=$id&PageNo=$c>$c</a> ";
                    break;
                }//END IF
            }//END IF
       }//NEXT
      if($CounterEnd < $MaxPage){
          $NextPage = $CounterEnd + 1;
          $paging .=  "<a href=index.php?task=$task&option=$option&id=$id&PageNo=$NextPage>Next ></a> ";
      }
      //Print Last link if necessary
      if($CounterEnd < $MaxPage){
       $LastRec = $RecordCount % $PageSize;
        if($LastRec == 0){
            $LastStartRecord = $RecordCount - $PageSize;
        }
        else{
            $LastStartRecord = $RecordCount - $LastRec;
        }      
        $paging .=  "<a href=index.php?task=$task&option=$option&id=$id&PageNo=$MaxPage>End >></a>";
        }
		return "Page : ".$paging;
	}
	//PAGER INFORMATION
	function PagingInformation($RecordCount,$PageNo){
		return "Results $RecordCount  - You are at page $PageNo";
	}
	//CSV PARSE
	function parseCSVComments($comments) {
	  $comments = str_replace('"', '""', $comments); 
	  if(eregi(",", $comments) or eregi("\n", $comments)) { 
		return '"'.$comments.'"'; 
	  } else {
		return $comments; 
	  }
	}
	//LIMIT TEXT DISPLAY
	function TextDisplay($text,$num){
		if ($num) {
			$texts = explode( ' ', $text );
			$count = count( $texts );
			if($count > $num){
				$text = '';
				for( $i=0; $i < $num; $i++ ) {
					$text .= ' '. $texts[$i];
				}
				$text .= '...';
			}
		}
		return $text;
	}
	//RETURNS unixtime STAMP FOR A GIVEN DATE TIME FROM DB
	function dttm2unixtime($dttm2timestamp_in){
		$date_time = explode(" ", $dttm2timestamp_in);
		$date = explode("-",$date_time[0]); 
		$time = explode(":",$date_time[1]); 
		unset($date_time);
		list($year, $month, $day) = $date;
		list($hour,$minute,$second) = $time;
		return mktime(intval($hour), intval($minute), intval($second), intval($month), intval($day), intval($year));
	}
	//PARAMETER DATE ONLY, NO TIME
	function SimpleDate($dttm2timestamp_in){
		$date_time = explode(" ", $dttm2timestamp_in);
		$date = explode("-",$date_time[0]); 
		unset($date_time);
		list($year, $month, $day) = $date;
		return mktime(intval(0), intval(0), intval(0), intval($month), intval($day), intval($year));
	}
	//DATE DIFERENCE
	function Date_Diff($date1, $date2){
		 $s = strtotime($date2)-strtotime($date1);
		 $d = intval($s/86400); 
		 $s -= $d*86400;
		 $h = intval($s/3600);
		 $s -= $h*3600;
		 $m = intval($s/60); 
		 $s -= $m*60;
		 return $d."/".$h;
	}	
	//FIRST DAY OF MONTH
	function FirstDayofmonth(){
	 	$res = mysql_fetch_array($this->Execute_Query("SELECT ((PERIOD_ADD(EXTRACT(YEAR_MONTH FROM CURDATE()),0)*100)+1) as FirstDayOfTheMonth"));
		return $res["FirstDayOfTheMonth"];
	}
	//LAST DAY OF MONTH
	function LastDayofMonth(){
		$res = mysql_fetch_array($this->Execute_Query("SELECT (SUBDATE(ADDDATE(CURDATE(),INTERVAL 1 MONTH),INTERVAL DAYOFMONTH(CURDATE())DAY)) AS LastDayOfTheMonth"));
		return $res["LastDayOfTheMonth"];
	}
	//LINK ACTION 
	function LinkAction($getid,$dbid){
		if($getid == $dbid) { $action = IMAGEARROW; }
		else { $action = IMAGEEDIT; }
		return $action;
	}
	//STATUS IMAGE 
	function StatusImage($status){
		if($status == "Y") { $img = PUBLISHED; $status = "Published"; }
		else { $img = LOCKED; $status = "Locked";}
		return $img;
	}
	//EMAIL VALIDATION
	function ValidateEmailAddress($email){
		if(!ereg("^[^@]{1,64}@[^@]{1,255}$", $email)){
			return false;
		}
		//Split it into sections to make life easier
		$email_array = explode("@", $email);
		$local_array = explode(".", $email_array[0]);
		for($i = 0; $i < sizeof($local_array); $i++){
			if(!ereg("^(([A-Za-z0-9!#$%&'*+/=?^_`{|}~-][A-Za-z0-9!#$%&'*+/=?^_`{|}~\.-]{0,63})|(\"[^(\\|\")]{0,62}\"))$", $local_array[$i])){
				return false;
			}
		}  
		if(!ereg("^\[?[0-9\.]+\]?$", $email_array[1])){ // Check if domain is IP. If not, it should be valid domain name
			$domain_array = explode(".", $email_array[1]);
			if(sizeof($domain_array) < 2){
				return false; // Not enough parts to domain
			}
			for($i = 0; $i < sizeof($domain_array); $i++){
				if(!ereg("^(([A-Za-z0-9][A-Za-z0-9-]{0,61}[A-Za-z0-9])|([A-Za-z0-9]+))$", $domain_array[$i])){
					return false;
				}
			}
		}
		return true;
	}
    //ENCRYPTION/DECRYPTION
    function get_rnd_iv($iv_len){
	   $iv = '';
	   while ($iv_len-- > 0) {
		   $iv .= chr(mt_rand() & 0xff);
	   }
	   return $iv;
    }
	//ENCRYPTION
    function md5_encrypt($plain_text, $password, $iv_len = 16){
	   $plain_text .= "\x13";
	   $n = strlen($plain_text);
	   if ($n % 16) $plain_text .= str_repeat("\0", 16 - ($n % 16));
	   $i = 0;
	   $enc_text = $this->get_rnd_iv($iv_len);
	   $iv = substr($password ^ $enc_text, 0, 512);
	   while ($i < $n) {
		   $block = substr($plain_text, $i, 16) ^ pack('H*', md5($iv));
		   $enc_text .= $block;
		   $iv = substr($block . $iv, 0, 512) ^ $password;
		   $i += 16;
	   }
	   return base64_encode($enc_text);
   }
   //DECRYPTION
   function md5_decrypt($enc_text, $password, $iv_len = 16)
   {
	   $enc_text = base64_decode($enc_text);
	   $n = strlen($enc_text);
	   $i = $iv_len;
	   $plain_text = '';
	   $iv = substr($password ^ substr($enc_text, 0, $iv_len), 0, 512);
	   while ($i < $n) {
		   $block = substr($enc_text, $i, 16);
		   $plain_text .= $block ^ pack('H*', md5($iv));
		   $iv = substr($block . $iv, 0, 512) ^ $password;
		   $i += 16;
	   }
	   return preg_replace('/\\x13\\x00*$/', '', $plain_text);
	}
   //GENERATE RAMDOM TEXT
    function Randomtext($nameLength){
	 	 $NameChars = '012346789abcdefghijklmnopqrstuvwxyz';
		 $Vouel = 'aeiou';
		 $Name = "";
		 for ($index = 1; $index <= $nameLength; $index++){ 
			if ($index % 3 == 0){
		  		$randomNumber = rand(1,strlen($Vouel));
		  		$Name .= substr($Vouel,$randomNumber-1,1); 
			}
			else{
		 	    $randomNumber = rand(1,strlen($NameChars));
		  		$Name .= substr($NameChars,$randomNumber-1,1);
	   		} 
	 	}
	    return $Name;
	}
	//DATE
	function HeaderDate(){
		$arrDay = array ("Sunday", "Monday", "Tuesday", "Wednusday", "Thrusday", "Friday","Saturday");
		return $arrDay[date(w)].", ".date("F j, Y"); 
	}
	//PAGING INFO
	function PagingInfo(){
		if(isset($_POST["txtdisplay"])){
			$PageSize=$_POST["txtdisplay"];
		}
		else{
			$PageSize = 20;
		}
		$StartRow = 0;
		//Set the page no
		if(empty($_GET['PageNo'])){
			if($StartRow == 0){
				$PageNo = $StartRow + 1;
			}
		}else{
			$PageNo = $_GET['PageNo'];
			$StartRow = ($PageNo - 1) * $PageSize;
		}
		//Set the counter start
		if($PageNo % $PageSize == 0){
			$CounterStart = $PageNo - ($PageSize - 1);
		}else{
			$CounterStart = $PageNo - ($PageNo % $PageSize) + 1;
		}
		//Counter End
		$CounterEnd = $CounterStart + ($PageSize - 1);
	}
	//GET IMAGE FILE TYPE
	function GetFileType($filename){
		$arr = split("\.",$filename);
		$type = strtoupper($arr[count($arr)-1]);
		if ($type == "JPEG")
			$type = "JPG";
		if ($type=="JPG" || $type =="GIF" || $type=="PNG")
			return $type;
		else
			return false;
	}
	//GET VIDEO FILE TYPE
	function GetFileTypeVideo($filename){
		$arr = split("\.",$filename);
		$type = strtoupper($arr[count($arr)-1]);
		if ($type=="wmv" || $type =="avi" || $type =="mov")
			return $type;
		else
			return false;
	}
	function GetFileTypeSWFfile($filename){
		$arr = split("\.",$filename);
		$type = strtoupper($arr[count($arr)-1]);
		if ($type == "SWF")
			return true;
		else
			return false;
	}
	//RESIZE IMAGE
	function ResizeImage($file,$originalpath,$destinationpath,$width,$height){
		$new_w = $width;
		$new_h = $height;	
		if ($handle = opendir($originalpath)) {
			$file = $file;
			$file_type = $this->getFileType($file);
			if ($file_type == false){
				//echo "<br> -->Not an Image file.<BR>";
				//continue;
			}
			$filename = $originalpath."".$file;
			switch($file_type){
				case "GIF":
					$src_img=@imagecreatefromgif($filename);
					break;
				case "JPG":
					$src_img=imagecreatefromjpeg($filename);
					break;		
				case "PNG":
					$src_img=imagecreatefrompng($filename);
					break;		
				default:
					continue;
			}
			$old_w 		= 	imagesx($src_img);
			$old_h 		= 	imagesy($src_img);
			$dst_img 	=	imageCreateTrueColor($new_w,$new_h); 
			imagecopyresampled($dst_img,$src_img,0,0,0,0,$new_w,$new_h,$old_w,$old_h);
			$thumbnail = $destinationpath."".$file;
			switch($file_type){
				case "GIF":
					$src_img=@imagegif($dst_img,$thumbnail);
					break;
				case "JPG":
					$src_img=imagejpeg($dst_img,$thumbnail);
					break;		
				case "PNG":
					$src_img=imagepng($dst_img,$thumbnail);
					break;		
				default:
					continue;
			}
		}
		closedir($handle); 
	}
	//TIME
	function GetTime($timestamp){
		return date('M d Y h:i:s A',$timestamp+(5*60*60)+(45*60));
	}
	//Mail link
	function MailLink($email){
		return "<a href='mailto:".$email."'>".$email."</a>";
	}
	//LISTING BRANDS
	function ListComboBrands($id){
		$liquor_listing = "";
		$resliquor = $this->Execute_Query("select * from tblbrand order by brand_name");
		$liquor_listing.= '<select name="brand[]" id="brand[]">';
		while($rsliquor = mysql_fetch_array($resliquor)){
			if($id == $rsliquor["brand_id"]) $choose = "selected";
			else $choose = "";
			$liquor_listing .= "<option value=".$rsliquor["brand_id"]." ".$choose.">".$rsliquor["brand_name"]."</option>";
		}
		$liquor_listing.="</select>";
		return $liquor_listing;
	}
	//LISTING LIQUORS
	function ListComboLiquors($id){
		$liquor_listing = "";
		$resliquor = $this->Execute_Query("select * from tblliquor order by liquor_name");
		$liquor_listing.= '<select name="liquor[]" id="liquor[]">';
		while($rsliquor = mysql_fetch_array($resliquor)){
			if($id == $rsliquor["liquor_id"]) $choose = "selected";
			else $choose = "";
			$liquor_listing .= "<option value=".$rsliquor["liquor_id"].">".$rsliquor["liquor_name"]."</option>";
		}
		$liquor_listing.="</select>";
		return $liquor_listing;
	}
	//DISPLAY PRICE
	function DisplayPrice($price){
		return "$".$price;
	}
	
	//drop down menu developing code - by niranjan
	/* assign variables to call function
	//select menu name
	$menuname = "store_state";
	
	//selected value
	$sel = $liquorsdrinks->store_state;
	//$sel = 0;
	
	//is there an option all
	//$all = "1"; 
	$all = "0"; 
	
	//width of select menu
	//$width = "145px";
	$width = ""; 
	
	
	//javascript function if any
	// $fn = "eventname=\"functionname();\"";
	$fn = "";		
	
	
	//sql to fetch data
	$sql = "Select zone_id, Zone_name from tblzone";
	$rs = $db->Execute_Query($sql);
	
	//calling the function	
	echo select_menu($menuname,$sel,$rs,$all,$width,$fn);
	
	*/
	function select_menu($menuname,$sel,$rs,$all,$width,$fn){
		if($fn){$func=$fn;} else{$func="";}
		$str= "<select name=\"$menuname\" style=\"width:$width;\" ".$func. ">" ;
		if($all==1){
			if($sel==0){$selected="selected=\"selected\"";}else{$selected="";}
			$str.="<option value=\"all\" ".$selected." >All</option>";	
		}
		while($res = mysql_fetch_array($rs)){
			if($res[0]==$sel){$selected="selected=\"selected\"";}else{$selected="";}
			$str.="<option value=\"".$res[0]."\" ".$selected.">".$res[1]."</option>";
		}
		$str.= "</select>";
		return $str;		
	}
	
	//multiple select menu developing code - by niranjan
	/* assign variables to call function
	//select menu name
	$menuname = "store_state";
	
	//selected value
	$sel = $liquorsdrinks->store_state;
	//$sel = 0;
	
	//is there an option all
	//$all = "1"; 
	$all = "0"; 
	
	//is there an option none
	//$none = "1"; 
	$none = "0"; 
	
	//is there multiple selection provision
	//$multiple = "1"; 
	$multiple = "0"; 
	
	//size of select menu
	//$size = "2";
	$size = ""; 
	
	//width of select menu
	//$width = "145px";
	$width = ""; 
	
	//javascript function if any
	// $fn = "eventname=\"functionname();\"";
	$fn = "";		
	
	
	//sql to fetch data
	$sql = "Select zone_id, Zone_name from tblzone";
	$rs = $db->Execute_Query($sql);
	
	//calling the function	
	echo mselect_menu($menuname,$sel,$rs,$all,$none,$multiple,$size,$width,$fn);
	
	*/
	function mselect_menu($menuname,$sel=0,$rs,$all=0,$none=0,$multiple=0,$size="",$width,$fn=""){
		if($fn){$func=$fn;} else{$func="";}
		if($multiple){$multi="multiple=\"multiple\"";} else{$multi="";}
		$str= "<select name=\"$menuname\" style=\"width:$width;\" ".$func."".$multi.">" ;
		if($all==1){
			if($sel==0){$selected="selected=\"selected\"";}else{$selected="";}
			$str.="<option value=\"all\" ".$selected." >All</option>";	
		}
		if($none==1){
			if($sel==0){$selected="selected=\"selected\"";}else{$selected="";}
			$str.="<option value=\"0\" ".$selected." >None</option>";	
		}
		
		$sel_arr = explode("|" , $sel);
		$max = count($sel_arr)-1;
		
		while($res = mysql_fetch_array($rs)){
			if($max>=1){
				for($i=0;$i<=$max;$i++){
					if($sel_arr[$i] == $res[0]){$selected="selected=\"selected\""; break;}else{$selected="";}
					//$str.="<option value=\"".$res[0]."\" ".$selected.">".$res[1]."test".$res[0]."==".$sel_arr[$i]."</option>";
				}	
				$str.="<option value=\"".$res[0]."\" ".$selected.">".$res[1]."</option>";
			}
			else{
				if($res[0]==$sel){$selected="selected=\"selected\"";}else{$selected="";}
				$str.="<option value=\"".$res[0]."\" ".$selected.">".$res[1]."</option>";
			}
		}
		$str.= "</select>";
		return $str;		
	}
	
	//rss functions
	function maxrssID(){
		$sql=$this->Execute_Query("SELECT max(rss_id) as rss_id from rss_feeds");
		$rs=mysql_fetch_array($sql);
		$this->rss_id=$rs['rss_id'];
	}
	
	function rssInfo($id){
		$sql = "SELECT * FROM rss_feeds Where rss_id=$id";
		$result = $this->Execute_Query($sql) or die(mysql_error());
		$rs = mysql_fetch_array($result,MYSQL_BOTH);
		$this->rss_url	 		=	$rs['rss_url']; 
		$this->rss_count		=	$rs['rss_count'];
		$this->status			=	$rs['status'];
	}
	
	function guid(){
    if (function_exists('com_create_guid')){
        return com_create_guid();
    }else{
        mt_srand((double)microtime()*10000);//optional for php 4.2.0 and up.
        $charid = strtoupper(md5(uniqid(rand(), true)));
        $hyphen = chr(45);// "-"
        $uuid = chr(123)// "{"
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid,12, 4).$hyphen
                .substr($charid,16, 4).$hyphen
                .substr($charid,20,12)
                .chr(125);// "}"
        return $uuid;
    }
}
	public function toAscii($str, $replace=array(), $delimiter='-') 
	{
		
		setlocale(LC_ALL, 'en_US.UTF8');
		
		if( !empty($replace) ) {
		$str = str_replace((array)$replace, ' ', $str);
		}
		
		$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
		$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
		$clean = strtolower(trim($clean, '-'));
		$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
		
		return $clean;
	}
	
}//CLASS ENDS