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
                        Add New Product                           
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
                            <form role="form" method="post" action="<?=base_url("functions/insert_product")?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="PrductName"  class="form-control" placeholder="Enter Name">
                </div>
                				
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="category" id="category">
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
                
                
                <div class="form-group">
                  <label>Brand</label>
                  <select class="form-control" name="PartnerID" id="PartnerID">
                  <option value="0">---Select---</option>
					<?php
                    foreach($query_partner->result() as $KPPlist)
                    {
                    echo "<option value='".$KPPlist->PartnerID."'>";                   
                    echo $KPPlist->PartnerName;
                    echo "</option>";
                    }
                    ?>
                  </select>
                </div>
               
                
                <div class="form-group">
                  <label>Model No</label>
                  <input type="text" name="ModelNo"  class="form-control" placeholder="Enter Model">
                </div>
                
                <div class="form-group">
                  <label>Material</label>
                  <input type="text" name="Material"  class="form-control" placeholder="Enter Material">
                </div>
                
                <div class="form-group">
                  <label>Colour</label>
                  <input type="text" name="Colour"  class="form-control" placeholder="Enter Colour">
                </div>
                
                <div class="form-group">
                  <label>Size</label>
                  <input type="text" name="Size"  class="form-control" placeholder="Enter Colour">
                </div>  
                
                <div class="form-group">
                  <label>Warranty</label>
                  <input type="text" name="Size"  class="form-control" placeholder="Enter Warranty" value="<?=$row->Warranty?>">
                </div>              
                
                <!-- textarea -->
                
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control"  name="ProgrammeLongDesc" id="edit" rows="3" placeholder="Enter Description"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="ProductImage">

                  <p class="help-block">Only Image File is applicable.</p>
                </div>
                
                 
				
               
                
                <!-- checkbox -->
                <div class="form-group">
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="ProductLive" name="ProductLive" checked>
                      Visible
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Stock" name="Stock" checked>
                      Stock
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Featured" name="Featured">
                      Featured
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Latest" name="Latest" checked>
                      Latest
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="onSale" name="onSale">
                      On Sale
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