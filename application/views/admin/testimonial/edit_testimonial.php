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
                        Edit Testimonial                       
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
                            <form role="form" method="post" action="<?=base_url('functions/testimonialupdate/'.$this->uri->segment('3'))?>" enctype="multipart/form-data">
                                                       
                    <div class="form-group">
                    <label>By</label>
                    <input type="text" name="testimonial_by" class="form-control" placeholder="Enter By" value="<?=$row->testimonial_by?>">
                    </div>                    
                    <div class="form-group">
                    <label>Address</label>
                    <input type="text" name="testimonial_address" class="form-control" placeholder="Enter Address" value="<?=$row->testimonial_address?>">
                    </div>
                    
                    <div class="form-group">
                    <label>Testimonial</label>
                    <textarea class="form-control" name="testimonial" id="edit" rows="5" cols="80" placeholder="Enter Testimonial"><?=$row->testimonial?></textarea>
                    </div>   
                    
                   
                    <input type="hidden" name="testimonial_email" class="form-control" placeholder="Enter Email" value="<?=$row->testimonial_email?>">
                     <input type="hidden" name="testimonial_image" value="">
                    
                    
                    
                    
                    <div class="form-group">
                    <div class="checkbox">
                    <label>
                    <input type="checkbox"  id="visible" name="visible" value="Y" <?=($row->visible=="Y")?'checked="checked"':''?>>
                    Visible
                    </label>
                    </div>
                    </div>
                    
                    <div class="box-footer">
                    <button type="submit" class="btn btn-info ">Save Banner</button>
                    <button type="button" class="btn btn-default"  onClick="javascript:window.history.go(-1);">Cancel</button>             
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