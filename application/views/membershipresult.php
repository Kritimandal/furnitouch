<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title>Membership </title>
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

<p>
<?php if($this->uri->segment(3)=="success"){?>
<span>Your information sent!!!</span>
<?php } else {?>
<p>Your information can not sent!!!</p>
<?php }?>
</p>

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