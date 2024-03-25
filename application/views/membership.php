<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Membership</title>
<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/import.css")?>"/>
</head>

<body>

<?php include("includes/header.php")?>
<?php include("includes/nav.php")?>
<div class="clearfix"></div>

<div class="page-title">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-6 col-xs-12">
<h1 class="title">Membership</h1>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
<ol class="breadcrumb">
<li><a href="<?=base_url()?>"><span class="fa fa-home"></span>Home</a></li>
<li>Membership</li>
</ol>
</div>
</div>
</div>
</div>


<div class="contain-details">
<div class="container">
<div class="row">
<div class="col-md-8 col-sm-8 col-xs-12">

<form name="frmdonation" id="frmdonation" action="<?php echo base_url("membership/sendmembership")?>" method="post" enctype="multipart/form-data">
<div class="form-area">


<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Full Name :  </label>
<input class="form-control" type="text" name="fullname" id="fullname" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Email :  </label>
<input class="form-control" type="text" name="email" id="email" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Permanent Address :  </label>
<input class="form-control" type="text" name="address" id="address" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Zone :  </label>
<input class="form-control" type="text" name="zone" id="zone" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>District :  </label>
<input class="form-control" type="text" name="district" id="district" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>VDC/Municipality :  </label>
<input class="form-control" type="text" name="VDCMunicipality" id="VDCMunicipality" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Date of Birth : </label>
<input class="form-control" type="text" name="dateofbirth" id="dateofbirth" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Citizen No : </label>
<input class="form-control" type="text" name="citizenshipno" id="citizenshipno" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Issue From : </label>
<input class="form-control" type="text" name="issuefrom" id="issuefrom" required>
</div>
</div>
</div>

<div class="form-group">
<div class="row">
<div class="col-md-6">
<label>Contact : </label>
<input class="form-control" type="text" name="contact" id="contact" required>
</div>
</div>
</div>



</div><!--form-area-->
<button type="submit" name="btnsendmembership" id="btnsendmembership" class="btn btn-primary contibtn">Submit</button>
</form>
</div>

<div class="col-md-4 col-sm-4 col-xs-12">
<div class="contain-details-right">
<h2 class="title"><span>News and Events</span></h2>
<?php
foreach($query_latest_news->result() as $KLNList) { ?>
<div class="blog-contain">
<h4><?=$KLNList->NewsName?></h4>
<h5 class="time">Published on: <?=$KLNList->NewsDate?> </h5>
<?php if($KLNList->NewsImage){?>
<img height="150" title="" alt="" src="<?=base_url('cmsimage/'.$KLNList->NewsImage)?>">
<?php } ?>
<?=$KLNList->NewsShortDesc?>
<a href="<?=base_url("news/".$KLNList->NewsID)?>" class="readmore"><i class="fa fa-angle-double-right"></i> read more</a>
<div class="clearfix"></div>
</div>
<hr>
<?php } ?>

</div><!--contain-details-right-->
</div>


</div>
</div>
</div><!--end of contain-details-->

<?php include("includes/footer-top.php")?>
<?php include("includes/footer.php")?>

<script src="<?php base_url('assets/js/jquery.js')?>"></script>
<script src="<?php base_url('assets/js/bootstrap.min.js')?>"></script>
<script src="<?php base_url('assets/js/plugins.js')?>"></script>
<script src="<?php base_url('assets/js/custom.js')?>"></script>
</body>
</html>