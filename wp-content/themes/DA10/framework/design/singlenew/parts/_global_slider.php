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

global $CORE, $post, $userdata; 


if(THEME_KEY == "vt"){

$_POST['pid'] = $post->ID;
$GLOBALS['top-video'] = 1;
_ppt_template( 'ajax-modal-video' );

}elseif( !$CORE->USER("membership_hasaccess", "view_photos") ){  ?>


<div style=" width: 100%;    height: 100%;" class="bg-white y-middle border hide-mobile">

   <div class="p-4 text-center">
   
    <h4><i class="fal fa-lock mr-2"></i> <?php echo __("No Access","premiumpress"); ?></h4>	
    
	<div class="mt-4 small"><?php echo __("Please upgrade your membership to view photos.","premiumpress"); ?></div>
    
      <?php if(!$userdata->ID ){ ?>
    <a onclick="processLogin();" href="javascript:void(0);"  class="btn btn-system btn-md mt-4"><?php echo __("Login Now","premiumpress"); ?></a>
   <?php }else{ ?>
    
    <a onclick="processUpgrade();" href="javascript:void(0);"  class="btn btn-system btn-md mt-4"><?php echo __("Upgrade Now","premiumpress"); ?></a>
    
    <?php } ?>
    </div>

</div>


<?php }else{
 
// GET FILES
$files = $CORE->MEDIA("get_all_images", $post->ID);
 	
 
?>
 

      <div class="pr-lg-2 text-center product-img-box my-4 pl-lg-4">
      
       <div class="addeditmenu" data-key="images"></div>
         
            <?php 
			if(empty($files) || ( count($files) == 1 && $files[0]['src'] == "")){
			?>
             
            <?php echo do_shortcode('[IMAGE link=0]'); ?>
            
			<?php }elseif(count($files) > 0){ ?>
        
              <div class="gallery-items clearfix">
                <?php $i=1; foreach($files as $f){  ?>
                <a href="<?php echo $f['src']; ?>"  data-toggle="lightbox" data-type="image"> <img src="<?php echo $f['thumbnail']; ?>" class="img-fluid" alt="image <?php echo $i; ?>"> </a>
                <?php $i++; } ?>
              </div>
         
       
            <?php } ?>
            
            </div>


     <?php if(count($files) == 1 && $files[0]['src'] == ""){ }elseif(count($files) > 1){ ?>
            <script src="<?php echo FRAMREWORK_URI.'js/js.plugins-slickslider.js'; ?>"></script>
            <script> 
    
    jQuery(document).ready(function(){  
     
       var slider = jQuery('.gallery-items').slick({
          centerMode: false,
		  adaptiveHeight: true,
          centerPadding: '0',
          slidesToShow: 1,
          slidesToScroll: 1,
          autoplay: true,
		  autoplaySpeed: 3000,
          prevArrow: '<span class="fal fa-angle-left left" style="left:-10px;"></span>',
          nextArrow: '<span class="fal fa-angle-right right" style="right:-10px;"></span>',
          //asNavFor: '.gallery-items-nav'
    });
	 
 
	
	jQuery('.gallery-items').attr('dir', 'ltr');
 
    
    });
    </script>
<?php } ?>
<?php } ?>