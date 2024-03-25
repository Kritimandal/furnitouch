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
                        Add New Gallery                           
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
                            <form role="form" method="post" action="<?=base_url("functions/insert_gallery")?>" enctype="multipart/form-data">
                <!-- text input -->
                
                <div class="form-group">
                  <label>Gallery</label>
                  <input type="text" name="Gallery" class="form-control" placeholder="Enter Gallery Title">
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
               			
                
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control" name="Description" id="edit" rows="5" cols="80" placeholder="Enter Description"></textarea>
                </div>
                                
                

               
                <!-- checkbox -->
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Visible" name="Visible">
                      Visible
                    </label>
                  </div>
                </div>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save Gallery</button>
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