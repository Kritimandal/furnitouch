

<section class="main-slider" data-start-height="500" data-slide-overlay="yes">

<div class="tp-banner-container">
<div class="tp-banner">
<ul>

<?php 
$count=0;
foreach($query_slider->result() as $rowbanner){
?>
<li data-transition="fade" data-slotamount="1" data-masterspeed="1000" data-thumb="<?=base_url("cmsimage/".$rowbanner->slider_image)?>"  data-saveperformance="off"  data-title="">
<img src="./image.php?width=1600&height=500&cropratio=1600:500&image=<?=base_url("cmsimage/".$rowbanner->slider_image)?>" alt="<?=$rowbanner->title?>" title=""/>
</li>
<?php 
} 
?>

</ul>
</div>
</div>
</section>
