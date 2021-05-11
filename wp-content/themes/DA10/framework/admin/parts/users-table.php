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
 
 
?> 
<div class="clearfix mb-4">

    <button type="button" onclick="jQuery('#add-tab').tab('show');"  class="<?php if($CORE->GEO("is_right_to_left", array() )){ echo "float-left"; }else{ echo "float-right"; } ?> btn btn-admin"> <i class="fa fa-user-plus"></i> <?php echo __("Add User","premiumpress"); ?></button>
     
    <h4 class="mt-4"><span class="ajax-search-found"></span> <?php echo __("Users","premiumpress"); ?></h4>
	
    <a href="https://www.youtube.com/watch?v=TMztbBbzhkc" class="small popup-yt"><i class="fa fa-play-circle"></i> <?php echo __("watch video","premiumpress"); ?></a>
    
</div> 

 

<textarea style="width:100%; height:100px;display:none;" id="_filter_data"></textarea>

<input type="hidden" name="cardtype" value="admin-user" class="customfilter"  data-type="select" data-key="cardtype" /> 
<div class="row">
 
<div class="col"> 


<div class="card card-admin p-4">  

    <div class="row mb-3">   
     
        <div class="col-lg-3 hide-mobile hide-ipad">  
        
        <div class="mt-n1">
        
        <a href="javascript:void(0);" class="btn btn-system btn-md hide-mobile" onclick="showfilersbar();"><i class="fa fa-filter"></i> <?php echo __("Show Filters","premiumpress"); ?> </a>
      
        </div>
                 
        </div>
        
        
       <div class="col-lg-9 text-lg-right">
    
        <div class="filter_sortby t1">
    
        <a href="javascript:void(0);" class="active" data-key="dateuser"><span><?php echo __("Joined","premiumpress"); ?><i class="ml-2 fa fa-sort-amount-up-alt"></i></span></a>
        <a href="javascript:void(0);" data-key="lastlogin"><span><?php echo __("Last Seen","premiumpress"); ?><i></i></span></a> 
        <a href="javascript:void(0);" data-key="credit"><span><?php echo __("Credit","premiumpress"); ?><i></i></span></a>                 
        <a href="javascript:void(0);" data-key="name"><span><?php echo __("Name","premiumpress"); ?><i></i></span></a>       
        <a href="javascript:void(0);" data-key="online"><span><?php echo __("Online","premiumpress"); ?><i></i></span></a> 
            
         <a href="javascript:void(0);" data-key="verify"><span><?php echo __("Verified","premiumpress"); ?><i></i></span></a>       
        
    	</div>
        
         <input type="hidden" name="sort" class="customfilter" id="filter-sortby-main"  data-type="select" data-key="sortby" />
        
         <input type="hidden" class="customfilter" name="perpage" data-type="select" data-key="perpage" value="10">
    
    </div> 

<?php if(in_array(THEME_KEY, array("pj","jb","ex")) ){?>
    <div class="col-12">
    <div class="filter_sortby t1 text-lg-right mt-2">
     
     <a href="javascript:void(0);" data-key="user_fr"><span><i class="fal fa-user mr-2"></i> <?php  if(THEME_KEY == "ex"){ echo __("User","premiumpress");  }elseif(THEME_KEY == "jb"){ echo __("Job Seeker","premiumpress"); }else{ echo __("Freelancer","premiumpress"); } ?><i></i></span></a> 
      
      <a href="javascript:void(0);" data-key="user_em"><span><i class="fa fa-user-tie mr-2"></i> <?php if(THEME_KEY == "ex"){  echo __("Teacher","premiumpress"); }else{  echo __("Employers","premiumpress"); } ?><i></i></span></a>                 
    </div>
    </div>
    
<?php }elseif( in_array(THEME_KEY, array("es","jb","mj","ll"))){ 
	
	if(THEME_KEY == "mj"){
	global $CORE_MICROJOBS;	
	$accountTypes = $CORE_MICROJOBS->_user_types();
	}elseif(THEME_KEY == "es"){
	global $CORE_ESCORTTHEME;	
	$accountTypes = $CORE_ESCORTTHEME->_escort_types();
	}elseif(THEME_KEY == "jb"){
	global $CORE_JOBS;	
	$accountTypes = $CORE_JOBS->_user_types();	
	}elseif(THEME_KEY == "ll"){
	global $CORE_LEARNING;	
	$accountTypes = $CORE_LEARNING->_user_types();	
	}
	
	
	?>
    <div class="col-12">
    <div class="filter_sortby t1 text-lg-right mt-2">
     
     <?php foreach($accountTypes as $k => $g){ ?>             
               
    
      
      <a href="javascript:void(0);" data-key="<?php echo $k; ?>"><span><?php echo $g['name']; ?><i></i></span></a> 
      
      <?php } ?>                  
    </div>
    </div>
 
<?php } ?>
      

        
    </div>
 
    
