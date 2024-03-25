<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Edit Partner</title>
<link href="<?=base_url("admin-assets/css/bootstrap.css")?>" rel="stylesheet" />
<link href="<?=base_url("admin-assets/css/font-awesome.css")?>" rel="stylesheet" />
<link href="<?=base_url("admin-assets/css/custom-styles.css")?>" rel="stylesheet" />
<!-- Google Fonts-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
 <!-- TABLE STYLES-->
<link href="<?=base_url("admin-assets/js/dataTables/dataTables.bootstrap.css")?>" rel="stylesheet" />
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
                        Edit Partner                       
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
                            <form role="form" method="post" action="<?=base_url('functions/partnerupdate/'.$this->uri->segment('3'))?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="PartnerName"  class="form-control" placeholder="Enter Name" value="<?=$row->PartnerName?>">
                </div>
               
				
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="Category" id="Category">
                  <option value="0">---Select---</option>
					<?php
                        foreach($category_array as $kArr)
                       {
                            if($kArr['CategoryID']==$row->Category){
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
                <!-- textarea -->
                
                
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <i class="glyphicon glyphicon-picture"></i><input type="file" id="exampleInputFile" name="PartnerImage">
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> Only Image File is applicable.
                    </div>
                   
                    <?php if($row->PartnerImage) { ?>
                    <img src="<?=base_url("cmsimage/".$row->PartnerImage)?>" width="250"/></br><a href="<?=base_url("functions/delpartnerimage/".$this->uri->segment('3'))?>" class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Delete</a>
                    <?php } ?>

                </div>
                              
                <div class="form-group">
                  <label>Link</label>
                  <input type="text" name="Partner_link"  class="form-control" placeholder="Enter Location" value="<?=$row->Partner_link?>">
                </div>

               
                <!-- checkbox -->
                
                <div class="form-group">
                  
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="PartnerLive" name="PartnerLive" <?=($row->PartnerLive=="Y")?'checked="checked"':''?>>
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