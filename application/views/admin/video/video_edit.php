<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->load->view('admin/include/htmlheader'); ?>
</head>
<body>
<div id="wrapper">
<nav class="navbar navbar-default top-navbar" role="navigation">
<?php $this->load->view('admin/include/header'); ?>
</nav>



<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
 	<?php $this->load->view('admin/include/left'); ?>
</div>
</nav>



<div id="page-wrapper">
<div id="page-inner">			  
                 <!-- /. ROW  -->
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                        Edit Video                     
                        </div>
						<?php
						if($this->session->userdata('sucess')){
                       
                        ?>
                        <div class="panel-body"> 
                            <div class="alert alert-success">
                            
                             <strong>Well done!</strong> <?php
                             echo $this->session->userdata('sucess');
                        	 $this->session->unset_userdata('sucess');
							?>
                            </div>                            
                        </div>
						<?php } 
                        foreach($query->result() as $row)
                        {
							$CI =& get_instance();
							$CI->load->library('Youtube');
							$CI->youtube->url=$row->vid_link;
                        ?>      
                        <div class="panel-body">
                            <form role="form" method="post" action="<?=base_url('functions/update_video/'.$this->uri->segment('3'))?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="video_title"  class="form-control" placeholder="Enter Name" value="<?=$row->video_title?>">
                </div>
                <div class="form-group">
                  <label>Caption</label>
                  <input type="text" name="video_caption" class="form-control" placeholder="Enter Caption" value="<?=$row->vid_caption?>">
                </div>
				
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="parent_information" id="parent_information">
                  <option value="0">---Select---</option>
					<?php
                        foreach($information_array as $kArr)
                       {
                            if($kArr['information_id']==$row->parent_information){
                                   echo "<option value='".$kArr['information_id']."' selected='selected'>";
                                   }
                                   else
                                   {
                                   echo "<option value='".$kArr['information_id']."'>";
                                   }
                                    for($i=0;$i<$kArr["level"];$i++)
                                    {
                                        echo "&nbsp;&nbsp;&nbsp;";
                                    }
                            echo $kArr['information_title'];
                            echo "</option>";
                        }
                      ?>
                  </select>
                </div>
                
                <div class="form-group">
                  <label>Link</label>
                  <input type="text" name="video_link" class="form-control" placeholder="Enter Caption" value="<?=$row->vid_link?>">
                </div>
                <div class="form-group">
                    <label>Previous Video</label>
                    <p class="form-control-static"><?=$CI->youtube->player("410","343")?> </p>
                </div>
               
                <!-- checkbox -->
                <div class="form-group">
                 <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="visible" name="visible" <?=($row->vid_status=="Y")?'checked="checked"':''?>>
                      Visible
                    </label>
                  </div>
                </div>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save Video</button>
                <button type="reset" class="btn btn-default">Cancel</button>                
              </div>

              </form>
                            
                        </div>
			<?php
            }
            ?>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
             
        </div>
</div>
</div>
<?php $this->load->view('admin/include/jsinclude'); ?>
</body>
</html>