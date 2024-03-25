<div class="recent-updates">
<h2 class="title"><i class="fa fa-newspaper-o" aria-hidden="true"></i>&nbsp; News and Events</h2>

<div class="blog-listing">
<ul>
<?php 
foreach($query_latest_news->result() as $KLNList){ ?>
<li><a href="<?=base_url("news/".$KLNList->NewsID)?>"><?=$KLNList->NewsName?><br> 
<span><?=date("D, M j, Y",strtotime($KLNList->NewsDate))?></span></a></li>
<?php } ?>

</ul>
</div>

</div>