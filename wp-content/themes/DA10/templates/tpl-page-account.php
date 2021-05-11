<?php
   /*
   Template Name: [PAGE - MY ACCOUNT]
   */
   
   global $userdata, $CORE; $CORE->Authorize();
   
   $GLOBALS['flag-account'] = 1;   
   
	// UPDATE ONLINE STATUS
	$CORE->USER("set_online",$userdata->ID);	 
    
   	// GET HEADER
   	get_header();  
	
	$showDashboard = true; 
	
	
$ev = _ppt(array("emails","user_verify")); 

// CHECK FOR FOCE EMAIL VERIFICATION
if( isset($ev['enable']) && $ev['enable'] == 1 &&  _ppt(array('register','forcemailverify'))  == '1' && $CORE->USER("get_verified", $userdata->ID)  == "0"  ){

	$showDashboard = false;
	
	?>

<div class="col-12 my-4 py-5">
  <div class="col-lg-6 mx-auto">
    <div class="card card-body text-center p-5"> <i class="fal fa-envelope fa-8x mb-4 text-primary"></i>
      <h4><?php echo __("Please verify your email address.","premiumpress"); ?></h4>
      <p class="lead mb-0"> <?php echo __("We have sent a verification link to the email below;","premiumpress"); ?> </p>
      <div class="bg-light my-4 col-lg-8 border p-3 mx-auto"> <?php echo $CORE->USER("get_email", $userdata->ID ); ?> </div>
      <div class="col-lg-8 mx-auto"> <a href="javascript:void(0);" onclick="resendVemail();" class="btn btn-danger btn-block mt-1"><?php echo __("resend email","premiumpress"); ?></a> </div>
    </div>
  </div>
</div>
<script>
function resendVemail(){

	jQuery.ajax({
            type: "POST",
			dataType: 'json',	
            url: '<?php echo home_url(); ?>/',		
         	data: {
                    action: "resendvemail",
         			uid: <?php echo $userdata->ID; ?>, 
              },
              success: function(response) {
         		   
				 
         			if(response.status == "sent"){ 
         			 
					alert("<?php echo __("Email Sent!","premiumpress"); ?>");
					}	
					
							
              },
              error: function(e) {
                     alert("error "+e)
               }
	});	 
}
 
	jQuery(document).ready(function(){ 
		
		jQuery("#account_sidebar .btn-dark.viewp").hide();
		jQuery("#jumplinks li").hide();
		
		jQuery(".dashboard-usertop .dropdown-menu").hide();
		jQuery(".dashboard-usertop .caret").hide();
		 
	});
	</script>
<?php
}


// CHECK FOR INVALID OR EXPIRED MEMBERSHIP
if( _ppt(array('mem','register'))  == '1'){

	$mem = $CORE->USER("get_user_membership", $userdata->ID);  
	
	if(is_array($mem)){
		$da = $CORE->date_timediff($mem['date_expires'],'');
		if($da['expired'] == 1){
		
		$showDashboard = false;
		$showUpgrades = true;
		 
		}
	}else{
		$showDashboard = false;
		$showUpgrades = true;
	}
	
	
	if($showUpgrades){
	?>
<div class="col-lg-10 col-xl-6 mx-auto my-5">
  <?php _ppt_template( 'page-login-memberships' ); ?>
</div>
<script>
	jQuery(document).ready(function(){ 
		
		jQuery("#jumplinks li").hide();
		
		jQuery(".dashboard-usertop .dropdown-menu").hide();
		jQuery(".dashboard-usertop .caret").hide();
		 
	});
	</script>
<?php  
	} 

}

