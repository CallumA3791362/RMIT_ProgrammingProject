<?php
 
add_filter( 'ppt_blocks_args', 	array('block_contact1',  'data') );
add_action( 'contact1',  		array('block_contact1', 'output' ) );
add_action( 'contact1-css',  	array('block_contact1', 'css' ) );
add_action( 'contact1-js',  	array('block_contact1', 'js' ) );

class block_contact1 {

	function __construct(){ }
 
	public static function data($a){ 
 
		$a['contact1'] = array(
			"name" 	=> "Style 1",
			"image"	=> "contact1.jpg",
			"cat"	=> "contact",
			"desc" 	=> "", 
			"data" 	=> array( ),
			"order" => 1,	
			
			"defaults" => array(
					
					// TEXT
						
					"title_show" 		=> "yes",
					"title_style" 		=> "1",
					"title_heading" 	=> "h3",
					"title_pos" 		=> "",
					
					"title" 			=> __("Get in touch","premiumpress"),					 
					"subtitle"			=> "",					
					"desc" 				=> __("Complete the form below and we'll get back to you within 48 hours.","premiumpress"),
					 	
					"title_margin"		=> "",
					"subtitle_margin"	=> "",
					"desc_margin" 		=> "mb-5",					
					
					"title_font" 		=> "",
					"subtitle_font" 	=> "",
					"desc_font" 		=> "",
					 
					"title_txtcolor" 	=> "dark",
					"subtitle_txtcolor" => "primary",
					"desc_txtcolor" 	=> "opacity-5",
					
					"title_txtw" 		=> "",
					"subtitle_txtw" 	=> "",
			 
					
					 
			),
			
					
		);		
		
		return $a;
	
	} public static function output(){ global $CORE, $new_settings, $settings;
	
	
		$settings = array( );  
	  
		// ADD ON SYSTEM DEFAULTS
		$settings = $CORE->LAYOUT("get_block_settings_defaults", array("contact1", "contact", $settings ) ); 

		// UPDATE DATA FROM ELEMENTOR OR CHILD THEMES
		if(is_array($new_settings)){
			 foreach($settings as $h => $j){
				if(isset($new_settings[$h]) && $new_settings[$h] != ""){
					$settings[$h] = $new_settings[$h];
				}
			 }
		} 
		
		// RANDOM NUMBERS
		$email_nr1 = rand("0", "9"); $email_nr2 = rand("0", "9"); 

		
	 
	ob_start();
	?><section class="<?php echo $settings['section_class']." ".$settings['section_bg']." ".$settings['section_padding']." ".$settings['section_divider']; ?>">
	<div class="container">
		<div class="row">
        
       
        
        
			<div class=" <?php if(_ppt(array('maps','enable')) == 1){ ?>col-md-6<?php }else{ ?>col-md-8 mx-auto<?php } ?> pr-lg-5">
            
            
            
            <?php  _ppt_template( 'framework/design/parts/title' ); ?>
             
				
			<div id="ajax_contactform_output_ok" style="display:none;">
  <div class="alert alert-success text-center small"> <i class="fa fa-check"></i> <?php echo __("Message Sent Successfully.","premiumpress") ?> </div>
</div>
<div id="ajax_contactform_output_error" style="display:none;">
  <div class="alert alert-danger text-center small"> <i class="fa fa-times"></i> <?php echo __("Error Sending Message.","premiumpress") ?> </div>
</div>
				<form method="post" action="" id="contactusform">
					 
                <input type="hidden" name="report" id="reportpostid" value="<?php if(isset($_GET['reportid']) && is_numeric($_GET['reportid']) ){ echo esc_attr($_GET['reportid']); } ?>" />
                    
                    
					<div id="html_element"></div>
					<?php if(isset($_GET['report']) && is_numeric($_GET['report']) ){ ?><input type="hidden" name="report" value="<?php echo strip_tags($_GET['report']); ?>" /><?php } ?>
					<div class="row">
						<div class="col-12 col-md-6">
							<div class="controls mb-3 position-relative"> 
								<input type="text" class="form-control" name="form[name]" id="name" placeholder="<?php echo __("First Name","premiumpress") ?>" onchange="jQuery('#showcodeb').show();">
                                <span class="input-group-addon inlineicon"> <span class="fal fa-user"></span> </span> 
							</div>
						</div>
						 
						
						<div class="col-12 col-md-6">
							<div class="controls mb-3 position-relative">
								<input type="text" class="form-control" id="phone" name="form[phone]" placeholder="<?php echo __("Phone","premiumpress") ?>">
                                 <span class="input-group-addon inlineicon"> <span class="fal fa-phone"></span> </span> 
							</div>
						</div>
                        
                        <div class="col-12">
							<div class="controls mb-3 position-relative"> 
								<input type="text" class="form-control" id="email1" name="form[email]" placeholder="<?php echo __("Email","premiumpress") ?>">
                                <span class="input-group-addon inlineicon"> <span class="fal fa-envelope"></span> </span>
							</div>
						</div>
                        
						<div class="col-12">
							<div class="controls mb-3 position-relative">
								<textarea name="form[message]" class="form-control" id="message" style="height:150px; width:100%;" placeholder="<?php echo __("Message","premiumpress") ?>"></textarea>
							</div>
						</div>
      
                        
<?php if(_ppt(array('captcha','enable')) == 1 && _ppt(array('captcha','sitekey')) != "" ){ ?>
      
      <div class="col-12 mb-3">
         <div class="g-recaptcha mt-2" data-sitekey="<?php echo stripslashes(_ppt(array('captcha','sitekey'))); ?>"></div>
      </div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php }else{ ?>  
                        
                        
<div class="col-12" id="showcodeb" style="display:none;">
      <div class="controls mb-3 position-relative">
        <input type="text" name="contact_code" placeholder="<?php echo str_replace("%a",$email_nr1,str_replace("%b",$email_nr2,__("Security: %a + %b = ?","premiumpress"))); ?>" class="form-control"  tabindex="5"  id="code" />
         <span class="input-group-addon inlineicon"> <span class="fal fa-shield-check"></span> </span>
</div>  </div> 

<?php } ?>




						<div class="col-12">
							<button type="button" onclick="CheckFormData();" id="btncontactform" class="btn btn-primary btn-xl btn-block rounded-0 py-2 px-3" disabled><?php echo __("Send Message","premiumpress") ?></button>	
						</div>
						<div class="col-12 my-3 "> 
							<input name="agreetc" type="checkbox" id="agreetc" onchange="UpdateTCA()" /> <?php echo __("Accept","premiumpress") ?> <a href="<?php echo _ppt(array('links','terms')); ?>"><?php echo __("Terms &amp; conditions","premiumpress") ?></a> 
						</div>
					</div>
				</form>
<script>

function UpdateTCA(){					 
	if(jQuery('#agreetc').is(':checked') ){                        	
		jQuery('#btncontactform').removeAttr("disabled");
	}else{
		jQuery('#btncontactform').attr("disabled", true);                       
	} 					 
}
					
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}		
function CheckFormData(){
 
					
					var reportpostid 	= document.getElementById("reportpostid");
					var name 	= document.getElementById("name"); 
					var email1 	= document.getElementById("email1");
					var code = document.getElementById("code");
					var message = document.getElementById("message");	 
								
					if(name.value == '')
					{
						alert('<?php echo __("Please complete all required fields.","premiumpress") ?>');
						name.focus();
						name.style.border = 'thin solid red';
						return false;
					}
					if(email1.value == '')
					{
						alert('<?php echo __("Please complete all required fields.","premiumpress") ?>');
						email1.focus();
						email1.style.border = 'thin solid red';
						return false;
					}
					if(!isEmail(email1.value))
					{
						alert('<?php echo __("Invalid email address.","premiumpress") ?>');
						email1.focus();
						email1.style.border = 'thin solid red';
						return false;
					}
					
					<?php if(_ppt(array('captcha','enable')) == 1 && _ppt(array('captcha','sitekey')) != "" ){ ?>
					
					var response = grecaptcha.getResponse();
					if (!response) {
						 
						alert('<?php echo __("Coud not get recaptcha response","premiumpress") ?>');						 
						return false;
						
					}
					
					
					<?php }else{ ?>
					if(code.value == '')
					{
						alert('<?php echo __("Please complete all required fields.","premiumpress") ?>');
						code.focus();
						code.style.border = 'thin solid red';
						return false;
					} 
					<?php } ?>
					
					
					
					if(message.value == '')
					{
						alert('<?php echo __("Please complete all required fields.","premiumpress") ?>');
						message.focus();
						message.style.border = 'thin solid red';
						return false;
					} 			
					
					
		jQuery.ajax({
				type: "POST",
				url: '<?php echo home_url(); ?>/',	
				dataType: 'json',	
				data: {
					action: "single_contactform",
					n: ''+name.value+'',
					e: ''+email1.value+'',
					p: ''+phone.value+'',
					
					<?php if(_ppt(array('captcha','enable')) == 1 && _ppt(array('captcha','sitekey')) != "" ){ ?>
					c: '1',
					ca: '1',
					captcha: grecaptcha.getResponse(),
					<?php }else{ ?>
					ca: '<?php echo ($email_nr1+$email_nr2); ?>',
					c: ''+code.value+'',
					<?php } ?>					
					m: ''+message.value+'',
					pid: ''+reportpostid.value+'', 
							
				},
				success: function(response) {
		 
					if(response.status == "ok"){
					 
						jQuery('#ajax_contactform_output_ok').show();	
						jQuery('#contactusform').hide(); 
								 
					
					}else{			
						jQuery('#ajax_contactform_output_error').show();						
					}			
				},
				error: function(e) {
					console.log(e)
				}
			});
					
}
</script>
			</div>
            