<div class="col-md-12 px-0 bg-light border-top" style="display:none;" id="actionsbox">

<?php _ppt_template('framework/admin/parts/user-table-actions' ); ?>
 
</div>    
    
<div class="col-md-12 px-0 bg-light border-top" style="display:none;" id="filterssidebox">

<?php _ppt_template('framework/admin/parts/user-table-filters' ); ?>
  
</div>
    
    
	<div class="bg-white">    
    <div class="premiumpress_table members">
     
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>  
                        	<th><input type="checkbox" onclick="doselectall();" /></th>                       
                           
                            <th><?php echo __("Name","premiumpress"); ?></th>						
                            <th><?php echo __("Joined","premiumpress"); ?></th>
                            <th><?php echo __("Last Seen","premiumpress"); ?></th>
                            <th class="text-center"><?php echo __("Orders","premiumpress"); ?></th>
                            <th><?php echo __("Credit","premiumpress"); ?></th>
                            <th style="width:150px;" class="text-center"><?php echo __("Action","premiumpress"); ?></th>
                            
                        </tr>
                    </thead>
                    <tbody id="ajax-search-output"></tbody>                
                </table>
                
                                <hr />
                
                <div class="d-flex justify-content-between align-items-center py-2 letter-spacing-1">

                <div class="text-muted small">
                <span class="ajax-search-found">100</span> <?php echo __("results","premiumpress"); ?> - 
                <?php echo __("page","premiumpress"); ?> <span class="ajax-search-page">1</span> of <span class="ajax-search-pageof">10</span>
                </div>
               
                <div class="ajax-search-pagenav"></div>
                
            	</div> 
                
    </div>
	</div>
    
</div> 
</div>
</div>
<script>

function ajax_massupdate_listings(){

	var ids = [];
	var cats = [];
	
	// DELETE ALL
	var delall = false; 
	if(jQuery('#delete-seleced').is(':checked')){
		delall = 1;
	} 
 	
	jQuery('.checkbox1').each(function(key, value) { //loop through each checkbox
	 
		if(this.checked) { 
		
			ids.push(this.value);
		} 
	
	}); 

    jQuery.ajax({
        type: "POST",
        url: '<?php echo home_url(); ?>/',	
		dataType: 'json',	
		data: {
            admin_action: "mass_update_users",
			pids: ids,
			//cat: jQuery('#mass-cat').val(),
			deleteall: delall,
        },
        success: function(response) {
					
			if(response.status == "ok"){
					
				// CHANGE ICON
				_filter_update();					 
  		 	
			}else{		
				
				// CHANGE ICON
				jQuery('#ajax_mass_update_msg').html("Update Failed");					 
  		 		
			} 
			
				
        },
        error: function(e) {
            console.log(e)
        }
    });

} // end function









jQuery(document).ready(function() {
_filter_update();
}); 


function ajax_user_verify(id,divid){
 
	 var self = jQuery(this);
	 
	  
    jQuery.ajax({
        type: "POST",
        url: '<?php echo home_url(); ?>/',	
		dataType: 'json',	
		data: {
            action: "user_verify",
			uid: id,
        },
        success: function(response) {
					
			if(response.current == "yes"){
				
				jQuery("#"+divid+' i').removeClass('text-danger').addClass('text-success');					 
  		 	
			}else{
							
				jQuery("#"+divid+' i').removeClass('text-success').addClass('text-danger');
			} 
			
			jQuery('#ajax_response_msg').html("User Updated");
					
        },
        error: function(e) {
            console.log(e)
        }
    });
}

 

function ajax_user_delete(id){

// RESET

jQuery('#ajax_response_msg').html("");	
 
jQuery.ajax({
        type: "POST",
        url: '<?php echo home_url(); ?>/',	
		dataType: 'json',	
		data: {
            action: "user_delete",
			pid: id,
        },
        success: function(response) {
	 
 
			if(response.status == "ok"){
			 		
				// HIDE ROW
				jQuery('#postid-'+id).hide();	
				
				// LEAVE MESSAGE				
				jQuery('#ajax_response_msg').html("<?php echo __("User Deleted successfully","premiumpress"); ?>");	
				 
  		 	
			}else{			
				jQuery('#ajax_response_msg').html("Error trying to delete.");			
			}			
        },
        error: function(e) {
            alert("error gere "+e)
        }
    });
	
}// end are you sure

</script>