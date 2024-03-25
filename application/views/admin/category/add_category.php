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
                        Add New Category                           
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
                            <form role="form" method="post" action="<?=base_url("functions/insert_category")?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Category</label>
                  <input type="text" name="CategoryName"  class="form-control" placeholder="Enter Name" required>
                </div>               
				
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="ParentCategory" id="ParentCategory">
                  <option value="0">---Select---</option>
					<?php
                    foreach($category_array as $kArr)
                    {
                    echo "<option value='".$kArr['CategoryID']."'>";
                    for($i=0;$i<$kArr["level"];$i++)
                    {
                    echo "&nbsp;&nbsp;&nbsp;";
                    }
                    echo $kArr['CategoryName'];
                    echo "</option>";
                    }
                    ?>
                  </select>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Introduction</label>
                  <textarea class="form-control" name="Introduction"  rows="5" cols="80" placeholder="Enter Introduction"></textarea>
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control"  name="Description" id="edit" rows="3" placeholder="Enter Description"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="CategoryImage">
                </div>
                
                <div class="form-group">
                  <label>Image Caption</label>
                  <input type="text" name="image_caption"  class="form-control">
                </div>

               
                <div class="form-group">                
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Nevigation" name="Nevigation">
                      Nevigation
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="CMS" name="CMS">
                      CMS
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Services" name="Services">
                      Services
                    </label>
                  </div>

                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Visible" name="Visible">
                      Visible
                    </label>
                  </div>
                </div>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save</button>
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