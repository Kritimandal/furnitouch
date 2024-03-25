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
                        Category Management
                        <a href="<?=base_url()?>functions/add_category" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Category</a>
                           
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
                                            <th>Category</th>
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
                                            <td><?=$rows->CategoryName?></td>
                                            <td>
											<?php                                            
                                            if($rows->ParentCategory)
                                            {
                                            $CI =& get_instance();
                                            $CI->load->model('category_model');
                                            $result = $CI->category_model->get_CategoryName($rows->ParentCategory);			 
                                            echo $result;
                                            }
                                            else
                                            {
                                            echo "Parent";
                                            }
                                            ?>
                 </td>
                                            <td class="center"><?=($rows->Visible=="Y")?"Visible":"Invisible"?></td>
                                            <td class="center">
                                            <a href="<?=base_url()?>functions/edit_category/<?=$rows->CategoryID?>">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit "></i> Edit</button>
                                            </a>
                                            <a  onmousedown='javascript:dlt(this)' href="<?=base_url()?>functions/dlt_category/<?=$rows->CategoryID?>" onclick="return confirm('Are you sure you want to delete this item?');">
											<button class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Delete</button>
                                            </a>
                                            </td>
                                        </tr>
									<?php
                                    }}                                   
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