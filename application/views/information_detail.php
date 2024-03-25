<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?=$c_information_detail["information_title"]?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/import.css")?>">
</head>



<body>
<?php include("includes/header.php")?>
<?php include("includes/nav.php")?>

<div class="page-title">
<div class="container">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">
<h1 class="title"><?=$c_information_detail["information_title"]?></h1>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
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

<div class="col-md-9 col-sm-8 col-xs-12">
<div class="contain-details-left">
<?php if($c_information_detail["image"]){?>
<img alt="" src="<?=base_url('cmsimage/'.$c_information_detail["image"])?>" class="img-responsive">
<?php } ?>
<?=$c_information_detail["information_description"]?>



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

<!-- this is for news listing-->


<?php 
if ($query_info_news->num_rows() > 0)
{?>
<div class="col-md-9 col-sm-8 col-xs-12">
<div class="contain-details-left">
<?php
   foreach ($query_info_news->result() as $rowin)
   {
	   ?>
<div class="blog-listing">
<h3><?=$rowin->NewsName?></h3>
<h5 class="time">Publish On: <?=$rowin->NewsDate?></h5>
<?php if($rowin->NewsImage){ ?>
<img src="<?=base_url('cmsimage/'.$rowin->NewsImage)?>" alt="" title="" width="180" height="150">
<?php } ?>

<?=$rowin->NewsShortDesc?>
<h6><a href="<?=base_url("news/".$rowin->NewsID)?>">read more</a></h6>
</div>

<?php } ?>
</div>
</div>
<?php
} 
?>




<!-- End of news listing -->
</div>
</div>






<div class="col-md-3 col-sm-4 col-xs-12">
<div class="contain-details-right">

<div class="inner-page-link">
<h3>Our Programs</h3>
<ul>
<?php
foreach($query_latest_programme->result() as $KLPList) { ?>
<li><a href="<?=base_url("programme/".$KLPList->ProgrammeID)?>"><?=$KLPList->ProgrammeName?></a></li>
<?php } ?>
</ul>
</div>
<div class="clearfix"></div>

<?php include("includes/innerpage-listing-update.php")?>

</div>
</div>

</div>
</div>
</div>


<?php include("includes/social-link.php")?>
<?php include("includes/footer.php")?>


<script src="<?=base_url("assets/js/jquery-1.11.1.min.js")?>"></script>
<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
<script src="<?=base_url("assets/js/custom.js")?>"></script>
<script src="<?=base_url("assets/js/plugins.js")?>"></script>
<script src="<?=base_url("assets/js/menujs.js")?>"></script>
</body>
</html>