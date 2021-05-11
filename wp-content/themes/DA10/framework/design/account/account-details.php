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
   $seek1 = "";
   $seek2 = "";
   	
   	// USER COUNTRY
   	$selected_country = $CORE->USER("get_address_part", array("country", $userdata->ID) ); 
   	if($selected_country == ""){
   		$selected_country = _ppt(array('user','account_usercountry'));
   	}
	
	// CHECK FOR USERNAME CHANGE
	$old_username = get_user_meta($userdata->ID,'old_username',true);
   
   ?>
<script>


function showdetails(type){
	
	if(type == "details"){
	
		jQuery("#my-details").show();
		jQuery("#my-address").hide();
		jQuery("#my-password").hide();
		jQuery("#my-social").show();
		jQuery("#my-payment").hide();
		jQuery("#my-photo").hide();	
		jQuery("#my-username").hide();
		jQuery("#my-notifications").hide();	
		jQuery("#my-search").hide();
	
	}else if(type == "password"){
		
		jQuery("#my-payment").hide();
		jQuery("#my-details").hide();
		jQuery("#my-address").hide();
		jQuery("#my-password").show();
		jQuery("#my-social").hide();
		jQuery("#my-photo").hide();	
		jQuery("#my-username").hide();
		jQuery("#my-notifications").hide();	
		jQuery("#my-search").hide();	
	
	}else if(type == "address"){
		
		jQuery("#my-payment").hide();
		jQuery("#my-details").hide();
		jQuery("#my-address").show();
		jQuery("#my-password").hide();
		jQuery("#my-social").hide();
		jQuery("#my-photo").hide();	
		jQuery("#my-username").hide();	
		jQuery("#my-notifications").hide();	
		jQuery("#my-search").hide();
		
	}else if(type == "payment"){
		
		jQuery("#my-payment").show();
		jQuery("#my-details").hide();
		jQuery("#my-address").hide();
		jQuery("#my-password").hide();		
		jQuery("#my-social").hide();
		jQuery("#my-photo").hide();
		jQuery("#my-username").hide();	
		jQuery("#my-notifications").hide();		
		jQuery("#my-search").hide();		
	
	 }else if(type == "photo"){
		
		jQuery("#my-payment").hide();
		jQuery("#my-details").hide();
		jQuery("#my-address").hide();
		jQuery("#my-password").hide();		
		jQuery("#my-social").hide();
		jQuery("#my-photo").show();	
		jQuery("#my-username").hide();	
		jQuery("#my-notifications").hide();	
		jQuery("#my-search").hide();

	 }else if(type == "username"){
		
		jQuery("#my-payment").hide();
		jQuery("#my-details").hide();
		jQuery("#my-address").hide();
		jQuery("#my-password").hide();		
		jQuery("#my-social").hide();
		jQuery("#my-photo").hide();	
		jQuery("#my-username").show();	
		jQuery("#my-notifications").hide();	
		jQuery("#my-search").hide();

	 }else if(type == "notifications"){
		
		jQuery("#my-payment").hide();
		jQuery("#my-details").hide();
		jQuery("#my-address").hide();
		jQuery("#my-password").hide();		
		jQuery("#my-social").hide();
		jQuery("#my-photo").hide();	
		jQuery("#my-username").hide();	
		jQuery("#my-notifications").show();	
		jQuery("#my-search").hide();

	 }else if(type == "search"){
		
		jQuery("#my-payment").hide();
		jQuery("#my-details").hide();
		jQuery("#my-address").hide();
		jQuery("#my-password").hide();		
		jQuery("#my-social").hide();
		jQuery("#my-photo").hide();	
		jQuery("#my-username").hide();	
		jQuery("#my-notifications").hide();	
		jQuery("#my-search").show();

			
	}
		
	
	

	SwitchPage('details');

}

 

