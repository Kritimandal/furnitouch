<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title><?=SITETITLE?></title>
<link rel="stylesheet" href="<?=base_url("assets/css/import.css")?>" type="text/css">
<link href="<?=base_url("assets/css/revolution-slider.css")?>" rel="stylesheet">
</head>

<body>
<?php include("includes/header.php")?>
<?php include("includes/banner.php")?>  
    
 
<section class="intro-section">
<div class="container">
<div class="row clearfix">

<div class="content-column col-md-12 col-sm-12 col-xs-12">
<div class="inner-box">
<h2 class="title"><?=$category_detail["CategoryName"]?></h2>
<?=$category_detail["Introduction"]?>
</div>


<div class="fact-counter">
<div class="row clearfix">

<div class="col-md-2"></div>

<div class="column col-md-3 col-sm-4 col-xs-12 counter-column wow fadeIn" data-wow-duration="0ms">
<div class="inner">
<div class="count-outer">
<div class="count-text" data-speed="2000" data-stop="14">0</div><span class="year">years</span>
</div>
<h4 class="counter-title">Expereince</h4>
</div>
</div>


<div class="column col-md-3 col-sm-4 col-xs-12 counter-column wow fadeIn" data-wow-duration="0ms">
<div class="inner">
<div class="count-outer">
<div class="count-text" data-speed="2000" data-stop="250">0</div><span class="year">+</span>
</div>
<h4 class="counter-title">Happy Client</h4>
</div>
</div>


<div class="column col-md-3 col-sm-4 col-xs-12 counter-column wow fadeIn" data-wow-duration="0ms">
<div class="inner">	
<div class="count-outer">
<div class="count-text" data-speed="4000" data-stop="40">0</div><span class="year">+</span>
</div>
<h4 class="counter-title">Product</h4>
</div>
</div>



</div>
</div>


</div>
</div>
</div>
</div>
</section>   
   
    
    
    
    
<section class="partner-section">
<div class="container">

<h2 class="minititle"><span>Associated with</span></h2>


<div class="inner-box">
<div class="four-item-carousel">
<?php foreach($query_partners->result() as $KPList) { ?>
<div class="partner-logo">
<a href="<?=base_url("brand/".$KPList->PartnerSlug)?>">
<img src="<?=base_url("cmsimage/".$KPList->PartnerImage)?>" alt="<?=$KPList->PartnerName?>">
</a>
</div>
<?php } ?>
</div>
</div>
</div>
</section>
    
    
    
    
    
    
    
<section class="product-gallery-part">
<div class="container">
<div class="title">
<h2>Feature Product</h2>
<span class="underline full-underline"></span>
</div>


<div class="work-showcase">
<div class="row">
<?php foreach($featured_product->result() as $KFPList){ ?>
<div class="col-md-4 col-sm-6 col-xs-12"> 
<a href="<?=base_url("product/".$KFPList->ProductSlug)?>" 
class="work-effect" 
data-fresco-group="" 
data-title="<?=$KFPList->PrductName?>" 
data-fresco-caption=""> 
<img src="<?=base_url()?>image.php/<?=$KFPList->ProductSlug?>.jpg?width=350&amp;height=300&amp;image=<?=base_url("cmsimage/".$KFPList->ProductImage)?>" alt="<?=$KFPList->PrductName?>" class="work-gallery-img"/>
<span class="work-overlay"></span> 
<span class="product-gallery-part-text"><?=$KFPList->PrductName?>
<br><small style="line-height:40px;"><?=$KFPList->ModelNo?></small>
</span> 
</a> 
</div>
<?php } ?>


</div>
</div>



</div>
</section>  
    
 
<section class="service-section">
<div class="container">

<div class="title">
<h2>Service What we Provide</h2>
<span class="underline full-underline"></span>
</div>

<div class="row clearfix">

<?php foreach($query_service_category->result() as $KQSCList){ ?>
<div class="service-block col-md-4 col-sm-6 col-xs-12">
<div class="inner-box">
<div class="icon-box"><i class="fa fa-hand-o-right" aria-hidden="true"></i></div>
<h3><a href="<?=base_url("category/".$KQSCList->clean_url)?>"><?=$KQSCList->CategoryName?></a></h3>
<div class="text"><?=substr($KQSCList->Introduction,0,90)?></div>
</div>
</div>
<?php } ?>

</div>

</div>
</section>
    
    


<section class="testimonial-section">
<div class="container">

<div class="title title-white">
<h2>Client View</h2>
<span class="underline full-underline"></span>
</div>

<div class="inner-box">
<div class="single-item-carousel">

<?php foreach($query_latest_testimonial->result() as $KLTList) { ?>
<div class="testimonial-block">
<div class="inner">
<div class="text"><?=$KLTList->testimonial?></div>
<div class="client-info">
<h4><?=$KLTList->testimonial_by?></h4>
<div class="designation"><?=$KLTList->testimonial_address?></div>
</div>
</div>
</div>
<?php } ?>

</div>
</div>
</div>
</section>  
  
<?php include("includes/bottom-info.php")?>    

<footer class="main-footer">

<?php include("includes/top-footer.php")?>
<?php include("includes/bottom-footer.php")?>

</footer>

<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>


<script src="<?=base_url("assets/js/jquery.js")?>"></script> 
<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
<script src="<?=base_url("assets/js/revolution.min.js")?>"></script>
<script src="<?=base_url("assets/js/jquery.fancybox.pack.js")?>"></script>
<script src="<?=base_url("assets/js/jquery.fancybox-media.js")?>"></script>
<script src="<?=base_url("assets/js/owl.js")?>"></script>
<script src="<?=base_url("assets/js/wow.js")?>"></script>
<script src="<?=base_url("assets/js/script.js")?>"></script>
</body>
</html>