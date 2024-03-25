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
                        Edit Information                       
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
                        ?>      
                        <div class="panel-body">
                            <form role="form" method="post" action="<?=base_url('functions/informationupdate/'.$this->uri->segment('3'))?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="information_name"  class="form-control" placeholder="Enter Name" value="<?=$row->information_name?>" required>
                </div>
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="information_title" class="form-control" placeholder="Enter Title" value="<?=$row->information_title?>">
                </div>

                
                <div class="form-group">
                  <label>Custom Link</label>
                  <input type="text" name="custom_link" class="form-control"  value="<?=$row->custom_link?>">
                </div>
				
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="parent_information" id="parent_information">
                  <option value="0">---Select---</option>
					<?php
                        foreach($information_array as $kArr)
                       {
                            if($kArr['information_id']==$row->parentInfo){
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
                <!-- textarea -->
                <div class="form-group">
                  <label>Introduction</label>
                  <textarea class="form-control" name="information_introduction" id="edit" rows="5" cols="80" placeholder="Enter Introduction"><?=$row->information_introduction?></textarea>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control"  name="information_description" id="edit1" rows="3" placeholder="Enter Description"><?=$row->information_description?></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <i class="glyphicon glyphicon-picture"></i><input type="file" id="exampleInputFile" name="informationimage">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Only Image File is applicable.
                    </div>
                   
                    <?php if($row->image) { ?>
                    <img src="<?=base_url("cmsimage/".$row->image)?>" width="250"/></br><a href="<?=base_url("functions/delinfoimage/".$this->uri->segment('3'))?>">
                   <!-- <button class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Delete</button></a>-->
                    <?php } ?>

                </div>
                
                <div class="form-group">
                  <label>Image Caption</label>
                  <input type="text" name="image_caption"  class="form-control" value="<?=$row->image_caption?>">
                </div>

               
                <!-- checkbox -->
                <div class="form-group">
               <!--   <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="featuredInfo" name="featuredInfo" <?//=($row->featured=="Y")?'checked="checked"':''?>>
                      Featured Information
                    </label>
                  </div>-->

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="show_on_menu" name="show_on_menu" <?=($row->show_on_menu=="Y")?'checked="checked"':''?>>
                      Set on Menu
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="visible" name="visible" <?=($row->visible=="Y")?'checked="checked"':''?>>
                      Visible
                    </label>
                  </div>
                  
              <!--    <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="as_tab" name="as_tab" <?//=($row->as_tab=="Y")?'checked="checked"':''?>>
                      Tab
                    </label>
                  </div>-->
                  
                </div>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save Information</button>
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
<?php $this->load->view('admin/include/ck');?>
</body>
</html>