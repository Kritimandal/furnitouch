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
                        Add New Slider                           
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
                            <form role="form" method="post" action="<?=base_url("functions/insertslider")?>" enctype="multipart/form-data">
                <!-- text input -->
                
                <div class="form-group">
                  <label>Title</label>
                  <input type="text" name="title" class="form-control" placeholder="Enter Title">
                </div>
                
                <?php /*?><div class="form-group">
                  <label>URL</label>
                  <input type="text" name="slider_url" class="form-control" placeholder="Enter URL">
                </div>
				
                
                <div class="form-group">
                  <label>Caption</label>
                  <textarea class="form-control" name="caption" id="edit" rows="5" cols="80" placeholder="Enter caption"></textarea>
                </div><?php */?>
                                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="sliderimage">
                  
                  <div class="alert alert-warning">
                        <strong>Warning!</strong> Only Image File is applicable.
                    </div>
                </div>

               
                <!-- checkbox -->
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="status" name="status">
                      Visible
                    </label>
                  </div>
                </div>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save Slider</button>
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
</body>
</html>