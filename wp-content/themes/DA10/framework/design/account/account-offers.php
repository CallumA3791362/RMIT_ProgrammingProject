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

global $CORE, $userdata, $post, $settings; 



if(THEME_KEY == "at"){

$txt1 = __("Won","premiumpress") ;
$txt2 = __("Pending","premiumpress");
$txt3 = __("Lost","premiumpress");

}else{

$txt1 = __("Accepted","premiumpress") ;
$txt2 = __("Pending","premiumpress");
$txt3 = __("Rejected","premiumpress");

}



?>



 
<select class="form-control w-100 show-mobile hide-ipad hide-desktop mt-4" onchange="showoffers(this.value);">

<option value="all"><?php echo __("All","premiumpress") ?></option>

<option value="3"><?php echo $txt1; ?></option>
<option value="2"><?php echo $txt3; ?></option>
<option value="1"><?php echo $txt2; ?></option>

</select>


   <script>
				function showoffers(type){
					
					
					jQuery('.collapse').removeClass('show');
				 				
					jQuery('.card-job-1').hide();
					jQuery('.card-job-2').hide();
					jQuery('.card-job-3').hide();
					jQuery('.card-job-finished').hide();
					
					jQuery('.card-job-' +type).show();
					
					if(type == "all"){
					
					jQuery('.card-job-1').show();
					jQuery('.card-job-2').show();
					jQuery('.card-job-3').show();
					jQuery('.card-job-finished').show();
					}
				
				}
			
               jQuery(document).ready(function(){  
               
               jQuery('#count-approved').html( jQuery('.job-approved').length); 
               jQuery('#count-rejected').html( jQuery('.job-rejected').length); 
               jQuery('#count-pending').html( jQuery('.job-pending').length);  
			   
			   jQuery('.count-offers-pending').html( jQuery('.job-pending').length);
			   jQuery('.count-offers-approved').html( jQuery('.job-approved').length); 
			   
			    jQuery('#count-offer-finished').html( jQuery('.job-finished').length);  
			   
			   
			   
			    var allofferscount = parseFloat(jQuery('.job-finished').length) +  parseFloat(jQuery('.job-pending').length) +  parseFloat(jQuery('.job-approved').length) + parseFloat(jQuery('.job-rejected').length);
			    
			   jQuery('#count-all').html( allofferscount );
			   
			   
			   
			   var allofferscount = parseFloat(jQuery('.job-finished:not(.ownpost)').length) +  parseFloat(jQuery('.job-pending:not(.ownpost)').length) +  parseFloat(jQuery('.job-approved:not(.ownpost)').length) + parseFloat(jQuery('.job-rejected:not(.ownpost)').length);
			    
			   jQuery('.count-all-offers').html( allofferscount );
			   
			   
			   <?php if(in_array(THEME_KEY, array("mj","at","ct","dl"))){ ?>
			   
			    var allmyofferscount = parseFloat(jQuery('.job-finished.ownpost').length) +  parseFloat(jQuery('.job-pending.ownpost').length) +  parseFloat(jQuery('.job-approved.ownpost').length) + parseFloat(jQuery('.job-rejected.ownpost').length);
			    
				<?php }else{ ?>
				 var allmyofferscount = parseFloat(jQuery('.job-finished').length) +  parseFloat(jQuery('.job-pending').length) +  parseFloat(jQuery('.job-approved').length) + parseFloat(jQuery('.job-rejected').length);
			  
				<?php } ?>
				
				
				   if(allmyofferscount > 0){
				   
					   jQuery(".menu-alert-offers").html(allmyofferscount).show();
					 
					   jQuery("#icons-count-all-my-offers").find('span').html(allmyofferscount); 
					   
				   }else if(allofferscount > 0){
				   
				   jQuery(".menu-alert-offers").html(allofferscount).show();
				   
				   }
			 
              });
</script>



<div class="tabbable-panel">
<div class="tabbable-line">



