<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title>Furni Touch</title>
<link rel="stylesheet" href="<?=base_url("assets/css/import.css")?>" type="text/css">
</head>

<body> 	

<?php include("includes/header.php")?>    
  
<div class="page-title">
<div class="container">
<div class="row">

<div class="col-md-8 col-sm-6 col-xs-12">
<h1 class="title ptitle"><?=$c_category_detail['CategoryName']?></h1>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
<ol class="breadcrumb">
<li><a href="<?=base_url()?>"><span class="fa fa-home"></span>Home</a></li>
<?php foreach(array_reverse($parents) as $KCPList){ ?>
<li><a href="<?=base_url('category/'.$KCPList['clean_url'])?>"><?=$KCPList['CategoryName']?></a></li>
<?php } ?>

</ol>
</div>

</div>
</div>
</div>

    
 
<div class="wrapper">
<div class="container">
<div class="row clearfix">

<div class="col-md-4 col-sm-5 col-xs-12">
<aside class="sidebar">

<div class="product-cata-list">
<h2 class="producttitle">Categories</h2>
<div class="sidebar-widget tabbed-links">
<?php if(count($childcategories)>0) { ?>
<ul class="tabbed-nav">
<?php foreach($childcategories as $KCList) { ?>
<li><a href="<?=base_url("category/".$KCList["clean_url"])?>"><?=$KCList["CategoryName"]?></a></li>
<?php } ?>
</ul>
<?php } ?>
</div>
</div>

</aside>
</div>

<div class="col-md-8 col-sm-7 col-xs-12">

<div class="product-gallery-part">
<div class="work-showcase">
<div class="row">
<?php foreach($products_in_categories as $KCAPList) { ?>
<div class="col-md-6 col-sm-6 col-xs-12"> 
<a href="<?=base_url("product/".$KCAPList["ProductSlug"])?>" 
class="work-effect" 
data-fresco-group="" 
data-title="Product Name Here" 
data-fresco-caption=""> 
<img class="work-gallery-img" src="<?=base_url("cmsimage/".$KCAPList["ProductImage"])?>" alt=""> 
<span class="work-overlay"></span> 
<span class="product-gallery-part-text"><?=$KCAPList['PrductName']?></span> 
</a>
<p><?=$KCAPList['PrductName']?></p> 
</div>
<?php } ?>

</div>
</div>
</div>

</div>

</div>
</div>
</div>





    
    
    
    
    




    

<footer class="main-footer">

<?php include("includes/top-footer.php")?>

<?php include("includes/bottom-footer.php")?>

</footer>
    

    
    
    
    

<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>




<script src="<?=base_url("assets/js/jquery.js")?>"></script> 
<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
<script src="<?=base_url("assets/js/script.js")?>"></script>
</body>
</html>