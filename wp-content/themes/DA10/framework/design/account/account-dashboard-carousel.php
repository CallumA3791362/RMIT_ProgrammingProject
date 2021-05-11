<?php
   /* 
   * Theme: PREMIUMPRESS CORE FRAMEWORK FILE
   * Url: www.premiumpress.com
   * Author: Mark Fail
   *
   * THIS FILE WILL BE UPDATED WITH EVERY UPDATE
   * IF YOU WANT TO MODIFY THIS FILE, CREATE A CHILD THEME
   *
   * http://codex.wordpress.org/Child_Themes
   */
   if (!defined('THEME_VERSION')) {	header('HTTP/1.0 403 Forbidden'); exit; }

global $CORE, $userdata;


?> 
<div class="hide-mobile" id="dash-carousel">

<div class="card"> 

 <div style="    position: absolute;    <?php if($CORE->GEO("is_right_to_left", array() )){ echo "left:10px;"; }else{ echo "right:10px;";  } ?>   top: 5px; cursor:pointer">
 <a class="btn bg-white btn-sm text-muted prev px-2 mt-2 border"><i class="fa fa-angle-left px-1" aria-hidden="true"></i></a> 
 <a class="btn bg-white btn-sm text-muted next px-2 mt-2 border"><i class="fa fa-angle-right px-1" aria-hidden="true"></i></a>
 </div>

<div class="card-header d-sm-flex d-block  bg-white">
    <h4 class=" text-black mb-0"><i class="fal fa-star mr-2"></i> <?php echo __("Newly Added","premiumpress"); ?> </h4>
  </div>

 
<div class="p-lg-5 pb-0">
<div class="owl-carousel owl-theme"> <?php echo str_replace("data-srcxx","srcxx", do_shortcode('[LISTINGS dataonly=1 nav=0 small=1 carousel=1 custom="new"]'));  ?> </div>
<script> 
jQuery(document).ready(function(){ 
		 
	var owl = jQuery("#dash-carousel .owl-carousel").owlCarousel({
        loop: false,
        margin: 20,
        nav: false,
		<?php if($CORE->GEO("is_right_to_left", array() )){ ?>rtl: true,<?php } ?>
        dots: false,		
        responsive: {
            0: {
                items: 1
            },
			 
            600: {
                items: 1
            }, 
			
        },        
    }); 
	
	owl.owlCarousel();
	
	// REFRESH	
	setTimeout(function(){	
   		owl.trigger('refresh.owl.carousel');
	}, 2000); 
 
  jQuery("#dash-carousel .next").click(function(){
    owl.trigger('next.owl.carousel');
	owl.trigger('refresh.owl.carousel');
  })
  jQuery("#dash-carousel .prev").click(function(){
    owl.trigger('prev.owl.carousel');
	owl.trigger('refresh.owl.carousel');
  })
	
	
});
	 
</script>
</div></div>  </div> 