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

global $CORE, $CORE_CART, $post, $userdata;

$GLOBALS['global_design2'] = 1;


// GET FILES
$files = $CORE->MEDIA("get_all_images", $post->ID);	

// GET PRICE
$price = get_post_meta($post->ID,'price',true);

// GET OLD PRICE
$oldprice = get_post_meta($post->ID,'old_price',true); 

// GET QUTY
$qty = get_post_meta($post->ID, "qty", true );   if($qty == ""){ $qty = 10; }

?>

<section class="section-top-40">
<div class="container"  <?php  if(defined('THEME_KEY') && in_array(THEME_KEY, array("sp"))){ ?>itemscope itemtype="https://schema.org/Product"<?php } ?>>
<?php  if(defined('THEME_KEY') && in_array(THEME_KEY, array("sp"))){ ?>
<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
  <meta itemprop="priceCurrency" content="USD" />
  <meta itemprop="price" content="<?php echo $price; ?>" />
  <link itemprop="availability" href="http://schema.org/InStock" />
  <meta itemprop="priceValidUntil" content="<?php echo date('d-m-Y', strtotime("+1 month")); ?>" />
  <meta itemprop="url" content="<?php echo get_permalink($post->ID); ?>" />
</div>
<?php } ?>

<div class="card my-4 overflow-hidden">
<?php _ppt_template( 'framework/design/singlenew/parts/_global_ribbons' );   ?>
<div class="card-body">
<div class="row justify-content-between">

<div class="col-xl-6">

    <?php _ppt_template( 'framework/design/singlenew/parts/_global_slider' );   ?>
  </div>
  
  <div class="col-12 col-xl-6 text-left mt-4  pl-lg-5">
    <div class="addeditmenu float-right mr-4" data-key="titletop"></div>
    <h1 class="h2 mb-2 font-weight-bold" itemprop="name"><?php echo do_shortcode('[TITLE]'); ?></h1>
    <?php _ppt_template( 'framework/design/singlenew/parts/_global_content' );   ?>
    <?php _ppt_template( 'framework/design/singlenew/parts/_global_buttons' );   ?>
  </div>
  
</div>
</section>
<?php _ppt_template( 'framework/design/singlenew/parts/_global_bottom' );   ?>
<?php _ppt_template( 'framework/design/singlenew/parts/_global_related' );   ?>
