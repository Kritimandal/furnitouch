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
                        Add News/Event                           
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
                            <form role="form" method="post" action="<?=base_url("functions/insert_news")?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="NewsName"  class="form-control" placeholder="Enter Name">
                </div>
                
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" name="NewsLocation"  class="form-control" placeholder="Enter Location">
                </div>
                
                <div class="form-group">
                    <label>News Type</label>
                    <label class="radio-inline">
                        <input type="radio" name="netype" id="netype" value="News" checked="">News
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="netype" id="netype" value="Event">Event
                    </label>                   
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
                <!-- textarea -->
                <div class="form-group">
                  <label>Short Desc</label>
                  <textarea class="form-control" name="NewsShortDesc" id="edit"  placeholder="Enter Introduction"></textarea>
                </div>
                <div class="form-group">
                  <label>Long Description</label>
                  <textarea class="form-control"  name="NewsLongDesc" id="edit1"  placeholder="Enter Description"></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="newsimage">

                  <p class="help-block">Only Image File is applicable.</p>
                </div>

               
                <!-- checkbox -->
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="NewsLive" name="NewsLive">
                      Visible
                    </label>
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Date</label>
                  <input type="text" name="NewsDate"  class="form-control" placeholder="Enter Date" value="<?=date('Y/m/d')?>">
                </div>
                
                <div class="form-group">
                  <label>Page Title</label>
                  <textarea class="form-control" name="PageTitle" id="PageTitle" rows="5" cols="80" placeholder="Enter Page Title"></textarea>
                </div>
                
                <div class="form-group">
                  <label>Page Description</label>
                  <textarea class="form-control" name="PageDescription" id="PageDescription" rows="5" cols="80" placeholder="Enter Page description"></textarea>
                </div>
                
                <div class="form-group">
                  <label>Page Keywords</label>
                  <textarea class="form-control" name="PageKeywords" id="PageKeywords" rows="5" cols="80" placeholder="Enter Keywords"></textarea>
                </div>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save Information</button>
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