<?php

global $settings, $post, $CORE;

$settings['card'] = "info";
$settings['title'] = "Related";



?>

<div id="listing1" class="border-top">
<div class="container">
  <div class="row">
    <div class="col-12"> <a href="<?php echo home_url(); ?>/?s=" class="btn btn-system btn-sm float-right mt-4 hide-mobile"><i class="fal fa-search mr-2 text-primary"></i> <?php echo __("View All","premiumpress"); ?></a>
      <h5 class="card-title my-4"><?php echo __("Recommended For You","premiumpress"); ?></h5>
      <div class="clearfix"></div>
      <div class="related-listings owl-carousel owl-theme">
        <?php 
		
		if(_ppt(array('lst','hide_featuredimage')) == "1"){
unset($GLOBALS['flag-singlepage']);
}
			
			if(defined('WLT_DEMOMODE') && THEME_KEY != "da"){
			$data =  str_replace(".00","", do_shortcode('[LISTINGS dataonly=1 nav=0 small=1 carousel=1 custom=rel]')); 
			}else{
			$data =  str_replace(".00","",do_shortcode('[LISTINGS dataonly=1 nav=0 small=1 carousel=1 custom=related]')); 
			
			}
			
			if(strlen($data) < 10){
			$data =  str_replace(".00","", do_shortcode('[LISTINGS dataonly=1 nav=0 small=1 carousel=1 custom=new]')); 
			}
			
			echo $data;
			
if(_ppt(array('lst','hide_featuredimage')) == "1"){
$GLOBALS['flag-singlepage'] = 1;
}
			
			 ?>
      </div>
    </div>
  </div>
</div>
</div>
<script> 
jQuery(document).ready(function(){ 
		 
	jQuery(".related-listings").owlCarousel({
        loop: false,
        margin: 20,
        nav: false,
		<?php if($CORE->GEO("is_right_to_left", array() )){ ?>rtl: true,<?php } ?>
        dots: false,
        responsive: {
            0: {
                items: 2
            },
            600: {
                items: 2
            },
            1000: {
                items: <?php if(THEME_KEY == "da"){ echo 5; }else{ echo 4; } ?>
            }
        },
        
    }); 
	
	
	});		 
</script>
