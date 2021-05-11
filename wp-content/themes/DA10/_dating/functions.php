<?php

define('THEME_NAME','Dating Theme');
define('THEME_FOLDER','_dating'); 
define('THEME_KEY','da');

$CORE_DATING = new core_dating;
class core_dating  {

	function __construct(){
	
		// REGISTER TAXONOMIES	
		$tax = array("dagender","dasexuality","dathnicity","daeyes","dahair","dabody","dasmoke","dadrink","features");
		
		foreach($tax as $t){
		
			register_taxonomy( $t, THEME_TAXONOMY.'_type', array( 'hierarchical' => true, 'labels' => array('name' => $t) , 
			'query_var' => true, 'rewrite' => true, 'rewrite' => array('slug' => $t) ) ); 
			
		}
		
		// SHORTCODES			
		add_shortcode( 'GENDER',  array($this, 'shortcode_gender' ) );
		add_shortcode( 'GENDERICON', array($this,'shortcode_gendericon') );
		add_shortcode( 'SEXUALITY',  array($this, 'shortcode_sexuality' ) );
		add_shortcode( 'AGE',  array($this, 'shortcode_age' ) );		
		add_shortcode( 'LOOKINGFOR',  array($this, 'shortcode_lookingfor' ) );	 	
		
		// USER END FIELDS
		add_action('hook_add_fieldlist',  array($this, '_hook_customfields' ) );
		
		  
		
		
		add_action('hook_register_top', array($this, '_hook_register_top'));
 		 
 		
	} 
	