<ul class="nav nav-tabs clearfix hide-mobile">

  <li class="nav-item">
  
  <a href="javascript:void(0);" onclick="showoffers('all');"  class="nav-link py-3 text-dark active" data-toggle="tab"  role="tab">
  <span class="px-lg-2 ">
  <?php echo __("All","premiumpress") ?>
  </span>
  
  <span class="badge badge-pill" id="count-all">0</span>
  </a> 
  
  </li>
  
 

  <li class="nav-item"> <a href="javascript:void(0);" onclick="showoffers(3);"  class="nav-link py-3 text-dark  showoffers-3-btn" data-toggle="tab"  role="tab"> <span class="px-lg-2 "><?php echo $txt1; ?></span> <span class="badge   badge-pill" id="count-approved">0</span> </a> </li>
  
  
  
  
  <li class="nav-item"> <a href="javascript:void(0);" onclick="showoffers(1);" class="nav-link py-3 text-dark showoffers-1-btn" data-toggle="tab"  role="tab"> <span class="px-lg-2 "><?php echo $txt2; ?></span> <span class="badge   badge-pill" id="count-pending">0</span> </a> </li>
  <li class="nav-item"> <a href="javascript:void(0);" onclick="showoffers(2);" class="nav-link py-3 text-dark showoffers-2-btn" data-toggle="tab"  role="tab"> <span class="px-lg-2 "> <?php echo $txt3;  ?></span> <span class="badge   badge-pill" id="count-rejected">0</span> </a> </li>
  
  
        
       <li class="nav-item"> <a href="javascript:void(0);" onclick="showoffers('finished');" class="nav-link py-3  " data-toggle="tab"  role="tab"> <span class="px-lg-2 "> <?php echo __("Finished","premiumpress") ?></span> <span class="badge badge-pill" id="count-offer-finished">0</span> </a> </li>
  
  
</ul>

</div>
</div>