</script>
<?php /*
<div class="tabbable-panel hide-mobile">
  <div class="tabbable-line">
    <ul class="nav nav-tabs clearfix">
      <li class="nav-item"> <a onclick="showdetails('details');" href="javascript:void(0);" class="nav-link py-3  active" data-toggle="tab" role="tab"> <span class="px-lg-2 "> <?php echo __("Details","premiumpress") ?></span> </a> </li>
      <li class="nav-item"> <a onclick="showdetails('username');" href="javascript:void(0);" class="nav-link py-3" data-toggle="tab" role="tab"> <span class="px-lg-2 "> <?php echo __("Username","premiumpress") ?></span> </a> </li>
      <li class="nav-item"> <a onclick="showdetails('photo');" href="javascript:void(0);" class="nav-link py-3" data-toggle="tab" role="tab"> <span class="px-lg-2 "> <?php echo __("Photo","premiumpress") ?></span> </a> </li>
      <li class="nav-item"> <a onclick="showdetails('address');" href="javascript:void(0);" class="nav-link py-3" data-toggle="tab" role="tab"> <span class="px-lg-2 "> <?php echo __("Address","premiumpress") ?></span> </a> </li>
      <?php if( _ppt(array('user','cashout')) == "1" ){ ?>
      <li class="nav-item"> <a onclick="showdetails('payment');" href="javascript:void(0);" class="nav-link py-3  " data-toggle="tab" role="tab"> <span class="px-lg-2 "> <?php echo __("Payment","premiumpress") ?></span> </a> </li>
      <?php } ?>
      <li class="nav-item"> <a onclick="showdetails('password');" href="javascript:void(0);" class="nav-link py-3  " data-toggle="tab"  role="tab"> <span class="px-lg-2 "> <?php echo __("Password","premiumpress") ?></span> </a> </li>
    </ul>
  </div>
</div>

*/ ?>

