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

	case "da": {
	$title = __("About Me","premiumpress");
	} break;
	
	case "mj": {
	$title = __("Job Details","premiumpress");
	} break;
	
	case "cm": {
		
		$title = __("Details","premiumpress");
		
		$content 	= get_post_meta($post->ID,'cm_verdict',true);
		if(strlen($content) > 1){ 
		 $title = "";
		}
	
	
	} break;
	
	default: {	
	$title = __("Details","premiumpress");
	} break;
} 

// SET DEFAULTS
$fielddata = "";

if(THEME_KEY == "mj"){
	ob_start();
	echo do_shortcode('[FEATURES_TAX]');
	$fielddata .= ob_get_clean();
}
ob_start();
echo do_shortcode('[FIELDS style="1"]');
$fielddata .= ob_get_clean();
 
?>

<div class="card <?php if(isset($GLOBALS['global_design3'])){ echo "border-0"; } ?>" id="block-customfields">
  <div class="card-body">
    <div class="<?php if(!isset($GLOBALS['global_design3'])){ echo 'p-lg-4'; } ?>">    
      <?php if(THEME_KEY == "cm"){  ?>
      <div class="addeditmenu" data-key="compare"></div>
      <?php }else{ ?>
      <div class="addeditmenu" data-key="customfields"></div>
      <?php } ?>
      
      <?php if(strlen($fielddata) > 5){ ?>
      <div id="single-display-fields">
        <?php if($title != ""){ ?>
        
        <?php if(THEME_KEY == "at"){  ?>
        <span class="float-right font-weight-bold opacity-5"><?php echo __("LOT Numer","premiumpress"); ?>: #<?php echo $post->ID; ?></span>
        <?php } ?>
        
        <h5 class="card-title mb-4"><?php echo $title; ?></h5>
        <?php } ?>
        <?php echo $fielddata; ?> </div>
      <?php } ?>
      
      
      
      
      
      
      <?php if(THEME_KEY == "dt" ){ ?>
      
      
      <?php if(in_array(_ppt(array('lst', 'dt_services')), array("","1"))){ $current_data = get_post_meta($post->ID,'customextras', true); if( !empty($current_data) ){ $i=0;  ?>
      
      
      <div id="single-display-services">
       
        <div class="addeditmenu" data-key="services"></div>
        <h5 class="card-title"><?php echo __("Services","premiumpress"); ?></h5>
         <?php  foreach($current_data['name'] as $data){ if($current_data['name'][$i] !=""){  ?>
         <div class="mb-4 w-100">
         
             <div class="d-flex justify-content-between">
             	<span><?php echo stripslashes($current_data['name'][$i]); ?></span>
                <?php if(strlen($current_data['price'][$i]) > 0){ ?>
            	 <span><em><?php echo hook_price($current_data['price'][$i]); ?></em></span>
                 <?php } ?>
             </div>
             <?php if(strlen($current_data['value'][$i]) > 0){ ?>
             <div class="small mt-2 opacity-5 ">
            	<?php echo stripslashes($current_data['value'][$i]); ?>
             </div>  
             <?php } ?>       
         
         </div>
         <?php } $i++; } ?>
         
          <hr class="my-4" />
                  
      </div>
      
      <?php } } ?>
      
      
      
      
      
      <?php if( in_array(_ppt(array('design', "display_openinghours")), array("","1"))  ){  ?>
      <div id="single-display-openinghours">
       
        <div class="addeditmenu" data-key="openinghours"></div>
        <h5 class="card-title"><?php echo __("Opening Hours","premiumpress"); ?></h5>
        <?php _ppt_template( 'framework/design/singlenew/blocks/openinghours' );  ?>
      </div>
      <?php } ?>
      <?php } ?>
      
      <?php if(in_array(THEME_KEY, array("ct")) && _ppt(array('design','display_delivery')) != "0" ){ if(_ppt(array('lst','ct_delivery')) == "1"){ }else{ ?>
      <hr class="my-4" />
      <?php _ppt_template( 'framework/design/singlenew/blocks/features-delivery' );  ?>
      <?php  } } ?>
      
      <?php if(THEME_KEY == "cm"){ 
   
	$content 	= get_post_meta($post->ID,'cm_verdict',true);
	$for 		= get_post_meta($post->ID,'cm_for',true);
	$against 	= get_post_meta($post->ID,'cm_against',true);
	$rating 	= get_post_meta($post->ID,'cm_rating',true);
	 
	$forList  = preg_split('/\r\n|\r|\n/',$for);
	$againstList = preg_split('/\r\n|\r|\n/',$against);
	
	if(!is_numeric($rating)){ $rating = 5; }
  
  if(strlen($content) > 1){ 
  ?>
      <div class="float-right text-warning">
        <input type="hidden" class="rating" data-readonly value="<?php echo $rating; ?>" />
        <div class="small text-dark"><em><?php echo $rating; ?> <?php echo __("star rating!","premiumpress") ?></em></div>
      </div>
      <h5 class="card-title mb-4"><?php echo __("Our Verdict","premiumpress") ?></h5>
      <div class="line-height-30"><?php echo wpautop($content); ?></div>
      <div class="row border-top pt-3">
        <?php if(is_array($forList) && !empty($forList)){ ?>
        <div class="col-6">
          <h5><?php echo __("For","premiumpress") ?> <i class="fal fa-smile text-success"></i> </h5>
          <ul class="list-unstyled small">
            <?php  foreach($forList as $pro){ ?>
            <li class="mb-2"><i class="fa fa-plus mr-2"></i> <?php echo $pro; ?></li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
        <?php if(is_array($againstList) && !empty($againstList)){ ?>
        <div class="col-6">
          <h5><?php echo __("Against","premiumpress") ?> <i class="fal fa-frown text-danger"></i></h5>
          <ul class="list-unstyled small">
            <?php  foreach($againstList as $pro){ ?>
            <li class="mb-2"><i class="fa fa-minus mr-2"></i> <?php echo $pro; ?></li>
            <?php } ?>
          </ul>
        </div>
        <?php } ?>
      </div>
      <?php } ?>
      
      <?php }elseif(THEME_KEY == "ll"){ ?>
	  
	  
     
      
      
      
      <?php }elseif(THEME_KEY == "jb"){
	   
	   
if(in_array(_ppt(array('design', 'display_core_fields')), array("","1"))){   
$mydetails = array(
	
	1 => array(
		"icon" => "",
		"title" =>  __("Job ID","premiumpress"),
		"value" =>  "#".$post->ID,		
	),
	
	2 => array(
		"icon" => "",
		"title" =>  __("Company","premiumpress"),
		"value" => get_post_meta($post->ID, "company", true),	
	),

	3 => array(
		"icon" => "",
		"title" =>  __("Salary","premiumpress"),
		"value" => do_shortcode('[SALARY]')." ".do_shortcode('[SALARYTYPE]'),	
	),
	
	/*4 => array(
		"icon" => "",
		"title" =>  __("Salary Pricing","premiumpress"),
		"value" => do_shortcode('[SALARYTYPE]'),	
	),*/ 
	
	5 => array(
		"icon" => "",
		"title" =>  __("Type","premiumpress"),
		"value" => do_shortcode('[JOBTYPE]'),	
	),  
 
);


 
?>
      <div class="ppt_shortcode_fields style-1">
        <div class="row">
          <?php foreach($mydetails as $d){?>
          <div class="col-xl-6">
            <div class=" mb-3 fieldrow small fieldtype-0">
              <div class="title btn-block mb-3"><?php echo $d['title']; ?> </div>
              <div class="text">
                <?php if($d['icon'] != ""){ ?>
                <i class="<?php echo $d['icon']; ?> mr-2"></i>
                <?php } ?>
                <span class="title"><?php echo $d['value']; ?></span> </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      
<?php  } ?>

      <?php if(get_post_meta($post->ID,'qualifications',true) != "" || defined('WLT_DEMOMODE') ){ ?>
      <h5 class="card-title"><?php echo __("Qualifications","premiumpress") ?></h5>
      <div class="post-body mb-5"> <?php echo str_replace("/n/n","<br><br>",wpautop(get_post_meta($post->ID,'qualifications',true))); ?> </div>
      <?php } ?>
      
      
      <?php }elseif(THEME_KEY == "mj"){ 
	
	
if($CORE->USER("get_verified", $userdata->ID) == "1"){
$verified = '<span class="onlinebadge online text-dark badge border px-2 bg-white"><i class="fa fa-award text-success"></i> '.__("Email Verified","premiumpress").'</span>';
}else{
$verified = '<span class="onlinebadge online text-dark badge border px-2 bg-white"><i class="fa fa-award text-danger"></i> '.__("Not Verified","premiumpress").'</span>';
}

$mydetails = array(
	
	1 => array(
		"icon" => "fal fa-user-tie",
		"title" =>  __("Joined","premiumpress"),
		"value" =>  $CORE->USER("get_joined",  $userdata->ID),		
	),
	
	2 => array(
		"icon" => "fal fa-lightbulb",
		"title" =>  __("Last Online","premiumpress"),
		"value" => $CORE->USER("get_lastlogin",  $userdata->ID),	
	),

	3 => array(
		"icon" => "",
		"title" =>  __("Location","premiumpress"),
		"value" => $CORE->USER("get_country", $userdata->ID)." ".$CORE->USER("get_country_flag", $userdata->ID),	
	),
	
	4 => array(
		"icon" => "",
		"title" =>  __("User Verified","premiumpress"),
		"value" => $verified,	
	),

	5 => array(
		"icon" => "fal fa-award",
		"title" =>  __("User Level","premiumpress"),
		"value" => "<span class='badge badge-success'>".__("Level","premiumpress")." ".$CORE->USER("get_level",  $userdata->ID)."</span>",	
	),
	
	
	6 => array(
		"icon" => "fal fa-sync",
		"title" =>  __("Total Jobs Sold","premiumpress"),
		"value" => $CORE->USER("count_offers_complete", $userdata->ID),	
	),	
	
 
 
);

if(_ppt(array("user","level")) == "0"){
unset($mydetails[5]);
}

?>
      <h5 class="card-title my-4"><?php echo __("Seller Details","premiumpress"); ?></h5>
      <div class="ppt_shortcode_fields style-1">
        <div class="row">
          <?php foreach($mydetails as $d){?>
          <div class="col-xl-6">
            <div class=" mb-3 fieldrow small fieldtype-0">
              <div class="title btn-block mb-3"><?php echo $d['title']; ?> </div>
              <div class="text">
                <?php if($d['icon'] != ""){ ?>
                <i class="<?php echo $d['icon']; ?> mr-2"></i>
                <?php } ?>
                <span class="title"><?php echo $d['value']; ?></span> </div>
            </div>
          </div>
          <?php } ?>
        </div>
      </div>
      <?php } ?>
      
      
      <?php if(!in_array(THEME_KEY, array("vt","ll")) && in_array(_ppt(array('design', 'display_details_video')), array("","1"))  && isset($GLOBALS['global_design1']) ){  $_POST['small'] = 1; $_POST['pid'] = $post->ID; ?>
      <?php _ppt_template( 'ajax-modal-video' );  ?>
      <?php } ?>
      
      
    </div>
  </div>
</div>
