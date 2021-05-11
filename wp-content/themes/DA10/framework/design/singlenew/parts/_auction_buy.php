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
   
   global $CORE, $post, $userdata, $CORE_AUCTION;
   
    
   //1. GET EXPIRY DATE
   $expiry_date = get_post_meta($post->ID,'listing_expiry_date',true);
   $vv = $CORE->date_timediff($expiry_date);
   
    // END THE AUCTION
	if($expiry_date != "" && $vv['expired'] == 1){
		$CORE_AUCTION->_end_auction($post->ID);
	}
     
   // GET AUCTION DISPLAY TYPE
   $display_type = get_post_meta($post->ID, 'auction_type', true );
   
   // GET CURRENT PRICE
   $current_price = get_post_meta($post->ID,'price_current',true);
   if(!is_numeric($current_price)){ $current_price = 0; }
   
   // GET RESERVE PRICE
   $price_reserve = get_post_meta($post->ID,'price_reserve',true);
   if(!is_numeric($price_reserve)){ $price_reserve = 0; }
   
   // GET THE BIDING TYPE
   $auction_type_credit = get_post_meta($post->ID,'auction_type_credit',true);
   if($auction_type_credit == ""){ $auction_type_credit = 0; }
   
   // GET BUY NOW PRICE
   $bin_price = get_post_meta($post->ID,'price_bin',true);
   
   // GET SHIPPING OST
   $price_shipping = get_post_meta($post->ID,'price_shipping',true);
   if($price_shipping == "" || !is_numeric($price_shipping)){$price_shipping = 0; }
   
   if($bin_price > 0 && $price_shipping > 0){
   $bin_price = $bin_price+ $price_shipping;   
   }
     
   // CHECK FOR QTY
   $qty = get_post_meta($post->ID,'qty', true);
   if($qty == ""){ $qty = 1; }	
   
   // CHECK FOR USER BUY NOW PAYMENT WITH ITEMS
   // WHICH HAVE MULTIPLE QTY VALUES
     
   //1. GET EXPIRY DATE
   $expiry_date = get_post_meta($post->ID,'listing_expiry_date',true);
   
   
   
   // type
   $display_type = get_post_meta($post->ID, 'auction_type', true );
     
   
   // elementor preview
   if( isset($_REQUEST['action']) || isset($_REQUEST['preview_id'])){
	$post->post_status = "publish";
	$expiry_date = date("d-m-Y");
   }
    
    
   // ONLY SHOW IF IS LIVE
   if( in_array($post->post_status, array("publish","expired")) ){ 

   
if($expiry_date  == "" || $vv['expired'] == 1){  ?>

<?php _ppt_template( 'framework/design/singlenew/parts/_auction_end' );  ?>
<?php }else{ ?>

<div class="widget " id="widget-buybox" data-title="<?php echo __("Bidding Options","premiumpress") ?>">

<?php if(!isset($GLOBALS['inlineBtn'])){  ?>
  <div id="buybox-timer" class="mb-3 clearfix"></div>
  <div id="auction_timer_layout_single_side" style="display:none;">
    <di class="box-count-down"> <span class="countdown-lastest is-countdown"> <span class="box-count bg-white border text-dark"><span class="number">{dn}</span><span class="text"><?php echo __("Days","premiumpress"); ?></span></span> <span class="dot">:</span> <span class="box-count bg-white border text-dark"><span class="number">{hnn}</span> <span class="text"><?php echo __("Hrs","premiumpress"); ?></span></span> <span class="dot">:</span> <span class="box-count bg-white border text-dark"><span class="number">{mnn}</span> <span class="text"><?php echo __("Mins","premiumpress"); ?></span></span> <span class="dot">:</span> <span class="box-count bg-white border text-dark"><span class="number">{snn}</span> <span class="text"><?php echo __("Secs","premiumpress"); ?></span></span> </span> </di>
  </div>
  
  
  
  
  <div class="clearfix"></div>
  <div class="row mb-2">
    <div class="col-12"> <span class="h3 font-weight-bold text-center" <?php if($display_type ==2 && $bin_price == "0"){ echo "style='display:none;'"; } ?>>
      <div id="buybox-price" class="border p-3 bg-light">
        <!--<span class="buybox-price-symbol h2 "><?php if(_ppt(array('currency','switch')) != 1){  echo _ppt(array('currency','symbol')); }else{ echo hook_currency_symbol(''); } ?></span>-->
        <span class="buybox-price-num h2 <?php echo $CORE->GEO("price_formatting",array()); ?>">00</span>
        <!--<span class="buybox-price-currency"><?php if(_ppt(array('currency','switch')) != 1){  echo _ppt(array('currency','code')); }else{ echo hook_currency_code(''); } ?></span>-->
      </div>
      </span> </div>
  </div>
  
<?php } ?>
  
  
  <div id="bidding_highest_bidder" class="small"></div>

  
  <?php if(!isset($GLOBALS['inlineBtn'])){  ?>
  
  
  
  <?php /*** SHIPPING */ ?>
  <?php if($price_shipping > 0){ ?>
  <div class="small mb-3 mt-n1"> <i class="fal fa-box mr-2"></i> <?php echo __("Shipping cost","premiumpress"); ?>: <span class="<?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo hook_price(array($price_shipping,0)) ; ?></span> </div>
  <?php } ?>
    
  
  <?php if(in_array(_ppt(array('user','account_messages')), array("","1")) ){ ?>
  <?php if(_ppt(array('lst','adminonly')) != 1){ ?>
  <a <?php echo $CORE->USER("get_message_link", $post->post_author); ?> class="btn btn-block btn-system shadow-sm btn-xl btn-icon icon-before mt-2 mb-3"><i class="fal fa-comments-alt mr-2 text-primary"></i> <?php echo __("Message","premiumpress") ?></a>
  <?php }else{ ?>
  <?php _ppt_template( 'framework/design/singlenew/parts/_contactform' );  ?>
  <?php } ?>
  <?php } ?>
  <?php } ?>
  

<div class="<?php if(isset($GLOBALS['inlineBtn'])){ echo "row"; } ?>">
  <div class="<?php if(isset($GLOBALS['inlineBtn'])){ echo "col-md-6"; } ?>">
  
  <?php 
   
   
   /*** BID BOX ***/ if($display_type != 2){ ?>
   
   
   
  <a href="javascript:void(0);" <?php if($userdata->ID){ ?> onclick="processBidPop();" <?php }else{ ?>onclick="processLogin(1,'');"<?php } ?> class="btn btn-block btn-system shadow-sm btn-xl btn-icon icon-before <?php if(!isset($GLOBALS['inlineBtn'])){ echo "mt-2"; } ?>"> <i class="fal fa-hand-paper text-primary"></i> <?php echo __("Bid Now","premiumpress"); ?> </a>
   
  
  <script>


function processBidPop(){
	 
jQuery(".extra-modal-wrap").fadeIn(400);
   
}

</script>
  <!--msg model -->
  <div class="extra-modal-wrap shadow hidepage" style="display:none;">
    <div class="extra-modal-wrap-overlay"></div>
    <div class="extra-modal-item">
      <div class="extra-modal-container">
        <div class="card-body">
          <div class="container">
            <div class="row">
              <div class="col-md-6 singlebidbox">
                <h4><?php echo __("Standard","premiumpress"); ?></h4>
                <p class="small"><?php echo __("Enter the amount you wish to bid.","premiumpress"); ?></p>
              </div>
              <div class="col-md-6 singlebidbox">
                <div class="row ">
                  <div class="col-12 mb-2"> <span class="float-right small mt-2 text-muted"><?php echo __("Price Now","premiumpress"); ?></span> <span class="buybox-price-num h2 <?php echo $CORE->GEO("price_formatting",array()); ?>">00</span>
                    <!--<span class="buybox-price-currency"><?php echo hook_currency_code(''); ?></span>   -->
                  </div>
                  <div class="col-12 ">
                    <div class="input-group">
                      <div class="input-group-prepend"> <span class="input-group-text"><?php echo hook_currency_symbol(''); ?></span> </div>
                      <input type="text" class="form-control size16 nob" id="bid_amount"  name="bidamount" maxlength="10" value="<?php if(_ppt(array('lst', 'at_bidinc' )) == ""){ echo $current_price+10; }else{ echo $current_price+_ppt(array('lst', 'at_bidinc' )); }  ?>">
                    </div>
                  </div>
                  <div class="col-12  text-xs-right">
                    <?php if($userdata->ID){ ?>
                    <button  class="btn btn-block btn-system shadow-sm mt-2 btn-md" <?php if($userdata->ID != $post->post_author){ ?>onclick="ajax_load_buybox_bid();"<?php }else{ ?>onclick="alert('<?php echo __("You cannot bid on your own items.","premiumpress"); ?>');"<?php } ?>><?php echo __("Bid Now","premiumpress"); ?></button>
                    <?php }else{ ?>
                    <a class="btn btn-block btn-system shadow-sm mt-2 btn-md" href="javascript:void(0);" onclick="ProcessLogin();" ><?php echo __("Bid Now","premiumpress"); ?></a>
                    <?php } ?>
                  </div>
                </div>
                <div id="bidding_message"></div>
              </div>
              <div class="col-md-12 singlebidbox">
                <hr />
              </div>
              <div class="col-md-6">
                <h4><?php echo __("Automated","premiumpress"); ?></h4>
                <p class="small"><?php echo __("Enter a maximum bid amount and the system will auto bid upto that amount.","premiumpress"); ?></p>
              </div>
              <div class="col-md-6">
                <?php
         $showactive = false;
         $maxbid = get_post_meta($post->ID,'user_maxbid_data',true);
         
         
         if(is_array($maxbid) && isset($maxbid[$userdata->ID]) ){
         $showactive = true;
         $mamount =  $maxbid[$userdata->ID]['max_amount'];
         }else{ 
         $mamount =  "--";
         }
         
         ?>
                <?php if(is_array($maxbid) && isset($maxbid[$userdata->ID]) ){ ?>
                <script>
		   jQuery(document).ready(function(){ 
		   
			// jQuery(".singlebidbox").hide();
		   
		   });
		</script>
                <?php } ?>
                <div class="row">
                  <div class="col-12"> <span class="maxbid-price-symbol h2"><?php echo hook_currency_symbol(''); ?></span> <span class="maxbid-price-num h2"><?php echo $mamount; ?></span> <span class="maxbid-price-currency"><?php echo hook_currency_code(''); ?></span> <span class="float-right small mt-2 text-muted"><?php echo __("Auto bid up to","premiumpress"); ?></span> </div>
                  <div class="col-12">
                    <div class="input-group mb-1">
                      <div class="input-group-prepend"> <span class="input-group-text rounded-0"><?php echo hook_currency_symbol(''); ?></span> </div>
                      <input type="text" class="form-control nob" id="user_maxbid"  name="user_maxbid" value="<?php if(is_numeric($mamount)){ echo $mamount+100; } ?>" maxlength="10">
                    </div>
                    <div class="clearfix"></div>
                    <?php if($userdata->ID){ ?>
                    <span class="btn btn-block mt-2 btn-system btn-md shadow-sm" 
               <?php if($userdata->ID != $post->post_author){ ?>onclick="ajax_set_maxbid();" <?php }else{ ?>onclick="alert('<?php echo __("You cannot bid on your own items.","premiumpress"); ?>');"<?php } ?>
               style="cursor:pointer"><?php echo __("Update Auto Bid","premiumpress"); ?></span>
                    <?php }else{ ?>
                    <a class="btn btn-block mt-2 btn-system btn-md shadow-sm" href="<?php echo wp_login_url( get_permalink() ); ?>" ><?php echo __("Update Auto Bid","premiumpress"); ?></a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="card-footer text-center">
          <button type="button" onclick="jQuery('.extra-modal-wrap').fadeOut(400);" class="btn btn-system shadow-sm btn-xl"><?php echo __("Close Window","premiumpress"); ?></button>
        </div>
      </div>
    </div>
  </div>
  
  
  
  
  <?php } /** END BIDDING OPTIONS */  ?>
  
</div> 
  
  
  <?php /*** BUY NOW ***/ 
      if(is_numeric($bin_price) && $bin_price > 0.00  && ( ( $bin_price >= $current_price && $bin_price >= $price_reserve ) || ( $display_type == 2) )){ 
      ?>
      
      <div class="<?php if(isset($GLOBALS['inlineBtn'])){ echo "col-md-6"; } ?>">
      
      
  <form method="post" action="" name="buynowform" id="buynowform">
    <input type="hidden" name="auction_action" value="buynow" />
  </form> 
  
   
  <?php if($userdata->ID){ ?>
  <button type="button" <?php if($userdata->ID != $post->post_author){ ?> onclick="processbuynow();" <?php }else{ ?> onclick="alert('<?php echo __("You cannot bid on your own items.","premiumpress"); ?>');"<?php } ?>
        class="btn btn-block btn-system shadow-sm btn-xl btn-icon icon-before <?php if(!isset($GLOBALS['inlineBtn'])){ echo "mt-4"; } ?>">
  <i class="fal fa-shopping-cart text-primary"></i> <?php echo __("Buy","premiumpress"); ?> <span class="<?php echo $CORE->GEO("price_formatting",array()); ?>"><?php echo $bin_price; ?></span>
  </button>
  <?php }else{ ?>
  
 
  <a href="javascript:void(0);" onclick="processLogin(1,'');" class="btn btn-block btn-system shadow-sm btn-xl btn-icon icon-before <?php if(!isset($GLOBALS['inlineBtn'])){ echo "mt-4"; } ?>"> <i class="fal fa-shopping-cart text-primary"></i> <?php echo __("Buy Now","premiumpress"); ?></a>
  
  
  <?php } ?>
  </div>
  
  
 
  
  
  
  
  
  
  
  <script>
   
   function processbuynow(){
   
		 if(confirm("<?php echo __("Are you sure?","premiumpress"); ?>"))
			{
			   jQuery("#buynowform").submit();
			
			}			 
		 
   }
   </script>
  <?php } /*** BUY NOW ***/ ?>
  <div class="mt-4 bidmanlink text-center" style="display:none;"> <small><a href="<?php echo _ppt(array('links','myaccount')); ?>?showtab=offers"><u><?php echo __("View bid management page.","premiumpress"); ?></u></a></small> </div>
</div>
<?php if($expiry_date  == ""){  ?>
<script>
   jQuery(document).ready(function(){ 
   
   	ajax_load_bidding_history(); 
   
   });
</script>
<?php }elseif($expiry_date  != ""){  ?>
<script>
   // CLEAR MESSAGES
   jQuery( "#bid_amount" ).click(function() {
   
     jQuery('#bidding_message').html('');
     jQuery('.highbidder').removeClass('newhighbidder-red');
     
   });
   
   jQuery(document).ready(function(){ 
    
	<?php if( isset($_REQUEST['action']) || isset($_REQUEST['preview_id'])){ }else{ ?>

    ajax_load_bidding_history();	
	<?php } ?>
	
   	ajax_load_buybox(); 
   	
   	refreshBiding();
   	//refreshBidingPage();
   	
   	jQuery( "#bid_amount" ).change(function() {	   
   		jQuery( "#bid_amount" ).val( jQuery( "#bid_amount" ).val().replace(',', '') );	  
   	});
   	
   	jQuery( "#user_maxbid" ).change(function() {	   
   		jQuery( "#user_maxbid" ).val( jQuery( "#user_maxbid" ).val().replace(',', '') );	  
   	});
   
   });
   
   
   function refreshBiding() {
     setTimeout(function () {
   	
   	ajax_load_bidding_history();	
   	ajax_load_buybox(); 
   	
   	refreshBiding();
   	 
     }, 6000);
   }
   
   function refreshBidingPage() { // every 5 minutes
     setTimeout(function () {
   	
    	window.open('<?php echo get_permalink($post->ID); ?>', "_self");
   
     }, 30000);
   }
   
    
   function ajax_set_maxbid() { 
   
   
   	var bidprice = jQuery('#user_maxbid').val();
   	var ecp = jQuery('.buybox-price-num').html().replace(/[^0-9.,]/g, '');	
   	var ecp = Math.round(parseFloat(ecp)*100)/100;
   	var bidprice = Math.round(parseFloat(bidprice)*100)/100;
	
	var bidinc = <?php if(_ppt(array('lst', 'at_bidinc' )) == ""){ echo 1; }else{ echo _ppt(array('lst', 'at_bidinc' )); }  ?>;
 
	
	var minbidamount = parseFloat(ecp) + parseFloat(bidinc);
     	
   	if(bidprice > ecp){	
	
	 
		if(bidprice < minbidamount){
		
			alert("<?php echo __("Please enter a value greater than: ".hook_currency_symbol(''),"premiumpress"); ?>"+minbidamount);
			return false;
		
		}
	
	
   	
   	}else{
   	alert("<?php echo __("Please enter a value greater than the current auction price.","premiumpress"); ?>");
   	return false;
   	} 
	
	
   
       jQuery.ajax({
           type: "POST",
           url: '<?php echo get_home_url(); ?>/',
   		data: {
               auction_action: "set_maxbid",
               pid: <?php echo $post->ID; ?>,
   			uid: <?php if($userdata->ID){ echo $userdata->ID; }else{ echo 0; } ?>,
   			amount: jQuery('#user_maxbid').val(),
           },
           success: function(e) {
		   
		   //jQuery('.singlebidbox').hide();
            
   jQuery('.maxbid-price-num').html(jQuery('#user_maxbid').val());
    
   			// CLEAR VALUE
   			//jQuery('#user_maxbid').val('');
   			 
           },
           error: function(e) {
               //alert(e)
           }
       })
   }
    
   
    
   
   function ajax_expire() {
       jQuery.ajax({
           type: "POST",
           url: '<?php echo get_home_url(); ?>/',
   		data: {
               action: "expire_check_listing",
               pid: <?php echo $post->ID; ?>
           },
           success: function(e) {
   		
   		//console.log(e+'<-- ajax_expire');
   		
              // alert(e);
   			// RELOAD PAGE
   			//window.open('<?php echo get_permalink($post->ID); ?>', "_self");
           },
           error: function(e) {
               //alert("error" + e)
           }
       })
   }
   
   
   function ajax_load_buybox() {
       jQuery.ajax({
           type: "POST",
           url: '<?php echo home_url(); ?>/',		
   		data: {
               auction_action: "buybox_load",
               pid: <?php echo $post->ID; ?>,
   			uid: <?php if($userdata->ID){ echo $userdata->ID; }else{ echo 0; } ?>,
           },
   		dataType: 'json',
           success: function(response) {
   			
   		  //console.log(response);
   		   
   		 if(response.status == "sold"){
   				
   				// RELOAD WINDOW
   				//window.open('<?php echo get_permalink($post->ID); ?>', "_self");		
   		
   		  }else{
   		    
   		  			// BLINK AFFECT
   		   			jQuery('#buybox-price').fadeTo('slow', 0.5).fadeTo('slow', 1.0);
   		 
   				   if(response.price != ""){
   				   	    
   						jQuery('.buybox-price-num').html(response.price);
   						
   						// REMOVE .00
   						var fdate = jQuery('.buybox-price-num').html().toString().replace(/\.00$/,'');
   						jQuery('.buybox-price-num').html(fdate);						 
   						
   						//
   					// REDUCE SIZE OF BID BOX
   				   	if(response.price > 1000 && response.price < 100000){					
   						jQuery('.buybox-price-symbol').addClass('h2');
   						jQuery('.buybox-price-num').addClass('h2');
   					}else if(response.price > 100000){	
   						jQuery('.buybox-price-symbol').addClass('h4');
   						jQuery('.buybox-price-num').addClass('h4');
   					}
   						
   						 
   				   }
   				  
   					var dateStr =	response.date;
   					var a		=	dateStr.split(' ');
   					var d		=	a[0].split('-');
   					var t		=	a[1].split(':');
   					var finalDate1 = new Date(d[0],(d[1]-1),d[2],t[0],t[1],t[2],t[2]);
   					
   					//console.log(d[0],(d[1]-1),d[2],t[0],t[1],t[2]);		
   					
   					//console.log('single: expiry date: '+response.date + ' --  timer date: (' +finalDate1+') timezone: <?php echo get_option('gmt_offset'); ?> ');
   					
   					jQuery('#buybox-timer').countdown('destroy');
   						
   					jQuery('#buybox-timer').countdown({
   								until: finalDate1,
   								layout:jQuery('#auction_timer_layout_single_side').html(),
   								//format: $this.data( "format" ),
   								//labels: labels, 
   								timezone: <?php echo get_option('gmt_offset'); ?>,
   								//compact: true,
   								//serverSync: ajax_serverSync(),
   								onExpiry: function(){
   									
   									jQuery('#buybox-buybox').html('<button class="btn btn-block mt-2 rounded-0 "><?php echo __("Auction Finished","premiumpress"); ?></button>');
   									 
   									// CORE AJAX EXPIRE
   									ajax_expire();
   									
   						<?php if($vv['expired'] != 1){  ?>
   									// RELOAD PAGE
   									  setTimeout(function () {
   											location.reload();										
   									  }, 2000);
   						<?php } ?>
   									
   									
   								},
   								alwaysExpire: true,
   					});	
   					
   					// USER CREDIT CHANGE
   					jQuery('#buybox-user-credit').html(response.credit);
   			
   			}
   			
   			// UPDATE BIDDING HISTORY
   			ajax_load_bidding_history();
			
			UpdatePrices();			
   			
   			
   			
           },
           error: function(e) {
               //console.log(e)
           }
       })
   }
   
   function ajax_serverSync() { 
     
   	ajax_load_serverTime('.ggtd');
   	dateStr =	jQuery('.ggtd').val();
   	
   	if(typeof dateStr !== "undefined" && dateStr != "" && dateStr != null){ 
   	 //console.log(dateStr + "<-- gg");
       return dateStr; 
   	
   	}
   }
   
   function ajax_load_buybox_bid(){
   	
   	<?php if($display_type != 3){ ?>
	
	
   	var bidprice = jQuery('#bid_amount').val();
   	var ecp = jQuery('.buybox-price-num').html().replace(/[^0-9.,]/g, '');	
   	var ecp = Math.round(parseFloat(ecp)*100)/100;
   	var bidprice = Math.round(parseFloat(bidprice)*100)/100;
	
	var bidinc = <?php if(_ppt(array('lst', 'at_bidinc' )) == ""){ echo 1; }else{ echo _ppt(array('lst', 'at_bidinc' )); }  ?>;
	
	var minbidamount = parseFloat(ecp) + parseFloat(bidinc);
	 	<?php
		$history = get_post_meta($post->ID,'current_bid_data',true);
		 if($history == "" || ( is_array($history) && empty($history) ) ){  }else{ ?>
   	if(bidprice > ecp){	
	
		
		if(bidprice < minbidamount){
		
		alert("<?php echo __("Please enter a value greater than: ".hook_currency_symbol(''),"premiumpress"); ?>"+minbidamount);
   		return false;
		
		}
		
   	
   	}else{
   	alert("<?php echo __("Please enter a value greater than: ".hook_currency_symbol(''),"premiumpress"); ?>"+ecp);
   	return false;
   	} 
	<?php } ?>
	
	
	
	
   	<?php } ?>
	
	
	
	
   	
   	if(bidprice > 1000000){
   	alert("<?php echo __("Wow! Thats alot, please enter a more realitic bid amount. ","premiumpress"); ?>");
   	return false;
   	}
   			
   
       jQuery.ajax({
           type: "POST",
           url: '<?php echo home_url(); ?>/',			
   		data: {
               auction_action: "buybox_bid",
               pid: <?php echo $post->ID; ?>,
   			
   			<?php if($display_type == 3){ ?> 			
   			amount: 1, // set penny amount
   			type: "penny",
   			<?php }else{ ?>
   			amount: jQuery('#bid_amount').val(),
   			type: "auction",
   			<?php } ?>
   			
   			<?php if($auction_type_credit == 1){$ctype = "credit"; }elseif($auction_type_credit == 2){ $ctype = "tokens"; }else{  $ctype = "none"; } ?>
   			credit_type: "<?php echo $ctype; ?>",
    
   			uid: <?php if($userdata->ID){ echo $userdata->ID; }else{ echo 0; } ?>,
   			
           },
   		dataType: 'json',
           success: function(response) {
   		
   		 //console.log(response);
   		 
   			if(response.status == "nocredit"){
   			
   				jQuery('.btn-mainbid').html("<button class='btn sold'><?php echo __("NO CREDIT.","premiumpress"); ?></button>");
   				jQuery('.maxbid').html('');
   			
   			}else if(response.status  == "error_not_greater"){
   			
   				jQuery('#bidding_message').html("<div class='alert alert-danger'><?php echo __("Invalid Amount.","premiumpress"); ?></div>");
   			
   			}else{
   			
   				// CLEAN UP
   				jQuery('#bidding_message').html('');
   			
   			}
   			
   			// RELOAD DATA
   			ajax_load_buybox();
   			
   			// CHECK FOR BID RESULT
   			if(response.outbid == "outbid"){
   			
   			jQuery('#bidding_message').html("<div class='alert alert-danger mt-2 rounded-0'><?php echo __("You've been outbid.","premiumpress"); ?></div>");
   			
   			}else if( response.outbid == "reserve_notmet"){
   			
   			jQuery('#bidding_message').html("<div class='alert alert-warning mt-2 rounded-0'><?php echo __("This item has a reserve price. Your bid was accepted but it will not win the auction because it is less than the users reserve price.","premiumpress"); ?></div>");
   			
   			}else {
			
			jQuery('#bidding_message').html("<div class='alert alert-success mt-2 rounded-0 '><i class='fa fa-check float-right mt-1'></i><?php echo __("Bid Added.","premiumpress"); ?></div>").fadeOut(1000).fadeIn(1000).fadeOut(1000).fadeIn(1000);
   						
			}
			
			setTimeout(function () { jQuery('#bidding_message').html(""); }, 6000);
   			
           },
           error: function(e) {
               //console.log(e)
           }
       });
   
   
   }
    
</script>
<?php } // if not expired ?>

 </div> 



<input type="hidden" class="ggtd" />
<script>
   var hbidder_id = 0;  
   
   function ajax_load_bidding_history() { 
   	
       jQuery.ajax({
           type: "POST",
           url: '<?php echo get_home_url(); ?>/',
   		data: {
               auction_action: "bidhistory",
               pid: <?php echo $post->ID; ?>
           },
   		dataType: 'json',
        success: function(response) {
   	 		
   			// UPDATE COUNT
   			jQuery('#bidding_history_count').html(response.total);
   			jQuery('#bidding_history_data').html(response.data);
   			
   			if(response.bidder_high_name != "nobidders" && response.bidder_high_name != ""){
   				
   				jQuery('.highbidder').show();	
   				jQuery('.bidmanlink').show();						
   				jQuery('#bidding_highest_bidder').html("<div class='my-2'><i class='fal fa-user mr-2'></i> <?php echo __("Highest: ","premiumpress"); ?>"+response.bidder_high_name+"</div>"); // '<a href="' + response.bidder_high_link + '">'+response.bidder_high_photo + '</a> ' + 
   				
   				<?php if($userdata->ID){ ?>
   				// FLASH FOR NEW BID
   				//console.log(hbidder_id + ' old VS new ' + response.bidder_high_id);				
   				if(hbidder_id != response.bidder_high_id && response.bidder_high_id != <?php echo $userdata->ID; ?>){					 
   					 
   					jQuery('.highbidder').addClass('newhighbidder-red').stop().fadeTo('slow', 0.1).fadeTo('slow', 1.0);
   				    jQuery('.highbidder').removeClass('newhighbidder-red');
   					
   					// SET VAR FOR NEW BID
   					hbidder_id = response.bidder_high_id;
   				
   				}
   				<?php } ?>
   			
   			}
   			
   			
   			// RELOAD PAGE
   			//window.open('<?php echo get_permalink($post->ID); ?>', "_self");
           },
           error: function(e) {
              // alert("error" + e)
           }
       })
   } 
</script>
<?php } // end auction expired ?>
<?php } ?>
