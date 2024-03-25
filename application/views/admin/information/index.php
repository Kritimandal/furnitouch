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
                        Information Management
                        <a href="<?=base_url()?>functions/add_information" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Information</a>
                           
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
                                            <th>Parent Name</th>
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
                                    $grade=($grade=="odd")?"even":"odd";
                                    ?>
                                        <tr class="<?=$grade?> gradeA">
                                            <td><?=++$cnt?>.</td>
                                            <td><?=$rows->information_name?></td>
                                            <td>
											<?php                                            
                                            if($rows->parentInfo)
                                            {
                                            $CI =& get_instance();
                                            $CI->load->model('information_model');
                                            $result = $CI->information_model->information_title($rows->parentInfo);				 
                                            echo $result;
                                            }
                                            else
                                            {
                                            echo "Parent";
                                            }
                                            ?>
                 </td>
                                            <td class="center"><?=($rows->visible=="Y")?"Visible":"Invisible"?></td>
                                            <td class="center">
                                            <a href="<?=base_url()?>functions/edit_information/<?=$rows->information_id?>">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit "></i> Edit</button>
                                            </a>
                                            <a  onmousedown='javascript:dlt(this)' href="<?=base_url()?>functions/dlt_information/<?=$rows->information_id?>" onclick="return confirm('Are you sure you want to delete this item?');">
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