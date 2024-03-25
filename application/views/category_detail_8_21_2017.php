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

<div class="col-md-6 col-sm-6 col-xs-12">
<h1 class="title ptitle"><?=$c_category_detail['CategoryName']?></h1>
</div>

<div class="col-md-6 col-sm-6 col-xs-12" style="padding-top:5px;">
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

<?php

 if($c_category_detail['CMS']=='Y'){ ?>
<div class="row clearfix">

<div class="col-md-9 col-sm-7 col-xs-12">

<?=$c_category_detail['Description']?>

</div>



<div class="col-md-3 col-sm-5 col-xs-12">
<aside class="sidebar">

<div class="sidebar-widget category-widget">
<h2>Our Services</h2>
<ul>
<?php foreach($query_service_category->result() as $KQSCList){ ?>
<li><a href="<?=base_url('category/'.$KQSCList->clean_url)?>"><?=$KQSCList->CategoryName?></a></li>
<?php } ?>
</ul>
</div>

</aside>
</div>

</div>
<?php } else { ?>
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
<?php if(count($products_in_categories)>0){
foreach($products_in_categories as $KCAPList) { ?>
<div class="col-md-6 col-sm-6 col-xs-12"> 
<a href="<?=base_url("product/".$KCAPList["ProductSlug"])?>" 
class="work-effect" 
data-fresco-group="" 
data-title="Product Name Here" 
data-fresco-caption=""> 
<img src="<?=base_url()?>image.php/<?=$KCAPList['ProductSlug']?>.jpg?width=350&amp;height=300&amp;image=<?=base_url("cmsimage/".$KCAPList["ProductImage"])?>" alt="<?=$KCAPList['PrductName']?>" class="work-gallery-img"/>
<span class="work-overlay"></span> 
<span class="product-gallery-part-text"><?=$KCAPList['PrductName']?>
<br><small style="line-height:40px;"><?=$KCAPList['ModelNo']?></small>
</span> 
</a>
<p><?=$KCAPList['PrductName']?><br /><?=$KCAPList['ModelNo']?></p> 
</div>
<?php }} else {
	foreach($childcategories as $KCList) { ?>
<div class="col-md-6 col-sm-6 col-xs-12"> 
<a href="<?=base_url("category/".$KCList["clean_url"])?>" 
class="work-effect" 
data-fresco-group="" 
data-title="Product Name Here" 
data-fresco-caption=""> 
<img src="<?=base_url()?>image.php/<?=$KCList['clean_url']?>.jpg?width=350&amp;height=300&amp;image=<?=base_url("cmsimage/".$KCList["CategoryImage"])?>" alt="<?=$KCList['CategoryName']?>" class="work-gallery-img"/>
<span class="work-overlay"></span> 
<span class="product-gallery-part-text"><?=$KCList["CategoryName"]?>
</span> 
</a>
<p><?=$KCList["CategoryName"]?></p> 
</div>
<?php }} ?>
</div>
</div>
</div>

</div>

</div>
<?php } ?>
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