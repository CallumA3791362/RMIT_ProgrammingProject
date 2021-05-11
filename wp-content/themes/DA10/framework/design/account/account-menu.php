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

<div class="mb-4">
  <div class="card">
    <div class="card-body">
      <?php foreach($CORE->USER("get_account_links", array()) as $k => $i){  ?>
      <a <?php if($i['link'] != ""){ ?>href="<?php echo $i['link']; ?>"<?php }else{ ?>onclick="SwitchPage('<?php echo $k; ?>');" href="javascript:void(0);"<?php } ?>  class="btn btn-block btn-system btn-xl btn-icon icon-before mt-2 mb-2 position-relative"> <i class="fal <?php echo $i['icon'] ?> mr-2 text-primary"></i> <?php echo $i['name'] ?> <span class="menu-alert-<?php echo $k; ?> badge badge-danger position-absolute" style="min-width: 21px; display:none;    padding: 5px !important;    top: -5px;    right: -5px;">0</span> </a>
      <?php if($k == "details"){ ?>
      <ul class="list-unstyled mt-3" id="account_jumplinks" style="display:none;line-height:30px;">
        <li class="list-item"> <a onclick="showdetails('details');" href="javascript:void(0);" class="active text-dark" data-toggle="tab" role="tab"> <i class="fa fa-angle-right ml-2 mr-2 hide-mobile"></i> <?php echo __("Details","premiumpress") ?> </a> </li>
       
       
        <li class="list-item"> <a onclick="showdetails('username');" href="javascript:void(0);" data-toggle="tab" role="tab" class="text-dark"> <i class="fa fa-angle-right ml-2 mr-2 hide-mobile"></i> <?php echo __("Username","premiumpress") ?> </a> </li>
        
        <?php if(!in_array(THEME_KEY, array("da","es"))){ ?>
        <li class="list-item"> <a onclick="showdetails('photo');" href="javascript:void(0);" data-toggle="tab" role="tab" class="text-dark"> <i class="fa fa-angle-right ml-2 mr-2 hide-mobile"></i> <?php echo __("Photo","premiumpress") ?> </a> </li>
      	<?php } ?>
      
        <li class="list-item"> <a onclick="showdetails('address');" href="javascript:void(0);" data-toggle="tab" role="tab" class="text-dark"> <i class="fa fa-angle-right ml-2 mr-2 hide-mobile"></i> <?php echo __("Address","premiumpress") ?> </a> </li>
       
       
       <?php if(in_array(_ppt(array('user','email_notify')),array("","1"))){ ?>
       
            <li class="list-item"> <a onclick="showdetails('notifications');" href="javascript:void(0);" data-toggle="tab" role="tab" class="text-dark"> <i class="fa fa-angle-right ml-2 mr-2 hide-mobile"></i> <?php echo __("Email Notifications","premiumpress") ?> </a> </li>
            
            <?php } ?>
            
            <?php /*
                <li class="list-item"> <a onclick="showdetails('search');" href="javascript:void(0);" data-toggle="tab" role="tab" class="text-dark"> <i class="fa fa-angle-right ml-2 mr-2 hide-mobile"></i> <?php echo __("Saved Searches","premiumpress") ?> </a> </li>
       */?>
       
        <?php if( _ppt(array('user','cashout')) == "1" ){ ?>
        <li class="list-item"> <a onclick="showdetails('payment');" href="javascript:void(0);" data-toggle="tab" role="tab" class="text-dark"> <i class="fa fa-angle-right ml-2 mr-2 hide-mobile"></i> <?php echo __("Payment","premiumpress") ?> </a> </li>
        <?php } ?>
        <li class="list-item"> <a onclick="showdetails('password');" href="javascript:void(0);" data-toggle="tab"  role="tab" class="text-dark"> <i class="fa fa-angle-right ml-2 mr-2 hide-mobile"></i> <?php echo __("Password","premiumpress") ?> </a> </li>
      </ul>
      <?php } ?>
      <script>
   
function SwitchPage(apage){

	jQuery(".account_page_wrapper").hide();
	jQuery("#"+apage).show();
	
	if(apage == "messages"){
	ajax_load_chat_list();
	}
	
	if(apage == "username"){	
		jQuery("#details").show();
		showdetails('username');
	}
	
	if(apage == "photo"){	
		jQuery("#details").show();
		showdetails('photo');
	}
		
	if(apage == "address"){	
		jQuery("#details").show();
		showdetails('address');
	}
	
	if(apage == "payment"){	
		jQuery("#details").show();
		showdetails('payment');
	}
	
	if(apage == "password"){	
		jQuery("#details").show();
		showdetails('password');
	}
	
	if(apage == "notifications"){	
		jQuery("#details").show();
		showdetails('notifications');
	}
	
	
	if(apage == "details"){
	jQuery("#account_jumplinks").show();
	}else{
	jQuery("#account_jumplinks").hide();
	}
}

jQuery(document).ready(function(){ 

	SwitchPage('dashboard');	
	
	// Toggle
	var off = false;
	var toggle = jQuery('.toggle');
	toggle.siblings().hide();
	toggle.show();

	

});

function ToggleME(div){

 
		var self = jQuery("#"+div+'_toggle .toggle');
		
			if (self.hasClass('on')) {				 
				self.removeClass('on').addClass('off');
				jQuery('#'+div).val(0);
			} else {				 
				self.removeClass('off').addClass('on');
				jQuery('#'+div).val(1);
			}

}
   
   </script>
      <?php } ?>
      <div class="divider-or"><span class="mt-n1"><?php echo __("Or","premiumpress") ?></span></div>
     
    
	<?php if(in_array(_ppt(array('user','favs')), array("","1")) ){ ?>
      <a href="<?php echo home_url()."/?s=&favs=1"; ?>" class="btn btn-block btn-light mt-2 btn-md"><?php echo __("My Favorites","premiumpress") ?> <?php $fc = $CORE->USER("favs_count", $userdata->ID); if($fc > 0){ ?>(<?php echo $fc; ?>)<?php } ?>  </a>
   <?php } ?>
     
     <?php if(in_array(THEME_KEY, array("da")) ){ global $wpdb;
	 
	  $singleListingLink = $CORE->USER("get_user_profile_link",$userdata->ID);	
	
	 if(_ppt(array('lst','onelistingonly')) == "1"  ){  //&& !$CORE->USER("membership_hasaccess", "listings_multiple")  
  
		$SQL = "SELECT DISTINCT ".$wpdb->posts.".ID FROM ".$wpdb->posts." WHERE post_type = 'listing_type' AND post_status = 'publish' AND post_author = ('".$userdata->ID."') LIMIT 1";				 
		$query = $wpdb->get_results($SQL, OBJECT);
	 	
		if(!empty($query)){		
			
			$singleListingLink = get_permalink($query[0]->ID);
		 
		 }else{
		 
		 	$singleListingLink = _ppt(array('links','add'));
		 }
	 
	 }
	 
	 
	 ?>
      <a href="<?php echo $singleListingLink; ?>" class="btn btn-block btn-light mt-2 btn-md"><?php echo __("View My Profile","premiumpress"); ?></a>
  
      <?php }elseif(!in_array(THEME_KEY, array("es"))  && _ppt(array('user','allow_profile')) == "1"){ ?>
      <a href="<?php echo $CORE->USER("get_user_profile_link",$userdata->ID); ?>" class="btn btn-block btn-light mt-2 btn-md"><?php echo __("View My Profile","premiumpress"); ?></a>
      <?php } ?>
      
      <a href="<?php echo wp_logout_url(home_url()); ?>" class="btn btn-block btn-light mt-2 btn-md"><?php echo __("Logout","premiumpress") ?> </a> </div>
  </div>
</div>