	function _user_types(){
	
	
			$accountTypes = array(
		
			"user_1" => array(
				"name" => __("Man Seeking a Women","premiumpress"), 
				"desc" => "", 
				"img" => get_template_directory_uri()."/_dating/u1.jpg"
			),
			
			"user_2" => array(
				"name" => __("Women Seeking a Man","premiumpress"), 
				"desc" => "", 
				"img" => get_template_directory_uri()."/_dating/u2.jpg"
			),	
			
			
			"user_3" => array(
				"name" => __("Seeking Other Guys","premiumpress"), 
				"desc" => "", 
				"img" => get_template_directory_uri()."/_dating/u3.jpg"
			),	
			
			"user_4" => array(
				"name" => __("Seeking Other Women","premiumpress"), 
				"desc" => "", 
				"img" => get_template_directory_uri()."/_dating/u4.jpg"
			),	
			
						
			"user_other" => array(
				"name" => __("Not Sure Yet","premiumpress"), 
				"desc" => "", 
				"img" => get_template_directory_uri()."/_dating/u_other.jpg"
			),			 
				
		);
		
		return $accountTypes;
	
	}
	
	
	function _hook_register_top(){ global $CORE;	 
	  
    
	$accountTypes = $this->_user_types();
	$count = 0;
	
	?>
<div class="form-usertype-fields">
  <?php foreach($accountTypes as $k => $g){ 
  
  if( in_array(_ppt(array("usertype",$k)), array("","1")) ){ }else{ continue; }
  
  // IMAGE
  $IMAGE = $g['img'];
  if(strlen(_ppt(array("usertype",$k."_image"))) > 5 ){
  $IMAGE =  _ppt(array("usertype",$k."_image"));
  }
  
  $count ++;
  $lastkey = $k;
  
  
  ?>
  <div class="border mb-4 p-3 w-100 position-relative overflow-hidden" style="cursor:pointer; background:#f8f8f8;" onclick="switchtypedata('<?php echo $k; ?>')"> 
  <img src="<?php echo $IMAGE; ?>" alt="<?php echo $g['name']; ?>" style="position:absolute; bottom:0px; left:0px; " class="hide-mobile">
    <div class="row">
      <div class="col-md-3"> </div>
      <div class="col-md-9 pl-lg-4">
   		
        <div class="tiny mb-2 text-uppercase opacity-5"> <?php if(in_array($k, array("user_3","user_4"))){ echo __("I am","premiumpress");   }else{ echo __("I'm am","premiumpress"); } ?></div>
         
         <h5 class="mt-0 mb-2">
            <?php echo $g['name'];  ?>
          </h5>
        
       <div class="row small">
       
          <div class="col-md-6 mb-2">
          <i class="fa fa-check text-success mr-2"></i>
            <?php  echo __("Free Sign-up","premiumpress"); ?>
          </div>
          
          <div class="col-md-6 mb-2"><i class="fa fa-check text-success mr-2"></i>
            <?php  echo __("Create Profile","premiumpress"); ?>
          </div>
        
          <?php if(in_array($k, array("user_1","user_4"))){ ?>
          <div class="col-md-6 mb-2"><i class="fa fa-check text-success mr-2"></i>
            <?php  echo __("Meet Women","premiumpress"); ?>
          </div>
          
          <?php }elseif(in_array($k, array("user_2","user_3"))){ ?>
          
        <div class="col-md-6 mb-2"><i class="fa fa-check text-success mr-2"></i>
            <?php  echo __("Meet Men","premiumpress"); ?>
           </div>
          <?php }else{ ?>
          
         <div class="col-md-6 mb-2"><i class="fa fa-check text-success mr-2"></i>
            <?php  echo __("Meet People","premiumpress"); ?>
           </div>
                   
          <?php } ?>
             
        
         <div class="col-md-6 mb-2"><i class="fa fa-check text-success mr-2"></i>
            <?php  echo __("Make a Date!","premiumpress"); ?>
           </div>       
       </div>
      </div>
    </div>
  </div>
  <?php } ?>
</div>
<script>
	function switchtypedata(thisid){
	
		var names = [];
		<?php foreach($accountTypes as $k => $g){  ?>
		names['<?php echo $k; ?>'] = "<?php echo $g['name']; ?>";
		<?php } ?>
		jQuery("#regtopmsg").html("<h2 class='font-weight-bold'><?php  echo __("Hello! Welcome.","premiumpress"); ?></h2><p class='opacity-5'><?php  echo __("Please complete the fields below;","premiumpress"); ?></p>");
		
		
		if(thisid == "user_1"){ // man seeks girl
		
	 	<?php if(_ppt(array('usertype', 'user_1_a')) != ""){ ?>
		
			jQuery('select[name=da-seek1] option[value="<?php echo _ppt(array('usertype', 'user_1_a')); ?>"]').attr('selected', 'selected');
			jQuery('select[name=da-seek2] option[value="<?php echo _ppt(array('usertype', 'user_1_b')); ?>"]').attr('selected', 'selected');
		
		<?php }else{ ?>
		if(typeof jQuery('select[name=da-seek1] option:contains("<?php  echo __("Male","premiumpress"); ?>")').val() !== "undefined"){
		
			jQuery('select[name=da-seek1] option:contains("<?php  echo __("Male","premiumpress"); ?>")').attr('selected', 'selected');
			jQuery('select[name=da-seek2] option:contains("<?php  echo __("Female","premiumpress"); ?>")').attr('selected', 'selected');
					
		}else{
			
			jQuery("select[name=da-seek1] option:eq(2)").attr('selected', 'selected');
			jQuery("select[name=da-seek2] option:eq(1)").attr('selected', 'selected');	
		
		}
		<?php } ?>
		
			
		
		}else if(thisid == "user_2"){ // girl seeks man

		<?php if(_ppt(array('usertype', 'user_2_a')) != ""){ ?>
		
			jQuery('select[name=da-seek1] option[value="<?php echo _ppt(array('usertype', 'user_2_a')); ?>"]').attr('selected', 'selected');
			jQuery('select[name=da-seek2] option[value="<?php echo _ppt(array('usertype', 'user_2_b')); ?>"]').attr('selected', 'selected');
		
		<?php }else{ ?>
		
			if(typeof jQuery('select[name=da-seek1] option:contains("<?php  echo __("Male","premiumpress"); ?>")').val() !== "undefined"){
			
				jQuery('select[name=da-seek2] option:contains("<?php  echo __("Male","premiumpress"); ?>")').attr('selected', 'selected');
				jQuery('select[name=da-seek1] option:contains("<?php  echo __("Female","premiumpress"); ?>")').attr('selected', 'selected');
						
			}else{
				
				jQuery("select[name=da-seek2] option:eq(2)").attr('selected', 'selected');
				jQuery("select[name=da-seek1] option:eq(1)").attr('selected', 'selected');
				jQuery("#otherusers").show();	
			
			}
		<?php } ?>
		
		
		}else if(thisid == "user_3"){ // man seeks man
		
		<?php if(_ppt(array('usertype', 'user_3_a')) != ""){ ?>
		
			jQuery('select[name=da-seek1] option[value="<?php echo _ppt(array('usertype', 'user_3_a')); ?>"]').attr('selected', 'selected');
			jQuery('select[name=da-seek2] option[value="<?php echo _ppt(array('usertype', 'user_3_b')); ?>"]').attr('selected', 'selected');
		
		<?php }else{ ?>


			if(typeof jQuery('select[name=da-seek1] option:contains("<?php  echo __("Male","premiumpress"); ?>")').val() !== "undefined"){
			
				jQuery('select[name=da-seek2] option:contains("<?php  echo __("Male","premiumpress"); ?>")').attr('selected', 'selected');
				jQuery('select[name=da-seek1] option:contains("<?php  echo __("Male","premiumpress"); ?>")').attr('selected', 'selected');
						
			}else{
				
				jQuery("select[name=da-seek2] option:eq(2)").attr('selected', 'selected');
				jQuery("select[name=da-seek1] option:eq(2)").attr('selected', 'selected');	
				jQuery("#otherusers").show();
			
			}
		<?php } ?>

		}else if(thisid == "user_4"){ // girl seeks girl
		
		<?php if(_ppt(array('usertype', 'user_4_a')) != ""){ ?>
		
			jQuery('select[name=da-seek1] option[value="<?php echo _ppt(array('usertype', 'user_4_a')); ?>"]').attr('selected', 'selected');
			jQuery('select[name=da-seek2] option[value="<?php echo _ppt(array('usertype', 'user_4_b')); ?>"]').attr('selected', 'selected');
		
		<?php }else{ ?>

			if(typeof jQuery('select[name=da-seek1] option:contains("<?php  echo __("Female","premiumpress"); ?>")').val() !== "undefined"){
			
				jQuery('select[name=da-seek2] option:contains("<?php  echo __("Female","premiumpress"); ?>")').attr('selected', 'selected');
				jQuery('select[name=da-seek1] option:contains("<?php  echo __("Female","premiumpress"); ?>")').attr('selected', 'selected');
						
			}else{
				
				jQuery("select[name=da-seek2] option:eq(2)").attr('selected', 'selected');
				jQuery("select[name=da-seek1] option:eq(2)").attr('selected', 'selected');	
				jQuery("#otherusers").show();
			
			}
		<?php } ?>
					 	
		}else if(thisid == "user_other"){
		
		jQuery("#otherusers").show();		
		 
		}
	 
		jQuery("#socialregbot").hide();
		jQuery("#user_type").val(thisid);		
		jQuery(".form-usertype-fields").hide();		
		jQuery(".form-default-fields").show();
	
	}
	
	
	jQuery(document).ready(function(){ 
		<?php if($count  > 0){ ?>
		jQuery(".form-default-fields").hide();
		jQuery("#socialregbot").hide();
		
		 
		<?php }else{ ?>		
		jQuery("#otherusers").show();
		<?php } ?>
		
		<?php if($count == 1){ ?>
		switchtypedata('<?php echo $lastkey; ?>');
		jQuery("#socialregbot").hide();
		<?php } ?>		 
		
	}); 
	
	</script>
   
    
    
    
    
    
    <div class="row" id="otherusers" style="display:none;">
        <div class="col-xs-12 col-md-6">
      <div class="form-group" <?php if(_ppt(array('register','da_reggender')) == "1"){ echo 'style="display:none;"'; } ?>>
        <div class="row">
          <div class="col-md-12 position-relative">
            <select id="da-seek1" name="da-seek1" class="form-control <?php if(_ppt(array('register','da_reggender')) != "1"){ echo 'required'; } ?>" >
              <option value=""><?php echo __("I'm a","premiumpress"); ?></option>
              <?php
$count = 1;
$cats = get_terms( 'dagender', array( 'hide_empty' => 0, 'parent' => 0  ));
if(!empty($cats)){
foreach($cats as $cat){ 
if($cat->parent != 0){ continue; } 
 
?>
              <option value="<?php echo $cat->term_id; ?>"><?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
              <?php $count++; } } ?>
            </select>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xs-12 col-md-6">
      <div class="form-group" <?php if(_ppt(array('register','da_seeking')) == "1"){ echo 'style="display:none;"'; } ?>>
        <div class="row">
          <div class="col-md-12 position-relative">
            <select name="da-seek2" class="form-control <?php if(_ppt(array('register','da_seeking')) != "1"){ echo 'required'; } ?>" >
              <option value=""><?php echo __("Seeking a","premiumpress"); ?></option>
              <?php
$count = 1;
$cats = get_terms( 'dagender', array( 'hide_empty' => 0, 'parent' => 0  ));
if(!empty($cats)){
foreach($cats as $cat){ 
if($cat->parent != 0){ continue; } 
 
?>
              <option value="<?php echo $cat->term_id; ?>" ><?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
              <?php $count++; } } ?>
            </select>
            <i class="fal fa-heart position-absolute" style="<?php if($CORE->GEO("is_right_to_left", array() )){ echo "left:40px;"; }else{ echo "right:40px;";  } ?> top:12px;"></i> 
            
            </div>
        </div>
      </div>
    </div>
    </div>
    <?php	
	}
	 
	
	function shortcode_lookingfor( $atts, $content = null ) { global $post, $CORE;

		extract( shortcode_atts( array( 'type' => "desc"  ), $atts ) );
		
		switch($type){
			
			case "desc": {
			
				$text = get_post_meta($post->ID, 'lookingdesc', true);
				
				if(strlen($text) > 2){
				$text = wpautop($text);
				}
				
			} break;
			
			case "gen": {
			
				$text = get_post_meta($post->ID, 'lookinggen', true);
			
				$count = 1;
				$cats = get_terms( 'dagender', array( 'hide_empty' => 0, 'parent' => 0  ));
				if(!empty($cats)){
				foreach($cats as $cat){ 
				if($cat->parent != 0){ continue; } 
				if($cat->term_id == $text){
				 return $CORE->GEO("translation_tax", array($cat->term_id, $cat->name));
				}
				  } }
			 
				 
				
			} break;
			
			case "age": {
			
			$text = get_post_meta($post->ID, 'lookingage', true);
			
			 $vv = array(
				1 => __("Any Age","premiumpress"),
				2 => __("Over 20","premiumpress"),
				3 => __("Between 20 &amp; 30","premiumpress"),
				4 => __("Between 30 &amp; 40","premiumpress"),
				5 => __("Between 40 &amp; 50","premiumpress"),
				6 => __("Over 50","premiumpress"), 
			 );
				
			if(isset($vv[$text])){
			$text = $vv[$text];
			}	
				
			} break;
		
		}
		
		return $text;
	
	}
	
  
	function shortcode_age(){ global $CORE, $post, $wpdb, $userdata; 
	
		// HIDE AGE
		if(_ppt(array('design', "element_age")) == "0"){ return ""; }
	
		$age = get_post_meta($post->ID,'daage',true);
		if($age == ""){
		$age = "n/a";
		}
		return $age;
	
	}
	
