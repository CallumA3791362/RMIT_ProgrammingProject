<?php
 
add_filter( 'ppt_admin_layouts',  array('da_style4a',  'data') );
add_filter( 'da_style4a',  array('da_style4a',  'load') );
 
class da_style4a {

	function __construct(){}		

	public static function data($a){ 
	
		global $CORE;
  
		$a['da_style4a'] = array(
		
			"key" => "da_style4a",
		
			"name" 	=> "Style 4a",
			"image"	=> _ppt_demopath()."/designs/style4a.jpg",
						
			"theme"	=> "da_style4",
			
			
			"color_p" 	=> "#D8AE5B",
			"color_s" 	=> "#111111",
			
			"order" => 1
 	 		
		);		
		
		return $a;
	
	} 
	
	
	
	public static  function load($core){ global $CORE; 
 
 

 
 /* fonts */
$core['design']['color_bg'] = "#efefef";
$core['design']['font_logo'] = "";
 
	/* logo */
	$core['design']['logo_url_aid'] = "";
	$core['design']['logo_url'] = _ppt_demopath()."/style4/logo1.png";
	$core['design']['light_logo_url_aid'] = "1";
	$core['design']['light_logo_url'] = _ppt_demopath()."/style4/logo1.png";
	$core['design']['textlogo'] = "";  
 
$core['design']['header_style'] = "header7";
$core['design']['slot1_style'] = "hero_text1";
$core['design']['slot2_style'] = "listings3";
$core['design']['slot3_style'] = "text1";
$core['design']['slot4_style'] = "cta1a";
$core['design']['slot5_style'] = "listings3a";
$core['design']['footer_style'] = "footer1";
$core['design']['slot6_style'] = '';
$core['design']['slot7_style'] = '';
$core['design']['slot8_style'] = '';
$core['design']['slot9_style'] = '';
$core['design']['color_primary'] = "#068886";
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
        $core["home"]["hero_text1"]["title"] = "Meet your perfect match today!";     
        $core["home"]["hero_text1"]["subtitle"] = "Meet single men & women near you.";     
        $core["home"]["hero_text1"]["desc"] = "";     
        $core["home"]["hero_text1"]["title_style"] = "1";     
        $core["home"]["hero_text1"]["title_pos"] = "left";     
        $core["home"]["hero_text1"]["title_heading"] = "h1";     
        $core["home"]["hero_text1"]["title_margin"] = "mb-4";     
        $core["home"]["hero_text1"]["subtitle_margin"] = "mb-4";     
        $core["home"]["hero_text1"]["desc_margin"] = "mb-4";     
        $core["home"]["hero_text1"]["title_txtcolor"] = "dark";     
        $core["home"]["hero_text1"]["subtitle_txtcolor"] = "dark";     
        $core["home"]["hero_text1"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["hero_text1"]["title_font"] = "";     
        $core["home"]["hero_text1"]["subtitle_font"] = "";     
        $core["home"]["hero_text1"]["desc_font"] = "";     
        $core["home"]["hero_text1"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["hero_text1"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["hero_text1"]["btn_show"] = "yes";     
        $core["home"]["hero_text1"]["btn_link"] = "[link-search]";     
        $core["home"]["hero_text1"]["btn_txt"] = "Start Search";     
        $core["home"]["hero_text1"]["btn_bg"] = "primary";     
        $core["home"]["hero_text1"]["btn_bg_txt"] = "text-light";     
        $core["home"]["hero_text1"]["btn_icon"] = "";     
        $core["home"]["hero_text1"]["btn_icon_pos"] = "before";     
        $core["home"]["hero_text1"]["btn_size"] = "btn-xl";     
        $core["home"]["hero_text1"]["btn_margin"] = "mt-5";     
        $core["home"]["hero_text1"]["btn_style"] = "3";     
        $core["home"]["hero_text1"]["btn_font"] = "";     
        $core["home"]["hero_text1"]["btn2_show"] = "no";     
        $core["home"]["hero_text1"]["hero_image"] = _ppt_demopath()."/style4/hero1.jpg";     
        $core["home"]["hero_text1"]["hero_size"] = "hero-medium";     
        $core["home"]["hero_text1"]["hero_txtcolor"] = "light"; 		
 
        /* listings3 */    
        $core["home"]["listings3"]["section_padding"] = "section-80";     
        $core["home"]["listings3"]["section_bg"] = "bg-light";     
        $core["home"]["listings3"]["section_pos"] = "";     
        $core["home"]["listings3"]["section_w"] = "container";     
        $core["home"]["listings3"]["section_pattern"] = "";     
        $core["home"]["listings3"]["title_show"] = "yes";     
        $core["home"]["listings3"]["title"] = "Popular Girls";     
        $core["home"]["listings3"]["subtitle"] = "";     
        $core["home"]["listings3"]["desc"] = "";     
        $core["home"]["listings3"]["title_style"] = "1";     
        $core["home"]["listings3"]["title_pos"] = "left";     
        $core["home"]["listings3"]["title_heading"] = "h2";     
        $core["home"]["listings3"]["title_margin"] = "mb-4";     
        $core["home"]["listings3"]["subtitle_margin"] = "mb-4";     
        $core["home"]["listings3"]["desc_margin"] = "mb-4";     
        $core["home"]["listings3"]["title_txtcolor"] = "dark";     
        $core["home"]["listings3"]["subtitle_txtcolor"] = "dark";     
        $core["home"]["listings3"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["listings3"]["title_font"] = "";     
        $core["home"]["listings3"]["subtitle_font"] = "";     
        $core["home"]["listings3"]["desc_font"] = "";     
        $core["home"]["listings3"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["listings3"]["subtitle_txtw"] = "font-weight-bold";     
         
        $core["home"]["listings3"]["perrow"] = "4";     
        $core["home"]["listings3"]["card"] = "blank";     
        $core["home"]["listings3"]["limit"] = "";     
        $core["home"]["listings3"]["custom"] = "women"; 		
 
        /* text1 */    
        $core["home"]["text1"]["section_padding"] = "section-100";     
        $core["home"]["text1"]["section_bg"] = "bg-white";     
        $core["home"]["text1"]["section_pos"] = "";     
        $core["home"]["text1"]["section_w"] = "container";     
        $core["home"]["text1"]["section_pattern"] = "";     
        $core["home"]["text1"]["title_show"] = "yes";     
        $core["home"]["text1"]["title"] = "We put you in touch with nearby girls and guys!";     
        $core["home"]["text1"]["subtitle"] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tempus eleifend risus ut congue.";     
        $core["home"]["text1"]["desc"] = "Lorem ipsum dolor sit amet, consectetur adipiscing elit.";     
        $core["home"]["text1"]["title_style"] = "1";     
        $core["home"]["text1"]["title_pos"] = "left";     
        $core["home"]["text1"]["title_heading"] = "h2";     
        $core["home"]["text1"]["title_margin"] = "mb-4";     
        $core["home"]["text1"]["subtitle_margin"] = "mb-4";     
        $core["home"]["text1"]["desc_margin"] = "mb-4";     
        $core["home"]["text1"]["title_txtcolor"] = "dark";     
        $core["home"]["text1"]["subtitle_txtcolor"] = "dark";     
        $core["home"]["text1"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["text1"]["title_font"] = "";     
        $core["home"]["text1"]["subtitle_font"] = "";     
        $core["home"]["text1"]["desc_font"] = "";     
        $core["home"]["text1"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["text1"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["text1"]["btn_show"] = "yes";     
        $core["home"]["text1"]["btn_link"] = "[link-search]";     
        $core["home"]["text1"]["btn_txt"] = "Start Search";     
        $core["home"]["text1"]["btn_bg"] = "primary";     
        $core["home"]["text1"]["btn_bg_txt"] = "text-light";     
        $core["home"]["text1"]["btn_icon"] = "fas fa-long-arrow-alt-right";     
        $core["home"]["text1"]["btn_icon_pos"] = "after";     
        $core["home"]["text1"]["btn_size"] = "btn-xl";     
        $core["home"]["text1"]["btn_margin"] = "mt-0";     
        $core["home"]["text1"]["btn_style"] = "3";     
        $core["home"]["text1"]["btn_font"] = "";     
        $core["home"]["text1"]["btn2_show"] = "no";     
        $core["home"]["text1"]["text_image1"] = _ppt_demopath()."/style4/image1.jpg";     
        $core["home"]["text1"]["text_image1_title"] = "Welcome";     
        $core["home"]["text1"]["text_image1_link"] = "[link-search]"; 		
 
        /* cta1a */    
        $core["home"]["cta1a"]["section_padding"] = "section-40";     
        $core["home"]["cta1a"]["section_bg"] = "bg-primary";     
        $core["home"]["cta1a"]["section_pos"] = "";     
        $core["home"]["cta1a"]["section_w"] = "container";     
        $core["home"]["cta1a"]["section_pattern"] = "";     
        $core["home"]["cta1a"]["title_show"] = "yes";     
        $core["home"]["cta1a"]["title"] = "Create your free profile today!";     
        $core["home"]["cta1a"]["subtitle"] = "";     
        $core["home"]["cta1a"]["desc"] = "";     
        $core["home"]["cta1a"]["title_style"] = "1";     
        $core["home"]["cta1a"]["title_pos"] = "left";     
        $core["home"]["cta1a"]["title_heading"] = "h2";     
        $core["home"]["cta1a"]["title_margin"] = "mb-0";     
        $core["home"]["cta1a"]["subtitle_margin"] = "mb-4";     
        $core["home"]["cta1a"]["desc_margin"] = "mb-4";     
        $core["home"]["cta1a"]["title_txtcolor"] = "white";     
        $core["home"]["cta1a"]["subtitle_txtcolor"] = "dark";     
        $core["home"]["cta1a"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["cta1a"]["title_font"] = "";     
        $core["home"]["cta1a"]["subtitle_font"] = "";     
        $core["home"]["cta1a"]["desc_font"] = "";     
        $core["home"]["cta1a"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["cta1a"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["cta1a"]["btn_show"] = "yes";     
        $core["home"]["cta1a"]["btn_link"] = "[link-add]";     
        $core["home"]["cta1a"]["btn_txt"] = "Create Profile";     
        $core["home"]["cta1a"]["btn_bg"] = "light";     
        $core["home"]["cta1a"]["btn_bg_txt"] = "";     
        $core["home"]["cta1a"]["btn_icon"] = "fas fa-long-arrow-alt-right";     
        $core["home"]["cta1a"]["btn_icon_pos"] = "after";     
        $core["home"]["cta1a"]["btn_size"] = "btn-xl";     
        $core["home"]["cta1a"]["btn_margin"] = "mt-0";     
        $core["home"]["cta1a"]["btn_style"] = "3";     
        $core["home"]["cta1a"]["btn_font"] = ""; 		
 
        /* listings3a */    
        $core["home"]["listings3a"]["section_padding"] = "section-80";     
        $core["home"]["listings3a"]["section_bg"] = "bg-white";     
        $core["home"]["listings3a"]["section_pos"] = "";     
        $core["home"]["listings3a"]["section_w"] = "container";     
        $core["home"]["listings3a"]["section_pattern"] = "";     
        $core["home"]["listings3a"]["title_show"] = "yes";     
        $core["home"]["listings3a"]["title"] = "Popular Guys";     
        $core["home"]["listings3a"]["subtitle"] = "";     
        $core["home"]["listings3a"]["desc"] = "";     
        $core["home"]["listings3a"]["title_style"] = "1";     
        $core["home"]["listings3a"]["title_pos"] = "left";     
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
       
        $core["home"]["listings3a"]["perrow"] = "4";     
        $core["home"]["listings3a"]["card"] = "info";     
        $core["home"]["listings3a"]["limit"] = "";     
        $core["home"]["listings3a"]["custom"] = "men"; 		
 
        /* footer1 */    
        $core["footer"]["footer1"]["section_padding"] = "section-60";     
        $core["footer"]["footer1"]["section_bg"] = "bg-secondary";     
        $core["footer"]["footer1"]["section_pos"] = "";     
        $core["footer"]["footer1"]["section_w"] = "container-fluid";     
        $core["footer"]["footer1"]["section_pattern"] = ""; 		




		// DEFAULT INNER PAGE DAATA
		$core = $CORE->LAYOUT("default_innerpages", $core);
		
		
// RANDOM CONTENT

$malenames = array('Liam','Noah','William','James','Logan','Benjamin','Mason','Elijah','Oliver','Jacob','Lucas','Michael','Alexander','Ethan','Daniel','Matthew');
 
$femalenames = array('Emma','Olivia','Ava','Isabella','Sophia','Mia','Charlotte','Amelia','Evelyn','Abigail','Harper','Emily','Elizabeth','Avery','Sofia','Ella');

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