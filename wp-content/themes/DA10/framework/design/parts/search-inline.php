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

global $CORE; ?>
<form method="get" action="<?php echo home_url(); ?>" class="py-lg-0">
  <input type="hidden" name="s" value="" />
  <input type="hidden" name="type" value="1" />
  
  
  
  <?php if(_ppt(array('design', 'searchbox_enable')) == "1"){ ?>
  
  <?php $ld = _ppt('customsearchbox');  ?>
  
   <div class="row">
  	
	<?php if(is_array($ld) && !empty($ld)){ foreach($ld as $type => $vals){
	
		if($vals != "1"){  continue; }
	 
  
  		switch($type){
		
			case "keyword": {
?>
    <div class="col">
      <div class="form-input position-relative">
      
        <input name="s" class="form-control" placeholder="<?php echo __("Keyword","premiumpress"); ?>" />
        <span  style="top: 10px; right: 10px; position: absolute;    z-index: 100;"><span class="fal fa-search prev text-dark"></span></span> 
      </div>
    </div>
<?php
			} break;	
					
			case "location": {
?>
    <div class="col-md-3 col-sm-6">
    <?php  if(_ppt(array("maps","provider")) == "basic"){  ?>
    <div class="form-input">
     
        <?php echo _get_country_search_box(); ?>
        </div>
        <?php }else{ ?>
    
      <div class="form-input">
   
<div class="form-input position-relative">
      <input name="zipcode" class="form-control" id="homesearchzip"  placeholder="<?php echo __("Any Location","premiumpress"); ?>" />
      <span  style="top: 10px; right: 10px; position: absolute;    z-index: 100; cursor:pointer;" <?php if(_ppt(array('maps','enable'))){ ?>onclick="getCurrentLocation();"<?php } ?>><span class="fal fa-map-marker prev text-dark"></span></span> </div>
      </div>
      <?php } ?>
    </div>
<?php
			} break;
			
			case "price": {
?>
<div class="col-md-3 col-sm-6">
   
   <div class="input-group">   
	<input class="form-control numericonly" name="price2" value="" placeholder="<?php echo __("Any","premiumpress"); ?>"/>     
    <div class="position-absolute prev text-dark" style="bottom: 8px;    right: 10px;"><?php echo hook_currency_symbol(''); ?></div>
    </div>
</div>
<?php
			
			} break;
			
			default: { // TAXONOMIE
			
			if(substr($type, 0, 3) == "tax"){
			
				$taxonomy = str_replace("tax_","",$type);
			
				$cats = get_terms( $taxonomy, array( 'hide_empty' => 0, 'parent' => $parent  ));
				if(!empty($cats)){
				
				?>
				<div class="col-md-3 col-sm-6">
						
						<select name="tax-<?php echo $taxonomy; ?>" class="form-control rounded-0">
						  <option value=""><?php echo __("Any","premiumpress"); ?></option>
						  <?php
								  $count = 1;
								  $cats = get_terms( $taxonomy, array( 'hide_empty' => 1, 'parent' => 0  ));
								  if(!empty($cats)){
								  foreach($cats as $cat){ 
								  if($cat->parent != 0){ continue; } 
								   
								  ?>
						  <option value="<?php echo $cat->term_id; ?>" <?php if(isset($_GET['tax-listing']) && $_GET['tax-listing'] == $cat->term_id){ echo "selected=selected"; } ?>>
						  <?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?>
                          </option>
						  <?php $count++; } } ?>
						</select>
				</div>
				<?php
				
				}
			
			}
			
			
			} break;
		
		} 
		}
  
   } ?>
   
   
  <div class="col-md-3 col-sm-6">
    <button class="btn-block btn btn-primary rounded-0" style="height: 45px;" type="submit"><?php echo __("Search","premiumpress"); ?></button>
  </div>
  
  </div>
   
  
  <?php }else{ ?>
  
  
  
  
  
  <?php switch(THEME_KEY){ 

case "ll":
case "ph":
case "ex":
case "cp":
case "mj":
case "cm":
case "vt":
case "dt":
case "at":
case "jb":
case "rt":
case "ct":
case "so":
case "pj":
case "sp": {    ?>
  <div class="row">
    <div class="col-md-3 col-sm-6">
      <div class="form-input position-relative">
        <input name="s" class="form-control" placeholder="<?php echo __("Keyword","premiumpress"); ?>" />
        <span  style="top: 11px; right: 10px; position: absolute;    z-index: 100;color:#000;"><span class="fal fa-search"></span></span> </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="form-input">
      
      
              <?php if(THEME_KEY == "cp"){ ?>
       
        <select name="tax-store" class="form-control rounded-0">
          <option value=""><?php echo __("Any Store","premiumpress"); ?></option>
          <?php
                  $count = 1;
                  $cats = get_terms( 'store', array( 'hide_empty' => 1, 'parent' => 0  ));
                  if(!empty($cats)){
                  foreach($cats as $cat){ 
                  if($cat->parent != 0){ continue; } 
                   
                  ?>
          <option value="<?php echo $cat->term_id; ?>" <?php if(isset($_GET['tax-listing']) && $_GET['tax-listing'] == $cat->term_id){ echo "selected=selected"; } ?>> <?php 
		  
		  
		  
		  
		  if( defined('WLT_DEMOMODE') ){
		 
				$did = filter_var($cat->name, FILTER_SANITIZE_NUMBER_INT);	
			 				
				if(is_numeric($did) && isset($GLOBALS['CORE_THEME']['storedata'][$did]['title'])){
							
					echo $GLOBALS['CORE_THEME']['storedata'][$did]['title'];
								
				}else{
				
					echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); 
				}
		
	 
		}else{
		
				echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); 
		
		}
		  
		   ?></option>
          <?php $count++; } } ?>
        </select>
        
        <?php }else{ ?>
        
            <select name="tax-listing" class="form-control rounded-0">
          <option value=""><?php echo __("Any Category","premiumpress"); ?></option>
          <?php
                  $count = 1;
                  $cats = get_terms( 'listing', array( 'hide_empty' => 1, 'parent' => 0  ));
                  if(!empty($cats)){
                  foreach($cats as $cat){ 
                  if($cat->parent != 0){ continue; } 
                   
                  ?>
          <option value="<?php echo $cat->term_id; ?>" <?php if(isset($_GET['tax-listing']) && $_GET['tax-listing'] == $cat->term_id){ echo "selected=selected"; } ?>> <?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
          <?php $count++; } } ?>
        </select>
        
        
        <?php } ?>
        
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <div class="form-input">
        <?php if(THEME_KEY == "jb"){ $foundcats 	= get_terms( "jobtype", array( 'hide_empty' => 0  )); ?>
        <select class="form-control form-control-custom" name="jobtype">
          <option value=""><?php echo __("All Types","premiumpress"); ?></option>
          <?php if(is_array($foundcats) && !empty($foundcats)){
		foreach($foundcats as $cat){ ?>
          <option value="<?php echo $cat->term_id; ?>"><?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
          <?php
			 
		}
	}	?>
        </select>
        
        <?php }elseif(THEME_KEY == "cp"){ ?>
        
        <?php 
		$foundcats 	= get_terms( "listing", array( 'hide_empty' => 0  ));
	
			 ?>
        <select class="form-control form-control-custom" name="tax-listing">
          <option value=""><?php echo __("Any Category","premiumpress"); ?></option>
          <?php if(is_array($foundcats) && !empty($foundcats)){
		foreach($foundcats as $cat){ ?>
          <option value="<?php echo $cat->term_id; ?>"><?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
          <?php
			 
		}
	}	?>
        </select>
        
        
        <?php }elseif(THEME_KEY == "ph"){ ?>
        
                <?php  $foundcats 	= get_terms( "orientation", array( 'hide_empty' => 0  )); ?>
        <select class="form-control form-control-custom" name="tax-orientation">
          <option value=""><?php echo __("All Types","premiumpress"); ?></option>
          <?php if(is_array($foundcats) && !empty($foundcats)){
		foreach($foundcats as $cat){ ?>
          <option value="<?php echo $cat->term_id; ?>"><?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
          <?php
			 
		}
	}	?>
        </select>
        
        
        
        <?php }elseif(in_array(THEME_KEY, array("vt","ll"))){ ?>
        
        <?php 
		$foundcats 	= get_terms( "level", array( 'hide_empty' => 0  ));
	
			 ?>
        <select class="form-control form-control-custom" name="tax-level">
          <option value=""><?php echo __("All Types","premiumpress"); ?></option>
          <?php if(is_array($foundcats) && !empty($foundcats)){
		foreach($foundcats as $cat){ ?>
          <option value="<?php echo $cat->term_id; ?>"><?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
          <?php
			 
		}
	}	?>
        </select>
        <?php }elseif(THEME_KEY == "dt"){ ?>
        
        <?php  if(_ppt(array("maps","provider")) == "basic"){  ?>
        <?php echo _get_country_search_box(); ?>
        <?php }else{ ?>
        <div class="position-relative">
          <input type="text" class="form-control w-100" name="zipcode" value="<?php if(isset($_GET['zipcode'])) { echo esc_attr($_GET['zipcode']); } ?>" id="homesearchzip" placeholder="<?php echo __("City or Zipcode","premiumpress"); ?>" />
          <span  style="top: 11px; right: 10px; position: absolute;color:#000; z-index: 100; cursor:pointer;" <?php if(_ppt(array('maps','enable'))){ ?>onclick="getCurrentLocation();"<?php } ?>><span class="fal fa-map-marker"></span></span> </div>
        <input type="hidden" id="radiusf" class="hidden" name="radius"  value="0">
        
        <?php } ?>
        
        
        
        
        
        <?php }else{ ?>
        
        
		
             <div class="input-group">   
	<input class="form-control numericonly" name="price2" value="" placeholder="<?php echo __("Max Price","premiumpress"); ?>"/>
    
     
    <div class="position-absolute text-muted" style="bottom: 8px;    right: 10px;"><?php echo hook_currency_symbol(''); ?></div>

    </div>
    
        
        <?php } ?>
      </div>
    </div>
    <div class="col-md-3 col-sm-6">
      <button class="btn-block btn btn-primary" style="height: 45px;" type="submit"><?php echo __("Search","premiumpress"); ?></button>
    </div>
  </div>
  <?php } break; 
  
  case "es":
  case "da": {    ?>
  <div class="row">
  <div class="<?php if(_ppt(array('maps','enable')) == 1){ ?>col-md-3<?php }else{ ?>col-md-4 offset-md-1<?php } ?> col-sm-6">
  
  <?php if(THEME_KEY == "es"){ ?>
  
    <select name="tax-dathnicity" class="form-control mb-4 mb-md-0 rounded-0"  data-live-search="true">
      <option value=""><?php echo __("Any Ethnicity","premiumpress"); ?></option>
      <?php
$count = 1;
$cats = get_terms( 'dathnicity', array( 'hide_empty' => 0, 'parent' => 0  ));
if(!empty($cats)){
foreach($cats as $cat){ 
if($cat->parent != 0){ continue; } 
 
?>
      <option value="<?php echo $cat->term_id; ?>"> <?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
      <?php $count++; } } ?>
    </select>
  
  
  <?php }else{ ?>
  
    <select name="tax-dagender" class="form-control mb-4 mb-md-0 rounded-0"  data-live-search="true">
      <option value=""><?php echo __("Any Gender","premiumpress"); ?></option>
      <?php
$count = 1;
$cats = get_terms( 'dagender', array( 'hide_empty' => 0, 'parent' => 0  ));
if(!empty($cats)){
foreach($cats as $cat){ 
if($cat->parent != 0){ continue; } 
 
?>
      <option value="<?php echo $cat->term_id; ?>"> <?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
      <?php $count++; } } ?>
    </select>
    
    <?php } ?>
    
  </div>
  <div class="<?php if(_ppt(array('maps','enable')) == 1){ ?>col-md-3<?php }else{ ?>col-md-4 <?php } ?> col-sm-6">
    <select name="age" class="form-control mb-4 mb-md-0 rounded-0"  data-live-search="true">
      <option value=""><?php echo __("Any Age","premiumpress"); ?></option>
      <option value="20">20+</option>
      <option value="30">30+</option>
      <option value="40">40+</option>
      <option value="50">50+</option>
    </select>
  </div>
  <?php if(_ppt(array('maps','enable')) == 1){ ?>
  <div class="col-md-3 col-sm-6">
    <div class="form-input position-relative">
      <input name="zipcode" class="form-control" placeholder="<?php echo __("Location","premiumpress"); ?>" />
      <span  style="top: 11px; right: 10px; position: absolute;    z-index: 100;color:#000;"><span class="fal fa-map-marker"></span></span> </div>
  </div>
  <?php } ?>
  <div class="col-md-3 col-sm-6">
    <button class="btn-block btn btn-primary rounded-0" style="height: 45px;" type="submit"><?php echo __("Search","premiumpress"); ?></button>
  </div>
  <?php } break;   case "dl": {    ?>
  <div class="row">
  <div class="col-md-3 col-sm-6">
    <select name="tax-make" class="form-control mb-4 mb-md-0 rounded-0" id="reg_field_tax_make" data-live-search="true" onchange="ChangeSearchValues('',this.value,'model__make','tx_model[]','-1','0', 'reg_field_tax_model')">
      <option value=""><?php echo __("Any Make","premiumpress"); ?></option>
      <?php
$count = 1;
$cats = get_terms( 'make', array( 'hide_empty' => 1, 'parent' => 0  ));
if(!empty($cats)){
foreach($cats as $cat){ 
if($cat->parent != 0){ continue; } 
 
?><option value="<?php echo $cat->term_id; ?>" <?php if(isset($_GET['tax-make']) && $_GET['tax-make'] == $cat->term_id){ echo "selected=selected"; } ?>> <?php echo $CORE->GEO("translation_tax", array($cat->term_id, $cat->name)); ?></option>
      <?php $count++; } } ?>
    </select>
<script>
function ChangeSearchValues(e, t, a, o, n, r, i) {	
	
	  jQuery.ajax({
        type: "GET",  
		url: ajax_site_url,	
        data: {
			core_aj: 1,
            action: "ChangeSearchValues",
			val: t,
            key: a,
			cl: o,
			pr: n,
			add: r,
        },
        success: function(r) { 
		
		jQuery('#'+i).html(r);
		jQuery('#'+i).prop('disabled', false);
		
        },
        error: function(e) {
             
        }
    });	
 
} 
</script>
    
  </div>
  <div class="col-md-3 col-sm-6">
    <select name="tax-model" class="form-control mb-4 mb-md-0 rounded-0 bg-white" data-live-search="true" id="reg_field_tax_model" >
      <option value=""><?php echo __("Any Model","premiumpress"); ?></option>
    </select>
  </div>
  <div class="col-md-3 col-sm-6">
  
    
     <div class="input-group">   
	<input class="form-control numericonly" name="price2" value="" placeholder="<?php echo __("Max Price","premiumpress"); ?>"/>
    
     
    <div class="position-absolute text-muted" style="bottom: 8px;    right: 10px;"><?php echo hook_currency_symbol(''); ?></div>

    </div>
    
    
  </div>
  <div class="col-md-3 col-sm-6">
    <button class="btn-block btn btn-primary rounded-0" style="height: 45px;" type="submit"><?php echo __("Search","premiumpress"); ?></button>
  </div>
  <?php } break; default: { } break;  }  ?>
  
  <?php } ?>
</form>
