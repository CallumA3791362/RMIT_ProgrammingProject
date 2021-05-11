<?php
 
add_filter( 'ppt_blocks_args', 	array('block_pricing5',  'data') );
add_action( 'pricing5',  		array('block_pricing5', 'output' ) );
add_action( 'pricing5-css',  	array('block_pricing5', 'css' ) );
add_action( 'pricing5-js',  	array('block_pricing5', 'js' ) );

class block_pricing5 {

	function __construct(){}		

	public static function data($a){ global $CORE;
  
		$a['pricing5'] = array(
			"name" 	=> "Style 5",
			"image"	=> "pricing5.jpg",
			"cat"	=> "pricing",
			"desc" 	=> "", 
			"data" 	=> array( ),
			
			"defaults" => array(
					
					// TEXT
						
					"title_show" 		=> "yes",
					"title_style" 		=> "1",
					"title_heading" 	=> "h2",
					"title_pos" 		=> "center",
					
					"title" 			=> $CORE->LAYOUT("get_placeholder_text", array('title', "pricing") ),					 
					"subtitle"			=> "",					
					"desc" 				=> $CORE->LAYOUT("get_placeholder_text", array('subtitle', "pricing") ),
					 	
					"title_margin"		=> "mb-3",
					"subtitle_margin"	=> "",
					"desc_margin" 		=> "",					
					
					"title_font" 		=> "",
					"subtitle_font" 	=> "",
					"desc_font" 		=> "",
					 
					"title_txtcolor" 	=> "dark",
					"subtitle_txtcolor" => "primary",
					"desc_txtcolor" 	=> "opacity-5",
					
					"title_txtw" 		=> "",
					"subtitle_txtw" 	=> "",
					 
					
					// BUTTON					
					"btn_show" 			=> "no",						
					"btn_style" 		=> "1",				
					"btn_size" 			=> "",
					"btn_icon" 			=> "",				
					"btn_icon_pos" 		=> "",
					"btn_font" 			=> "",
					"btn_txt" 			=> "",
					"btn_link" 			=> "",
					"btn_bg" 			=> "",
					"btn_bg_txt" 		=> "",					
					"btn_margin" 		=> "mt-4",
					 			
					
					// BUTTON				
					"btn2_show" 		=> "no",						
					"btn2_style" 		=> "2",				
					"btn2_size" 		=> "",
					"btn2_icon" 		=> "",				
					"btn2_icon_pos" 	=> "",
					"btn2_font" 		=> "",
					"btn2_txt" 			=> "",
					"btn2_link" 		=> "",
					"btn2_bg" 			=> "",
					"btn2_bg_txt" 		=> "",					
					"btn2_margin" 		=> "mt-4",
					 
			),
					
		);		
		
		return $a;
	
	} public static function output(){ global $CORE, $new_settings, $userdata, $settings;
	
		
		$settings = array( );  
		 
		// ADD ON SYSTEM DEFAULTS
		$settings = $CORE->LAYOUT("get_block_settings_defaults", array("pricing5", "pricing", $settings ) );
	 
		// UPDATE DATA FROM ELEMENTOR OR CHILD THEMES
		if(is_array($new_settings)){
			 foreach($settings as $h => $j){
				if(isset($new_settings[$h]) && $new_settings[$h] != ""){
					$settings[$h] = $new_settings[$h];
				}
			 }
		}
		
		// DEFAULT
		if(isset($GLOBALS['flag-add'])){
			$settings["pricing_type"] = "packages";
		}elseif(isset($GLOBALS['flag-memberships'])){
			$settings["pricing_type"] = "memberships";
		}	
		 
		
		// BUILD PACKAGE DATA
		$pricing_data = array();
		$btn = wp_login_url();
		
		
		if($settings["pricing_type"] == "packages"){
		 
		 
			foreach(  $CORE->PACKAGE("get_packages", array() ) as $k => $n){ 
			     
				// PACKAGE
				$pricing_data[] = array(
						
						'id' 		=> $n['key'], 	
						'title' 	=> $CORE->GEO("translate_pak_name", array( stripslashes(_ppt('pak'.$n['key'].'_name')), $n['key'])  ),
						'desc' 		=> $CORE->GEO("translate_pak_desc", array( stripslashes(_ppt('pak'.$n['key'].'_desc') ), $n['key']) ),
						//'subtitle' 	=> $CORE->PACKAGE("get_days_text", $n['key'] ),
						'price' 	=> $n['price'],
'price_text' => $n['price_text'],
						'recurring' => _ppt('pak'.$n['key'].'_r'),						
						'features' 	=> $CORE->PACKAGE("get_features_array", array($n['key'],"pak") ),						
						'active' => _ppt('pak'.$n['key'].'_highlight'),
						'button' => $CORE->PACKAGE("get_continue_button", $n['key'] ),
						
				);				 
			 
			}// end while
			
		 
		
		// SELLSPACE ****************************************
		/* **************************************************/
		
		}elseif($settings["pricing_type"] == "advertising"){
			
			$sellspacedata 	= _ppt('sellspace');		
			$sellspace 		= $CORE->ADVERTISING("get_spaces", array() );
			
			if(is_array($sellspace) && !empty($sellspace)){
				
				
				foreach($sellspace as $key => $sp){ 
				
					// CHECK IF ENABLED
					if(!isset($sellspacedata[$key]) || isset($sellspacedata[$key]) && $sellspacedata[$key] != 1){ continue; }
			
				
				 	// WORKOUT PRICE
					 $price = $sellspacedata[$key."_price"];
					 if(is_numeric($price) && $price > 0 ){
					  		$price_txt = hook_price($price);
					 }else{
					 	$price_txt = __("Free","premiumpress");
					 } 
					
					// PACKAGE
					$pricing_data[] = array(
							
							'id' 		=> $key, 	
							'title' 	=> stripslashes($sellspacedata[$key."_name"]),
							'desc' 		=> stripslashes($sellspacedata[$key."_desc"]),
							//'subtitle' 	=> $CORE->PACKAGE("get_days_text", $n['key'] ),
							'price' 	=> $price,
							'price_text' => $price_txt,	
							'recurring' => 0,						
							'features' 	=> 0,						
							'active' 	=> 0,
							'button' 	=> $CORE->ADVERTISING("get_continue_button", $key ),
							
					); 
					
				
				}
			
			}
		
		// MEMBERSHIPS **************************************
		/* **************************************************/

		}else{		
		  
		 	
			foreach(  $CORE->USER("get_memberships", array() ) as $k => $n){ 
			 
					// PACKAGE
					$pricing_data[] = array(
							
							'id' 		=> $n['key'], 	
							'title' 	=> $CORE->GEO("translate_mem_name", array( stripslashes(_ppt('mem'.$n['key'].'_name')), $n['key'])  ),
							'desc' 		=> $CORE->GEO("translate_mem_desc", array( stripslashes(_ppt('mem'.$n['key'].'_desc') ), $n['key']) ),
							//'subtitle' 	=> $CORE->PACKAGE("get_days_text", $n['key'] ),
							'price' 	=> $n['price'],
'price_text' => $n['price_text'],
							'recurring' => _ppt('mem'.$n['key'].'_r'),						
							'features' 	=> $CORE->PACKAGE("get_features_array", array($n['key'], "mem") ),						
							'active' 	=> _ppt('mem'.$n['key'].'_highlight'),
							'button' 	=> $CORE->USER("get_membership_continue_button", $n['key'] ),
							
					);
			
			} 
		
		}
		
		
		$settings["title_pos"] = "center";
		
		  
	ob_start();
	
	?>

<section id="pricing" class="<?php echo $settings['section_class']." ".$settings['section_bg']." ".$settings['section_padding']." ".$settings['section_divider']; ?>">
  <div class="container">
  
  <?php if(isset($_GET['noaccess'])){ ?>
  
  <div class="col-12 text-center mb-5">
    <div class="alert alert-info mb-5 rounded-0 text-center">
        <h4 class="font-weight-bold my-3 text-uppercase"><?php echo __("Whoops, Access Denied!","premiumpress"); ?></h4>
        <p class="lead"><?php echo __("Please upgrade to a different membership package.","premiumpress"); ?></p>        
      </div>
    </div>
  <?php } ?>
  
  
    <?php if($settings['title_show'] == "yes"){ ?>
    <div class="col-12 text-center mb-5">
      <?php _ppt_template( 'framework/design/parts/title' ); ?>
    </div>
    <?php } ?>
 
  
  
<div class="row justify-content-md-center">

<?php if(!empty($pricing_data)){
 $i=1; foreach($pricing_data as $pak){ ?>
 
  
 <div class="col-xl-4 col-md-6">
						<div class="price-table-style-3 border text-center box<?php echo $i; ?> <?php if($pak['active'] == "1"){?>active<?php } ?>">
							<div class="price-table-head">
		                        <div class="price-title">
		                            <h2><?php echo $pak['title']; ?></h2>
		                            <span class="price-disc">
                                    
                                    
                                    <?php /*if($pak['recurring'] == "1"){ ?><?php echo __("Monthly","premiumpress"); ?><?php }else{ ?> <?php }*/ ?>
                                    
                                    </span>
		                        </div>
		                        <div class="price-text">
                                
                                <span class="<?php if(is_numeric($pak['price']) && $pak['price'] != "0"){ echo $CORE->GEO("price_formatting",array()); } ?>"><?php if($pak['price'] == 0){ echo $pak['price_text']; }else{  echo $pak['price']; } ?></span> 
                                
		                        	 
		                        </div>
							</div>
	                        <div class="price-list">
	                            <ul>
	                               <?php if(strlen($pak['desc']) > 1){ ?> <li><?php echo $pak['desc']; ?></li><?php } ?>
                                        <?php if(isset($pak['features']) && is_array($pak['features']) && !empty($pak['features']) ){ foreach($pak['features'] as $f){ ?>
		                                <li><i class="fa <?php if($f['value'] == "1"){?>fa-check<?php }else{ ?>fa-times<?php } ?> mr-2"></i> <?php echo $f['name']; ?></li>
		                                <?php } } ?>
	                            </ul>
	                        </div>
	                      <a class="primary-button" <?php echo $pak['button']; ?>><?php echo __("Select Package","premiumpress"); ?></a>
	                    </div>
					</div>
 
  
 

<?php $i++; } } ?> 

</div>




      <?php if(isset($GLOBALS['flag-add']) && $userdata->ID && $settings["pricing_type"] == "packages" && $CORE->USER("membership_hasaccess", "listings") && $CORE->USER("get_user_free_membership_addon", array("listings", $userdata->ID)) > 0 ){ ?>
      <div class="col-12 mt-4">
      
      <div class="alert alert-info text-center">
      <?php echo str_replace("%s", "<u class='font-weight-bold'>".$CORE->USER("get_user_free_membership_addon", array("listings", $userdata->ID))."</u>", __("You have %s free listings left. Pick any listing package above to continue.","premiumpress")); ?>
      </div>
     
      </div>
      <?php } ?>
      
      
      <?php if(isset($_GET['upgrade']) && $userdata->ID){ $mem = $CORE->USER("get_user_membership", $userdata->ID); $da = $CORE->date_timediff($mem['date_expires'],'');   ?>
      <div class="col-12 mt-4">
      <?php if(in_array(_ppt(array('mem','paktime')), array("","1"))){ ?>
      <div class="alert alert-info text-center">
      <?php echo str_replace("%s", "<u class='font-weight-bold'>".$da['days-left']."</u>", __("Buy a new membership today and get the %s days left on your old membership added completely free!","premiumpress")); ?>
      </div>
      <?php } ?>
     
      </div>
      <?php } ?> 

 
  </div>
</section> 
 
<script>
 

function processPayment(sid,pp){
   
   	 
       jQuery.ajax({
           type: "POST",
           url: '<?php echo home_url(); ?>/',		
   		data: {
               action: "load_new_payment_form",
   				details: sid, 
           },
           success: function(response) { 
		   
		   jQuery(".payment-modal-wrap").fadeIn(400);
		 
		    jQuery(".payment-modal-container h3").text(pp); 			 
			 
   			jQuery('#ajax-payment-form').html(response);
			
			UpdatePrices();
					 
   			
           },
           error: function(e) {
               console.log(e)
           }
       });
   
   }
   
</script>
<?php
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;	
	
	}
		public static function css(){
		ob_start();
		?>
 
<style>
.price-table-style-3 ul { list-style:none; padding:30px;  }

.price-table-style-3 {position: relative;border-radius: 5px;margin-bottom: 30px;padding-bottom: 40px;background: #fff;background-repeat: no-repeat;background-size: 100% auto;-webkit-transition: all 0.25s ease;transition: all 0.25s ease;-webkit-box-shadow: 0 2px 5px -2px rgba(123, 127, 138, 0.15);box-shadow: 0 2px 5px -2px rgba(123, 127, 138, 0.15);}
.price-table-style-3:hover {-webkit-box-shadow: 0 15px 30px 0 rgba(123, 127, 138, 0.30);box-shadow: 0 15px 30px 0 rgba(123, 127, 138, 0.30);-webkit-transform: translateY(-15px) scale(1.05);transform: translateY(-15px) scale(1.05);}
.price-table-style-3 .price-table-head {display: flex;padding: 20px 25px 25px;}
.price-table-style-3 .price-title {flex: 1;align-self: center;text-align: left;}
.price-table-style-3 .price-title h2 {font-size: 30px;text-transform: uppercase;margin-bottom: 0;color: #fff;}
.price-table-style-3 .price-title .price-disc {font-size: 13px;text-transform: uppercase;color: #fff;}
.price-table-style-3 .price-text {text-align: right;font-size: 26px;font-weight: 500;align-self: center;color: #fff;}
.price-table-style-3 .price-list {margin-bottom: 30px;}
.price-table-style-3 .price-list li {padding: 1rem;font-size: 14px;border-bottom: 1px solid #e6e2e2;}
.price-table-style-3 .primary-button {padding: 10px 30px;display: inline-block;text-transform: capitalize;text-align: center;font-weight: 500;border-radius: 5px;border: 1px solid ;-webkit-transition: all 0.25s linear;transition: all 0.25s linear;}
.price-table-style-3.box1 .price-table-head {background: #f35764;}
.price-table-style-3.box2 .price-table-head {background: #2bcc6f;}
.price-table-style-3.box3 .price-table-head {background: #feb73b;}
.price-table-style-3.box1 .primary-button {border-color: #f35764;color: #fff;background: #f35764;}
.price-table-style-3.box1 .primary-button:hover {background: #fff;color: #f35764;-webkit-transform: translateY(-5px);transform: translateY(-5px);}
.price-table-style-3.box2 .primary-button {border-color: #2bcc6f;color: #fff;background: #2bcc6f;}
.price-table-style-3.box2 .primary-button:hover {background: #fff;color: #2bcc6f;-webkit-transform: translateY(-5px);transform: translateY(-5px);}
.price-table-style-3.box3 .primary-button {border-color: #feb73b;color: #fff;background: #feb73b;}
.price-table-style-3.box3 .primary-button:hover {background: #fff;color: #feb73b;-webkit-transform: translateY(-5px);transform: translateY(-5px);}
</style>
 
<?php	
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
		}	
		public static function js(){
		return "";
		ob_start();
		?>
<?php	
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
		}	
}

?>
