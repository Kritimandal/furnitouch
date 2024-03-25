<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php 
$this->load->view('admin/include/htmlheader'); 
$row=$query->row();
?>
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
                        Edit User : <?=$row->UserFirstName." ".$row->UserLastName?>                      
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
                            <form role="form" method="post" action="<?=base_url('functions/userupdate/'.$this->uri->segment('3'))?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>First Name</label>
                  <input type="text" name="UserFirstName"  class="form-control"  value="<?=$row->UserFirstName?>">
                </div>
                <div class="form-group">
                  <label>Last Name</label>
                  <input type="text" name="UserLastName" class="form-control" value="<?=$row->UserLastName?>">
                </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="text" name="UserEmail" class="form-control" value="<?=$row->UserEmail?>">
                </div>
                <div class="form-group">
                  <label>Description</label>
                  <input type="text" name="UserDescription" class="form-control" value="<?=$row->UserDescription?>">
                </div>
                <div class="form-group">
                  <label>City</label>
                  <input type="text" name="UserCity" class="form-control" value="<?=$row->UserCity?>">
                </div>
                <div class="form-group">
                  <label>Passowrd</label>
                  <input type="text" name="UserPassword" class="form-control" value="<?=$this->encrypt->decode($row->UserPassword)?>">
                </div>
                <div class="form-group">
                  <label>Country</label>
                  <select class="form-control" name="parent_information" id="parent_information">
                  <?php foreach($query_country->result() as $rowCountry) { ?>                  
                  <option value="<?=$rowCountry->id?>"  <?php echo ($row->UserCountry==$rowCountry->id)?'selected="selected"':''; ?>><?=$rowCountry->nicename?></option>
                  <?php } ?>
                  </select>
                </div> 
                <div class="form-group">
                  <label>City</label>
                  <input type="text" name="UserState" class="form-control" value="<?=$row->UserState?>">
                </div>              
                <!-- checkbox -->
                
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save Information</button>
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
</body>
</html>