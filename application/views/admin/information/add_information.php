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
                        Add New Information                           
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
                        <?php } ?>
                                
                        <div class="panel-body">
                            <form role="form" method="post" action="<?=base_url("functions/insert_information")?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="information_name"  class="form-control" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="information_title" class="form-control" placeholder="Enter Title">
                </div>

                <div class="form-group">
                  <label>Custom Link</label>
                  <input type="text" name="custom_link" class="form-control" placeholder="Enter Link">
                </div>
				
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="parent_information" id="parent_information">
                  <option value="0">---Select---</option>
					<?php
                    foreach($information_array as $kArr)
                    {
                    echo "<option value='".$kArr['information_id']."'>";
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
                  <textarea class="form-control" name="information_introduction" id="edit" rows="5" cols="80" placeholder="Enter Introduction"></textarea>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control"  name="information_description" id="edit1" rows="3" placeholder="Enter Description"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="informationimage">

                  <!--<p class="help-block">Only Image File is applicable.</p>-->
                </div>
                
                <div class="form-group">
                  <label>Image Caption</label>
                  <input type="text" name="image_caption"  class="form-control">
                </div>

               
                <!-- checkbox -->
                <div class="form-group">
                 <!-- <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="featuredInfo" name="featuredInfo">
                      Featured Information
                    </label>
                  </div>-->

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="show_on_menu" name="show_on_menu">
                      Set on Menu
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="visible" name="visible">
                      Visible
                    </label>
                  </div>
                  
                  <!--<div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="as_tab" name="as_tab">
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