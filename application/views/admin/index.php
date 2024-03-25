<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?=SITETITLE?></title>
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
<h1 class="page-header">Information <small>management</small></h1>



<div class="contain-details">



</div><!--contain-details-->






<footer>
<p>All right reserved. Developed by: <a href="#"><?=SITETITLE?></a></p>
</footer>
</div>
</div>
</div>




<script src="<?=base_url("admin-assets/js/jquery-1.10.2.js")?>"></script>
<script src="<?=base_url("admin-assets/js/bootstrap.min.js")?>"></script>
<script src="<?=base_url("admin-assets/js/jquery.metisMenu.js")?>"></script>

<!-- DATA TABLE SCRIPTS -->
<script src="<?=base_url("admin-assets/js/dataTables/jquery.dataTables.js")?>"></script>
<script src="<?=base_url("admin-assets/js/dataTables/dataTables.bootstrap.js")?>"></script>
<script>
	$(document).ready(function () {
		$('#dataTables-example').dataTable();
	});
</script>
<script src="<?=base_url("admin-assets/js/custom-scripts.js")?>"></script>
</body>
</html>