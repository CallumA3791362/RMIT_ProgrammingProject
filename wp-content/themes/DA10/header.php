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
 
 
if (!headers_sent()){ header('X-UA-Compatible: IE=edge'); }


global $CORE, $post, $userdata; 


ob_start();
language_attributes();
$ll = ob_get_contents();
ob_end_clean(); 
if(!$CORE->GEO("is_right_to_left", array() ) ){
$ll = str_replace('dir="rtl"','',$ll);
$ll = str_replace('lang="ar"','',$ll);
}

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php echo $ll;  ?>>
<!--[if lte IE 8 ]>
<html lang="en" class="ie ie8">
   <![endif]-->
<!--[if IE 9 ]>
   <html lang="en" class="ie">
      <![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge" /><![endif]-->
<title><?php echo _ppt_meta_title(); ?></title>
<?php 
		// META DESCRIPTION
		echo _ppt_meta_description();
		
		// META KEYWORDS
		echo _ppt_meta_keywords();

?>
<?php wp_head();  ?>
</head>

<?php

ob_start();
body_class();
$bc = ob_get_contents();
ob_end_clean(); 
if(!$CORE->GEO("is_right_to_left", array() ) ){
$bc = str_replace("rtl ","",$bc);
}

?>

<body <?php echo $bc; ?>>

<?php if(_ppt_livepreview()){ ?>
<?php _ppt_template( '_preview' );  ?>
<?php }else{  ?>
<div id="wrapper" <?php if(in_array(_ppt(array('design','preloader')), array("","1"))){ ?>style="display:none;"<?php } ?>>

<div id="sidebar-wrapper" style="display:none;">
  <?php _ppt_template( 'header', 'sidebar' );  ?>
</div>

<main id="page-content-wrapper" <?php if(_ppt('footer_mobile_menu') == "1"){ ?>class="with-mobilemenu"<?php } ?>>
<?php
 

if(isset($GLOBALS['flag-blankpage'])){
 
	_ppt_template( 'header', 'menu' ); 
				
}else{

	_ppt_template( 'header', 'menu' ); 

if($CORE->ADVERTISING("check_exists", "header") ){ ?>
<div class="py-4 text-center border-top border-bottom"> <?php echo $CORE->ADVERTISING("get_banner", "header" );  ?> </div>
<?php } ?>
<?php } ?>
<?php } ?>
