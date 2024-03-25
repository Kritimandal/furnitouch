<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$this->load->view('admin/include/htmlheader');
$row=$query_product->row();
?>

<script>
function finishgalleryadd()
{
	document.location.href = 'http://www.mozilla.org'
}
</script>
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
                        Product Image : <?=$row->PrductName?>                           
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
                            <form role="form" method="post" action="<?=base_url("functions/insert_product_image/".$this->uri->segment(3))?>" enctype="multipart/form-data">
                <!-- text input -->
                
                <div class="form-group">
                  <label>Image Caption</label>
                  <input type="text" name="caption" class="form-control" placeholder="Enter Image Caption">
                </div>
                
               <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="ProductImage" accept="image/jpeg">
                  
                  <div class="alert alert-warning">
                        <strong>Warning!</strong> Only Image File is applicable.
                    </div>
                </div>
                
                
                                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save Image</button>
                <a href="<?=base_url("functions/finishproductadd")?>" class="btn btn-success">Finish</a>
                
              </div>

              </form></br>
              <div class="row">
                 <?php
				if($query_product_image->num_rows()>0){
				foreach($query_product_image->result() as $rowqpi){ 
				?>
                <div class="col-md-4 col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <?=$rowqpi->caption?>
                        </div>
                        <div class="panel-body">
                            <p><img src="<?=base_url("gallery/".$rowqpi->image)?>" height="150"/></p>
                        </div>
                        <div class="panel-footer">
                       
                            <a onmousedown='javascript:dlt(this)' href="<?=base_url()?>functions/delete_productimage/<?=$rowqpi->ProductID."/".$rowqpi->image_id?>" onclick="return confirm('Are you sure you want to delete this item?');"><button class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Delete </button></a>
                        </div>
                    </div>
                </div>
                <?php } } ?>
            </div>
              
                            
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