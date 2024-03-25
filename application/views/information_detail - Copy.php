<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<title><?=$c_information_detail["information_title"]?></title>
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
<h1 class="title"><?=$c_information_detail["information_title"]?></h1>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
<ol class="breadcrumb">
<li><a href="<?=base_url()?>"><span class="fa fa-home"></span>Home</a></li>
<li><?=$c_information_detail["information_title"]?></li>
</ol>
</div>

</div>
</div>
</div>





<div class="contain-details">
<div class="container">
<div class="row">

<div class="col-md-8 col-sm-8 col-xs-12">
<?php if($c_information_detail["image"]){?>
<img alt="" src="<?=base_url('cmsimage/'.$c_information_detail["image"])?>" class="img-responsive">
<?php } ?>
<?=$c_information_detail["information_description"]?>

<?php 
if ($query_info_news->num_rows() > 0)
{
   foreach ($query_info_news->result() as $rowin)
   {
	   ?>
<div class="blog-listing">
<h3><a href="<?=base_url("news/".$rowin->NewsID)?>"><?=$rowin->NewsName?></a></h3>
<?php if($rowin->NewsImage){ ?>
<img src="<?=base_url('cmsimage/'.$rowin->NewsImage)?>" alt="" title="" width="180" height="150">
<?php } ?>
<?=$rowin->NewsShortDesc?>
<div class="clearfix"></div>
<h5><a href="<?=base_url("news/".$rowin->NewsID)?>" class="btn btn-danger">View Details</a></h5>
</div>
<?php } 
} 
?>


<!-- Gallery Start -->
<?php 
if ($information_gallery->num_rows() > 0)
{
	?>
<div class="media-album-part">
<div class="row">
    <?php
foreach($information_gallery->result() as $KIGList) {
$CI =& get_instance();
$CI->load->model('Gallery_model');
$main_image=$CI->Gallery_model->gallery_mainimage($KIGList->GalleryId);
?>
<div class="col-md-6 col-sm-12 col-xs-12">
<div class="media-album">
<ul>
<li><a href="<?=base_url("gallery/".$KIGList->GalleryId)?>"><img src="<?=base_url("gallery/".$main_image)?>" width="211" height="150"></a></li>
<li><p><?=$KIGList->Gallery?></p></li>
</ul>
</div>
</div>

<!--end of gallery_album_box-->
<?php } ?>
</div>
</div>
<?php } ?>



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

<img height="150" title="" alt="" src="<?=base_url()?>image.php/<?=$KLNList->NewsName?>.jpg?width=150&amp;height=150&amp;cropratio=150:150&amp;image=<?=base_url('cmsimage/'.$KLNList->NewsImage)?>">

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

<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins.js"></script>
<script src="js/custom.js"></script>
</body>
</html>