	function shortcode_gender( $atts, $content = null ) { global $post, $CORE;

		extract( shortcode_atts( array( 'btn' => false  ), $atts ) );
		
		// HIDE AGE
		if(_ppt(array('design', "element_gender")) == "0"){ return ""; }
	 
	 
		$cl = $CORE->_language_current();
		  
		if(_ppt(array('lang','switch')) == 1 && $cl != "en_US"){
		
		$cats = get_the_terms( $post->ID, 'dagender');
				
			if(isset($cats[0])){
			 
				$t = $CORE->GEO("translation_tax", array($cats[0]->term_id, $cats[0]->name));		 
				
			}else{
			
				$t = get_the_term_list( $post->ID, 'dagender', "", ', ', '' );
			}
			
		
		}else{
		
			$t = get_the_term_list( $post->ID, 'dagender', "", ', ', '' );
		
		} 
		
		
		
		 
		return strip_tags($t);
	}	
	
	function shortcode_sexuality( $atts, $content = null ) { global $post;

		extract( shortcode_atts( array( 'btn' => false  ), $atts ) );
		
		// HIDE AGE
		if(_ppt(array('design', "element_sexuality")) == "0"){ return ""; }
	
		$t = get_the_term_list( $post->ID, 'dasexuality', "", ', ', '' );
		 
		return strip_tags($t);
	}	
	
