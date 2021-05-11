<?php
 
add_filter( 'ppt_admin_layouts',  array('da_style1a',  'data') );
add_filter( 'da_style1a',  array('da_style1a',  'load') );
 
class da_style1a {

	function __construct(){}		

	public static function data($a){ 
	
		global $CORE;
  
		$a['da_style1a'] = array(
		
			"key" => "da_style1a",
		
			"name" 	=> "Style 1a",
			"image"	=> _ppt_demopath()."/designs/style1a.jpg",
						
			"theme"	=> "da_style1",
			
			
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
 
	/* logo */
	$core['design']['logo_url_aid'] = "";
	$core['design']['logo_url'] = "";
	$core['design']['light_logo_url_aid'] = "";
	$core['design']['light_logo_url'] = "";
$core['design']['textlogo'] = "<i class='fal fa-bow-arrow ml-2'></i> <span>Escort</span>Finder";  

$core['design']['header_style'] = "header6";
$core['design']['slot1_style'] = "listings10";
$core['design']['footer_style'] = "footer1";
$core['design']['slot2_style'] = '';
$core['design']['slot3_style'] = '';
$core['design']['slot4_style'] = '';
$core['design']['slot5_style'] = '';
$core['design']['slot6_style'] = '';
$core['design']['slot7_style'] = '';
$core['design']['slot8_style'] = '';
$core['design']['slot9_style'] = '';
$core['design']['color_primary'] = "#088be1";
$core['design']['color_secondary'] = "#1a1a1a";
 
 
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
        $core["header"]["header6"]["topmenu_show"] = "";     
        $core["header"]["header6"]["extra_show"] = "yes";     
        $core["header"]["header6"]["extra_type"] = "icons"; 		
 
 
        /* listings10 */    
        $core["home"]["listings10"]["section_padding"] = "section-80";     
        $core["home"]["listings10"]["section_bg"] = "bg-light";     
        $core["home"]["listings10"]["section_pos"] = "";     
        $core["home"]["listings10"]["section_w"] = "container";     
        $core["home"]["listings10"]["section_pattern"] = "";     
        $core["home"]["listings10"]["title_show"] = "yes";     
        $core["home"]["listings10"]["title"] = "FEATURED <i class='fal fa-star mx-2 text-primary'></i> USERS";     
        $core["home"]["listings10"]["subtitle"] = "";     
        $core["home"]["listings10"]["desc"] = "";     
        $core["home"]["listings10"]["title_style"] = "1";     
        $core["home"]["listings10"]["title_pos"] = "center";     
        $core["home"]["listings10"]["title_heading"] = "h2";     
        $core["home"]["listings10"]["title_margin"] = "mb-4";     
        $core["home"]["listings10"]["subtitle_margin"] = "mb-4";     
        $core["home"]["listings10"]["desc_margin"] = "mb-4";     
        $core["home"]["listings10"]["title_txtcolor"] = "dark";     
        $core["home"]["listings10"]["subtitle_txtcolor"] = "dark";     
        $core["home"]["listings10"]["desc_txtcolor"] = "opacity-5";     
        $core["home"]["listings10"]["title_font"] = "";     
        $core["home"]["listings10"]["subtitle_font"] = "";     
        $core["home"]["listings10"]["desc_font"] = "";     
        $core["home"]["listings10"]["title_txtw"] = "font-weight-bold";     
        $core["home"]["listings10"]["subtitle_txtw"] = "font-weight-bold";     
        $core["home"]["listings10"]["datastring"] = " dataonly='1' cat='' show='12' custom='new' customvalue='' order='desc' orderby='date' debug='0' ";     
        $core["home"]["listings10"]["perrow"] = "4";     
        $core["home"]["listings10"]["card"] = "list";     
        $core["home"]["listings10"]["limit"] = "12"; 		
 
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