<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title><?=$brand_detail['PartnerName']?></title>
<link rel="stylesheet" href="<?=base_url("assets/css/import.css")?>" type="text/css">
</head>

<body>

 	
 	

<?php include("includes/header.php")?>







    
  
<div class="page-title">
<div class="container">
<div class="row">

<div class="col-md-8 col-sm-6 col-xs-12">
<h1 class="title ptitle"><?=$brand_detail['PartnerName']?></h1>
</div>

<div class="col-md-4 col-sm-6 col-xs-12">
<ol class="breadcrumb">
<li><a href="<?=base_url()?>"><span class="fa fa-home"></span>Home</a></li>
<li><?=$brand_detail['PartnerName']?></li>
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
<h2 class="producttitle">Our Brands</h2>
<div class="sidebar-widget tabbed-links">
<ul class="tabbed-nav">
<?php foreach($query_partners->result() as $KPList) { ?>
<li><a href="<?=base_url("brand/".$KPList->PartnerSlug)?>" <?=($KPList->PartnerSlug==$this->uri->segment(2))?'class="current"':''?>><?=$KPList->PartnerName?></a></li>
<?php } ?>
</ul>
</div>
</div>

</aside>
</div>

<div class="col-md-8 col-sm-7 col-xs-12">

<div class="product-gallery-part">
<div class="work-showcase">
<div class="row">

<?php foreach($products_in_brands as $KBAPList) { ?>
<div class="col-md-6 col-sm-6 col-xs-12"> 
<a href="<?=base_url("product/".$KBAPList["ProductSlug"])?>" 
class="work-effect" 
data-fresco-group="" 
data-title="Product Name Here" 
data-fresco-caption=""> 
<img class="work-gallery-img" src="<?=base_url("cmsimage/".$KBAPList["ProductImage"])?>" alt=""> 
<span class="work-overlay"></span> 
<span class="product-gallery-part-text"><?=$KBAPList['PrductName']?></span> 
</a>
<p><?=$KBAPList['PrductName']?></p> 
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