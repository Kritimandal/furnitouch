<?php
$row=$query->row();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Master Free Bootstrap Admin Template</title>
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
                        Edit News/Event : <?=$row->NewsName?>                       
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
                            <form role="form" method="post" action="<?=base_url("functions/newsupdate/".$this->uri->segment(3))?>" enctype="multipart/form-data">
                <!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" name="NewsName"  class="form-control" placeholder="Enter Name" value="<?=$row->NewsName?>">
                </div>
                
                <div class="form-group">
                  <label>Location</label>
                  <input type="text" name="NewsLocation"  class="form-control" placeholder="Enter Location" value="<?=$row->NewsLocation?>">
                </div>
                
                <div class="form-group">
                    <label>News Type</label>
                    <label class="radio-inline">
                        <input type="radio" name="netype" id="netype" value="News" <?=($row->netype=="News")?'checked="checked"':''?>>News
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="netype" id="netype" value="Event" <?=($row->netype=="Event")?'checked="checked"':''?>>Event
                    </label>                   
                </div>
				
                <div class="form-group">
                  <label>Parent</label>
                  <select class="form-control" name="parent_information" id="parent_information">
                  <option value="0">---Select---</option>
					<?php
                    foreach($information_array as $kArr)
                    {
					 if($kArr['information_id']==$row->parent_information){
                                   echo "<option value='".$kArr['information_id']."' selected='selected'>";
                                   }
                                   else
                                   {
                                   echo "<option value='".$kArr['information_id']."'>";
                                   }
                    
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
                  <textarea class="form-control" name="NewsShortDesc" id="edit" placeholder="Enter Introduction"><?=$row->NewsShortDesc?></textarea>
                </div>
                <div class="form-group">
                  <label>Long Description</label>
                  <textarea class="form-control"  name="NewsLongDesc" id="edit1"  placeholder="Enter Description"><?=$row->NewsLongDesc?></textarea>
                </div>
                
                <div class="form-group">
                  <label for="exampleInputFile">Image</label>
                  <input type="file" id="exampleInputFile" name="newsimage">

                  <p class="help-block">Only Image File is applicable.</p>
                  
                  <?php if($row->NewsImage) { ?>
                    <img src="<?=base_url("cmsimage/".$row->NewsImage)?>" width="250"/></br><a href="<?=base_url("functions/delnewsimage/".$this->uri->segment('3'))?>"><button class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Delete</button></a>
                    <?php } ?>
                </div>

               
                <!-- checkbox -->
                <div class="form-group">
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" value="Y" id="NewsLive" name="NewsLive" <?=($row->NewsLive=="Y")?'checked="checked"':''?>>
                      Visible
                    </label>
                  </div>
                </div>
                
                <div class="form-group">
                  <label>Date</label>
                  <input type="text" name="NewsDate"  class="form-control" placeholder="Enter Date" value="<?=$row->NewsDate?>">
                </div>
                
                <div class="form-group">
                  <label>Page Title</label>
                  <textarea class="form-control" name="PageTitle" id="PageTitle" rows="5" cols="80" placeholder="Enter Page Title"><?=$row->PageTitle?></textarea>
                </div>
                
                <div class="form-group">
                  <label>Page Description</label>
                  <textarea class="form-control" name="PageDescription" id="PageDescription" rows="5" cols="80" placeholder="Enter Page description"><?=$row->PageKeywords?></textarea>
                </div>
                
                <div class="form-group">
                  <label>Page Keywords</label>
                  <textarea class="form-control" name="PageKeywords" id="PageKeywords" rows="5" cols="80" placeholder="Enter Keywords"><?=$row->PageDescription?></textarea>
                </div>
                
              <div class="box-footer">
                <button type="submit" class="btn btn-info ">Save News</button>
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