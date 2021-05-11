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

global $CORE; 

// FIND THE MAX PRICE OF ITEMS IN OUR DATABASE
/*
if(THEME_KEY == "at"){
$SQL = "SELECT meta_value FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'price_current' AND meta_value != '' ORDER BY meta_value DESC LIMIT 1"; 
}else{
$SQL = "SELECT meta_value FROM ".$wpdb->prefix."postmeta WHERE meta_key = 'price' AND meta_value != '' ORDER BY meta_value DESC LIMIT 1"; 
}
$result = $wpdb->get_results($SQL);
if(empty($result)){
	$max_price = "1000";
}else{
	$max_price = preg_replace("/[^0-9.]/", "", $result[0]->meta_value);
}
*/
 
 
if(isset($_GET['price1']) && is_numeric($_GET['price1'])){ $price1 = esc_attr($_GET['price1']); }else{ $price1 = ""; }		
if(isset($_GET['price2']) && is_numeric($_GET['price2']) && $_GET['price2'] > 0){ $price2 = esc_attr($_GET['price2']); }else{ 

	$price2 = "";

}


 
?>

<div class="card card-filter">
  <div class="card-body"> <a href="#" data-toggle="collapse" data-target="#collapse_price" aria-expanded="true" class="">
    <h5 class="card-title"><?php 
	
	if(THEME_KEY == "jb"){ 
	echo __("Salary","premiumpress"); 
	}else{
	echo __("Price","premiumpress"); 
	}
	
	?></h5>
    </a>
    
     <div <?php if(!$CORE->isMobileDevice()){ ?> class="filter-content collapse" id="collapse_price"<?php }else{ ?> class="pt-2"<?php } ?>>
    
    
    <div class="row ">
    <div class="col-md-6">
    <label><?php if(THEME_KEY == "pj"){ echo __("Min. Budget","premiumpress"); }else{ echo __("Min. Price","premiumpress"); } ?></label>
    
    <div class="position-relative">
    <input type="text" placeholder="<?php echo __("Any","premiumpress"); ?>" name="price1" autocomplete="off" <?php if(!$CORE->isMobileDevice()){ ?>onchange="_filter_update()" <?php } ?> class="form-control customfilter val-numeric" data-type="text" data-key="price1" id="filter_price_value_1" value="<?php echo $price1; ?>">
    
     <span class="position-absolute opacity-5 prev" style="<?php if($CORE->GEO("is_right_to_left", array() )){ echo "left:10px;"; }else{ echo "right:10px;";  } ?> top:10px;;"><?php echo hook_currency_symbol(''); ?></span>
     
     </div>
    
    </div>
    <div class="col-md-6">
    <label><?php if(THEME_KEY == "pj"){ echo __("Max. Budget","premiumpress"); }else{ echo __("Max. Price","premiumpress"); } ?></label>
    
    <div class="position-relative">
    <input type="text" placeholder="<?php echo __("Any","premiumpress"); ?>" class="form-control customfilter val-numeric" autocomplete="off" <?php if(!$CORE->isMobileDevice()){ ?>onchange="_filter_update()" <?php } ?> name="price2" data-type="text" data-key="price2" id="filter_price_value_2" value="<?php echo $price2; ?>">
    
    
     <span class="position-absolute opacity-5 prev" style="<?php if($CORE->GEO("is_right_to_left", array() )){ echo "left:10px;"; }else{ echo "right:10px;";  } ?> top:10px;;"><?php echo hook_currency_symbol(''); ?></span>
    
    
    </div>
    
    </div>    
    </div>
    
     </div> 
  </div> 
</div>   
    <?php /* ?>
    
    
    
    <div class="filter-content collapse" id="collapse_price">
      <div class="distance"> <?php echo __("Between","premiumpress"); ?> <span class="txt_price1">0</span> <?php echo __("and","premiumpress"); ?> <span class="txt_price2"><?php echo $price2; ?></span></div>
      <div class="">
        <input type="text" class="price-slider" value=""  />
      </div>
    </div>
    
    
<input type="hidden" name="price1" autocomplete="off" class="form-control customfilter" data-type="text" data-key="price1" id="filter_price_value_1" value="<?php echo $price1; ?>">
<input type="hidden" class="form-control customfilter" name="price2" data-type="text" data-key="price2" id="filter_price_value_2" value="<?php echo $max_price; ?>">
<script>

jQuery(document).ready(function(){  

 jQuery(".price-slider").ionRangeSlider({ 
        type: "double",
		
		min: "<?php echo $price1; ?>",
		max: "<?php echo $max_price; ?>",
		from:0,
		to: "<?php echo $price2; ?>",
		step:1,
		//grid: true,
        hide_min_max:true,
		hide_from_to:true,
		
		onChange: function (data) {
            
			jQuery('.txt_price1').html(data.from).formatCurrency( { symbol: '<?php if(_ppt(array('currency','switch')) != 1){  echo _ppt(array('currency','symbol')); }else{ echo hook_currency_symbol(''); } ?>', roundToDecimalPlace:0 });
			jQuery('.txt_price2').html(data.to).formatCurrency( { symbol: '<?php if(_ppt(array('currency','switch')) != 1){  echo _ppt(array('currency','symbol')); }else{ echo hook_currency_symbol(''); } ?>', roundToDecimalPlace:0 });
			
			jQuery('#filter_price_value_1').val(data.from);
			jQuery('#filter_price_value_2').val(data.to);
						 
        },onFinish: function (data) { 
		    
           _filter_update();
        }		
}); 

	jQuery('.txt_price1').formatCurrency( { symbol: '<?php if(_ppt(array('currency','switch')) != 1){  echo _ppt(array('currency','symbol')); }else{ echo hook_currency_symbol(''); } ?>', roundToDecimalPlace:0 });
	jQuery('.txt_price2').formatCurrency( { symbol: '<?php if(_ppt(array('currency','switch')) != 1){  echo _ppt(array('currency','symbol')); }else{ echo hook_currency_symbol(''); } ?>', roundToDecimalPlace:0 });
	
});
</script>

    
    
 <?php */ ?>