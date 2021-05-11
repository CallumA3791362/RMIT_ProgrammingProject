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

global $CORE, $userdata, $post;

 

?>

<select class="form-control w-100 show-mobile hide-ipad hide-desktop mt-4 mb-4" onchange="SwitchPage(this.value);">
  <?php foreach($CORE->USER("get_account_links", array()) as $k => $i){  ?>
  <option value="<?php echo $k; ?>"><?php echo $i['name'] ?></option>
  
  <?php if($k == "details"){ ?> 
  
   
         <option value="username"> - <?php echo __("Username","premiumpress") ?> </option>
         <option value="photo"> - <?php echo __("Photo","premiumpress") ?> </option>
         <option value="address"> - <?php echo __("Address","premiumpress") ?> </option>
        <?php if( _ppt(array('user','cashout')) == "1" ){ ?>
         <option value="payment"> - <?php echo __("Payment","premiumpress") ?> </option>
        <?php } ?>
         <option value="password"> - <?php echo __("Password","premiumpress") ?></option>
  
  <?php } ?>
  
  
  <?php } ?>
</select>
