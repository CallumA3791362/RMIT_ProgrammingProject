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



$title = "";
switch(THEME_KEY){


	case "es": {
	$title = __("Services","premiumpress");
	} break;

	case "da": {
	$title = __("My Interests","premiumpress");
	} break;

	case "mj": {
	$title = __("Why Choose Me","premiumpress");
	} break;	
	
	case "ll": {
	$title = __("Skills you will gain","premiumpress");
	} break;	
		
	case "jb": {
	$title = "";
	} break; 
	
	default: {	
	$title = __("Features","premiumpress");
	} break;
} 

?>

<div class="card  position-relative <?php if(isset($GLOBALS['global_design3'])){ echo "border-0"; } ?>" style="overflow:hidden">
  <div class="card-body ">
    <div class="<?php if(!isset($GLOBALS['global_design3'])){ echo 'p-lg-4'; } ?>">
    
    
    
    
     
      
      <?php if(in_array(_ppt(array('design', 'display_features')), array("","1"))){  ?>
      
    <div id="single-display-features">
      <?php if($title != ""){ ?>
      <h5 class="card-title mb-4"><?php echo $title; ?></h5>
      <?php } ?>
      
      <?php if(!in_array(THEME_KEY, array("jb")) ){ ?>
       <div class="addeditmenu" data-key="features"></div>
      <?php _ppt_template( 'framework/design/singlenew/blocks/features-code' );  ?>
    <?php } ?>
    
    </div>
    
    <?php } ?>
    
    
    
    
    
    
    <?php if(THEME_KEY == "jb"){ ?>
  
  
   <?php if(get_post_meta($post->ID,'responsibilities',true) != "" || defined('WLT_DEMOMODE')){ ?>
      <h5 class="card-title"><?php echo __("Responsibilities","premiumpress") ?></h5>
      <div class="post-body mb-5"> <?php echo str_replace("/n/n","<br><br>",wpautop(get_post_meta($post->ID,'responsibilities',true))); ?> </div>
      <?php } ?> 
    
    <?php } ?>
    
    
      <?php if(THEME_KEY == "es"){ ?>
      <?php if( in_array(_ppt(array('design', "display_openinghours")), array("","1"))  ){  ?>
      <hr class="my-4" />
      
      <div class="addeditmenu" data-key="openinghours"></div>
      
      <h5 class="card-title"><?php echo __("When can we meet?","premiumpress"); ?></h5>
      <?php _ppt_template( 'framework/design/singlenew/blocks/openinghours' );  ?>
      
      <?php } ?>
      <?php } ?>
    
      <?php if(THEME_KEY == "da"){ ?>
      <hr class="my-4" />
      <div class="addeditmenu" data-key="lookingfor"></div>
      <h5 class="card-title"><?php echo __("I'm Looking For","premiumpress"); ?></h5>
      <p><?php echo do_shortcode('[LOOKINGFOR type="gen"]'); ?> / <?php echo do_shortcode('[LOOKINGFOR type="age"]'); ?></p>
      <div class="opacity-5"><?php echo do_shortcode('[LOOKINGFOR type="desc"]'); ?></div>
     
      <?php }elseif(in_array(THEME_KEY, array("at")) && _ppt(array('design','display_delivery')) != "0" ){ ?>
      <hr class="my-4" />
       <?php _ppt_template( 'framework/design/singlenew/blocks/features-delivery' );  ?>
      <?php  } ?>
    
    </div>
  </div>
  
  <?php if( in_array(THEME_KEY, array("dt","mj","ct","dl","cm")) && !in_array(_ppt(array('design', 'display_comments')), array("0")) && !isset($GLOBALS['global_design3']) ){ ?>
  <div class="card-body border-top pb-0" id="single-display-comments">
    <?php _ppt_template( 'framework/design/singlenew/blocks/comments' );  ?>
  </div>
  <?php } ?>
  
  
   <?php if(!in_array(THEME_KEY, array("vt","ll")) && isset($GLOBALS['global_design3']) ){  $_POST['small'] = 1; $_POST['pid'] = $post->ID; ?>
   <div class="card-body" >
      <?php _ppt_template( 'ajax-modal-video' );  ?>
    </div>
    <?php } ?>
  
  
</div>
