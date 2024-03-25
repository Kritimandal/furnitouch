<footer class="footer">
<div class="container">
<div class="row">









<div class="col-md-4 col-sm-6 col-xs-12">
<div class="footer-widget facebook">
<h3 class="title">Grace on Facebook</h3>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page" data-href="https://www.facebook.com/gracewomenrehabnepal/?fref=nf" data-height="250" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/gracewomenrehabnepal/?fref=nf" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/gracewomenrehabnepal/?fref=nf">Grace Foundation Women&#039;s Rehabilitation Centre</a></blockquote></div>
</div>
</div>



<div class="col-md-4 col-sm-6 col-xs-12">
<div class="footer-widget contact-address">
<h3 class="title">Our Address</h3>
<p>
<span>Grace Foundation</span><br>
<i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp; Lalitpur, Nepal<br>
<i class="fa fa-phone" aria-hidden="true"></i>&nbsp;  01-6924387, 5132144<br>
<i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;  gracefoundationnepal@gmail.com
</p>      
</div>
</div>




<div class="col-md-4 col-sm-12 col-xs-12 video-blog">
<div class="footer-widget">
<?php
$CI =& get_instance();
$CI->load->library('Youtube');
?>
<h3 class="title">Documentary</h3>
<?php foreach($query_latest_video->result() as $KVList) {
	$CI->youtube->url=$KVList->vid_link
?>
<?=$CI->youtube->player("100%","215")?>
<?php } ?>
</div>
</div>






</div>
</div>
</footer>