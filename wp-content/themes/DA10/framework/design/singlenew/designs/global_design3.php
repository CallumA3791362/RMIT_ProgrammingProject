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

$GLOBALS['global_design3'] = 1;


?>

<section class="section-top-60">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="addeditmenu float-right mr-4" data-key="titletop"></div>
       
       
      
       
        <h1 itemprop="name" class="mb-4 font-weight-bold"><?php echo do_shortcode('[TITLE]'); ?></h1>
        
        <div class="d-flex justify-content mb-4">
        
        <?php if(!in_array(THEME_KEY, array("dl","da","rt","es"))  ){ ?>
        
          <div class="box1 mr-5"> <i class="fal <?php echo do_shortcode('[CATEGORYICON default="fal fa-home" codeonly="1"]'); ?> fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Category","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[CATEGORY]'); ?></div>
            </div>
          </div>
          
          <?php } ?>
          
          
          
          
          
           <?php if(in_array(THEME_KEY, array("da","es"))  ){ ?>
          
          
    
       
       
           <div class="box1 mr-5">
          	<i class="fal <?php echo do_shortcode('[GENDERICON icononly=1]'); ?> fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("I am","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[GENDER]'); ?>, <?php echo do_shortcode('[AGE]'); ?></div>
            </div>
          </div>
          
          
            <div class="box1 mr-5">
          	<i class="fal fa-map-marker fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Location","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[COUNTRY]'); ?></div>
            </div>
          </div>
          
           <?php }elseif(in_array(THEME_KEY, array("vt"))  ){ ?>
        
        
        
           <div class="box1 mr-5">
          	<i class="fal fa-layers  fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Level","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[LEVEL]'); ?></div>
            </div>
          </div>
          
           <?php }elseif(in_array(THEME_KEY, array("jb"))  ){ ?>
        
        
        <div class="box1 mr-5">
          	<i class="fal fa-map-marker fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Location","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[COUNTRY]'); ?></div>
            </div>
          </div>
        
        
         
        <?php }elseif(in_array(THEME_KEY, array("dl"))  ){ ?>
        
        
        
           <div class="box1 mr-5">
          	<i class="fal <?php echo _ppt(array('taxicon', "make")); ?> fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Make","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[TAX name="make"]'); ?></div>
            </div>
          </div>
          
          
          
           <div class="box1 mr-5">
          	<i class="fal <?php echo _ppt(array('taxicon', "model")); ?> fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Model","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[TAX name="model"]'); ?></div>
            </div>
          </div>
          
          
        <?php }elseif(in_array(THEME_KEY, array("rt"))  ){ ?>
        
       
          
          
           <div class="box1 mr-5">
          	<i class="fal <?php echo _ppt(array('taxicon', "beds")); ?> fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Beds","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[TAX name="beds"]'); ?></div>
            </div>
          </div>
          
          
            <div class="box1 mr-5">
          	<i class="fal <?php echo _ppt(array('taxicon', "baths")); ?> fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Baths","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[TAX name="baths"]'); ?></div>
            </div>
          </div>
          
           
        
           <div class="box1 mr-5">
          	<i class="fal fa-sync fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Size","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[SIZE]'); ?></div>
            </div>
          </div>
          
        
        
        <?php } ?>
          
          
       
        
        
    
           <?php if(in_array(THEME_KEY, array("dt")) && get_post_meta($post->ID, "phone", true) != ""){ ?>
           
           
      
          <div class="box1 mr-5">
          	<i class="fal fa-phone-alt fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Phone","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo get_post_meta($post->ID, "phone", true); ?></div>
            </div>
          </div>
          
          <?php /*
         <div class="d-flex justify-content mb-4">
          <div class="box1 mr-5"> <i class="fal fa-star fa-2x float-left mr-3"></i>
            <div class="float-left">
              <div class="tiny mt-0 opacity-5"><?php echo __("Rating","premiumpress") ?></div>
              <div class="text-dark font-weight-bold link-dark"><?php echo do_shortcode('[RATING]'); ?></div>
            </div>
          </div>
		  */ ?>
           
           
           <?php } ?>
          
                <?php if(in_array(THEME_KEY, array("at","mj","ct","dl")) &&  _ppt(array('lst','websitepackages')) == "1" && _ppt(array('lst','adminonly')) != 1 && in_array(_ppt(array('design', 'display_comments')), array("","1")) ){ ?>
      
      
      
              <div class="box1"> <a href="<?php if(_ppt(array('user','allow_profile')) == 1){  echo get_author_posts_url( $post->post_author );  }else{ echo "#"; }?>" class="userphoto float-left mr-3" style="height:40px; width:40px;"> <?php echo str_replace("userphoto","rounded-circle",get_avatar( $post->post_author, 40 )); ?></a>
          <div class="float-left">
            <div class="tiny mt-0 opacity-5">Seller</div>
            <div class="text-dark font-weight-bold">
			
			      <?php if(_ppt(array('user','allow_profile')) == 1){ ?>
                  <a href="<?php echo get_author_posts_url( $post->post_author ); ?>" class="text-dark">
                  <?php } ?>
                  <?php echo $CORE->USER("get_username", $post->post_author); ?>
                  <?php if(_ppt(array('user','allow_profile')) == 1){ ?>
                  </a>
                  <?php } ?>
			
			<span class="small"><?php echo do_shortcode('[RATING_USER results=0]'); ?></span> </div>
          </div>
        </div>
        
            
        
        
		<?php }  ?>




          
    
        </div>
      </div>
      <div class="col-md-3  text-md-right"> 
      
     
      <?php _ppt_template( 'framework/design/singlenew/parts/_global_button_big' );   ?>
      
      
      </div>
    </div>
  </div>
