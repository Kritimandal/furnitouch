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
                        Slider Management
                        <a href="<?=base_url()?>functions/addslider" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Slider</a>
                           
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
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                            <th>Name</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
									<?php
                                    $cnt=0;
									$grade="odd";
                                    if($query->num_rows() >0){
                                    foreach($query->result() as $rows)
                                    {
										if($rows->state==0)
										{
										$state="Invisible";
										//$text="(currently hide)";
										$state_id="1";
										}
										else
										{
										$state="Visible";
										//$text="(currently show)";
										$state_id="0";
										}
                                    $grade=($grade=="odd")?"even":"odd";
                                    ?>
                                        <tr class="<?=$grade?> gradeA">
                                            <td><?=++$cnt?>.</td>
                                            <td><?=$rows->title?></td>
                                            <td>
											<img src='<?=base_url()?>image.php?width=80&height=80&cropratio=1:1&image=<?=base_url("cmsimage/".$rows->slider_image)?>'></td>
                                            <td class="center"><a href='<?=base_url()?>functions/change_state/slider/<?=$rows->Id?>/<?=$state_id?>'><?=$state?></a></td>
                                            <td class="center">
                                           <a href='<?=base_url()?>functions/sliderEdit/<?=$rows->Id?>' title="Edit" >
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit "></i> Edit</button>
                                            </a>
                                            <a onmousedown='javascript:dlt(this)' href='<?=base_url()?>functions/deleteslider/<?=$rows->Id?>' title="Delete" onclick="return confirm('Are you sure you want to delete this item?');" >
											<button class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Delete</button>
                                            </a>
                                            </td>
                                        </tr>
									<?php
                                    }}
                                    else
                                    {
                                    ?>
                                        <tr class="even gradeC">
                                            <td colspan="5">No Information(s) Available</td>
                                        </tr>
										<?php
                                        }
                                        ?>
                                        
                                    </tbody>
                                </table>
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