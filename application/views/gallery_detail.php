<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Grace Foundation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/import.css")?>">
<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/lightbox.css")?>">
</head>










<body>


<?php include("includes/header.php")?>
<?php include("includes/nav.php")?>

<div class="page-title">
<div class="container">
<div class="row">

<div class="col-md-6 col-sm-6 col-xs-12">
<h1 class="title">Photo Gallery</h1>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">
<ol class="breadcrumb">
<li><a href="<?=base_url()?>"><span class="fa fa-home"></span>Home</a></li>
<li>Photo Gallery</li>
</ol>
</div>

</div>
</div>
</div>






<div class="contain-details">
<div class="container">
<div class="row">

<div class="col-md-12 col-sm-12 col-xs-12">
<div class="gallery-details">
<div class="row">
<?php foreach($gallery_image->result() as $KGIList){ ?>
<div class="col-md-3 col-sm-6 col-xs-12">
<div class="gallery-box">
<a href='<?=base_url("gallery/".$KGIList->image)?>' 
data-lightbox='image-1'
class='' 
data-fresco-group='' 
data-fresco-caption="">
<img src='<?=base_url()?>image.php/<?=$KGIList->caption?>.jpg?width=450&amp;height=350&amp;cropratio=450:350&amp;image=<?=base_url("gallery/".$KGIList->image)?>" alt="<?=$KGIList->caption?>" title="<?=$KGIList->caption?>' alt="" title=""/></a>
</div>
</div>
<?php } ?>

</div>
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
<script src="<?=base_url("assets/js/lightbox.min.js")?>"></script>
</body>
</html>