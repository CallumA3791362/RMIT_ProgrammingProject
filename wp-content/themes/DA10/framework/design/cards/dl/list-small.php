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

global $CORE, $post;
 
 
?>
<div class="<?php echo $post->cardclass; ?>" <?php echo $post->carddata; ?>>
  <div class="row no-gutters">
    <div class="col-lg-4">
       <?php echo $post->image_formatted; ?>
    </div>
    <div class="col-lg-8"> 
   
      <div class="new-search-body">
       
       
 <div class="card-category mb-2"><?php echo do_shortcode('[CATEGORY limit=1]'); ?></div>
      <h3><a href="<?php echo $post->link; ?>"><?php echo $post->title; ?></a></h3>
      
       
    <div class="card-bottom text-center d-md-flex justify-content-between">
      <div class="pricetag-big mt-3 <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo $post->price; ?></div>
      <div class="mt-3 opacity-5 small pt-3 hide-mobile"><i class="fal fa-clock"></i> <?php echo do_shortcode('[TIMESINCE]'); ?> <?php echo __("ago","premiumpress"); ?> </div>
      
    </div>     
        
      </div>
    </div>
  </div>
</div>

 