<form action="" method="post" id="userdetailsform" onsubmit="return js_validate_fields('<?php echo __("Please completed required fields.","premiumpress") ?>')" enctype="multipart/form-data">
  <input type="hidden" name="action" value="userupdate" />
  <div class="card">
    <div class="card-body">
      <div id="my-details" >
        <div class="row">
          <div class="col-md-12">
            <div class="card-header mt-n2 mb-4 ml-n2 mr-n2 bg-white">
              <h4 class="text-black mb-0 ml-n2"><?php echo __("About Me","premiumpress"); ?> </h4>
            </div>
          </div>
          <?php if(in_array(THEME_KEY, array("jb","mj", "ll")) ){ 
		  
		  	$mtype = get_user_meta($userdata->ID,'user_type',true);
		  
		  	if(THEME_KEY == "mj"){
				global $CORE_MICROJOBS;	
				$accountTypes = $CORE_MICROJOBS->_user_types();
			}elseif(THEME_KEY == "es"){
				global $CORE_ESCORTTHEME;	
				$accountTypes = $CORE_ESCORTTHEME->_escort_types();
			}elseif(THEME_KEY == "jb"){
				global $CORE_JOBS;	
				$accountTypes = $CORE_JOBS->_user_types();	
			}elseif(THEME_KEY == "ll"){
			global $CORE_LEARNING;	
			$accountTypes = $CORE_LEARNING->_user_types();	
			}
				  
		  ?>
          <div class="col-md-6">
            <label class="control-label"><?php echo __("I'm a","premiumpress"); ?></label>
            <select name="user_type" class="form-control" <?php if(THEME_KEY == "ex"){?>onchange="switchlabel(this.value)"<?php } ?>>
              <?php foreach($accountTypes as $k => $g){ ?>
              <option value="<?php echo $k ?>" <?php if($mtype == $k){ echo "selected='selected'"; } ?>>
              <?php if(isset($g['name'])){ echo $g['name']; }else{ echo $g; } ?>
              </option>
              <?php } ?>
            </select>
          </div>
          <script>

function switchlabel(val){

	if(val == "user_em"){
	txt = "<?php echo __("I can teach","premiumpress"); ?>";
	}else{
	txt = "<?php echo __("I'm want to learn","premiumpress"); ?>";
	}
	jQuery("#da-seeking2-label").html(txt);
}

</script>
          <?php } ?>
          <?php if( THEME_KEY == "pj" && get_user_meta($userdata->ID,'user_type',true) == "user_fr" ){  $rate = get_user_meta($userdata->ID,'ppt_hourlyrate',true); if($rate == ""){ $rate = 0; } ?>
          <div class="col-md-12">
            <div class="bg-light p-3 mb-4">
              <label class="control-label"><?php echo __("My Hourly Rate","premiumpress"); ?></label>
              <div class="input-group mb-3 mt-2">
                <div class="input-group-prepend"> <span class="input-group-text" id="basic-addon1"><?php echo _ppt(array('currency','symbol')); ?></span> </div>
                <input type="text" name="ppt_hourlyrate" value="<?php echo $rate; ?>" class="form-control">
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if( in_array(THEME_KEY, array("da", "es")) ){

$seek1 = get_user_meta($userdata->ID,'da-seek1',true);
$seek2 = get_user_meta($userdata->ID,'da-seek2',true);

  
?>
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <div class="col-md-12 position-relative">
                  <label class="control-label"><?php echo __("I'm a","premiumpress"); ?></label>
                  <select name="da-seek1" class="form-control required">
                    <?php
$count = 1;
$cats = get_terms( 'dagender', array( 'hide_empty' => 0, 'parent' => 0  ));
if(!empty($cats)){
foreach($cats as $cat){ 
if($cat->parent != 0){ continue; } 
 
?>
                    <option value="<?php echo $cat->term_id; ?>" <?php if($seek1 == "" && strtolower($cat->name) == "male"){  echo "selected=selected";  }elseif($seek1 ==  $cat->term_id){ echo "selected=selected"; } ?>> <?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
                    <?php $count++; } } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6" <?php if(_ppt(array('register','da_seeking')) == "1"){ echo 'style="display:none;"'; } ?>>
            <div class="form-group">
              <div class="row">
                <div class="col-md-12 position-relative">
                  <label class="control-label"><?php echo __("Interested In","premiumpress"); ?></label>
                  <select name="da-seek2" class="form-control required" >
                    <?php
$count = 1;
$cats = get_terms( 'dagender', array( 'hide_empty' => 0, 'parent' => 0  ));
if(!empty($cats)){
foreach($cats as $cat){ 
if($cat->parent != 0){ continue; } 
 
?>
                    <option value="<?php echo $cat->term_id; ?>" <?php if($seek2 == "" && strtolower($cat->name) == "female"){  echo "selected=selected";  }elseif($seek2 ==  $cat->term_id){ echo "selected=selected"; } ?>> <?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
                    <?php $count++; } } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <?php }else{ 


   // CATEGORY SELECT
	$seek1 = get_user_meta($userdata->ID,'da-seek2',true);

?>
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <div class="col-md-12 position-relative">
                  <label id="da-seeking2-label" class="control-label">
                  <?php 
		
		if(THEME_KEY == "ex"){
		
		
			if(get_user_meta($userdata->ID,'user_type',true) == "user_em"){
			echo __("I can teach","premiumpress"); 
			}else{		
			echo __("I'm want to learn","premiumpress"); 
			}  
		 
		 }else{ echo __("I'm mostly interested in","premiumpress"); } ?>
                  </label>
                  <select name="da-seek2" class="form-control rounded-0 bg-white">
                    <option value=""><?php echo __("Any Category","premiumpress"); ?></option>
                    <?php
                  $count = 1;
                  $cats = get_terms( 'listing', array( 'hide_empty' => 0, 'parent' => 0  ));
                  if(!empty($cats)){
                  foreach($cats as $cat){ 
                  if($cat->parent != 0){ continue; } 
                   
                  ?>
                    <option value="<?php echo $cat->term_id; ?>" <?php if($seek1 == $cat->term_id){ echo "selected=selected"; } ?>> <?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
                    <?php $count++; } } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <hr />
          </div>
          <?php } ?>
          <div class="col-md-3">
            <div class="form-group">
              <label class="control-label"> <?php echo __("First Name","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="fname" class="form-control requiredfield" value="<?php echo $userdata->first_name ?>" tabindex="1">
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="form-group">
              <label class="control-label"> <?php echo __("Last Name","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="lname" class="form-control requiredfield"  value="<?php echo $userdata->last_name ?>" tabindex="2">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> <?php echo __("Email","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="email" class="form-control requiredfield" value="<?php echo $userdata->user_email; ?>" disabled="disabled" tabindex="3">
              </div>
            </div>
          </div>
          <?php if(!in_array(THEME_KEY , array("da")) ){ ?>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> <?php echo __("Website","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="url" class="form-control" value="<?php echo get_user_meta($userdata->ID,'url',true); ?>" tabindex="4">
              </div>
            </div>
          </div>
          <?php } ?>
          
           
          <?php if(_ppt(array('lang','switch')) == "1" && is_array(_ppt('languages')) && !empty(_ppt('languages'))  ){ ?>
                
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> <?php echo __("My Language","premiumpress"); ?></label>
              <div class="controls">
               
                   <select name="language" class="form-control" tabindex="5" id="user-language">
                  <?php 
				  
				  $selected_lang = get_user_meta($userdata->ID,'language',true);
				  
				  
				  $admin_countries = _ppt('checkout_countries');
				  
                        foreach(_ppt('languages') as $k => $lang){
						
                                if(isset($selected_lang) && $selected_lang == $lang){ $sel ="selected=selected"; }else{ $sel =""; }
                                echo "<option ".$sel." value='".$lang."'>".$CORE->GEO("get_lang_name", $lang)."</option>";
						} 
								
								
				?>
                </select>
               
               
              </div>
            </div>
          </div>
          <?php } ?>
          
          
          <?php /* if(_ppt(array('user','mobile')) != "0"){  ?>
          <div class="col-md-6">
            <div class="form-group">
              <div class="row">
                <div class="col-md-12">
                  <label class="control-label"><?php echo __("Mobile Number","premiumpress"); ?></label>
                </div>
                <div class="col-md-12">
                  <div class="row">
                    <div class="col-4">
                      <input name="custom[mobile-prefix]" type="text" class="form-control" id="mobileprefix-input" placeholder="+" 
                                 value="<?php echo get_user_meta($userdata->ID,'mobile-prefix',true); ?>" />
                    </div>
                    <div class="col-8">
                      <input name="custom[mobile]" type="text" class="form-control" id="mobilenum-input"
                                 value="<?php echo get_user_meta($userdata->ID,'mobile',true); ?>" />
                    </div>
                  </div>
                  <!-- end row -->
                </div>
              </div>
            </div>
          </div>
          <?php } */ ?>
          
          <?php if(!in_array(THEME_KEY , array("da")) ){ ?>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"><?php echo __("Phone","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="phone" class="form-control" value="<?php echo get_user_meta($userdata->ID,'phone',true); ?>" tabindex="5">
              </div>
            </div>
          </div>
          <?php } ?>
          <?php if(!in_array(THEME_KEY , array("da")) ){ ?>
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label"><i class="icon-comment"></i> <?php echo __("My Description","premiumpress"); ?></label>
              <textarea style="height:120px;" class="form-control" name="description" tabindex="6"><?php echo stripslashes($userdata->description); ?></textarea>
            </div>
          </div>
          <?php } ?>
          <div class="col-md-12">
            <div class="row"> <?php echo $CORE->user_fields($userdata->ID); ?> </div>
          </div>
        </div>
      </div>
      <div id="my-username" style="display:none;">
        <h5 class="pb-3 border-bottom mb-4"><?php echo __("My Username","premiumpress"); ?></h5>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">
              <?php if($old_username == ""){ echo __("Current","premiumpress"); }else{ echo __("My","premiumpress"); } ?>
              <?php echo __("Username","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" class="form-control" value="<?php if(isset($_POST['usernamechange'])){ $the_user = get_user_by( 'id', $userdata->ID ); echo $the_user->user_login;  }else{ echo $userdata->user_login; } ?>" disabled="disabled">
              </div>
              <?php if($old_username != ""){ ?>
              <div class="mt-2 text-muted small"><?php echo __("My old username was","premiumpress"); ?> <strong><?php echo $old_username; ?></strong></div>
              <?php } ?>
            </div>
          </div>
          <?php if($old_username == ""){ ?>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> <?php echo __("New","premiumpress"); ?> <?php echo __("Username","premiumpress"); ?> <span id="ajaxMsgUser"></span> </label>
              <div class="controls position-relative">
                <input type="text" name="newusername" id="newusernamefield" class="form-control val-nospaces" value="&nbsp;" tabindex="6" autocomplete="off" onclick="jQuery('#savemydetailsbutton').hide();jQuery('#valnewusername').show();">
                <button type="button" class="btn btn-sm btn-system position-absolute" style="right:10px; top:10px; display:none" id="valnewusername"><?php echo __("validate","premiumpress"); ?></button>
              </div>
              <div class="mt-2 text-muted small"><?php echo __("The username can only be changed once. No spaces or special characters allowed.","premiumpress"); ?></div>
            </div>
          </div>
          <script>
jQuery(document).ready(function() {


jQuery(".showeditusernamefields").show();



         jQuery('#newusernamefield').change(function() { 
		 
		 jQuery('#ajaxMsgUser').html('');
		 
		 if(jQuery('#newusernamefield').val().length > 6){
		 
         
             jQuery.ajax({
                 type: "POST",
                 url: '<?php echo home_url(); ?>/',		
         		data: {
                     action: "validateUsername",
         			name: jQuery('#newusernamefield').val(), 
                 },
                 success: function(response) {
         		 
         			if(response == "yes"){
					
         			jQuery('#ajaxMsgUser').html("<span class='badge badge-danger'><i class='fa fa-close'></i> <?php echo __("Username Taken","premiumpress"); ?></span>");
					
					jQuery('#valnewusername').hide();
					
         			
         			} else {
         			
					jQuery('#ajaxMsgUser').html("<span class='badge badge-success'><i class='fa fa-check-circle'></i> <?php echo __("Valid","premiumpress"); ?></span>");
					
					jQuery('#userdetailsform').append('<input type="hidden" name="usernamechange" value="1">');						
					
					jQuery('#savemydetailsbutton').show();
					
					jQuery('#valnewusername').hide();
					
					
					}			
                 },
                 error: function(e) {
                     alert("error "+e)
                 }
             });
			 
			 
			 }else{
			 
			 jQuery('#ajaxMsgUser').html("<span class='badge badge-danger'><i class='fa fa-close'></i> <?php echo __("Invalid Username","premiumpress"); ?></span>");
					
			 
			 }
         
         });
});
</script>
          <?php } ?>
        </div>
      </div>
      <div id="my-address" style="display:none;">
        <h5 class="pb-3 border-bottom mb-4"><?php echo __("My Address","premiumpress"); ?></h5>
        <!-- end row -->
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> <?php echo __("Address Line 1","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="address1" class="form-control" value="<?php echo $CORE->USER("get_address_part", array("address1", $userdata->ID) ); ?>" tabindex="4">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> <?php echo __("Address Line 2","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="address2" class="form-control" value="<?php echo $CORE->USER("get_address_part", array("address2", $userdata->ID) ); ?>" tabindex="4">
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"><?php echo __("My Country","premiumpress"); ?></label>
              <div class="controls">
                <select name="country" class="form-control" tabindex="6" id="user-country">
                  <?php 
				  
				  $admin_countries = _ppt('checkout_countries');
				  
                        foreach($GLOBALS['core_country_list'] as $key=>$value){
						
						
						// HIDE COUNTRIES
						if( !is_array( $admin_countries ) || is_array($admin_countries) && in_array("0", $admin_countries ) ){						
						
						}else{
						
							if( is_array( $admin_countries ) && $admin_countries[0] != ""){		
								if(!in_array( $key, $admin_countries )  ){
								continue;
								}
							}
						
						}
						
						
                                if(isset($selected_country) && $selected_country == $key){ $sel ="selected=selected"; }else{ $sel =""; }
                                echo "<option ".$sel." value='".$key."'>".$value."</option>";} ?>
                </select>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"><?php echo __("Region","premiumpress"); ?></label>
              <div class="controls">
                <input type="hidden"  value="<?php echo $CORE->USER("get_address_part", array("city", $userdata->ID) ); ?>" id="user-city"  />
                <select class="form-control" id="user-city-select" name="city"  tabindex="7" >
                </select>
              </div>
            </div>
          </div>
          
           <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> <?php echo __("Town/City","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="town" class="form-control" value="<?php echo $CORE->USER("get_address_part", array("town", $userdata->ID) ); ?>" tabindex="4">
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label"> <?php echo __("Postal/ Zipcode","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="zip" class="form-control" value="<?php echo $CORE->USER("get_address_part", array("zip", $userdata->ID) ); ?>" tabindex="4">
              </div>
            </div>
          </div>
          
          
        </div>
        <!-- end row -->
        <script type="application/javascript">
            jQuery(document).ready(function(){ 
            
            	jQuery('#user-country').on('change', function(e){
            	
            		 ajax_update_citylist();
            	
            	});	
            	 	
            	 ajax_update_citylist(); 
            	
            });
            
            function ajax_update_citylist(){
            
            	// COUNTRY VALUE
            	var countryid = jQuery('#user-country').val();
            	if(countryid == ""){
            	countryid = jQuery('#user-country option:first').val();
            	}
             
            	// SET VALUE
            	jQuery('#user-city').val(countryid);
            
                jQuery.ajax({
                    type: "POST",
                    url: ajax_site_url,	 	
            		data: {
                        action: "get_location_states",
            			country_id: countryid,
              			state_id: "<?php echo get_user_meta($userdata->ID,'city',true); ?>",
                    },
                    success: function(response) {            	 
            			jQuery("#user-city-select").html(response);
                    },
                    error: function(e) {
                         
                    }
                });
            }
            
         </script>
      </div>
      <?php if( _ppt(array('user','cashout')) == 1){ ?>
      <div id="my-payment" style="display:none;">
        <h5 class="pb-3 border-bottom mb-4"><?php echo __("My Payment Information","premiumpress"); ?></h5>
        <div class="bg-light border p-4">
          <div class="row">
            <div class="col-md-6">
              <label class="control-label"><?php echo __("My Payment Preference","premiumpress"); ?></label>
              <select class="form-control" onchange="SwitchPP(this.value)" name="payment_type">
                <?php if(in_array(_ppt("cashoutopt_paypal"), array("","1"))){ ?>
                <option value="paypal" <?php if(get_user_meta($userdata->ID,'payment_type',true) == "paypal"){ ?>selected=selected<?php } ?>><?php echo __("PayPal","premiumpress"); ?></option>
                <?php } ?>
                <?php if(in_array(_ppt("cashoutopt_bank"), array("","1"))){ ?>
                <option value="bank" <?php if(get_user_meta($userdata->ID,'payment_type',true) == "bank"){ ?>selected=selected<?php } ?>><?php echo __("Bank","premiumpress"); ?></option>
                <?php } ?>
                <?php if(in_array(_ppt("cashoutopt_person"), array("","1"))){ ?>
                <option value="person" <?php if(get_user_meta($userdata->ID,'payment_type',true) == "person"){ ?>selected=selected<?php } ?>><?php echo __("In Person/On Collection","premiumpress"); ?></option>
                <?php } ?>
              </select>
              <p class="small mt-3"><?php echo __("Tell us how you would like to receive payments.","premiumpress"); ?></p>
            </div>
            <div class="col-md-6">
              <div class="form-group payment_paypal">
                <label class="control-label"> <?php echo __("PayPal Email","premiumpress"); ?></label>
                <div class="controls">
                  <input type="text" name="paypal" class="form-control" value="<?php echo get_user_meta($userdata->ID,'paypal',true); ?>" tabindex="4">
                </div>
              </div>
              <div class="form-group payment_bank">
                <label class="control-label"> <?php echo __("My Bank Details","premiumpress"); ?></label>
                <div class="controls">
                  <textarea class="form-control" style="height:100px;" name="bank"><?php echo stripslashes(get_user_meta($userdata->ID,'bank',true)); ?></textarea>
                </div>
              </div>
              <div class="form-group payment_person">
                <label class="control-label"> <?php echo __("Address for collection","premiumpress"); ?></label>
                <div class="controls">
                  <textarea class="form-control" style="height:100px;" name="payaddresss"><?php echo stripslashes(get_user_meta($userdata->ID,'payaddresss',true)); ?></textarea>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script>
            function SwitchPP(g){
            
            if(g == "paypal"){
            
            jQuery('.payment_paypal').show();
            		jQuery('.payment_bank').hide();
            jQuery('.payment_person').hide();
            jQuery('.payment_stripe').hide();
            
            }else if(g == "bank"){
            
            jQuery('.payment_paypal').hide();
            		jQuery('.payment_bank').show();
            jQuery('.payment_person').hide();
            jQuery('.payment_stripe').hide();
            }else if(g == "person"){
            
            jQuery('.payment_paypal').hide();
            		jQuery('.payment_bank').hide();
            jQuery('.payment_person').show();					
            jQuery('.payment_stripe').hide();
            
            }else if(g == "stripe"){
            
            jQuery('.payment_paypal').hide();
            		jQuery('.payment_bank').hide();
            jQuery('.payment_person').hide();					
            jQuery('.payment_stripe').show();
            
            }else{
            	
				<?php if(in_array(_ppt("cashoutopt_paypal"), array("","1"))){ ?>
				jQuery('.payment_paypal').show();
				jQuery('.payment_bank').hide();
				jQuery('.payment_person').hide();					
				jQuery('.payment_stripe').hide();
				<?php }elseif(in_array(_ppt("cashoutopt_bank"), array("","1"))){  ?>
				jQuery('.payment_bank').show();
				jQuery('.payment_paypal').hide();
				jQuery('.payment_person').hide();					
				jQuery('.payment_stripe').hide();
				<?php }elseif(in_array(_ppt("cashoutopt_person"), array("","1"))){  ?>
				jQuery('.payment_person').show();	
				jQuery('.payment_bank').hide();
				jQuery('.payment_paypal').hide();					
				jQuery('.payment_stripe').hide();			
				<?php } ?>
				
				
				
            
            }
            
            }
            
            jQuery(document).ready(function(){  
            <?php if(get_user_meta($userdata->ID,'payment_type',true) != ""){ ?>
            SwitchPP('<?php echo get_user_meta($userdata->ID,'payment_type',true); ?>');
            <?php }else{ ?>
            
			<?php if(in_array(_ppt("cashoutopt_paypal"), array("","1"))){ ?>
				jQuery('.payment_paypal').show();
				<?php }elseif(in_array(_ppt("cashoutopt_bank"), array("","1"))){  ?>
				jQuery('.payment_bank').show();
				<?php }elseif(in_array(_ppt("cashoutopt_person"), array("","1"))){  ?>
				jQuery('.payment_person').show();				
				<?php } ?>
			
			
            jQuery('.payment_bank').hide();
            jQuery('.payment_person').hide();					
            jQuery('.payment_stripe').hide();
            <?php } ?>
            });
            
         </script>
      <?php }  ?>
      <?php if(_ppt(array('user','social')) != "0"){  ?>
      <div id="my-social" >
        <h5 class="mt-4 pb-3 border-bottom mb-4"><?php echo __("Social Media","premiumpress"); ?></h5>
        <div class="row">
          <div class="col-md-3">
            <label class="control-label"><i class="icon-comment"></i> Facebook</label>
            <input type="text" name="facebook" class="form-control" value="<?php echo get_user_meta($userdata->ID,'facebook',true); ?>" tabindex="7">
          </div>
          <div class="col-md-3">
            <label class="control-label"><i class="icon-comment"></i> Twitter</label>
            <input type="text" name="twitter" class="form-control" value="<?php echo get_user_meta($userdata->ID,'twitter',true); ?>" tabindex="8">
          </div>
          <div class="col-md-3">
            <label class="control-label"><i class="icon-comment"></i> LinkedIn</label>
            <input type="text" name="linkedin" class="form-control" value="<?php echo get_user_meta($userdata->ID,'linkedin',true); ?>" tabindex="9">
          </div>
          <div class="col-md-3">
            <label class="control-label"><i class="icon-comment"></i> Skype</label>
            <input type="text" name="skype" class="form-control" value="<?php echo get_user_meta($userdata->ID,'skype',true); ?>" tabindex="10">
          </div>
        </div>
      </div>
      <?php } ?>
      <div id="my-notifications" style="display:none;">
        <h5 class="pb-3 border-bottom mb-4"><?php echo __("Email Notifications","premiumpress"); ?></h5>
        <div class="row">
          <div class="col-md-12">
            <?php
		  
		  $notify_match = get_user_meta($userdata->ID,'notify_match',true);
		  
		  
		  ?>
            <!-- ------------------------- -->
            <div class="container px-0 border-bottom mb-3">
              <div class="row py-2">
                <div class="col-md-8">
                  <label class="font-weight-bold"><?php echo __("Enable Notification","premiumpress"); ?></label>
                  <p class="text-muted"><?php echo str_replace("%s", strtolower($CORE->LAYOUT("captions","1")), __("Turn on/off email notifications for new matches.","premiumpress")); ?></p>
                </div>
                <div class="col-md-4">
                  <div class="mt-3 togglebox" onclick="ToggleME('notify_match')" id="notify_match_toggle">                   
                    <div class="toggle <?php if(in_array($notify_match, array("","1"))){ ?>on<?php } ?>">
                      <div class="yes">ON</div>
                      <div class="switch"></div>
                      <div class="no">OFF</div>
                    </div>
                  </div>
                  <input type="hidden" id="notify_match" name="notify_match" value="<?php if(in_array($notify_match, array("","1"))){  echo 1; }else{ echo 0; }  ?>">
                </div>
              </div>
            </div>
            <?php if(in_array($notify_match, array("","1"))){ 
	
	
	$match_data = get_user_meta($userdata->ID,'notify_match_data',true);
	if(!is_array($match_data)){$match_data = array(); }
	
	?>
            <div class="">
              <div class="control-label font-weight-bold mb-2"><?php echo __("Notification Categories","premiumpress"); ?></div>
              
              <p class="text-muted"><?php echo str_replace("%s", strtolower($CORE->LAYOUT("captions","1")), __("Each time a new %s is added to a category you select below, you'll receive an email notification.","premiumpress")); ?>
              </p>
     
     <div class="row">         
<?php

$count = 1;

if( in_array(THEME_KEY, array("da", "es")) ){
$taxonomy = "dagender";
$cats = get_terms( 'dagender', array( 'hide_empty' => 0, 'parent' => 0  ));
}else{
$taxonomy = "listing";
$cats = get_terms( 'listing', array( 'hide_empty' => 0, 'parent' => 0  ));
}

if(!empty($cats)){

foreach($cats as $cat){ 
if($cat->parent != 0){ continue; } 
                   

?>         
<div class="col-md-6">     

<label class="custom-control custom-checkbox">

<input type="checkbox" value="<?php echo $cat->term_id; ?>" name="notify_match_data[]" class="custom-control-input"  <?php if(in_array($cat->term_id, $match_data)){ echo "checked=checked"; } ?>>
        <div class="custom-control-label">
		
         
		<a href="<?php echo get_term_link( $cat->term_id, $taxonomy); ?>" class="text-dark">
        
         
		<?php echo $CORE->GEO("translation_tax_value", array($cat->term_id, $cat->name));  ?>
        
        
        </a>        
        
        </div>
        </label>
</div>
              
<?php } } ?>            
   </div>            
              
  </div>
            <?php } ?>         
              
              

          </div>
        </div>
      </div>
      <div id="my-search" style="display:none;">
        <h5 class="pb-3 border-bottom mb-4"><?php echo __("Saved Searches","premiumpress"); ?></h5>
        <div class="row">
          <div class="col-md-12"> </div>
        </div>
      </div>
      <div id="my-password" style="display:none;">
        <h5 class="pb-3 border-bottom mb-4"><?php echo __("My Password","premiumpress"); ?></h5>
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label"> <?php echo __("New Password","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="password" class="form-control" autocomplete="off">
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label class="control-label"><?php echo __("Confirm Password","premiumpress"); ?></label>
              <div class="controls">
                <input type="text" name="password_r" class="form-control" autocomplete="off">
              </div>
            </div>
            <!-- end row -->
          </div>
        </div>
      </div>
      <div id="my-photo" style="display:none;">
        <?php 
// GET USER PHOTO
$currentimg = get_user_meta($userdata->ID, "userphoto", true);

$i=1;
while($i < 16){
$user_avatars["f".$i] = "f".$i;
$i++;
}

$i=1;
while($i < 18){
$user_avatars["m".$i] = "m".$i;
$i++;
}
 
?>
        <div class="container">
          <div class="row">
            <div class="col-md-6 border-right">
              <h6 class="title-dark"><?php echo __("My Photo","premiumpress"); ?></h6>
              <div class="text-center my-4"> <img class="rounded-circle img-fluid" src="<?php echo $CORE->USER("get_avatar", $userdata->ID ); ?>" alt="user "> </div>
              <div class="text-center my-4">
                <input type="file" name="ppt_userphoto" tabindex="12" />
              </div>
              <?php if(isset($currentimg['img'])){ ?>
              <div class="text-center">
                <button class="btn btn-sm btn-dark" onclick="delete_userphoto()"><?php echo __("Delete","premiumpress"); ?></button>
              </div>
              <?php } ?>
            </div>
            <div class="col-md-6">
              <h6 class="title-dark"><?php echo __("My Avatar","premiumpress"); ?></h6>
              <div class="row">
                <?php

$CA = get_user_meta($userdata->ID,'myavatar',true);
foreach($user_avatars as $k => $h){?>
                <div class="col-6 col-md-3 text-center px-0">
                  <figure> <img src="<?php echo get_template_directory_uri(); ?>/framework/images/avatar/<?php echo $k; ?>.png" alt="img" class="img-fluid"> </figure>
                  <input type="radio"  value="<?php echo $k; ?>" name="myavatar" <?php if( $CA == "" && $k == "m1" ||  $CA == $k){ echo "checked=checked"; } ?> >
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <script>
function delete_userphoto(){
 										   
 	
jQuery.ajax({
        type: "POST",
        url: '<?php echo home_url(); ?>/',	
		dataType: 'json',	
		data: {
            action: "delete_userphoto",
			 		
        },
        success: function(response) {
 
			if(response.status == "ok"){
			
			alert("<?php echo __("Photo Deleted","premiumpress"); ?>"); 
			 			 
  		 	
			}else{			
		 			
			}			
        },
        error: function(e) {
            console.log(e)
        }
    });	
 		
}
</script>
      </div>
    </div>
  </div>
  <div class="py-3 pb-3 mobile-mb-6">
    <button class="btn btn-primary mt-2 btn-md" type="submit" id="savemydetailsbutton"><?php echo __("Save Changes","premiumpress"); ?></button>
  </div>
  <!-- end card footer -->
</form>
