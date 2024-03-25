<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<title><?=$product_detail['PrductName']?> - <?=$product_detail['ModelNo']?></title>
<link rel="stylesheet" href="<?=base_url("assets/css/import.css")?>" type="text/css">
<link rel="stylesheet" type="text/css" href="<?=base_url("assets/css/lightbox.css")?>">
</head>

<body>
 	

<?php include("includes/header.php")?>
    
  
<div class="page-title">
<div class="container">
<div class="row">

<div class="col-md-4 col-sm-6 col-xs-12">
<h1 class="title ptitle"><?=$product_detail['PrductName']?></h1>
</div>

<div class="col-md-8 col-sm-6 col-xs-12">
<ol class="breadcrumb">
<li><a href="<?=base_url()?>"><span class="fa fa-home"></span>Home</a></li>
<?php foreach(array_reverse($parents) as $KCPList){ ?>
<li><a href="<?=base_url('category/'.$KCPList['clean_url'])?>"><?=$KCPList['CategoryName']?></a></li>
<?php } ?>
<li><a href="#"><?=$product_detail['ModelNo']?></a></li>
</ol>
</div>

</div>
</div>
</div>





    
 
<div class="wrapper">
<div class="container">
<div class="row clearfix gallery-details">


<div class="col-md-6 col-sm-7 col-xs-12">

<div class="product-image">
<a href='<?=base_url("cmsimage/".$product_detail['ProductImage'])?>' 
data-lightbox='image-1'
class='' 
data-fresco-group='' 
data-title="<?=$product_detail['PrductName']?> - <?=$product_detail['ModelNo']?>"
data-fresco-caption="">
<img src='<?=base_url("cmsimage/".$product_detail['ProductImage'])?>' alt="" title=""/></a>
</div>
<?php 

if(count($productimages) > 1) { ?>
<div class="product-thumb">
<ul>
<?php foreach($productimages as $KPIList) { ?>
<li><a href='<?=base_url("gallery/".$KPIList["image"])?>' 
data-lightbox='image-1'
class='' 
data-fresco-group='' 
data-title="<?=$product_detail['PrductName']?> - <?=$product_detail['ModelNo']?>"
data-fresco-caption="">
<img src='<?=base_url("gallery/".$KPIList["image"])?>' alt="" title=""/></a></li>
<?php } ?>

</ul>
</div>
<?php } ?>

</div>



<div class="col-md-6 col-sm-5 col-xs-12">

<div class="details">
<h3 class="product-title"><?=$product_detail['PrductName']?></h3>


<table class="product-specification">

<tr>
<td width="110"><span>Model No :</span>  </td>
<td><?=$product_detail['ModelNo']?></td>
</tr>

<tr>
<td><span>Material : </span> </td>
<td> <?=$product_detail['Material']?></td>
</tr>

<tr>
<td><span>Colour : </span> </td>
<td><?=$product_detail['Colour']?></td>
</tr>

<tr>
<td><span>Size : </span> </td>
<td><?=$product_detail['Size']?></td>
</tr>

<tr>
<td><span>Stock : </span> </td>
<td><?=($product_detail['Stock']=="Y")?'Available':'Not Available'?></td>
</tr>


<tr>
<td><span>Latest : </span> </td>
<td><?=($product_detail['Latest']=="Y")?'Yes':'No'?></td>
</tr>


</table>

<p class="product-description">
<?php if($product_detail['ProductLongDesc']){?>
<?php echo $product_detail['ProductLongDesc'] ?>
<?php } ?>
</p>

<?php if($product_detail['Warranty']){?>
<p class="vote"><strong><?=$product_detail['Warranty']?></strong> Warranty</p>
<?php } ?>

<div class="action">
<button class="add-to-cart btn btn-default" type="button">Book Now</button>
</div>
</div>

</div>

</div>
</div>
</div>





    
<section class="product-gallery-part related-product">
<div class="container">
<div class="title">
<h2>Related Product</h2>
<span class="underline full-underline"></span>
</div>


<div class="work-showcase">
<div class="row">
<?php foreach($related_product->result() as $KFPList){ ?>
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
</a> 
</div>
<?php } ?>


</div>
</div>



</div>
</section> 
    
    
    




    

<footer class="main-footer">

<?php include("includes/top-footer.php")?>

<?php include("includes/bottom-footer.php")?>

</footer>
    

    
    
    
    

<div class="scroll-to-top scroll-to-target" data-target=".main-header"><span class="icon fa fa-long-arrow-up"></span></div>




<script src="<?=base_url("assets/js/jquery.js")?>"></script> 
<script src="<?=base_url("assets/js/bootstrap.min.js")?>"></script>
<script type="text/javascript" src="<?=base_url("assets/js/lightbox.min.js")?>"></script>  
<script src="<?=base_url("assets/js/script.js")?>"></script>







</body>
</html>