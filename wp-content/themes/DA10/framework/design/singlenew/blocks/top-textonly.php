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
<?php if(defined('THEME_KEY') && THEME_KEY == "cp"){ ?>
<?php _ppt_template( 'framework/design/cards/cp/list' ); ?>

<div class="position-relative card card-body  card-top-image mb-4 top-gallery">
  <div class="pt-4 mx-2"> <?php echo do_shortcode("[CONTENT]");  ?> 
  
  
      <?php if(in_array(_ppt(array('design','display_comments')), array("","1")) ){ ?>
    
     <a href="javascript:void(0)"  <?php if(!$userdata->ID){ ?> onclick="processLogin();" <?php }else{ ?>onclick="processCommentPop();"<?php } ?>  class="btn btn-system btn-md "><i class="fal fa-comments mr-2 text-primary"></i> <?php echo __("Write Review","premiumpress") ?></a>
     
 
 <?php  $GLOBALS['hidecomments'] = 1; _ppt_template( 'framework/design/singlenew/blocks/comments' ); ?>

     <?php } ?>
 
  
  </div>
</div>
<?php
 if(in_array(_ppt(array('design', 'display_related')), array("","1"))){
ob_start();
global $new_settings;
$new_settings['title'] = __("Related Deals","premiumpress");
$new_settings['section_padding'] = "section-bottom-40";
$new_settings['custom'] = "related";
$new_settings['datastring'] = "custom='related'";
$CORE->LAYOUT("load_single_block", "listings7a");
$new_settings['section_padding'] = "";
$new_settings['title'] = "";
$new_settings['datastring'] = "";
$new_settings['custom'] = "";
$MAINSTRINGSTRING = ob_get_contents();	
ob_end_clean();

echo str_replace("container","container px-0", $MAINSTRINGSTRING);
}


 
?>
<?php }else{ ?>
<div class="position-relative card card-body  card-top-image mb-4 top-gallery">
  <div class="pt-4 mx-2">
    <?php _ppt_template( 'framework/design/singlenew/blocks/top-content' ); ?>
    

    
  </div>
</div>
<?php } ?>
