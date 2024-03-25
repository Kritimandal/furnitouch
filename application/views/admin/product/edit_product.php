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
                        Edit Product                    
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
                            <form role="form" method="post" action="<?=base_url('functions/productupdate/'.$this->uri->segment('3'))?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="PrductName"  class="form-control" placeholder="Enter Name" value="<?=$row->PrductName?>">
                </div>
               
				
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" name="category" id="category">
                  <option value="0">---Select---</option>
					<?php
                        foreach($category_array as $kArr)
                       {
                            if($kArr['CategoryID']==$row->category){
                                   echo "<option value='".$kArr['CategoryID']."' selected='selected'>";
                                   }
                                   else
                                   {
                                   echo "<option value='".$kArr['CategoryID']."'>";
                                   }
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
					if($KPPlist->PartnerID == $row->PartnerID)
                    echo "<option value='".$KPPlist->PartnerID."' selected>";
					else
					echo "<option value='".$KPPlist->PartnerID."'>";
					                   
                    echo $KPPlist->PartnerName;
                    echo "</option>";
                    }
                    ?>
                  </select>
                </div>
                <!-- textarea -->
                <div class="form-group">
                  <label>Model No</label>
                  <input type="text" name="ModelNo"  class="form-control" placeholder="Enter Model" value="<?=$row->ModelNo?>">
                </div>
                
                <div class="form-group">
                  <label>Material</label> 
                  <input type="text" name="Material"  class="form-control" placeholder="Enter Material" value="<?=$row->Material?>">
                </div>
                
                <div class="form-group">
                  <label>Colour</label>
                  <input type="text" name="Colour"  class="form-control" placeholder="Enter Colour" value="<?=$row->Colour?>">
                </div>
                
                <div class="form-group">
                  <label>Size</label>
                  <input type="text" name="Size"  class="form-control" placeholder="Enter Colour" value="<?=$row->Size?>">
                </div>
                
                <div class="form-group">
                  <label>Warranty</label>
                  <input type="text" name="Warranty"  class="form-control" placeholder="Enter Warranty" value="<?=$row->Warranty?>">
                </div>
                
                
               
                <div class="form-group">
                  <label>Description</label>
                  <textarea class="form-control"  name="ProductLongDesc" id="edit" rows="3" placeholder="Enter Description"><?=$row->ProductLongDesc?></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <i class="glyphicon glyphicon-picture"></i><input type="file" id="exampleInputFile" name="ProductImage">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Only Image File is applicable.
                    </div>
                   
                    <?php if($row->ProductImage) { ?>
                    <img src="<?=base_url("cmsimage/".$row->ProductImage)?>" width="250"/></br><a href="<?=base_url("functions/delproductimage/".$this->uri->segment('3'))?>" class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Delete</a>
                    <?php } ?>

                </div>
                
                

               
                <!-- checkbox -->
                
                <div class="form-group">
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="ProductLive" name="ProductLive" <?=($row->ProductLive=="Y")?'checked="checked"':''?>>
                      Visible
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Stock" name="Stock" <?=($row->Stock=="Y")?'checked="checked"':''?>>
                      Stock
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Featured" name="Featured" <?=($row->Featured=="Y")?'checked="checked"':''?>>
                      Featured
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="Latest" name="Latest" <?=($row->Latest=="Y")?'checked="checked"':''?>>
                      Latest
                    </label>
                  </div>
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="onSale" name="onSale" <?=($row->onSale=="Y")?'checked="checked"':''?>>
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