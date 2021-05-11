<?php
 
add_filter( 'ppt_blocks_args', 	array('block_listings1',  'data') );
add_action( 'listings1',  		array('block_listings1', 'output' ) );
//add_action( 'listings1-css',  		array('block_listings1', 'css' ) );
//add_action( 'listings1-js',  		array('block_listings1', 'js' ) );

class block_listings1 {

	function __construct(){}		

	public static function data($a){ global $CORE; 
  
		$a['listings1'] = array(
			"name" 	=> "Style 1 - Carousel",
			"image"	=> "listings1.jpg",
			"cat"	=> "listings",
			"order" => 1,
			"desc" 	=> "", 
			"data" 	=> array( ),	
			
			"defaults" => array(
					
					// TEXT
						
					"title_show" 		=> "yes",
					"title_style" 		=> "1",
					"title_heading" 	=> "h2",
					"title_pos" 		=> "center",
					
					"title" 			=> $CORE->LAYOUT("get_placeholder_text", array('title', "listings") ),					 
					"subtitle"			=> $CORE->LAYOUT("get_placeholder_text", array('subtitle', "listings") ),					
					"desc" 				=> "",
					 	
					"title_margin"		=> "",
					"subtitle_margin"	=> "mb-4",
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
	
	} public static function output(){ global $CORE, $new_settings, $settings;
	
	
		$settings = array(
				  
				"datastring" => "custom=new num=12",
				 
		 );  
	 
		// ADD ON SYSTEM DEFAULTS
		$settings = $CORE->LAYOUT("get_block_settings_defaults", array("listings1", "listings", $settings ) ); 

		// UPDATE DATA FROM ELEMENTOR OR CHILD THEMES
		if(is_array($new_settings)){
			 foreach($settings as $h => $j){
				if(isset($new_settings[$h]) && $new_settings[$h] != ""){
					$settings[$h] = $new_settings[$h];
				}
			 }
		} 
 
	ob_start();
	 
	?>
<section class="<?php echo $settings['section_class']." ".$settings['section_bg']." ".$settings['section_padding']." ".$settings['section_divider']; ?>">
  <div class="container">
    <div class="row">
      <?php if($settings['title_show'] == "yes"){ ?>
      <div class="col-12 section-bottom-40">
        <?php _ppt_template( 'framework/design/parts/title' ); ?>
      </div>
      <?php } ?>
      <div class="col-12">
        <div class="clearfix"></div>
        <div class="listing1-carousel-1 owl-carousel owl-theme"> <?php
		
		
		if(isset($_GET['ppt_live_preview'])){
		echo str_replace("data-src","src",do_shortcode('[LISTINGS card="" dataonly=1 nav=0 small=1 carousel=1 '.$settings['datastring'].' ]')); 
		}else{
		echo do_shortcode('[LISTINGS card="" dataonly=1 nav=0 small=1 carousel=1 '.$settings['datastring'].' ]'); 		
		}
		
		  ?> </div>
      </div>
    </div>
  </div>
</section>
<script> 
jQuery(document).ready(function(){ 

	var owl = jQuery(".listing1-carousel-1").owlCarousel({
        loop: true,
        margin: 20,
        nav: false,
        dots: false,
		 <?php if($CORE->GEO("is_right_to_left", array() )){ ?>rtl: true,<?php } ?>
		lazyLoad:true,
        responsive: {
            0: {
                items: 2
            },			 
            600: {
                items: 2
            },
			800: {
                items: 3
            },	
            1000: {
                items: 4
            }
        },        
    }); 
	
	owl.owlCarousel();
	 
	
	// REFRESH	
	setTimeout(function(){	
   		owl.trigger('refresh.owl.carousel');		 
	}, 2000); 
 
	
	});		 
</script>

<?php
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;	
	
	}
	
		public static function js(){
		
		ob_start();
		?>
<?php	
		$output = ob_get_contents();
		ob_end_clean();
		echo $output;
		 }	
}

?>