if($showDashboard){
   
    ?>
<div class="container mt-4 mobile-mb-6">
  <div class="row">
    <?php if( isset($GLOBALS['error_message']) ){ ?>
    <div class="col-12 mb-2">
      <div class="alert alert-success alert-dismissible fade show"> <?php echo $GLOBALS['error_message']; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
      </div>
    </div>
    <?php } ?>
    <?php 

/* EMAIL VERIFICATION ********************************************************/ 


if(isset($ev['enable']) && $ev['enable'] == 1 && $CORE->USER("get_verified", $userdata->ID)  == "0" ){  ?>
    <div class="col-12 mb-2">
      <div class="alert alert-danger"> <a href="javascript:void(0);" onclick="resendVemail();" class="btn btn-danger float-right mt-1"><?php echo __("resend email","premiumpress"); ?></a>
        <div class="font-weight-bold mb-2"><?php echo __("Please verify your email address.","premiumpress"); ?> </div>
        <p class="mb-0 small"> <?php echo __("If you have not received the email, please check your account email settings and use the resend button to try again.","premiumpress"); ?> </p>
      </div>
    </div>
    <script>
function resendVemail(){

	jQuery.ajax({
            type: "POST",
			dataType: 'json',	
            url: '<?php echo home_url(); ?>/',		
         	data: {
                    action: "resendvemail",
         			uid: <?php echo $userdata->ID; ?>, 
              },
              success: function(response) {
         		   
				 
         			if(response.status == "sent"){ 
         			 
					alert("<?php echo __("Email Sent!","premiumpress"); ?>");
					}	
					
							
              },
              error: function(e) {
                     alert("error "+e)
               }
	});	 
}
</script>
    <?php } 

/* *********************************************************/ 

?>
    <div class="col-md-12 show-mobile hide-ipad hide-desktop">
      <?php _ppt_template( 'framework/design/account/account-menu-mobile' ); ?>
    </div>
    <div class="col-lg-9">
      <?php  $i=1; foreach($CORE->USER("get_account_links", array()) as $k => $i){   ?>
      <div  id="<?php echo $k; ?>" class="account_page_wrapper" style="display:none;">
        <div class="card p-1 mb-4">
          <div class="card-body">
            <?php $accounttype = $CORE->USER("get_account_type", $userdata->ID);
			if($accounttype['name'] != ""){ ?>
            <span class="float-right opacity-5 hide-mobile hide-ipad small"><em><?php echo $accounttype['name']; ?></em></span>
            <?php } ?>
            <h5 class="mb-0 pb-0"><i class="fal fa-1x <?php echo $i['icon']; ?> text-primary mr-2"></i> <?php echo $i['name']; ?> </h5>
          </div>
        </div>
        <?php  if(isset($i['path'])){ get_template_part( 'framework/design/account/account-'. $i['path'] ); } ?>
      </div>
      <?php } ?>
    </div>
    <div class="col-lg-3 hide-mobile" id="accountmenubar">
      <div class="card p-1 mb-4">
        <div class="addeditmenu showeditusernamefields mr-3" style="display:none;"><span class="float-right position-relative hide-mobile "><a href="javascript:void(0);" onclick="showdetails('username');"  class="single-page-edit-button single-page-edit-button-bg"><i class="fal fa-pencil text-white"></i><span class="ripple single-page-edit-button-bg"></span><span class="ripple single-page-edit-button-bg"></span><span class="ripple single-page-edit-button-bg"></span></a></span></div>
        <div class="card-body">
          <h5 class="mb-0 pb-0">
            <?php if(in_array(THEME_KEY, array("da","es"))){ ?>
            <div class="float-left mr-3"> <img class="rounded-circle img-fluid" src="<?php echo $CORE->USER("get_avatar", $userdata->ID ); ?>" alt="user" style="max-width:30px;"> </div>
            <?php }else{ ?>
            <a href="javascript:void(0);" onclick="showdetails('photo');" class="float-left mr-3"> <img class="rounded-circle img-fluid" src="<?php echo $CORE->USER("get_avatar", $userdata->ID ); ?>" alt="user" style="max-width:30px;"> </a>
            <?php } ?>
            <?php echo $CORE->USER("get_username", $userdata->ID ); ?> </h5>
        </div>
      </div>
      <?php _ppt_template( 'framework/design/account/account-menu' ); ?>
    </div>
  </div>
</div>
<?php } ?>
<?php 
if(in_array(_ppt(array('user','rec')), array("","1",))){ ?>
<section class="bg-white border-top pt-4 mt-4 hide-mobile">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <style>
.theme-da .owl-item .card-body { display:none; }
</style>
        <?php _ppt_template( 'framework/design/account/account-dashboard-related' );  ?>
      </div>
    </div>
  </div>
</section>
<?php } ?>
<script>
   <?php if( isset($_GET['showtab']) ){ ?>
jQuery(document).ready(function(){ 
	SwitchPage('<?php echo esc_attr($_GET['showtab']); ?>');
});
<?php }elseif( isset($_POST['showtab']) ){ ?>
               
                  jQuery(document).ready(function(){ 
                  SwitchPage('<?php echo esc_attr($_POST['showtab']); ?>')
});		  
				  
<?php } ?>  
				  
</script>
<?php get_footer();  ?>
