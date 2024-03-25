<ul class="nav" id="main-menu">
<li><a <?=($this->uri->segment(2)=="category")?'class="active-menu"':''?> href="<?=base_url()?>admin/category"><i class="fa fa-info"></i>Category</a></li>
<li><a <?=($this->uri->segment(2)=="slider")?'class="active-menu"':''?> href="<?=base_url()?>admin/slider"><i class="fa fa-angle-double-right"></i>Banner</a></li>
<li><a <?=($this->uri->segment(2)=="partners")?'class="active-menu"':''?> href="<?=base_url()?>admin/partners"><i class="fa fa-angle-double-right"></i>Partners</a></li>
<li><a <?=($this->uri->segment(2)=="product")?'class="active-menu"':''?> href="<?=base_url()?>admin/product"><i class="fa fa-angle-double-right"></i>Product</a></li>
<li><a <?=($this->uri->segment(2)=="testimonial")?'class="active-menu"':''?> href="<?=base_url()?>admin/testimonial"><i class="fa fa-angle-double-right"></i>Testimonial</a></li>
<li><a <?=($this->uri->segment(2)=="menu")?'class="active-menu"':''?> href="<?=base_url()?>admin/menu"><i class="fa fa-angle-double-right"></i>Menu</a></li>
<li><a <?=($this->uri->segment(2)=="users")?'class="active-menu"':''?> href="<?=base_url()?>admin/users"><i class="fa fa-angle-double-right"></i>User</a></li>
</ul>