<div class=" mt-5">
<div class="tab-content pb-4 border-0 px-0">
 
      <div id="accordion">
        <?php	
                     $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
                     
                     $args = array(
                        'post_type' 		=> 'ppt_offer',
                        'posts_per_page' 	=> 100,
                        'paged' 			=> $paged,
                     	'post_status'		=> 'publish',
						 'meta_query' => array(	
							 'relation'    => 'AND',					
								 array(							
									 'relation'    => 'OR',											 
									 'user1'    => array(
									 'key' => 'buyer_id',
									 'compare' => '=',
									 'value' => $userdata->ID,							 			
								),			 
									 'user2'   => array(
									 'key'     => 'seller_id',							
									 'compare' => '=',
									 'value' => $userdata->ID,	                     
								 ),						
							 ),	
						 ),
                     );					
                     $wp_query = new WP_Query($args); 
                     
                     // COUNT EXISTING ADVERTISERS	 
                     $tt = $wpdb->get_results($wp_query->request, OBJECT);
                     
                     $i=1; $post_id_array = array();
                     if(!empty($tt)){
					 
                     foreach($tt as $p){
					 
					 
					 
 					  
					 
 $post = get_post($p->ID);
 
 $main_offer_post_id = $post->ID;
					 
// GET BUYER ID
$job_buyer_id = get_post_meta($p->ID,'buyer_id',true);
if($job_buyer_id == ""){ $job_buyer_id =0;}
                     
$job_seller_id = get_post_meta($p->ID,'seller_id',true);
if($job_seller_id == ""){ $job_seller_id = 0; }
                     
// GET POST ID FOR JOB
$offer_status = get_post_meta($p->ID,'offer_status',true);
  
 					 
// GET POST ID FOR JOB
$job_post_id = get_post_meta($p->ID,'post_id',true);					
if(isset($post_id_array[$job_post_id]) && THEME_KEY == "at" && $offer_status == 1){ continue; }		

if($job_seller_id == $userdata->ID && THEME_KEY == "at" && $offer_status == 2){ continue; }				
$post_id_array[$job_post_id] = $job_post_id; 


// CHECK TITLE EXISTS
$job_post_title = get_the_title($job_post_id);
if($job_post_title == ""){ continue; }

/*****************************************/
					 
                   
// GET POST ID FOR JOB
$order_total = 0; $order_id = "";
if(get_post_meta($p->ID,'order_id',true) != ""){
$order_total = $CORE->ORDER("get_order_total", get_post_meta($p->ID,'order_id',true));

	$payment_data = $CORE->ORDER("get_order", get_post_meta($p->ID,'order_id',true));
	$payment_status = $CORE->ORDER("get_status", $payment_data['order_status']);
	
	$order_id = get_post_meta($p->ID,'order_id',true);
	  
	  
}

if($order_total == "0"){ // THIS IS BECAUSE OF BUY NOW OPTION, NO PAYMENT ORDER IS MADE

$order_total = get_post_meta($main_offer_post_id, 'price', true);
 $settings['payment_status'] 	= __("Pending","premiumpress");
	   
}
 
// CHECK FOR ESCROW SYSTEM
if($order_total == 0 && _ppt(array('cashout', 'enable_escrow')) == '1'){  

 switch(THEME_KEY){
	  
		  case "at": {
		  
		  		$current_price = get_post_meta($job_post_id,'price_current',true);
				if(!is_numeric($current_price)){ $current_price = 0; }
				 
				$order_total = $current_price;
				$payment_status = array( "name" =>  __("Pending","premiumpress") );
		  
		  
		  } break;
		  
		  case "dl":
		  case "ct": {
		  		  
		  		$order_total = get_post_meta($job_post_id, "price", true); 
				$payment_status = array( "name" =>  __("Pending","premiumpress") );
				
				 
		  } break;
		  
		  default:{ 	
		   
		  
			 
		  
		  } break;
	  }

}

 			

// CHECK IF FUNDS PAID
$job_donedate = get_post_meta($p->ID,'jobdone',true);
               
					 
// PAYMENT ID
$payment_id = "";
$offer_complete = 0;
$order_status = "";
if($offer_status == 3 && !in_array(THEME_KEY, array("da"))){ // OFFER ACCEPTED
 
	// ORDER ID
	$job_orderid = get_post_meta($p->ID,'invoice_id',true);
	 
	if($job_orderid == ""){
		
		$job_orderid = get_post_meta($p->ID,'order_id',true);	
		 
		 
		$job_payment_status = get_post_meta($job_orderid,'order_status',true);		
		$offer_complete = get_post_meta($p->ID, "offer_complete", true);		 
		
		// SET JOB COMPLETE IF ESCROW PAYMENT WAS MADE
		if(( $offer_complete == "" || $offer_complete ==1 ) && $job_payment_status == 1){
			$offer_complete =2;
		}elseif($offer_complete == ""){
			$offer_complete = 1;
		}
		  
		 
	}

	$payment_id = get_post_meta($p->ID, "payment_id", true); 
	if($payment_id != ""){
					   
		$odata = $CORE->ORDER("get_order", $payment_id);
	 		 					
		$odata_status = $CORE->ORDER("get_status", $odata['order_status']);
		if(isset($odata_status['name'])){
		$order_status =  $odata_status['name'];
		}
	}
	
	// PAYMENT COMPLETED
	$payment_complete = get_post_meta($p->ID, "payment_complete", true); 

					  
}
 
// FEEDBACK FORM EXTRAS
$feedback_date = "";
if($offer_status  == 3 && !in_array(THEME_KEY, array("da"))){
	
	 
	$feedback_date_buyer = get_post_meta($p->ID,'feedback_date_buyer',true);		
	$feedback_date_seller = get_post_meta($p->ID,'feedback_date_seller',true);	
	
	if($job_buyer_id == $userdata->ID){
			
			$feedback_date  = $feedback_date_buyer;
	}else{
			$feedback_date  = $feedback_date_seller;
	}
	
	$_GET['pid'] 		= $job_post_id;
	$_GET['extraid'] 	= $p->ID;
	$_GET['buyerid'] 	= $job_buyer_id;
	$_GET['sellerid'] 	= $job_seller_id;

	 
						    
}


if($offer_status  == 3 && in_array(THEME_KEY, array("da"))){

$offer_complete = 3;

}

/*******************************************/


if(in_array(THEME_KEY, array("mj"))){ 

$txt1 = __("You paid for","premiumpress");
$txt2 = __("Item ordered","premiumpress");
 
$txt3 = __("New Order","premiumpress");
$txt4 = __("Wating Responce","premiumpress");
$txt5 = __("Mark Completed","premiumpress");

$txt6 = __("Order Received","premiumpress");
$txt7 = __("Accept/Decline","premiumpress");
$txt8 = __("Receive Payment","premiumpress");

}elseif(in_array(THEME_KEY, array("at"))){ 

$txt1 = __("You bid on","premiumpress");
$txt2 = __("Bidders for item","premiumpress");
 
$txt3 = __("New Bid","premiumpress");
$txt4 = __("Auction Ended","premiumpress");
$txt5 = __("Make Payment","premiumpress");

$txt6 = __("New Bid","premiumpress");
$txt7 = __("Auction Ended","premiumpress");
$txt8 = __("Receive Payment","premiumpress");

}elseif(in_array(THEME_KEY, array("jb"))){ 

$txt1 = __("Job title","premiumpress");
$txt2 = __("Job title","premiumpress");
 
$txt3 = __("Application Sent","premiumpress");
$txt4 = __("Wait for Responce","premiumpress");
$txt5 = __("Setup Interview","premiumpress");

$txt6 = __("Application Received","premiumpress");
$txt7 = __("Accept/Decline","premiumpress");
$txt8 = __("Setup Interview","premiumpress");

}elseif(in_array(THEME_KEY, array("rt"))){ 

$txt1 = __("Viewing request for","premiumpress");
$txt2 = __("Viewing request for","premiumpress");
 
$txt3 = __("Submit Request","premiumpress");
$txt4 = __("Wait for Responce","premiumpress");
$txt5 = __("Setup Viewing","premiumpress");

$txt6 = __("Viewing Request","premiumpress");
$txt7 = __("Accept/Decline","premiumpress");
$txt8 = __("Setup Viewing","premiumpress");

}elseif(in_array(THEME_KEY, array("da"))){ 

$txt1 = __("I requested access to","premiumpress");
$txt2 = __("Access request received for","premiumpress");
 
$txt3 = __("Request Sent","premiumpress");
$txt4 = __("Wating Responce","premiumpress");
$txt5 = __("Access Granted","premiumpress");

$txt6 = __("Requested Received","premiumpress");
$txt7 = __("Accept/Decline","premiumpress");
$txt8 = __("Access Granted","premiumpress");


}elseif(in_array(THEME_KEY, array("ll"))){ 

$txt1 = __("You applied for","premiumpress");
$txt2 = __("%user applied for","premiumpress");
 
$txt3 = __("New Applicaton","premiumpress");
$txt4 = __("Course Ended","premiumpress");
$txt5 = __("Make Payment","premiumpress");

$txt6 = __("New Application","premiumpress");
$txt7 = __("Course Ended","premiumpress");
$txt8 = __("Receive Payment","premiumpress");


}else{

$txt1 = __("You bid on","premiumpress");
$txt2 = __("Your item","premiumpress");

$txt3 = __("Offer Sent","premiumpress");
$txt4 = __("Wating Responce","premiumpress");
$txt5 = __("Make Payment","premiumpress");
$txt6 = __("Offer Received","premiumpress");
$txt7 = __("Accept/Decline","premiumpress");
$txt8 = __("Receive Payment","premiumpress");
  
}

// CHECK IF ITS MY OWN JOB
$isownjob = "";
if($job_buyer_id == $userdata->ID){

}else{
$isownjob = "ownpost";
} 

?>




<div class="border-bottom bg-white shadow-sm mb-4  p-3 <?php if($offer_status == 3 && $feedback_date != ""){ echo "card-job-finished"; }else{ ?>card-job-<?php echo $offer_status; ?><?php } ?> card-postid-<?php echo $job_post_id; ?> " id="offer-card-<?php echo $main_offer_post_id; ?>">
  <div class="row  y-middle" id="heading<?php echo $post->ID; ?>">
    <div class="col-7 col-md-7 col-lg-6">
      <div class="float-left img-list mr-3"> <?php echo str_replace("data-","",do_shortcode('[IMAGE pid="'.$job_post_id.'"]'));  ?> </div>
      <div class="ellipsis" style="max-width:200px;">
      
     
      <a href="<?php echo get_permalink($job_post_id ); ?>" class="text-dark font-weight-bold" target="_blank"> <?php echo $job_post_title; ?></a> 
      
      <br />
      
       
      
         
      
      
       <?php if($job_buyer_id == $userdata->ID){ ?>
       
        
           
       <?php if(in_array(THEME_KEY, array("mj","at","ct","dl"))){ ?>
          
        <span class="small badge badge-primary"><?php echo __("buying","premiumpress"); ?></span>
        <?php }else{ ?>
        
         <div class="small opacity-5"><?php echo $txt1; ?></div>
        <?php } ?>
        
      
        <?php }else{ ?>
        
        
         <?php if(in_array(THEME_KEY, array("mj","at","ct","dl"))){ ?>
        <spa class="small badge badge-success"><?php echo __("selling","premiumpress"); ?></span>
        
        <?php }else{ ?>
        
           <div class="small  opacity-5"><?php echo str_replace("%user", $CORE->USER("get_username", $job_buyer_id ),$txt2); ?></div>
        
     
        
        <?php } ?>
        
        
        <?php } ?>
        
         
      
      </div>
    </div>
    
    
    <div class="col-2 col-lg-1 col-lg-2   hide-mobile">
    
    
        <?php if($offer_status == 1 || $offer_status == ""){ ?>
        
        <?php if(THEME_KEY == "at"){ 
		
		// GET CURRENT PRICE
					  $current_price = get_post_meta($job_post_id,'price_current',true);
					  if(!is_numeric($current_price)){ $current_price = 0; }
		
		?>
        
       <div class="font-weight-bold job-pending <?php echo $isownjob; ?>"><?php echo hook_price($current_price); ?></div>
       <div class="small opacity-5"><?php echo __("Current price","premiumpress"); ?></div>
    	
       
        <?php }else{ ?>
        <span class="badge badge-info float-right job-pending <?php echo $isownjob; ?>"><?php echo __("Pending","premiumpress"); ?></span>
        <?php } ?>
        
        <?php }elseif($offer_status == 2){ ?>
        
        <span class="badge badge-danger float-right job-rejected <?php echo $isownjob; ?>"><?php if(THEME_KEY == "at"){ echo __("Lost","premiumpress"); }else{ echo __("Rejected","premiumpress"); } ?>
  
        </span>
        
        <?php }elseif($offer_status == 3  && $feedback_date != ""){ ?>
        
        <div class=" float-right"> <span class="badge badge-dark job-finished <?php echo $isownjob; ?>"> <i class="fa fa-heart" aria-hidden="true"></i> <?php echo __("Complete","premiumpress"); ?></span> </div>
        
        <?php }elseif($offer_status == 3){ ?>
        
        <div class=" float-right"> <span class="badge badge-success job-approved <?php echo $isownjob; ?>">
		
		<?php if(THEME_KEY == "at"){ 
				
				if($job_buyer_id == $userdata->ID){ 
					echo __("Won","premiumpress"); 
				}else{
				
					echo __("Sold","premiumpress"); 
				} 
		
		}else{ echo __("Accepted","premiumpress"); } ?> </span> </div>
          
        <?php } ?> 
       
    </div>
   
    <div class="col-2 hide-ipad hide-mobile">
    
    
    
    <?php if(get_post_meta($job_post_id ,'listing_expiry_date', true) != ""){ ?>
    
    
   <div class="font-weight-bold"><?php echo do_shortcode('[TIMELEFT postid="'.$job_post_id .'" layout="1" text_before="" text_ended="Not Set" key="listing_expiry_date"]'); ?></div>
   <div class="small opacity-5"><?php echo __("Time left","premiumpress"); ?></div>
    
      
      
      <?php }else{ ?> 
             
      <?php
	  
	  switch(THEME_KEY){
	  
		  case "at": {
		  
		  		$current_price = get_post_meta($job_post_id,'price_current',true);
				if(!is_numeric($current_price)){ $current_price = 0; }
				
				// GET SHIPPING OST
			   $price_shipping = get_post_meta($job_post_id,'price_shipping',true);
			   if($price_shipping == "" || !is_numeric($price_shipping)){$price_shipping = 0; }
			   
			   if($price_shipping > 0){
			   $current_price = $current_price + $price_shipping;
			   $order_total =  $current_price;
			   }

				 
				echo '<div class="'.$CORE->GEO("price_formatting",array()).'">'.hook_price($current_price).'</div>';
		  
		  
		  } break;
		  
		  default:{ 	
		   
		  
			if(is_numeric($order_total) && $order_total > 0){ 
			
				echo '<div class="'.$CORE->GEO("price_formatting",array()).'">'.hook_price($order_total).'</div>';			 
			}
		  
		  } break;
	  }
	   
	  
	  ?> 
      
      
      <?php } ?>
    
    
      
    </div>
 
   
    <div class="col-5 col-sm-2">
    
    <a href="javascript:void(0);" onclick="ajax_chat_logs_<?php echo $post->ID; ?>_show();" class="btn btn-primary btn-block" data-toggle="collapse" data-target="#collapse<?php echo $post->ID; ?>" aria-controls="collapse<?php echo $post->ID; ?>">
    <?php echo __("View","premiumpress"); ?>
    </a>
    
    <script>
	function ajax_chat_logs_<?php echo $post->ID; ?>_show(){
		
		if(jQuery('#ppt_chat_send_<?php echo $p->ID; ?>_chat_msg').length > 0){
		ajax_chat_logs_<?php echo $post->ID; ?>();
		}
	}
	
	</script>
      
    </div>
  </div>
</div>


 
  
<div id="collapse<?php echo $post->ID; ?>" class="collapse rounded-0" aria-labelledby="heading<?php echo $post->ID; ?>" data-parent="#accordion">

   
      <div class="container-fluid px-0">
      
      <div class="row">
      
  	<div class="col-md-8">
         <?php 
		 		
				 
			   
			  global $settings; 
			  
			  $settings['pid'] 				= $p->ID;
			  $settings['offer_complete'] 	= $offer_complete;
			  $settings['offer_status'] 	= $offer_status;			  
			  $settings['job_post_id'] 		= $job_post_id;
			  $settings['job_seller_id'] 	= $job_seller_id;
			  $settings['job_buyer_id'] 	= $job_buyer_id; 
			  $settings['order_id'] 		= $order_id;			  
			  $settings['order_total'] 		= $order_total;
			  $settings['order_date'] 		= $post->post_date;
			  $settings['payment_id'] 		= $payment_id;			  
			  $settings['feedback_date'] 	= $feedback_date;
			  
			  $settings['offer_id'] = $main_offer_post_id;
			  
			  if(isset($payment_status['name'])){
			  $settings['payment_status'] 	= $payment_status['name'];
			  }
			  
			  // STATUS KEY
			   $status_key = $settings['offer_status']."-".$settings['offer_complete'];
			   
//echo $status_key."<--";
			  
			  // IS THE OFFER ACCEPTED?
			  if($settings['offer_status'] == 3){
			  $settings['ajax'] 			= "offer_complete"; // ajax function name
			  }else{ 
			  $settings['ajax'] 			= "offer_update";
			  }
			  
			  // DISPLAY PRGRESS BOX
		  	  _ppt_template( 'framework/design/account/parts/_complete' );
			  
			  // DISPLAY CHAT BOX
			   
			  if($status_key == "3-5"){			  
			  _ppt_template( 'framework/design/account/parts/_feedback' );  			
			  }elseif($settings['offer_status'] == 3){				
			  _ppt_template( 'framework/design/account/parts/_chat' ); 
			  }
			
			 ?> 
        
        
        
        
        </div>
        <div class="col-md-4">  
		
        
        <?php
		
		  	global $settings;
			  
			  $settings['pid'] 				= $p->ID;
			  $settings['offer_complete'] 	= $offer_complete;
			  $settings['offer_status'] 	= $offer_status;
			  
			  $settings['job_post_id'] 		= $job_post_id;
			  $settings['job_seller_id'] 	= $job_seller_id;
			  $settings['job_buyer_id'] 	= $job_buyer_id;
			  
			  
			  $settings['order_total'] = $order_total;
			  $settings['order_date'] = $post->post_date;
			  $settings['payment_id'] = $payment_id;
			  
			  if(isset($payment_status['name'])){
			  $settings['payment_status'] = $payment_status['name'];
			  }  
			   
		  	  _ppt_template( 'framework/design/account/parts/_details' ); 
			 
			  
			  ?>
     
     </div>
     </div>
      
             
            

<?php /* if(function_exists('current_user_can') && current_user_can('administrator')){ ?>

<hr />       
                      
<button class="btn btn-system btn-md" type="button" onClick="ajax_single_offer_delete_<?php echo $post->ID; ?>()"><i class="fa fa-trash"></i> <?php echo __("Delete","premiumpress"); ?></button>
                                         
<?php } */ ?>               
               
<script>


	 
          
function ajax_escrow_payment(div,pp){
   
   
       jQuery.ajax({
           type: "POST",
           url: '<?php echo home_url(); ?>/',		
   		data: {
               action: "load_new_payment_form",
   				details:jQuery('#'+div).val(),
           },
           success: function(response) { 
		   
		   jQuery(".payment-modal-wrap").fadeIn(400); 
		 
		    jQuery(".payment-modal-container h3").text(pp).addClass("<?php echo _ppt(array('currency','symbol')); ?>");			
					 
			 
   			jQuery('#ajax-payment-form').html(response);	
			
			UpdatePrices();			 
   			
           },
           error: function(e) {
               console.log(e)
           }
       });
  
}
 								
function ajax_single_offer_delete_<?php echo $post->ID; ?>(){ 
 
	jQuery.ajax({
        type: "POST",
        url: '<?php echo home_url(); ?>/',	
		dataType: 'json',	
		data: {
            single_action: "offer_delete",
			
			job_id: <?php echo $p->ID; ?>,
			listing_id: <?php echo $job_post_id; ?>,
			
			seller_id:  <?php echo $job_seller_id; ?>,
			buyer_id: <?php echo $job_buyer_id; ?>, 
			  
        },
        success: function(response) {
 
			if(response.status == "ok"){
			 	 
				 jQuery('#offer-card-<?php echo $main_offer_post_id; ?>').hide();
  		 	
			}else{			
				console.log("Error trying to add.");			
			}			
        },
        error: function(e) {
            console.log(e)
        }
    });
	
}// end are you sure
</script>   
              
 
</div>
</div><!-- end collapse -->


<?php  } ?>

 
 
<?php }else{ ?>

<div class="text-center mt-5"><i class="<?php echo $CORE->LAYOUT("captions","icon-offer"); ?> fa-4x text-primary"></i></div>

<h4 class="text-center mt-4"><?php echo str_replace("%s", strtolower($CORE->LAYOUT("captions","offers")), __("No %s found","premiumpress")); ?></h4>

<p class="text-center text-muted mt-3"><?php echo str_replace("%s", strtolower($CORE->LAYOUT("captions","offer")), __("Submit a new %s to get started!","premiumpress")); ?></p>


<?php } ?>

</div>

<!-- end accordian -->
 
</div>
</div>

<?php if(isset($_GET['showoid']) && is_numeric($_GET['showoid']) ){ ?>
<script>
jQuery(document).ready(function(){ 

	jQuery('#collapse<?php echo esc_attr($_GET['showoid']); ?>').collapse('show');
	ajax_chat_logs_<?php echo esc_attr($_GET['showoid']); ?>_show();
});
</script>
<?php } ?>