             <?php if(_ppt(array('maps','enable')) == 1){
			 
			 
			 
			 if(_ppt(array('company','map-lat')) != ""){ 
			 
			 	$lat = _ppt(array('company','map-lat')); 
			 
			 }else{ 
			 
			 	$lat = "-25.363"; 
			
			 }
             
             if(_ppt(array('company','map-log')) != ""){ 
			 
			 	$long =  _ppt(array('company','map-log')); 
			 
			 }else{ 
			 
			 	$long = "131.044"; 
			 } 
			 
			 
			 
			 
			  ?>
			<div class="col-md-6">
				<h3 class="mb-4"><?php echo __("How to find us","premiumpress") ?></h3>
				<div id="map" style="min-height:400px; width:100%;"></div>
                
                
                
                
                
                
                
                <?php if(_ppt(array("maps","provider")) == "mapbox"){ ?>
                <script src="https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js"></script>
                
                <?php } ?>
                
				<script>
					var map;
					
					
<?php if(_ppt(array("maps","provider")) == "mapbox"){ ?>
	  
jQuery(document).ready(function(){ 

	jQuery("head link[rel='stylesheet']").last().after("<link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' type='text/css' media='screen'>");


	mapboxgl.accessToken = '<?php echo _ppt(array('maps','apikey')); ?>';
	var map = new mapboxgl.Map({
	container: 'map',
	style: 'mapbox://styles/mapbox/streets-v11',
	center: [<?php echo $long; ?>, <?php echo $lat; ?>],
	zoom: 16
	});
	
	
	map.on('load', function () {
	
		map.loadImage(
			 '<?php echo  get_template_directory_uri(); ?>/framework/images/marker.png',
			function (error, image) {
			if (error) throw error;
			map.addImage('cat', image);
			map.addSource('point', {
			'type': 'geojson',
			'data': {
			'type': 'FeatureCollection',
				'features': [
					{
					'type': 'Feature',
					'geometry': {
					'type': 'Point',
					'coordinates': [<?php echo $long; ?>, <?php echo $lat; ?>]
					}
				}
			]
			}
		});
	
		map.addLayer({
			'id': 'points',
			'type': 'symbol',
			'source': 'point',
			'layout': {
			'icon-image': 'cat',
			'icon-size': 1
			}
		});
	
	}
	);
	});
	

});
 
	  <?php }else{ ?>
	  
					
		 		
					
					function initMap() {
						
					var myLatLng = {lat: <?php echo $lat; ?>, lng: <?php echo $long; ?>};
						
					  map = new google.maps.Map(document.getElementById('map'), {
					    center: myLatLng,
					    zoom: 16
					  });
					  
					  var marker = new google.maps.Marker({
					  position: myLatLng,
					  map: map,
					  title: 'Hello World!'
					});
					  
					}
					
					
					
					
				<?php } ?>	
					
					
				</script>
                
                <?php if(_ppt(array("maps","provider")) == "mapbox"){ ?><?php }else{ ?>
				<script src="https://maps.googleapis.com/maps/api/js?key=<?php echo _ppt(array('maps','apikey')); ?>&callback=initMap" async defer></script>
                <?php } ?>
                
			</div>
            <?php } ?>
            
		</div>
	</div>
</section>
 
		<?php
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;	
	
	}
		public static function css(){
		return "";
		ob_start();
		?>
 
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