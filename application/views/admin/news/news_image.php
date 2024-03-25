<?php $this->load->view('admin/include/header'); ?>

 <div class="cont">
        	<!---left_panel-->
 <?php 
 $this->load->view('admin/include/left');
 $row=$query_news->row();
  ?>
            <!---left_panel-->
            <!--right_panel-->
            <div class="left_panel" style="float: left;width: 755px;margin-left:8px;">            
                    <h1 class="title">News Image : <?=$row->NewsName?></h1>
                   
             <?php
			echo $this->session->userdata('error');
            $this->session->unset_userdata('error');
			
			echo $this->session->userdata('success');
            $this->session->unset_userdata('success');
			
			echo form_open_multipart('functions/insert_news_image') ; ?>
                <table width="450" style="margin-left:20px; margin-top:20px;">
                    <tr>
                        <td style="font-size:15px;">Image Caption</td>
                        <td><input type="text" name="caption" size="50" id="caption"></td>
                    </tr>
                    
                    <tr>
                        <td>Image</td>
                        <td><input type="file"  multiple name="NewsImage" id="NewsImage" accept="image/jpeg"></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    <input type="submit" value="Save Image" class="submit-btn">
                    <input type="button" value="Finish" class="submit-btn" onClick="location.href='<?=base_url("functions/finishnewsadd/")?>'"/>
                    </td>
                    </tr>
                </table>
                <?php
				if($query_news_image->num_rows()>0){
				?>
                <div id="productimage">
                <ul>
                <?php foreach($query_news_image->result() as $rowqpi){ ?>
                <li><img src="<?=base_url("news/".$rowqpi->image)?>" height="150"/>
                <br /> <br />
                <?php if($rowqpi->Main=="Y"){ ?>
                Main Image
                <?php } else { ?>
                <a href="<?=base_url("functions/makemain/".$rowqpi->NewsID."/".$rowqpi->image_id)?>" style="background:#eee; border:1px solid #ccc; padding:5px;">Set As Main</a>
                <?php } ?>&nbsp;&nbsp;&nbsp;
                <a onmousedown='javascript:dlt(this)' href="<?=base_url()?>functions/delete_newsimage/<?=$rowqpi->NewsID."/".$rowqpi->image_id?>"><img src="<?=base_url()?>icon/delete.png"  style="top:2;"/></a>
                </li>
                <?php } ?>
                </ul>
                </div> 
                <?php } ?>
            </div>
         
            <!--right_panel-->
            
            
            
            
            
        	<div class="clear"></div>
 </div>
        
        
        <!--footer-->
<?php $this->load->view('admin/include/footer');
$this->load->view('admin/include/ck'); ?>
         <!--footer-->   
          
            
</body>

</html>