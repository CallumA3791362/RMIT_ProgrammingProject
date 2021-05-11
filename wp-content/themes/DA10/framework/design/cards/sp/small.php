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
 
<div data-pid="<?php echo $post->ID; ?>" class="card-search card-small card-zoom card-top-image clearfix card-1">

<?php /************ MIAN IMAGE ***/ ?>
   <figure>
      
      <a href="<?php echo get_permalink($post->ID); ?>">
         <img data-src="<?php echo $img; ?>" class="img-fluid lazy" alt="<?php echo $post->post_title; ?>">
         <div class="read_more"><span><?php echo __("view","premiumpress"); ?></span></div>
      </a>
      
      
      
       <div class="card-small-title text-light">
       
		<h3><?php echo do_shortcode('[TITLE]'); ?></h3>
        
		<p class="text-primary"><?php echo do_shortcode('[CATEGORY]'); ?>  </p>	
        
		</div>
  
   </figure>
<?php /***************** */ ?>
  
   
</div>
