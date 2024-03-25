
<div class="social-area">
<div class="container">
<ul>
<?php
foreach($query_socials->result() as $KSList) { ?>
<li><a href="<?=$KSList->Social_link?>" target="_blank"><img src="<?=base_url('cmsimage/'.$KSList->SocialImage)?>" class="sociallinks" alt="<?=$KSList->SocialName?>" title="<?=$KSList->SocialName?>"></a></li>
<?php } ?>
</ul>
</div>
</div>
