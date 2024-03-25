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

<div class="col-md-6 col-sm-6 col-xs-12">
<h1 class="title">Our Programmes</h1>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
<ol class="breadcrumb">
<li><a href="<?=base_url()?>"><span class="fa fa-home"></span>Home</a></li>
<li>Our Programmes</li>
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
<?php
foreach($query_latest_programme->result() as $KLPList) { ?>
<div class="blog-listing">
<h3><?=$KLPList->ProgrammeName?></h3>
<h5 class="time">Publish On: <?=date("D, M j, Y",strtotime($KLPList->ProgrammeDate))?></h5>
<img src="<?=base_url("cmsimage/".$KLPList->ProgrammeImage)?>" alt="<?=$KLPList->ProgrammeName?>" title="">
<?=$KLPList->ProgrammeShortDesc?>
<h6><a href="<?=base_url("programme/".$KLPList->ProgrammeID)?>">read more</a></h6>
</div>
<?php } ?>

</div>
</div>






<div class="col-md-3 col-sm-4 col-xs-12">
<div class="contain-details-right">




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