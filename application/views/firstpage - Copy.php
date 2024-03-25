<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title><?=SITETITLE?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/import.css")?>">
<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/banner.css")?>">
</head>

<body>

<?php include("includes/header.php")?>
<?php include("includes/nav.php")?>
<?php include("includes/banner.php")?>

<div class="intro-text">
<div class="container">
<h1 class="title"><?=$information_detail["information_title"]?></h1>
<?=$information_detail["information_introduction"]?>
<h6><a href="<?=base_url("information/".$information_detail['clean_url'])?>" class="btn btn-danger"><i class="fa fa-angle-double-right" aria-hidden="true"></i> read more</a></h6>
</div>
</div>





<div class="middle-part">
<div class="container">
<div class="row">

<div class="col-md-8 col-sm-12 col-xs-12">
<h2>Latest Updates</h2>
<div class="line"></div>

<div class="row">
<?php 
foreach($query_latest_news->result() as $KLNList){ ?>
<div class="col-md-6 col-sm-6 col-xs-12">
<div class="post-block">
<div class="post-img">
<a href="#">

<img src="<?=base_url()?>image.php/<?=$KLNList->NewsName?>.jpg?width=345&amp;height=197&amp;cropratio=345:197&amp;image=<?=base_url("cmsimage/".$KLNList->NewsImage)?>" alt="<?=$KLNList->NewsName?>" class="img-responsive">

</a>
<div class="date-bg">
<div class="date"><?=date("j",strtotime($KLNList->NewsDate))?> </div>
<div class="month"><?=date("F",strtotime($KLNList->NewsDate))?></div>
<div class="year"><?=date("Y",strtotime($KLNList->NewsDate))?></div>
</div>
</div>

<div class="post-content">
<h2><a href="<?=base_url("news/".$KLNList->NewsID)?>"><?=$KLNList->NewsName?></a></h2>
<?=$KLNList->NewsShortDesc?>
<a href="<?=base_url("news/".$KLNList->NewsID)?>" class="btn btn-success">Read More</a> </div>
</div>
</div>
<?php } ?>
</div>
</div>

<div class="col-md-4 col-sm-12 col-xs-12">
<div class="blog-box">
<h2>Programs  &nbsp;&nbsp;<span><a href="#">View all</a></span></h2>
<div class="line"></div>

<div class="point-list">
<ul class="point">
<?php
foreach($query_latest_programme->result() as $KLPList) { ?>
<li><a href="<?=base_url("programme/".$KLPList->ProgrammeID)?>"><i class="fa fa-tasks" aria-hidden="true"></i>&nbsp; <?=$KLPList->ProgrammeName?></a></li>
<?php } ?>
</ul>

</div>

</div>
</div>



</div>
</div>
</div>

<?php include("includes/bottom-info.php")?>
<?php include("includes/social-link.php")?>
<?php include("includes/footer.php")?>




<script src="<?=base_url("assets/js/jquery-1.11.1.min.js")?>"></script>
<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>

<script src="<?=base_url("assets/js/custom.js")?>"></script>
<script src="<?=base_url("assets/js/plugins.js")?>"></script>
<script src="<?=base_url("assets/js/menujs.js")?>"></script>

    <!-- FlexSlider -->
    <script type="text/javascript" src="<?=base_url("assets/js/jquery.flexslider-min.js")?>"></script>
    <script type="text/javascript" charset="utf-8">
    var $ = jQuery.noConflict();
    $(window).load(function() {
    $('.flexslider').flexslider({
          animation: "fade"
    });
		

  });
</script>

</body>
</html>