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

global $CORE, $userdata;

$_POST['pid'] = $post->ID;
$GLOBALS['top-video'] = 1;
 
?>

<div class="position-relative card card-body  card-top-image mb-4 top-gallery">
  <div class="addeditmenu" data-key="video"></div>
  <?php _ppt_template( 'ajax-modal-video' ); ?>
  <div class="py-4">
    <?php _ppt_template( 'framework/design/singlenew/blocks/top-content' ); ?>
  </div>
</div>
