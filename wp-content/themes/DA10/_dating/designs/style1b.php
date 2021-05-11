<?php
 
add_filter( 'ppt_admin_layouts',  array('da_style1b',  'data') );
add_filter( 'da_style1b',  array('da_style1b',  'load') );
 
class da_style1b {

	function __construct(){}		

	public static function data($a){ 
	
		global $CORE;
  
		$a['da_style1b'] = array(
		
			"key" => "da_style1b",
		
			"name" 	=> "Style 1b",
			"image"	=> _ppt_demopath()."/designs/style1b.jpg",
						
			"theme"	=> "da_style1",
			
			
			"color_p" 	=> "#D8AE5B",
			"color_s" 	=> "#111111",
			
			"order" => 2
 	 		
		);		
		
		return $a;
	
	} 
	
	
	
	public static  function load($core){ global $CORE; 
 
 
 
 
	/* logo */
	$core['design']['logo_url_aid'] = "";
	$core['design']['logo_url'] = "";
	$core['design']['light_logo_url_aid'] = "";
	$core['design']['light_logo_url'] = "";
	$core['design']['textlogo'] = "<i class='fal fa-bow-arrow ml-2'></i> <span>Escorts</span>Online";  

$core['design']['header_style'] = "header7";
$core['design']['slot1_style'] = "hero_text1";
$core['design']['slot2_style'] = "testimonials3a";
$core['design']['slot3_style'] = "listings3";
$core['design']['slot4_style'] = "text2";
$core['design']['slot5_style'] = "cta1";
$core['design']['slot6_style'] = "listings3a";
$core['design']['slot7_style'] = "subscribe2";
$core['design']['footer_style'] = "footer1";
$core['design']['slot8_style'] = '';
$core['design']['slot9_style'] = '';
$core['design']['color_primary'] = "#088be1";
$core['design']['color_secondary'] = "#1a1a1a";
 
 
        /* header7 */    
        $core["header"]["header7"]["section_padding"] = "section-80";     
        $core["header"]["header7"]["section_bg"] = "bg-white";     
        $core["header"]["header7"]["section_pos"] = "";     
        $core["header"]["header7"]["section_w"] = "container";     
        $core["header"]["header7"]["section_pattern"] = "";     
        $core["header"]["header7"]["btn_show"] = "yes";     
        $core["header"]["header7"]["btn_link"] = "[link-add]";     
        $core["header"]["header7"]["btn_txt"] = "Add Profile";     
        $core["header"]["header7"]["btn_bg"] = "primary";     
        $core["header"]["header7"]["btn_bg_txt"] = "text-light";     
        $core["header"]["header7"]["btn_icon"] = "";     
        $core["header"]["header7"]["btn_icon_pos"] = "after";     
        $core["header"]["header7"]["btn_size"] = "btn-md";     
        $core["header"]["header7"]["btn_margin"] = "mt-0";     
        $core["header"]["header7"]["btn_style"] = "3";     
        $core["header"]["header7"]["btn_font"] = "";     
        $core["header"]["header7"]["topmenu_show"] = "yes";     
        $core["header"]["header7"]["extra_show"] = "yes";     
        $core["header"]["header7"]["extra_type"] = ""; 		
 
        /* hero_text1 */    
        $core["home"]["hero_text1"]["section_padding"] = "section-80";     
        $core["home"]["hero_text1"]["section_bg"] = "bg-light";     
        $core["home"]["hero_text1"]["section_pos"] = "";     
        $core["home"]["hero_text1"]["section_w"] = "container";     
        $core["home"]["hero_text1"]["section_pattern"] = "";     
        $core["home"]["hero_text1"]["title_show"] = "yes";     
        $core["home"]["hero_text1"]["title"] = "Online escorts waiting to hear from you.";     
        $core["home"]["hero_text1"]["subtitle"] = "Over 1,000 girls and guys online now!";     
        $core["home"]["hero_text1"]["desc"] = "";     
        $core["home"]["hero_text1"]["title_style"] = "1";     
        $core["home"]["hero_text1"]["title_pos"] = "left";     
        $core["home"]["hero_text1"]["title_heading"] = "h1";     
        $core["home"]["hero_text1"]["title_margin"] = "mb-4";     
        $core["home"]["hero_text1"]["subtitle_margin"] = "mb-4";     
        $core["home"]["hero_text1"]["desc_margin"] = "mb-4";     
        $core["home"]["hero_text1"]["title_txtcolor"] = "white";     
        $core["home"]["hero_text1"]["subtitle_txtcolor"] = "light";     
        $core["home"]["hero_text1"]["desc_txtcolor"] = "dark";     
        $core["home"]["hero_text1"]["title_font"] = "";     
        $core["home"]["hero_text1"]["subtitle_font"] = "";     
        $core["home"]["hero_text1"]["desc_font"] = "";     
        $core["home"]["hero_text1"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["hero_text1"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["hero_text1"]["btn_show"] = "yes";     
        $core["home"]["hero_text1"]["btn_link"] = "[link-search]";     
        $core["home"]["hero_text1"]["btn_txt"] = "View All Escorts";     
        $core["home"]["hero_text1"]["btn_bg"] = "primary";     
        $core["home"]["hero_text1"]["btn_bg_txt"] = "text-light";     
        $core["home"]["hero_text1"]["btn_icon"] = "fas fa-long-arrow-alt-right";     
        $core["home"]["hero_text1"]["btn_icon_pos"] = "after";     
        $core["home"]["hero_text1"]["btn_size"] = "btn-xl";     
        $core["home"]["hero_text1"]["btn_margin"] = "mt-5";     
        $core["home"]["hero_text1"]["btn_style"] = "3";     
        $core["home"]["hero_text1"]["btn_font"] = "";     
        $core["home"]["hero_text1"]["btn2_show"] = "no";     
        $core["home"]["hero_text1"]["hero_image"] = _ppt_demopath()."/style1/hero2.jpg";     
        $core["home"]["hero_text1"]["hero_size"] = "hero-medium";     
        $core["home"]["hero_text1"]["hero_txtcolor"] = "light"; 		
 
        /* testimonials3a */    
        $core["home"]["testimonials3a"]["section_padding"] = "section-40";     
        $core["home"]["testimonials3a"]["section_bg"] = "bg-light";     
        $core["home"]["testimonials3a"]["section_pos"] = "";     
        $core["home"]["testimonials3a"]["section_w"] = "container";     
        $core["home"]["testimonials3a"]["section_pattern"] = "";     
        $core["home"]["testimonials3a"]["title_show"] = "no"; 		
 
        /* listings3 */    
        $core["home"]["listings3"]["section_padding"] = "section-80";     
        $core["home"]["listings3"]["section_bg"] = "bg-white";     
        $core["home"]["listings3"]["section_pos"] = "";     
        $core["home"]["listings3"]["section_w"] = "container";     
        $core["home"]["listings3"]["section_pattern"] = "";     
        $core["home"]["listings3"]["title_show"] = "yes";     
        $core["home"]["listings3"]["title"] = "FEATURED <i class='fal fa-heart mx-2 text-primary'></i> GIRLS";     
        $core["home"]["listings3"]["subtitle"] = "";     
        $core["home"]["listings3"]["desc"] = "";     
        $core["home"]["listings3"]["title_style"] = "1";     
        $core["home"]["listings3"]["title_pos"] = "center";     
        $core["home"]["listings3"]["title_heading"] = "h2";     
        $core["home"]["listings3"]["title_margin"] = "mb-4";     
        $core["home"]["listings3"]["subtitle_margin"] = "mb-4";     
        $core["home"]["listings3"]["desc_margin"] = "mb-4";     
        $core["home"]["listings3"]["title_txtcolor"] = "dark";     
        $core["home"]["listings3"]["subtitle_txtcolor"] = "primary";     
        $core["home"]["listings3"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["listings3"]["title_font"] = "";     
        $core["home"]["listings3"]["subtitle_font"] = "";     
        $core["home"]["listings3"]["desc_font"] = "";     
        $core["home"]["listings3"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["listings3"]["subtitle_txtw"] = "font-weight-bold";   
		 $core["home"]["listings3"]["custom"] = "women";  
        
        $core["home"]["listings3"]["perrow"] = "4";     
        $core["home"]["listings3"]["card"] = "info";     
        $core["home"]["listings3"]["limit"] = ""; 
		$core["home"]["listings3"]["custom"] = "women"; 		
 
        /* text2 */    
        $core["home"]["text2"]["section_padding"] = "section-80";     
        $core["home"]["text2"]["section_bg"] = "bg-light";     
        $core["home"]["text2"]["section_pos"] = "";     
        $core["home"]["text2"]["section_w"] = "container";     
        $core["home"]["text2"]["section_pattern"] = "";     
        $core["home"]["text2"]["title_show"] = "yes";     
        $core["home"]["text2"]["title"] = "We put you in touch with some of the best Escorts near you.";     
        $core["home"]["text2"]["subtitle"] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue.";     
        $core["home"]["text2"]["desc"] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";     
        $core["home"]["text2"]["title_style"] = "1";     
        $core["home"]["text2"]["title_pos"] = "left";     
        $core["home"]["text2"]["title_heading"] = "h2";     
        $core["home"]["text2"]["title_margin"] = "mb-4";     
        $core["home"]["text2"]["subtitle_margin"] = "mb-4";     
        $core["home"]["text2"]["desc_margin"] = "mb-4";     
        $core["home"]["text2"]["title_txtcolor"] = "dark";     
        $core["home"]["text2"]["subtitle_txtcolor"] = "dark";     
        $core["home"]["text2"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["text2"]["title_font"] = "";     
        $core["home"]["text2"]["subtitle_font"] = "";     
        $core["home"]["text2"]["desc_font"] = "";     
        $core["home"]["text2"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["text2"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["text2"]["btn_show"] = "yes";     
        $core["home"]["text2"]["btn_link"] = "[link-search]";     
        $core["home"]["text2"]["btn_txt"] = "Search Escorts";     
        $core["home"]["text2"]["btn_bg"] = "primary";     
        $core["home"]["text2"]["btn_bg_txt"] = "text-light";     
        $core["home"]["text2"]["btn_icon"] = "fas fa-long-arrow-alt-right";     
        $core["home"]["text2"]["btn_icon_pos"] = "after";     
        $core["home"]["text2"]["btn_size"] = "btn-xl";     
        $core["home"]["text2"]["btn_margin"] = "mt-0";     
        $core["home"]["text2"]["btn_style"] = "5";     
        $core["home"]["text2"]["btn_font"] = "";     
        $core["home"]["text2"]["btn2_show"] = "no";     
        $core["home"]["text2"]["text_image1"] = _ppt_demopath()."/style1/image2.jpg";     
        $core["home"]["text2"]["text_image1_title"] = "Welcome";     
        $core["home"]["text2"]["text_image1_link"] = "[link-search]"; 		
 
        /* cta1 */    
        $core["home"]["cta1"]["section_padding"] = "section-40";     
        $core["home"]["cta1"]["section_bg"] = "bg-primary";     
        $core["home"]["cta1"]["section_pos"] = "";     
        $core["home"]["cta1"]["section_w"] = "container";     
        $core["home"]["cta1"]["section_pattern"] = "";     
        $core["home"]["cta1"]["title_show"] = "yes";     
        $core["home"]["cta1"]["title"] = "Want to become an esort?";     
        $core["home"]["cta1"]["subtitle"] = "";     
        $core["home"]["cta1"]["desc"] = "";     
        $core["home"]["cta1"]["title_style"] = "1";     
        $core["home"]["cta1"]["title_pos"] = "left";     
        $core["home"]["cta1"]["title_heading"] = "h2";     
        $core["home"]["cta1"]["title_margin"] = "mb-0";     
        $core["home"]["cta1"]["subtitle_margin"] = "mb-4";     
        $core["home"]["cta1"]["desc_margin"] = "mb-4";     
        $core["home"]["cta1"]["title_txtcolor"] = "white";     
        $core["home"]["cta1"]["subtitle_txtcolor"] = "dark";     
        $core["home"]["cta1"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["cta1"]["title_font"] = "";     
        $core["home"]["cta1"]["subtitle_font"] = "";     
        $core["home"]["cta1"]["desc_font"] = "";     
        $core["home"]["cta1"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["cta1"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["cta1"]["btn_show"] = "yes";     
        $core["home"]["cta1"]["btn_link"] = "http://localhost/V9/contact/";     
        $core["home"]["cta1"]["btn_txt"] = "create profile";     
        $core["home"]["cta1"]["btn_bg"] = "light";     
        $core["home"]["cta1"]["btn_bg_txt"] = "";     
        $core["home"]["cta1"]["btn_icon"] = "fas fa-long-arrow-alt-right";     
        $core["home"]["cta1"]["btn_icon_pos"] = "after";     
        $core["home"]["cta1"]["btn_size"] = "btn-xl";     
        $core["home"]["cta1"]["btn_margin"] = "mt-0";     
        $core["home"]["cta1"]["btn_style"] = "3";     
        $core["home"]["cta1"]["btn_font"] = ""; 		
 
        /* listings3a */    
        $core["home"]["listings3a"]["section_padding"] = "section-80";     
        $core["home"]["listings3a"]["section_bg"] = "bg-white";     
        $core["home"]["listings3a"]["section_pos"] = "";     
        $core["home"]["listings3a"]["section_w"] = "container";     
        $core["home"]["listings3a"]["section_pattern"] = "";     
        $core["home"]["listings3a"]["title_show"] = "yes";     
        $core["home"]["listings3a"]["title"] = "FEATURED <i class='fal fa-star mx-2 text-primary'></i> GUYS";     
        $core["home"]["listings3a"]["subtitle"] = "";     
        $core["home"]["listings3a"]["desc"] = "";     
        $core["home"]["listings3a"]["title_style"] = "1";     
        $core["home"]["listings3a"]["title_pos"] = "center";     
        $core["home"]["listings3a"]["title_heading"] = "h2";     
        $core["home"]["listings3a"]["title_margin"] = "mb-4";     
        $core["home"]["listings3a"]["subtitle_margin"] = "mb-4";     
        $core["home"]["listings3a"]["desc_margin"] = "mb-4";     
        $core["home"]["listings3a"]["title_txtcolor"] = "dark";     
        $core["home"]["listings3a"]["subtitle_txtcolor"] = "dark";     
        $core["home"]["listings3a"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["listings3a"]["title_font"] = "";     
        $core["home"]["listings3a"]["subtitle_font"] = "";     
        $core["home"]["listings3a"]["desc_font"] = "";     
        $core["home"]["listings3a"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["listings3a"]["subtitle_txtw"] = "font-weight-bold";   
		$core["home"]["listings3a"]["custom"] = "men"; 	  
    
        $core["home"]["listings3a"]["perrow"] = "4";     
        $core["home"]["listings3a"]["card"] = "blank";     
        $core["home"]["listings3a"]["limit"] = "12"; 
		$core["home"]["listings3a"]["custom"] = "men"; 		
 
        /* subscribe2 */    
        $core["home"]["subscribe2"]["section_padding"] = "section-100";     
        $core["home"]["subscribe2"]["section_bg"] = "bg-light";     
        $core["home"]["subscribe2"]["section_pos"] = "";     
        $core["home"]["subscribe2"]["section_w"] = "container";     
        $core["home"]["subscribe2"]["section_pattern"] = "";     
        $core["home"]["subscribe2"]["title_show"] = "yes";     
        $core["home"]["subscribe2"]["title"] = "STAY <i class='fal fa-envelope mx-2'></i> UPDATED";     
        $core["home"]["subscribe2"]["subtitle"] = "Join our newsletter today!";     
        $core["home"]["subscribe2"]["desc"] = "";     
        $core["home"]["subscribe2"]["title_style"] = "1";     
        $core["home"]["subscribe2"]["title_pos"] = "left";     
        $core["home"]["subscribe2"]["title_heading"] = "h2";     
        $core["home"]["subscribe2"]["title_margin"] = "mb-2";     
        $core["home"]["subscribe2"]["subtitle_margin"] = "mb-4";     
        $core["home"]["subscribe2"]["desc_margin"] = "mb-4";     
        $core["home"]["subscribe2"]["title_txtcolor"] = "light";     
        $core["home"]["subscribe2"]["subtitle_txtcolor"] = "light";     
        $core["home"]["subscribe2"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["subscribe2"]["title_font"] = "";     
        $core["home"]["subscribe2"]["subtitle_font"] = "";     
        $core["home"]["subscribe2"]["desc_font"] = "";     
        $core["home"]["subscribe2"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["subscribe2"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["subscribe2"]["image_subscribe"] = _ppt_demopath()."/style1/hero3.jpg"; 		
 
        /* footer1 */    
        $core["footer"]["footer1"]["section_padding"] = "section-60";     
        $core["footer"]["footer1"]["section_bg"] = "bg-secondary";     
        $core["footer"]["footer1"]["section_pos"] = "";     
        $core["footer"]["footer1"]["section_w"] = "container-fluid";     
        $core["footer"]["footer1"]["section_pattern"] = ""; 		



 	
		// DEFAULT INNER PAGE DAATA
		$core = $CORE->LAYOUT("default_innerpages", $core);
		
// RANDOM CONTENT
$randomeTitle = array(

'Liam','Noah','William','James','Logan','Benjamin','Mason','Elijah','Oliver','Jacob',

'Emma','Olivia','Ava','Isabella','Sophia','Mia','Charlotte','Amelia','Evelyn', 'Abigail', 'Jane'

); 
		
		// SAMPLE DATA
		$i=1;		
		while($i < 21){	
		
			$core['sampledata'][$i] = array(		 
					
					"title" => $randomeTitle[$i],						
					"image" => _ppt_demopath()."/products/adult/".$i.".jpg", 
					"thumb" => _ppt_demopath()."/products/adult/".$i.".jpg",
					"images" => array(
					
						1 => array(
							"image" => _ppt_demopath()."/products/adult/".$i.".jpg", 
							"thumb" => _ppt_demopath()."/products/adult/".$i.".jpg",
						),
						2 => array(
							"image" => _ppt_demopath()."/products/adult/".$i."a.jpg", 
							"thumb" => _ppt_demopath()."/products/adult/".$i."a.jpg",
						), 	
						3 => array(
							"image" => _ppt_demopath()."/products/adult/".$i."b.jpg", 
							"thumb" => _ppt_demopath()."/products/adult/".$i."b.jpg",
						), 											
						
					), 
					 
									 
				);
		$i++;	
		} 			
			
			
	return $core;
	}
	
	
}

?>