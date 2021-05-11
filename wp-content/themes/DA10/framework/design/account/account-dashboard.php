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

global $CORE, $userdata; $showDashboard = true;


?>
<?php if($CORE->ADVERTISING("check_exists", "account_top") ){ ?>

<div class="col-12">
  <div class="py-4 text-center"> <?php echo $CORE->ADVERTISING("get_banner", "account_top" );  ?> </div>
</div>
<?php } ?>
<?php if(strlen(get_user_meta($userdata->ID,'ppt_customtext', true)) > 1){  ?>
<div class="alert alert-success text-center"> <?php echo get_user_meta($userdata->ID,'ppt_customtext', true); ?></div>
<?php } ?>
<div class="row my-4">
  <?php 
  
  if(THEME_KEY != "sp"){
  
  _ppt_template( 'framework/design/account/account-dashboard-icons' );
  
  
  }
  
  ?>
  <div class="col-xl-6">
    <?php
	  
	  if(THEME_KEY == "sp"){
	  
	  _ppt_template( 'framework/design/account/account-dashboard-orders' ); 
	   
	  }elseif( ( in_array(THEME_KEY, array("cp","vt")) || _ppt(array('lst','websitepackages')) == "0" || 
	   _ppt(array('lst','adminonly')) == "1" ) || ( in_array(THEME_KEY, array("es")) && in_array(get_user_meta($userdata->ID, "user_type", true), array("","1")) ) ||
	    ( in_array(THEME_KEY, array("jb","mj","ll")) && in_array(get_user_meta($userdata->ID, "user_type", true), array("","user_fr")) ) ){
	  
	  _ppt_template( 'framework/design/account/account-dashboard-carousel' );
	  
	  }else{
	  
	  _ppt_template( 'framework/design/account/account-dashboard-chart' );
	  
	  }
	  
	   ?>
  </div>
  <div class="col-xl-6">
    <?php 
	
	if( in_array(_ppt(array('user','account_messages')), array("","1")) ){
	
	_ppt_template( 'framework/design/account/account-dashboard-messages' ); 
	 
	}
	
	?>
  </div>
</div>
