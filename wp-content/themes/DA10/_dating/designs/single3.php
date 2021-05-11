<?php
 
add_filter( 'ppt_admin_layouts',  array('da_single3',  'data') );
add_filter( 'da_single3',  array('da_single3',  'load') );
 
class da_single3 {

	function __construct(){}		

	public static function data($a){ 
	
		global $CORE;
  
		$a['da_single3'] = array(
		
			"key" => "da_single3",
		
			"name" 	=> "Style 3",
			"image"	=> _ppt_demopath()."/designs/da_single3.jpg",
						
			"theme"	=> "da_single",
			
			
			"color_p" 	=> "#D8AE5B",
			"color_s" 	=> "#111111",
			
			"order" => 6
 	 		
		);		
		
		return $a;
	
	} 
	
	
	
	public static  function load($core){ global $CORE; 
 
 

 
 /* fonts */
$core['design']['color_bg'] = "#efefef";
$core['design']['font_logo'] = "";




$core['design']['color_primary'] = "#3b5998";
$core['design']['color_secondary'] = "#1a1a1a";
 
 
	/* logo */
	$core['design']['logo_url_aid'] = "";
	$core['design']['logo_url'] = "";
	$core['design']['light_logo_url_aid'] = "";
	$core['design']['light_logo_url'] = "";
$core['design']['textlogo'] = "<i class='fal fa-bow-arrow ml-2'></i> <span>Date</span>Finder";  

$core['design']['header_style'] = "header6";
$core['design']['slot1_style'] = "intro_6";
$core['design']['footer_style'] = "footer2";
$core['design']['slot2_style'] = 'faq4';
$core['design']['slot3_style'] = '';
$core['design']['slot4_style'] = '';
$core['design']['slot5_style'] = '';
$core['design']['slot6_style'] = '';
$core['design']['slot7_style'] = '';
$core['design']['slot8_style'] = '';
$core['design']['slot9_style'] = '';
 
 
        /* header6 */    
        $core["header"]["header6"]["section_padding"] = "section-100";     
        $core["header"]["header6"]["section_bg"] = "bg-white";     
        $core["header"]["header6"]["section_pos"] = "";     
        $core["header"]["header6"]["section_w"] = "container";     
        $core["header"]["header6"]["section_pattern"] = "";     
        $core["header"]["header6"]["btn_show"] = "yes";     
        $core["header"]["header6"]["btn_link"] = "[link-add]";     
        $core["header"]["header6"]["btn_txt"] = "Add Profile";     
        $core["header"]["header6"]["btn_bg"] = "light";     
        $core["header"]["header6"]["btn_bg_txt"] = "text-dark";     
        $core["header"]["header6"]["btn_icon"] = "";     
        $core["header"]["header6"]["btn_icon_pos"] = "before";     
        $core["header"]["header6"]["btn_size"] = "btn-md";     
        $core["header"]["header6"]["btn_margin"] = "mt-0";     
        $core["header"]["header6"]["btn_style"] = "1";     
        $core["header"]["header6"]["btn_font"] = "";     
        $core["header"]["header6"]["topmenu_show"] = "no";     
        $core["header"]["header6"]["extra_show"] = "yes";     
        $core["header"]["header6"]["extra_type"] = "icons"; 		
 
        /* intro_6 */    
        $core["home"]["intro_6"]["section_padding"] = "";     
        $core["home"]["intro_6"]["section_bg"] = "bg-white";     
        $core["home"]["intro_6"]["section_pos"] = "";     
        $core["home"]["intro_6"]["section_w"] = "container";     
        $core["home"]["intro_6"]["section_pattern"] = "";     
        $core["home"]["intro_6"]["title_show"] = "yes";     
        $core["home"]["intro_6"]["title"] = __("It's time for a change.","premiumpress");     
        $core["home"]["intro_6"]["subtitle"] = __("Meet someone new today.","premiumpress");     
        $core["home"]["intro_6"]["desc"] = __("If you are seeking love and want an easy way to meet local singles, your in the right place. Create your free profile now and get started.","premiumpress");     
        $core["home"]["intro_6"]["title_style"] = "1";     
        $core["home"]["intro_6"]["title_pos"] = "left";     
        $core["home"]["intro_6"]["title_heading"] = "h1";     
        $core["home"]["intro_6"]["title_margin"] = "mb-4";     
        $core["home"]["intro_6"]["subtitle_margin"] = "mb-4";     
        $core["home"]["intro_6"]["desc_margin"] = "mb-4";     
        $core["home"]["intro_6"]["title_txtcolor"] = "white";     
        $core["home"]["intro_6"]["subtitle_txtcolor"] = "light";     
        $core["home"]["intro_6"]["desc_txtcolor"] = "light";     
        $core["home"]["intro_6"]["title_font"] = "";     
        $core["home"]["intro_6"]["subtitle_font"] = "";     
        $core["home"]["intro_6"]["desc_font"] = "";     
        $core["home"]["intro_6"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["intro_6"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["intro_6"]["btn_show"] = "yes";     
        $core["home"]["intro_6"]["btn_link"] = "";     
        $core["home"]["intro_6"]["btn_txt"] = "Register Now";     
        $core["home"]["intro_6"]["btn_bg"] = "dark";     
        $core["home"]["intro_6"]["btn_bg_txt"] = "";     
        $core["home"]["intro_6"]["btn_icon"] = "far fa-bookmark";     
        $core["home"]["intro_6"]["btn_icon_pos"] = "before";     
        $core["home"]["intro_6"]["btn_size"] = "btn-xl";     
        $core["home"]["intro_6"]["btn_margin"] = "mt-4";     
        $core["home"]["intro_6"]["btn_style"] = "4";     
        $core["home"]["intro_6"]["btn_font"] = "";     
        $core["home"]["intro_6"]["hero_image"] = "";     
        $core["home"]["intro_6"]["hero_size"] = "hero-medium";     
        $core["home"]["intro_6"]["hero_overlay"] = "";     
        $core["home"]["intro_6"]["hero_txtcolor"] = "light"; 
		
		$core["home"]["intro_6"]["hero_image"] = _ppt_demopath()."/single/hero3.jpg";  
		
		
        /* faq4 */    
        $core["home"]["faq4"]["section_padding"] = "";     
        $core["home"]["faq4"]["section_bg"] = "bg-white";     
        $core["home"]["faq4"]["section_pos"] = "";     
        $core["home"]["faq4"]["section_w"] = "container";     
        $core["home"]["faq4"]["section_pattern"] = "";     
        $core["home"]["faq4"]["title_show"] = "yes";     
  
        $core["home"]["faq4"]["desc"] = " ";     
        $core["home"]["faq4"]["title_style"] = "1";     
        $core["home"]["faq4"]["title_pos"] = "left";     
        $core["home"]["faq4"]["title_heading"] = "h2";     
        $core["home"]["faq4"]["title_margin"] = "mb-4";     
        $core["home"]["faq4"]["subtitle_margin"] = "mb-4";     
        $core["home"]["faq4"]["desc_margin"] = "mb-4";     
        $core["home"]["faq4"]["title_txtcolor"] = "dark";     
        $core["home"]["faq4"]["subtitle_txtcolor"] = "opacity-5";     
        $core["home"]["faq4"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["faq4"]["title_font"] = "";     
        $core["home"]["faq4"]["subtitle_font"] = "";     
        $core["home"]["faq4"]["desc_font"] = "";     
        $core["home"]["faq4"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["faq4"]["subtitle_txtw"] = "font-weight-bold";     


		$core["home"]["faq4"]["title"] = __("Why Choose Us","premiumpress");     
        $core["home"]["faq4"]["subtitle"] = __("Here's why lots of people choose our website.","premiumpress");   
			    
        $core["home"]["faq4"]["faq1_title"] = __("Create Profile","premiumpress");     
        $core["home"]["faq4"]["faq1_desc"] = __("Create your account completely free and begin building your profile right now. Upload your best photos or attach a video and share your story with the rest of the world.","premiumpress");      
        $core["home"]["faq4"]["faq2_title"] = __("Find Match","premiumpress");     
        $core["home"]["faq4"]["faq2_desc"] = __("Meeting someone new is quick and easy with our online dating website. As soon as you singup we'll start matching you up with recommended users who you might find interesting.","premiumpress");      
        $core["home"]["faq4"]["faq3_title"] = __("Start Dating","premiumpress");     
        $core["home"]["faq4"]["faq3_desc"] = __("The real fun happens when you finally get to meet that special someone for the first time. Use our message system to chat and when the times right - make a date.","premiumpress");    

 
        $core["home"]["faq4"]["image_faq"] = _ppt_demopath()."/single/image3.jpg"; 	
	
 
        /* footer2 */    
        $core["footer"]["footer2"]["section_padding"] = "";     
        $core["footer"]["footer2"]["section_bg"] = "bg-dark";     
        $core["footer"]["footer2"]["section_pos"] = "";     
        $core["footer"]["footer2"]["section_w"] = "container";     
        $core["footer"]["footer2"]["section_pattern"] = "";     
        $core["footer"]["footer2"]["footer_copyright"] = "&copy; 2021 - My Awesome Website ";     
        $core["footer"]["footer2"]["footer_description"] = "";     
        $core["footer"]["footer2"]["footer_copyright_style"] = "";     
        $core["footer"]["footer2"]["footer_menu1"] = "";     
        $core["footer"]["footer2"]["footer_menu2"] = "";     
        $core["footer"]["footer2"]["footer_menu1_title"] = "";     
        $core["footer"]["footer2"]["footer_menu2_title"] = ""; 		
 


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