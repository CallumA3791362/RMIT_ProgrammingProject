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


 

switch(THEME_KEY){


case "at": {

?>

<?php if(!isset($GLOBALS['global_design3'])){ ?> 
<div class="sub-header mb-3 small">  

<span class="link-dark"><i class="fal <?php echo do_shortcode('[CATEGORYICON codeonly=1]'); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[CATEGORY limit=2]'); ?></span></span>


      <?php if(in_array(_ppt(array('user','favs')), array("","1")) ){ ?>
      <span class="link-dark ml-3">
      <?php if(!$userdata->ID){ ?>
      <a href="javascript:void(0);" onclick="processLogin();"><i class="fal fa-heart text-primary"></i> <?php echo __("Add to favorites","premiumpress") ?></a>
      <?php }else{ ?>
      <?php echo do_shortcode('[FAVS class="mt-2" icon_name="fal fa-heart text-primary" text=1 icon=1]'); ?>
      <?php } ?>
       </span>
      <?php } ?>

</div>
<?php } ?>

      <div class="d-flex justify-content-between align-items-center mb-4 w-100">
           
     <div id="buybox-price">
        <!--<span class="buybox-price-symbol h2 "><?php if(_ppt(array('currency','switch')) != 1){  echo _ppt(array('currency','symbol')); }else{ echo hook_currency_symbol(''); } ?></span>-->
        <span class="buybox-price-num h2 pricetag text-primary <?php echo $CORE->GEO("price_formatting",array()); ?>">00</span>
        <!--<span class="buybox-price-currency"><?php if(_ppt(array('currency','switch')) != 1){  echo _ppt(array('currency','code')); }else{ echo hook_currency_code(''); } ?></span>-->
      </div>
      
      <div class="h3 pricetag font-weight-normal opacity-5 mt-1">
      
      <?php echo do_shortcode('[TIMELEFT]'); ?>
      </div>
      
                
        </div> 

<?php

} break;


case "jb": {

?>

<?php if(!isset($GLOBALS['global_design3'])){ ?> 
       
           <div class="sub-header mb-3">   
         
         <div class="mt-4">
	 
       <span> <i class="fal fa-users mr-2 text-primary"></i> <?php echo do_shortcode('[HITS]'); ?> <?php echo __("views","premiumpress") ?> </span>
     
      
        <span class="ml-3 link-dark"><i class="fal <?php echo do_shortcode('[CATEGORYICON codeonly=1]'); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[CATEGORY limit=2]'); ?></span></span>
      
      </div>
    
  </div>

<?php } ?>  

<?php 

} break;


case "dt": {

?>

<?php if(!isset($GLOBALS['global_design3'])){ ?> 
       
           <div class="sub-header mb-3">   
         
         <div class="mt-4">
		 <?php 
		 $phone = get_post_meta($post->ID, "phone", true); 
		 
		 if(strlen($phone) > 1){  
?>
       <span class="h6"> <i class="fal fa-phone-alt mr-2 text-primary"></i> <?php echo get_post_meta($post->ID, "phone", true); ?> </span>
      <?php } ?>
      
        <span class="ml-3 link-dark"><i class="fal <?php echo do_shortcode('[CATEGORYICON codeonly=1]'); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[CATEGORY limit=2]'); ?></span></span>
      
      </div>
    
  </div>

<?php } ?>  

<?php 

} break;


case "da": {

  
?>


<?php if(!isset($GLOBALS['global_design3'])){ ?> 
  
  <div class="sub-header mb-3 mt-4">   
       
         
     <?php if($CORE->USER("get_online_status", $post->post_author)){ ?>
     
         <span class="btn btn-sm btn-system mr-3 shadow-sm"><i class="fa fa-circle text-success"></i> <?php echo __("Online Now","premiumpress"); ?></span>
           
              
	   <?php } ?>
      
      
     <span class="link-dark"><i class="fal <?php echo do_shortcode('[GENDERICON icononly=1]'); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[GENDER]'); ?>, <?php echo do_shortcode('[AGE]'); ?></span></span>
      
     <span class="link-dark ml-3"><i class="fal fa-map-marker text-primary"></i><span class="ml-2"><?php echo do_shortcode('[COUNTRY]'); ?></span></span>
      
      <?php if(in_array(_ppt(array('user','favs')), array("","1")) ){ ?>
      <span class="link-dark ml-3">
      <?php if(!$userdata->ID){ ?>
      <a href="javascript:void(0);" onclick="processLogin();"><i class="fal fa-heart text-primary"></i> <?php echo __("Add to favorites","premiumpress") ?></a>
      <?php }else{ ?>
      <?php echo do_shortcode('[FAVS class="" icon_name="fal fa-heart text-primary" text=1 icon=1]'); ?>
      <?php } ?>
       </span>
      <?php } ?>
      
   
    
  </div>
  
<?php } ?> 
  
<?php if(strlen(do_shortcode('[EXCERPT]')) > 1 ){ ?>
<div class="mt-4 lead mb-4 py-3">
 <div class="addeditmenu mr-4" data-key="excerpt"></div>
<i class="fa fa-flame text-danger mr-2"></i> <?php echo do_shortcode('[EXCERPT]'); ?>
</div>
<?php } ?>
  


<?php 

} break;


case "es": {


$whatsapp = get_post_meta($post->ID, "whatsapp", true);

$phone = get_post_meta($post->ID, "phone", true); 
  
?>


<?php if(!isset($GLOBALS['global_design3'])){ ?> 
  
  <div class="sub-header mb-3 mt-4">   

       
     <span class="link-dark"><i class="fal <?php echo do_shortcode('[GENDERICON icononly=1]'); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[GENDER]'); ?>, <?php echo do_shortcode('[AGE]'); ?></span></span>
      
     <span class="link-dark ml-3"><i class="fal fa-map-marker text-primary"></i><span class="ml-2"><?php echo do_shortcode('[COUNTRY]'); ?></span></span>
      
     
      
      
      <?php if(in_array(_ppt(array('user','favs')), array("","1")) ){ ?>
      <span class="link-dark ml-3">
      <?php if(!$userdata->ID){ ?>
      <a href="javascript:void(0);" onclick="processLogin();"><i class="fal fa-heart text-primary"></i> <?php echo __("Add to favorites","premiumpress") ?></a>
      <?php }else{ ?>
      <?php echo do_shortcode('[FAVS class="" icon_name="fal fa-heart text-primary" text=1 icon=1]'); ?>
      <?php } ?>
       </span>
      <?php } ?>
      
   
    
  </div> 
  
  
<?php } ?> 


<?php if(strlen($phone) > 1 || strlen($whatsapp) > 0){ ?>
           <div class="sub-header mb-3 bg-light p-3 d-md-flex justify-content-between">   
         
        <?php if(strlen($phone) > 1){ ?>  
       <span class="h4 mb-0"> <i class="fal fa-phone-alt mr-2 text-primary"></i> <?php echo get_post_meta($post->ID, "phone", true); ?> </span>
      <?php } ?>
      
       
       <?php if(strlen($whatsapp) > 2){ ?>
       
            <span class="h4 mb-0 ml-3 link-dark"><a href="https://api.whatsapp.com/send?phone=<?php echo $whatsapp; ?>" target="_blank" rel="nofollow"><i class="fab fa-whatsapp mr-2 text-primary"></i> <?php echo __("WhatsApp Me!","premiumpress") ?></a></span>
       <?php } ?>
       
       </div> 
       
      <?php } ?>
  
<?php if(strlen(do_shortcode('[EXCERPT]')) > 1 ){ ?>
<div class="mt-4 lead mb-4 py-3">
 <div class="addeditmenu mr-4" data-key="excerpt"></div>
<i class="fa fa-flame text-danger mr-2"></i> <?php echo do_shortcode('[EXCERPT]'); ?>
</div>
<?php } ?>
  


<?php 

} break;



case "ct": {

    // GET SHIPPING OST
   $price_shipping = get_post_meta($post->ID,'price_shipping',true);
   if($price_shipping == "" || !is_numeric($price_shipping)){$price_shipping = 0; } 

?>

<?php if(!isset($GLOBALS['global_design3'])){ ?> 
  
  <div class="sub-header mb-3">   
         
 
      
       <span class="link-dark"><i class="fal <?php echo do_shortcode('[CATEGORYICON codeonly=1]'); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[CATEGORY limit=2]'); ?></span></span>
     
    
    
  </div>
  
<?php } ?>   


     <div class="d-flex  align-items-center mb-4 w-100">
           
            <div class="h2 pricetag text-primary <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo do_shortcode('[PRICE]'); ?></div>
            <?php if(is_numeric($price_shipping) && $price_shipping  > 0){ ?>
            <div class="h4 pricetag font-weight-normal opacity-8 ml-3">+ <span class="<?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo hook_price(array($price_shipping ,0)) ; ?></span> <?php echo __("Shipping","premiumpress") ?> </div>
            <?php } ?>
            
          </div> 


<?php 

} break;





case "mj": {

// GET OLD PRICE
$oldprice = get_post_meta($post->ID,'old_price',true); 


?>
<?php if(!isset($GLOBALS['global_design3'])){ ?> 

	<div class="sub-header mb-3 mt-3">   
          
        <span class="link-dark"><i class="fal <?php echo do_shortcode('[CATEGORYICON codeonly=1]'); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[CATEGORY limit=2]'); ?></span></span>
      
      
             <?php if( _ppt(array('lst','websitepackages')) == "1" && _ppt(array('lst','adminonly')) != 1 ){ ?>
             
             
             <span style="width:25px; display:inline-block;" class="ml-3">
             <a href="<?php if(_ppt(array('user','allow_profile')) == 1){  echo get_author_posts_url( $post->post_author );  }else{ echo "#"; }?>" class="userphoto position-relative"> <?php echo str_replace("userphoto","rounded-circle",get_avatar( $post->post_author, 80 )); ?></a>
             </span>
             
             <span class="link-dark small mx-2">
                <?php if(_ppt(array('user','allow_profile')) == 1){ ?>
                  <a href="<?php echo get_author_posts_url( $post->post_author ); ?>">
                  <?php } ?>
                  <?php echo $CORE->USER("get_username", $post->post_author); ?>
                  <?php if(_ppt(array('user','allow_profile')) == 1){ ?>
                  </a>
                  <?php } ?>
             </span>
             <span class="small"><?php echo do_shortcode('[RATING_USER]'); ?></span>
             
             
              <?php } ?>
  </div>
  

<?php } ?>  

     <div class="d-flex  align-items-center mb-4 w-100">
           
            <div class="h2 pricetag text-primary <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo do_shortcode('[PRICE]'); ?></div>
      </div> 


<?php 

} break;




case "vt": {

 if(!isset($GLOBALS['global_design3'])){ ?> 
  
  <div class="sub-header mb-3 mt-3">   
         
 		<?php if(in_array(_ppt(array('lst', 'vt_levels')), array("","1"))){  ?>
      <span class="mr-2"><?php echo do_shortcode('[LEVEL]'); ?></span>
      <?php } ?>
     
       <span class="link-dark"><i class="fal <?php echo do_shortcode('[CATEGORYICON codeonly=1]'); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[CATEGORY limit=2]'); ?></span></span>
       
       
    
    
  </div>
  
<?php }  


} break;


case "rt": {

// GET OLD PRICE
$oldprice = get_post_meta($post->ID,'old_price',true); 


?>

<?php if(!isset($GLOBALS['global_design3'])){ ?> 
  
  <div class="sub-header mb-3">   
         
 
      
    
     <span class="link-dark"><i class="fal <?php echo _ppt(array('taxicon', "beds")); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[TAX name="beds"]'); ?></span></span>
      
    <span class="link-dark ml-3"><i class="fal <?php echo _ppt(array('taxicon', "baths")); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[TAX name="baths"]'); ?></span></span>
     
     <span class="link-dark  ml-3"><i class="fal fal fa-sync text-primary"></i><span class="ml-2"><?php echo do_shortcode('[SIZE]'); ?></span></span>
      
    
  </div>
  
<?php } ?>   


     <div class="d-flex  align-items-center mb-4 w-100">
           
            <div class="h2 pricetag text-primary <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo do_shortcode('[PRICE]'); ?></div>
            <?php if(is_numeric($oldprice) && $oldprice > 0){ ?>
            <div class="h3 pricetag font-weight-normal opacity-8 ml-3  <?php echo $CORE->GEO("price_formatting",array()); ?>" style="text-decoration:line-through;"><?php echo hook_price(array($oldprice,0)) ; ?></div>
            <?php } ?>
            
          </div> 


<?php 

} break;

case "dl": {

// GET OLD PRICE
$oldprice = get_post_meta($post->ID,'old_price',true); 


?>

<?php if(!isset($GLOBALS['global_design3'])){ ?> 
  
  <div class="sub-header mb-3">   
         
 
      
     <span class="link-dark"><i class="fal <?php echo _ppt(array('taxicon', "make")); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[TAX name="make"]'); ?></span></span>
      
     <span class="link-dark ml-3"><i class="fal <?php echo _ppt(array('taxicon', "model")); ?> text-primary"></i><span class="ml-2"><?php echo do_shortcode('[TAX name="model"]'); ?></span></span>
      
    
    
    
  </div>
  
<?php } ?>   


     <div class="d-flex  align-items-center mb-4 w-100">
           
            <div class="h2 pricetag text-primary <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo do_shortcode('[PRICE]'); ?></div>
            <?php if(is_numeric($oldprice) && $oldprice > 0){ ?>
            <div class="h3 pricetag font-weight-normal opacity-8 ml-3  <?php echo $CORE->GEO("price_formatting",array()); ?>" style="text-decoration:line-through;"><?php echo hook_price(array($oldprice,0)) ; ?></div>
            <?php } ?>
            
          </div> 


<?php 

} break;


case "sp": {

// GET PRICE
$price = get_post_meta($post->ID,'price',true);

// GET OLD PRICE
$oldprice = get_post_meta($post->ID,'old_price',true); 

// GET QUTY
$qty = get_post_meta($post->ID, "qty", true );   if($qty == ""){ $qty = 10; }


?>


<?php if(isset($GLOBALS['global_design3'])){ ?> 


     <div class="d-flex  align-items-center mb-4 w-100">
           
            <div class="h2 pricetag text-primary <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo do_shortcode('[PRICE]'); ?></div>
            <?php if(is_numeric($oldprice) && $oldprice > 0){ ?>
            <div class="h3 pricetag font-weight-normal opacity-8 ml-3  <?php echo $CORE->GEO("price_formatting",array()); ?>" style="text-decoration:line-through;"><?php echo hook_price(array($oldprice,0)) ; ?></div>
            <?php } ?>
            
          </div> 
          
          <div class="sub-header mb-3">   
           <?php  if(get_post_meta($post->ID, "sku", true) != ""){ ?>
                <span class="small opacity-5 mr-2">SKU: <?php echo get_post_meta($post->ID, "sku", true); ?></span>
           <?php } ?>
           
             <?php  $qty_min = 1; if($qty > 0){ ?>
                <span class="small text-success"><?php echo __("In stock","premiumpress"); ?></span>
            <?php } ?>

</div>



<?php }else{ ?>

<div class="sub-header mb-3">   
           <?php  if(get_post_meta($post->ID, "sku", true) != ""){ ?>
                <span class="small opacity-5 mr-2">SKU: <?php echo get_post_meta($post->ID, "sku", true); ?></span>
           <?php } ?>
           
             <?php  $qty_min = 1; if($qty > 0){ ?>
                <span class="small text-success"><?php echo __("In stock","premiumpress"); ?></span>
            <?php } ?>

</div>

     <div class="d-flex  align-items-center mb-4 w-100">
           
            <div class="h2 pricetag text-primary <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo do_shortcode('[PRICE]'); ?></div>
            <?php if(is_numeric($oldprice) && $oldprice > 0){ ?>
            <div class="h3 pricetag font-weight-normal opacity-8 ml-3  <?php echo $CORE->GEO("price_formatting",array()); ?>" style="text-decoration:line-through;"><?php echo hook_price(array($oldprice,0)) ; ?></div>
            <?php } ?>
            
          </div> 

<?php } ?>


<?php } break;

case "cm": {

// GET OLD PRICE
$oldprice = get_post_meta($post->ID,'old_price',true); 

 ?>
 

<div class="sub-header mb-3">   
           <?php  if(get_post_meta($post->ID, "sku", true) != ""){ ?>
                <span class="small opacity-5 mr-2">SKU: <?php echo get_post_meta($post->ID, "sku", true); ?></span>
           <?php } ?>
           
         
                <span class="small text-success"><?php echo __("In stock","premiumpress"); ?></span>
             
</div>

     <div class="d-flex  align-items-center mb-4 w-100">
           
            <div class="h2 pricetag text-primary <?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo do_shortcode('[PRICE]'); ?></div>
            <?php if(is_numeric($oldprice) && $oldprice > 0){ ?>
            <div class="h3 pricetag font-weight-normal opacity-8 ml-3  <?php echo $CORE->GEO("price_formatting",array()); ?>" style="text-decoration:line-through;"><?php echo hook_price(array($oldprice,0)) ; ?></div>
            <?php } ?>
            
          </div> 
 
 
<?php } break; ?>


<?php } // end switch ?>
   
         
         
      

 <?php if($CORE->USER("membership_hasaccess", "view_profile")){  ?> 


          
          <div class="addeditmenu mr-4" data-key="content"></div>
          
          <div class="card-text <?php if(!isset($GLOBALS['global_design3'])){ ?> addReadMore showlesscontent<?php } ?> mb-4"><?php echo do_shortcode('[CONTENT]'); ?></div>
          
          
          
 <?php if(in_array(_ppt(array('design', 'display_addthis')), array("","1"))){ ?>
<div class="addthis_inline_share_toolbox mb-4"></div>            
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-6041aeed65b26d12"></script>
<?php } ?> 

          
          
<?php if(!isset($GLOBALS['global_design3']) && !in_array(THEME_KEY, array("sp","es"))  ){ ?>        
<script>
function AddReadMore() {

    var carLmt = 420;
    var readMoreTxt = " ... <?php echo __("Read More","premiumpress"); ?>";
    var readLessTxt = " <?php echo __("Read Less","premiumpress"); ?>";
 
    jQuery(".addReadMore").each(function() {
        if (jQuery(this).find(".firstSec").length)
            return;

        var allstr = jQuery(this).text();
        if (allstr.length > carLmt) {
            var firstSet = allstr.substring(0, carLmt);
            var secdHalf = allstr.substring(carLmt, allstr.length);
            var strtoadd = firstSet + "<span class='SecSec'>" + secdHalf + "</span><span class='readMore'  title='Click to Show More'><u>" + readMoreTxt + "</u></span><span class='readLess' title='Click to Show Less'><u>" + readLessTxt + "</u></span>";
            jQuery(this).html(strtoadd);
        }

    });
    jQuery(document).on("click", ".readMore,.readLess", function() {
        jQuery(this).closest(".addReadMore").toggleClass("showlesscontent showmorecontent");
    });
}
jQuery(document).ready(function(){ 
    AddReadMore();
});
</script>
<?php } ?>


      <?php }else{ ?>
    <div class="position-relative">
      <div class="post-body content-blur" style=" width: 100%;    height: 100%;    border: 5px solid #FFF;    background: #FFF;    clip: rect(300px, 415px, 605px, 0);    z-index: 2;    -webkit-transform: translate3d(0, 0, 0);    -webkit-transform-origin: 0 0;    -webkit-filter: blur(5px);    -webkit-backface-visibility: hidden;">
      
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque consequat. Mauris ornare tempor nulla, vel sagittis diam convallis eget.</p>
        
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue. Pellentesque nec lacus elit. Pellentesque convallis nisi ac augue pharetra eu tristique neque consequat. Mauris ornare tempor nulla, vel sagittis diam convallis eget.</p>
       
      </div>
      <div style="top:45%; left:-20px;" class="position-absolute w-100 text-center font-weight-bold"> <i class="fa fa-lock-alt mr-2"></i> <?php echo __("Members Only","premiumpress") ?> </div>
    </div>
    <?php } ?>