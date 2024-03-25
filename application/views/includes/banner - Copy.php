<div class="container">

<div class="banner">
<div class="slider_container">
<div class="flexslider">
<ul class="slides">
<?php 
$count=0;
foreach($query_slider->result() as $rowbanner){
?>
<li>
<a href="<?=$rowbanner->slider_url?>"><img src="./image.php?width=1100&height=400&cropratio=1100:400&image=<?=base_url("cmsimage/".$rowbanner->slider_image)?>" alt="<?=$rowbanner->title?>" title=""/></a>
<div class="flex-caption">
<div class="caption_title_line">
<p><?=$rowbanner->caption?></p>
</div>
</div>
</li>
<?php 
} 
?>

</ul>
</div>
</div>
</div>


</div>