	function shortcode_gendericon($atts, $content = null){  global $userdata, $CORE, $post; $STRING = "";
	
		extract( shortcode_atts( array('id' => '', 'icononly' => 0 ), $atts ) ); 
		
		// HIDE AGE
		if(_ppt(array('design', "element_gender")) == "0"){ return ""; }	
		
		$t = get_the_term_list( $post->ID, 'dagender', "", ', ', '' );
		
		$icon = "fa fa-male";
		
		if(strpos(strtolower($t), "female") !== false){	
			$icon = "fa fa-female";	
		}
		
		if(strpos(strtolower($t), "male") !== false){	
			$icon = "fa fa-male";
		}   			
		
		if($icononly == 1){		
		return $icon;		
		}
		
		return '<i class="'.$icon.'"></i>';
	
	
	}	
	
	/*
		this function adds new fields
		to the submission form
	*/
	function _hook_customfields($c){ global $CORE;

		$o = 50;
		
		/*
		$c[$o]['title'] 			= __("Date of Birth","premiumpress");
		$c[$o]['type'] 				= "date";
 		$c[$o]['name']				= "dadob";
		$c[$o]['class'] 			= "form-control";
		$c[$o]['help'] 			= "<script>jQuery(document).ready(function() { jQuery( '#field-daage' ).on(\"mouseover mouseout\", function() {  var today = new Date();
    var birthDate = new Date(jQuery('#field-dadob-date').val());    var age = today.getFullYear() - birthDate.getFullYear();    var m = today.getMonth() - birthDate.getMonth();    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) { age--;    } console.log(age);   jQuery('#field-daage option[value='+age+']').attr('selected','selected');  }); });</script>";				 
		$o++;
		*/
		 
		$ageArray = array(); $i = 18;
		while($i < 101){
		$ageArray[$i] = $i;
		$i++;
		}
		
		if(_ppt(array('design', "element_age")) == "0"){
		
		}else{
		
		$c[$o]['title'] 			= __("Age","premiumpress");
		$c[$o]['type'] 				= "select";
 		$c[$o]['name']				= "daage";
		$c[$o]['listvalues']		= $ageArray;
		$c[$o]['class'] 			= "form-control";		 
		$o++;	
		
		}
 		 		
				
		return $c;
		
	}	

}
?>