</section>

<section>
<div class="container">
<div class="card my-4 overflow-hidden border-0">
<?php _ppt_template( 'framework/design/singlenew/parts/_global_ribbons' );   ?>
<div class="card-body">
<div class="row justify-content-between">

  <div class="col-xl-6">
    <?php _ppt_template( 'framework/design/singlenew/parts/_global_slider' );   ?>
  </div>
  
  <div class="col-12 col-xl-6 text-left mt-4  pl-lg-5">
    <div class="single-page">
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item"> <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><?php 
		
		
	switch(THEME_KEY){
		
		 
		case "es": {
		
			 echo __("My Story","premiumpress"); 
			 
		} break;
		
		case "da": {
		
			 echo __("Here's My Story","premiumpress"); 
			 
		} break;
		 
		default: {
		
			echo __("Description","premiumpress");
		 
		} break;
	
	}
		
		
		
		
		?></a> </li>
      
        <li class="nav-item"> <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><?php
		
		
		
		
	switch(THEME_KEY){
		
		case "da": {
		
			 echo __("About Me","premiumpress"); 
			 
		} break;
		
		case "es": {
		
			 echo __("Appearance","premiumpress"); 
			 
		} break;
		 
		default: {
		
			echo __("Contact","premiumpress");
		 
		} break;
	
	}
		
		
		
		
		
		
		
		  ?></a> </li>
          
        <?php if(THEME_KEY == "es"){ ?>
        <li class="nav-item"> <a class="nav-link" id="services-tab" data-toggle="tab" href="#services" role="tab" aria-controls="contact" aria-selected="false">
		<?php  echo __("Services","premiumpress"); ?></a>
		
		</li>
        <?php } ?>
          
          
         <?php if(THEME_KEY == "da" || in_array(_ppt(array('design','display_comments')), array("","1")) ){ ?>
        <li class="nav-item"> <a class="nav-link" id="faq-tab" data-toggle="tab" href="#faq" role="tab" aria-controls="contact" aria-selected="false"><?php
		
		 switch(THEME_KEY){
		
		
		
		case "es": {
		
			 echo __("Rates","premiumpress"); 
			 
		} break;
		
		case "da": {
		
			 echo __("My Interests","premiumpress"); 
			 
		} break;
		 
		default: {
		
			echo __("Reviews","premiumpress") ;
		 
		} break;
	
	} 
		 ?></a> </li>
        <?php } ?>
        
      </ul>
      <div class="tab-content bg-white mt-4" id="myTabContent">
        <div class="tab-pane fade show active p-2" id="home" role="tabpanel" aria-labelledby="home-tab">
       
        
          <?php  _ppt_template( 'framework/design/singlenew/parts/_global_content' );  ?>
        </div>
     
        <div class="tab-pane fade p-2" id="contact" role="tabpanel" aria-labelledby="contact-tab">
     
     <?php 
		  
		switch(THEME_KEY){
		
		case "es": 
		case "da": {
		
		_ppt_template( 'framework/design/singlenew/blocks/customfields' ); 
			 
		} break;
		 
		default: {
		
		?>
          <h5><?php echo __("Have a question?","premiumpress"); ?></h5>
      <p class="mb-4"><?php echo __("Fill in the form below and we'll get back to you asap.","premiumpress"); ?></p>
      
     
        <?php
		
		$GLOBALS['contactformopen'] = 1;
		 _ppt_template( 'framework/design/singlenew/parts/_contactform' ); 
		 
		} break;
	
	} 
		  
		    ?> 
      
          
        
        </div>
         <?php if(in_array(_ppt(array('design','display_comments')), array("","1")) ){ ?>
        <div class="tab-pane fade p-2" id="faq" role="tabpanel" aria-labelledby="faq-tab">
        
     <?php 
		  
		switch(THEME_KEY){
		
		case "da": {
		
		_ppt_template( 'framework/design/singlenew/blocks/features' ); 
			 
		} break;
		
		case "es": {
		
		_ppt_template( 'framework/design/singlenew/blocks/rates' ); 
			 
		} break;
		 
		default: {
		 
		
		$GLOBALS['contactformopen'] = 1;
		 _ppt_template( 'framework/design/singlenew/blocks/comments' ); 
		 
		} break;
	
	} 
		  
		    ?> 
        
        
       
        
        </div>
        <?php } ?>
        
        
         <?php if(THEME_KEY == "es"){ ?>
         <div class="tab-pane fade p-2" id="services" role="tabpanel" aria-labelledby="services-tab">
         
         <?php _ppt_template( 'framework/design/singlenew/blocks/features' );  ?>
         </div>
         <?php } ?>
        
      </div>
    </div>
    <?php //_ppt_template( 'framework/design/singlenew/parts/_global_buttons' );   ?>
  
  </div>
</div>
</section>

<?php 

if(!in_array(THEME_KEY, array("es","da"))){
_ppt_template( 'framework/design/singlenew/parts/_global_bottom' );  
}
 ?>


<?php _ppt_template( 'framework/design/singlenew/parts/_global_related' );   ?>
