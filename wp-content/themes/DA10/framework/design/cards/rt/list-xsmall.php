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
    <div class="col-lg-6 border-right">
     <?php echo $post->image_formatted; ?>
    </div>
    <div class="col-lg-6">
      <div class="new-search-body">
      
      <div class="card-category mb-2"><?php echo do_shortcode('[CATEGORY limit=1]'); ?></div>
      <h3><a href="<?php echo $post->link; ?>"><?php echo $post->title; ?></a></h3>
      
      <div class="pricetag-big text-center text-md-left mt-3 <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo $post->price; ?></div>
       
         
      </div>
    </div>
  </div>
</div>