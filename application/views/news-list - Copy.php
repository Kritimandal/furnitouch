<!DOCTYPE HTML>
<html lang = "en">
<head>
<title>Community Information Network </title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="description" content="" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link type="text/css" rel="stylesheet" href="<?=base_url("assets/css/import.css")?>" />
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
</head>





<body>




<?php include("includes/header-nav.php")?>






<div class="contain-details">
<div class="container">
<div class="row">
<div class="col-md-9">
<h1 class="title" style="font-weight:normal; font-size:15px !important;"><span> समाचारहरु </span></h1>


<div class="contain-details-left" style="margin-top:30px;">


<div class="content-panel-body article-list">
<?php
$CI =& get_instance();
$CI->load->model('news_model');

 foreach($query as $cat_news) {
	 $mimage=$CI->news_model->news_mainimage($cat_news->NewsID);
	  ?>
<div class="item">
<div class="row">
<?php if($mimage) { ?>
<div class="col-md-4 col-sm-4">
<img src="<?=base_url("news/".$mimage)?>" alt="" title="" />
</div><!--col-md-4-->
<?php } ?>


<div class="col-md-8 col-sm-8 item-content">
<h3><a href="#"><?=$cat_news->NewsName?></a></h3>
<span class="item-meta"><i class="fa fa-clock-o"></i> March 30, 2015</span>

<p>
<?=$cat_news->NewsShortDesc?>
</p>

<a href="<?=base_url("news/".$cat_news->NewsID)?>" class="read-more-button">पुरा समाचार <i class="fa fa-mail-forward"></i></a>
</div><!--row-->
</div><!--item-content-->
</div><!--item-->
<?php } ?>

<div class="clearfix"></div>
</div><!--content-panel-body-->






<div class="content-panel-body pagination">
<?php echo $this->pagination->create_links();?><!--
<a class="prev page-numbers" href="#"><i class="fa fa-angle-left"></i>Previous</a>
<a class="page-numbers" href="#">1</a>
<span class="page-numbers current">2</span>
<a class="page-numbers" href="#">3</a>
<a class="page-numbers" href="#">4</a>
<a class="page-numbers" href="#">5</a>
<a class="next page-numbers" href="#">Next<i class="fa fa-angle-right"></i></a>-->
</div>



</div><!--end of contain-details-left-->
</div><!--col-md-9-->




<?php include("includes/contain-details-right.php")?>




</div><!--row-->
</div><!--container-->
</div><!--end of contain-details-->
<div class="clearfix"></div>





<?php include("includes/footer.php")?>

<?php include("includes/js.php")?>


</body>
</html>