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
                        Add New Partner                           
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
                            <form role="form" method="post" action="<?=base_url("functions/insert_partner")?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="PartnerName"  class="form-control" placeholder="Enter Name">
                </div>
                				
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="Category" id="Category">
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
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="PartnerImage">

                  <p class="help-block">Only Image File is applicable.</p>
                </div>
				                
                <div class="form-group">
                  <label>Link</label>
                  <input type="text" name="Partner_link"  class="form-control" placeholder="Enter link" value="">
                </div>
                
                <!-- checkbox -->
                <div class="form-group">
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="PartnerLive" name="PartnerLive" checked>
                      Visible
                    </label>
                  </div>
                  
                </div>
               
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save Partner</button>
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