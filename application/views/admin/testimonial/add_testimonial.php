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
                        Add New Testimonial                           
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
                            <form role="form" method="post" action="<?=base_url('functions/insert_testimonial')?>" enctype="multipart/form-data">
                <!-- text input -->
                
                
              
                    
                        <div class="form-group">
                        <label>By</label>
                        <input type="text" name="testimonial_by" class="form-control" placeholder="Enter By">
                        </div>
                        
                        <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="testimonial_address" class="form-control" placeholder="Enter Address">
                        </div>
                        <div class="form-group">
                        <label>Testimonial</label>
                        <textarea class="form-control" name="testimonial" id="edit" rows="5" cols="80" placeholder="Enter Testimonial"></textarea>
                        </div>
                        
                        
                        
                        
                       
                        <input type="hidden" name="testimonial_email" class="form-control" placeholder="Enter Email">
                        <input type="hidden" name="testimonial_image" value="">
                       
                        
                        
                        
                        
                        <!-- checkbox -->
                        <div class="form-group">
                        <div class="checkbox">
                        <label>
                        <input type="checkbox" value="Y" id="visible" name="visible">
                        Visible
                        </label>
                        </div>
                        </div>
                        
                        <div class="box-footer">
                        <button type="submit" class="btn btn-info ">Save</button>
                        <button type="button" class="btn btn-default"  onClick="javascript:window.history.go(-1);">Cancel</button>               
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