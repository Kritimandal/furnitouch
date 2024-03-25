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
                        Partner Management
                        <a href="<?=base_url()?>functions/add_partner" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Add Parner</a>
                           
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
                            <div id="contentLeft">
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
                                   
                                    foreach($query as $rows)
                                    {
                                    $grade=($grade=="odd")?"even":"odd";
                                    ?>
                                        <tr class="<?=$grade?> gradeA" id="<?='recordsArray_'.$rows->PartnerID?>">
                                            <td><?=++$cnt?>.</td>
                                            <td><?=$rows->PartnerName?></td>
                                            <td>
											<?php                                            
                                            if($rows->Category)
                                            {
                                            $CI =& get_instance();
                                            $CI->load->model('category_model');
                                            $result = $CI->information_model->information_title($rows->parent_information);				 
                                            echo $result;
                                            }
                                            else
                                            {
                                            echo "Parent";
                                            }
                                            ?>
                 </td>
                                            <td class="center"><?=($rows->PartnerLive=="Y")?"Visible":"Invisible"?></td>
                                            <td class="center">
                                            <a href="<?=base_url()?>functions/edit_partner/<?=$rows->PartnerID?>">
                                            <button class="btn btn-primary btn-sm"><i class="fa fa-edit "></i> Edit</button>
                                            </a>
                                            <a  onmousedown='javascript:dlt(this)' href="<?=base_url()?>functions/dlt_partner/<?=$rows->PartnerID?>" onclick="return confirm('Are you sure you want to delete this item?');">
											<button class="btn btn-danger btn-sm"><i class="fa fa-pencil"></i> Delete</button>
                                            </a>
                                            </td>
                                        </tr>
									<?php
                                    }
                                  
                                    ?>
                                       
                                    </tbody>
                                </table>
                                </div>
                                <div id="contentRight"></div>
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
<script type="text/javascript" src="<?=base_url('js/jquery-1.3.2.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/jquery-ui-1.7.1.custom.min.js')?>"></script>
<script type="text/javascript">
$(document).ready(function(){ 
						   
	$(function() {
		$("#contentLeft tbody").sortable({ opacity: 0.6, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&action=updateRecordsListings'; 
			$.post("<?=base_url("admin/update_partnerorder")?>", order, function(theResponse){
				$("#contentRight").html(theResponse);
			}); 															 
		}								  
		});
	});

});	   
</script>
</body>
</html>