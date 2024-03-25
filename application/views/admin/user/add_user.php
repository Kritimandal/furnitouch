<?php 
$this->load->view('admin/include/header'); 
?>
<div class="cont"> 
  <!---left_panel-->
<?php 
$this->load->view('admin/include/left'); 
?>
  <!---left_panel--> 
  
  <!--right_panel-->
  <div class="left_panel" style="float: left;width: 755px;margin-left:8px;">
    <h1 class="title">Page</h1>
    <div style="width:720px; height:30px; margin-left:8px">
      <h3 style="
background:#FFF;
margin: -3px -3px 5px;
padding: 6px 13px;
border-bottom-left-radius: 0px;
border-bottom-right-radius: 0px;
"> <a style="color:#CCC;" href="<?=base_url()?>functions/add_page">Add Page</a> </h3>
    </div>
	<?php
    echo $this->session->userdata('error');
    $this->session->unset_userdata('error');
    echo form_open_multipart('functions/insert_page') ;
    ?>
    <table width="450" style="margin-left:20px; margin-top:20px;">
      <tr>
        <td style="font-size:15px;">Name</td>
        <td><input type="text" name="name" id="name" value="" size="60"/></td>
      </tr>
      <tr>
        <td style="font-size:15px;">Title</td>
        <td><input type="text" name="title" id="title" value="" size="60"/></td>
      </tr>
      <tr>
        <td style="font-size:15px;">Parent</td>
        <td><select name="parent_page" id="parent_page">
            <option value="0">---Select---</option>
			<?php
            foreach($page_array as $kArr)
            {
            echo "<option value='".$kArr['page_id']."'>";
            for($i=0;$i<$kArr["level"];$i++)
            {
            echo "&nbsp;&nbsp;&nbsp;";
            }
            echo $kArr['title'];
            echo "</option>";
            }
            ?>
          </select></td>
      </tr>
      <tr>
        <td style="font-size:15px;">Introduction</td>
        <td><textarea name="introduction" id="edit"></textarea></td>
      </tr>
      <tr>
        <td style="font-size:15px;">Description</td>
        <td><textarea name="description" id="edit1"></textarea></td>
      </tr>
      <tr>
        <td>Image</td>
        <td><input type="text" name="image" id="image"  onClick="BrowseFiles('<?=base_url()?>mfm.php?mode=standalone&field=image')"  size="60"></td>
      </tr>
      <tr>
        <td style="font-size:15px;">&nbsp;</td>
        <td> 
        Featured <input type="checkbox" class="checkbox" value="Y" id="featured" name="featured"/>
        Set on Menu <input type="checkbox" class="checkbox" value="Y" id="show_on_menu" name="show_on_menu"/>
        Visible <input type="checkbox" class="checkbox" value="Y" id="visible" name="visible"/>
        </td>
      </tr>
      <tr>
        <td style="font-size:15px;">Page Title</td>
        <td><textarea name="page_title" cols="50" id="page_title"></textarea></td>
      </tr>
      <tr>
        <td style="font-size:15px;">Page Keywords</td>
        <td><textarea name="page_keywords" cols="50" id="page_keywords"></textarea></td>
      </tr>
      <tr>
        <td style="font-size:15px;">Page Description</td>
        <td><textarea name="page_description" cols="50" id="page_description"></textarea></td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit" value="Save Page" class="submit-btn"></td>
      </tr>
    </table>
  </div>
  <!--right_panel-->
  
  <div class="clear"></div>
</div>

<!--footer-->
<?php 
$this->load->view('admin/include/footer');
$this->load->view('admin/include/ck'); ?>
<!--footer-->
</body></html>