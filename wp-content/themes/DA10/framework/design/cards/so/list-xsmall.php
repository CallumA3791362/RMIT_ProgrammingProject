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

   $img = do_shortcode('[IMAGE pathonly=1]'); 
 
    $price = do_shortcode('[PRICE]');
   if( $price == ""){
   	 $price = hook_price(100);
   } 
?>

<div data-pid="<?php echo $post->ID; ?>" class="card-search card-top-image card-zoom bg-white list-small product mb-3">
  <div class="row no-gutters">
    <div class="col-lg-4 bg-white border-right">
      <?php /************ MIAN IMAGE ***/ ?>
      <figure> <a href="<?php echo get_permalink($post->ID); ?>"> <img data-src="<?php echo $img; ?>" class="img-fluid lazy" alt="<?php echo $post->post_title; ?>"></a> </figure>
      <?php /***************** */ ?>
    </div>
    <div class="col">
      <div class="p-2 pl-3">
        <div class="lead mb-2"><a href="<?php echo get_permalink($post->ID); ?>" class="text-dark small"><?php echo do_shortcode('[TITLE]'); ?></a></div>
        
        
<div class="card-middle d-none d-lg-block"> 
 <div class="small opacity-5 mb-2">
 <?php echo do_shortcode('[CATEGORY]'); ?>
 </div>
 </div>


<div class="position-absolute hide-mobile" style="bottom:20px; right:10px;"><?php echo do_shortcode('[SCORE size="xs"]'); ?></div>
        
        
        <span class="pricetag small font-weight-bold <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo  $price; ?></span> <?php echo do_shortcode('[OLD-PRICE]'); ?>
        
      </div>
    </div>
  </div>
</div>
