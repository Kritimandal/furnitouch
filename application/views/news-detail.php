<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Grace Foundation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/import.css")?>">
</head>

<body>
<?php include("includes/header.php")?>
<?php include("includes/nav.php")?>

<div class="page-title">
<div class="container">
<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<p class="title"><?=$news_detail["NewsName"]?></p>
<h6 class="time">Publish On: <?=$news_detail["NewsDate"]?></h6>

</div>

</div>
</div>
</div>








<div class="contain-details">
<div class="container">
<div class="row">

<div class="col-md-9 col-sm-8 col-xs-12">
<div class="contain-details-left">
<?php if($news_detail["NewsImage"]){?>
<img src="<?=base_url("cmsimage/".$news_detail["NewsImage"])?>" class="img-responsive innerimg" alt="<?=$news_detail["NewsName"]?>" title="">
<?php } ?>

<?=$news_detail["NewsLongDesc"]?>

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