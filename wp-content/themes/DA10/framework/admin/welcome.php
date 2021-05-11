<?php
// CHECK THE PAGE IS NOT BEING LOADED DIRECTLY
if (!defined('THEME_VERSION')) {	header('HTTP/1.0 403 Forbidden'); exit; }
// SETUP GLOBALS
global $wpdb, $CORE, $userdata, $CORE_ADMIN;


 

// UPDATES
if(get_option("ppt_reinstall") != THEME_VERSION){
	if(defined('WLT_DEMOMODE')){
	
	}else{
	update_option("ppt_license_key_bk", get_option("ppt_license_key") );
	update_option("ppt_license_key","");
	}	
	update_option("ppt_reinstall", THEME_VERSION);
}

$emaillogs = get_option('ppt_emaillogs');
if(!is_array($emaillogs)){ $emaillogs = array(); }

 
$i = 0;
while($i < 7){
 
	$value = 0;
	 
	$date = date('Y-m-d', strtotime('-'.$i.' day', strtotime( date('Y-m-d') ) ) );
 	
	if(isset($emaillogs[$date])){
		$value = $emaillogs[$date]['hits'];
	}	 
		
	// DATA
	$data[] = array("name" =>  date('jS M', strtotime('-'.$i.' day', strtotime( date('Y-m-d') ))) , "value" => $value);		
		
	$i++;
}

$data = array_reverse($data);



$count_posts 	= wp_count_posts(THEME_TAXONOMY.'_type'); 
$count_users	= count_users();

$e = array(

 
	1 => array(
	
		"name" => __("Users","premiumpress"),
		"total" => number_format($count_users['total_users']),
		"icon" => "fal  fa-users",
		"color" => "#e43546",
		"link" => "admin.php?page=users",
		"btn_txt" => __("Manage","premiumpress"),
	),
	2 => array(
	
		"name" => $CORE->LAYOUT("captions","2"),
		"total" => number_format($count_posts->publish+$count_posts->draft+$count_posts->pending+$count_posts->trash,0),
		"icon" => $CORE->LAYOUT("captions","icon"),
		"color" => "#0866c6",
		"link" => "admin.php?page=listings",
		"btn_txt" => __("Manage","premiumpress"),
	),

	3 => array(
	
		"name" => __("Total Earned","premiumpress"),
		"total" => $CORE->ORDER("get_total", array()),
		"icon" => "fal fa-dollar-sign",
		"color" => "#6a6a6a",
		"link" => "admin.php?page=orders",
		"btn_txt" => __("View","premiumpress"),
	),	
	
	
	
);





function createDateRangeArray($strDateFrom,$strDateTo) {

 $aryRange=array();

  $iDateFrom=mktime(1,0,0,substr($strDateFrom,5,2),     substr($strDateFrom,8,2),substr($strDateFrom,0,4));
  $iDateTo=mktime(1,0,0,substr($strDateTo,5,2),     substr($strDateTo,8,2),substr($strDateTo,0,4));

  if ($iDateTo>=$iDateFrom) {
    array_push($aryRange,date('Y-m-d',$iDateFrom)); // first entry

    while ($iDateFrom<$iDateTo) {
      $iDateFrom+=86400; // add 24 hours
      array_push($aryRange,date('Y-m-d',$iDateFrom));
    }
  }
  return $aryRange;
}
function wlt_chartdata($query=0,$return=false){ global $wpdb; $STRING = "";

	// CHART DATA
	$DATE1 = date("Y-m-d",mktime(0, 0, 0, date("m"), date("d")-5, date("Y")));
	$DATE2 = date("Y-m-d",mktime(0, 0, 0, date("m"), date("d")+1, date("Y")));	
	
	$dates = createDateRangeArray($DATE1,$DATE2); 
	
	$newdates = array();
	foreach($dates as $date){	  
	 $newdates[''.$date.''] = 0;
	}
 
	if($return){ return $newdates; }
 
	// GET ALL DATA FOR THE LAST 31 DAYS
	if($query == 0){
	
	$SQL1 = "select ".$wpdb->prefix."posts.post_date from ".$wpdb->prefix."posts where ".$wpdb->prefix."posts.post_date >= '".$DATE1."' and ".$wpdb->prefix."posts.post_date < '".$DATE2."' AND ".$wpdb->prefix."posts.post_type='".THEME_TAXONOMY."_type' GROUP BY ID";
	
	// ORDERS
	}elseif($query == 1){
	
	$SQL1 = "select ".$wpdb->prefix."posts.post_date from ".$wpdb->prefix."posts where ".$wpdb->prefix."posts.post_date >= '".$DATE1."' and ".$wpdb->prefix."posts.post_date < '".$DATE2."' AND ".$wpdb->prefix."posts.post_type='ppt_orders' GROUP BY ID";
	
	// PACKAGES
	}elseif($query == 2){
		$SQL1 = "select ".$wpdb->prefix."posts.post_date,".$wpdb->prefix."postmeta.meta_value from ".$wpdb->prefix."posts LEFT JOIN ".$wpdb->prefix."postmeta ON (".$wpdb->prefix."posts.ID = ".$wpdb->prefix."postmeta.post_id) where ".$wpdb->prefix."posts.post_date >= '".$DATE1."' and ".$wpdb->prefix."posts.post_date < '".$DATE2."' AND ".$wpdb->prefix."posts.post_type='".THEME_TAXONOMY."_type' AND ".$wpdb->prefix."postmeta.meta_key = 'PackageID'  AND ".$wpdb->prefix."postmeta.meta_value='1' GROUP BY ID";
		
	// MEMBERS
	}elseif($query == 3){
	
	 
 
	$SQL1 = "select ".$wpdb->base_prefix."users.user_registered AS post_date from ".$wpdb->base_prefix."users where ".$wpdb->base_prefix."users.user_registered >= '".$DATE1."' and ".$wpdb->base_prefix."users.user_registered < '".$DATE2."' GROUP BY ID";
	
	 
	
	
	}elseif($query == 9){
	$SQL1 = "SELECT order_date AS post_date FROM ".$wpdb->prefix."core_orders LEFT JOIN ".$wpdb->users." ON (".$wpdb->users.".ID = ".$wpdb->prefix."core_orders.user_id) WHERE ".$wpdb->prefix."core_orders.order_date >= '".$DATE1."' and ".$wpdb->prefix."core_orders.order_date < '".$DATE2."'";
	}
 
	$result = $wpdb->get_results($SQL1);
 	if(!$result){ return 0; }
	
	foreach($result as $value){	 
	  	$postDate = explode(" ",$value->post_date);	 
		$newdates[$postDate[0]] ++;
	}	
 	 
	 
	// FORMAT RESULTS FOR CHART	
	$i=1;  
	foreach($newdates as $key=>$val){
		$a = $key; 
		if(!is_numeric($val)){$val=0; }
		 	
		//$STRING .= '['.$i.','.$val.'], ';
		
		$STRING .=  $val.", ";
		
		
		$i++;
				 
	}
	 
	
	// RETURN DATA	
	return $STRING;
 
 

}


 
// LOAD IN HEADER
_ppt_template('framework/admin/header' ); 
 
?>



<section class="p-4">
<div class="container">
<div class="row mt-5">



<?php if(defined('EPC_VERSION')){ ?>
<div class="col-12">

<div class="alert alert-danger">

<h4><i class="fa fa-exclamation-circle"></i> Important</h4> Your hosting provider has installed an MU Caching plugin which may cause blank pages when you logout.<br /><a href="https://www.premiumpress.com/doc/blank-page-when-logged-out/" class="btn btn-danger mt-3">Learn More</a> 

</div>

</div>

<?php } ?>






<div class="col-12 mb-4"> <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/framework/images/premiumpress.png" class="float-right position-absolute" style="right:20px; height:150px;opacity:0.1; top:-20px;" />
  <h1 style="letter-spacing:-1px;"> 
  
  
  <?php
  
  
  
$Hour = date('G', strtotime( date('Y-m-d H:i:s', strtotime(current_time( 'mysql' ) . "+1 minute")) ));

if ( $Hour >= 5 && $Hour <= 11 ) {
    echo __("Good Morning","premiumpress");
} else if ( $Hour >= 12 && $Hour <= 18 ) {
    echo __("Good Afternoon","premiumpress");
} else if ( $Hour >= 19 || $Hour <= 4 ) {
    echo __("Good Evening","premiumpress");
}
  
?>, 
  
  
   <?php echo $CORE->USER("get_name",$userdata->ID); ?> </h1>
  <p class="lead"><?php echo __("What would you like to do today?","premiumpress"); ?></p>
  <span class="text-muted"></span> </div>
<div class="container">
  <div class="row">
    <?php $i=1; while($i < 4){ ?>
    <div class="col-md-4">
      <div class="shadow-sm" style="border-radius: 0px; overflow:hidden; min-height: 150px; background: <?php echo $e[$i]['color']; ?> url('<?php echo esc_url( get_template_directory_uri() ); ?>/framework/images/bars<?php echo $i; ?>.png') bottom left; background-size:cover; ">
        <div class="card-body position-relative pl-lg-4">
          <!--<i class="<?php echo $e[$i]['icon']; ?> fa-7x position-absolute" style="right: 100px;  opacity: 0.2;"></i>-->
          <h1 class="text-white <?php if($i == 3){ echo $CORE->GEO("price_formatting",array()); } ?>"><?php echo $e[$i]['total']; ?></h1>
          <!--<a href="<?php echo $e[$i]['link']; ?>" class="btn btn-light rounded-0 btn-sm float-right mt-n3"><?php echo $e[$i]['btn_txt']; ?></a>-->
          <div class="text-white"><?php echo $e[$i]['name']; ?></div>
        </div>
      </div>
    </div>
    <?php $i++; } ?>
  </div>
</div>
<div class="container mt-5">
<div class="row">
  <div class="col-12 px-0">
    <style>
.notice-warning { margin-bottom:40px; }
</style>
   
  </div>
  <div class="col-md-12">
    <div class="bg-white shadow-sm" style="border-radius: 0px;">
      <div class="card-body">
        <canvas height="250" width="600" id="myChart"></canvas>
      </div>
      <script>
jQuery(document).ready(function() {

 
window.chartColors = {
	red: 'rgb(255, 99, 132)',
	orange: 'rgb(255, 159, 64)',
	yellow: 'rgb(255, 205, 86)',
	green: 'rgb(75, 192, 192)',
	blue: 'rgb(54, 162, 235)',
	purple: 'rgb(153, 102, 255)',
	grey: 'rgb(201, 203, 207)'
};
 

var ctx = document.getElementById('myChart').getContext('2d');
 
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
	
        labels:[<?php foreach($data as $h){ ?>"<?php echo $h['name']; ?>",<?php } ?>],
		
       datasets: [{
	   
	   
					label: "<?php echo __("New","premiumpress")." ".$CORE->LAYOUT("captions","2"); ?>",
					
					backgroundColor: window.chartColors.red,
					borderColor: window.chartColors.red,
					data: [<?php echo wlt_chartdata(0); ?>],
					fill: false,
				},  
				
				
				{
					label: "<?php echo __("New Orders","premiumpress"); ?>",
					fill: false,
					backgroundColor: window.chartColors.blue,
					borderColor: window.chartColors.blue,
					data: [<?php echo wlt_chartdata(1); ?>],
				},
				
				{
					label: "<?php echo __("New Users","premiumpress"); ?>",
					fill: false,
					backgroundColor: window.chartColors.green,
					borderColor: window.chartColors.green,
					data: [<?php echo wlt_chartdata(3); ?>],
				}
				
				],
    },
   options: {
				responsive: true,
				title: {
					display: false,
					text: ''
				},
				tooltips: {
					mode: 'index',
					intersect: false,
				},
				hover: {
					mode: 'nearest',
					intersect: true
				},
				scales: {
					xAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Month'
						}
					}],
					yAxes: [{
						display: true,
						scaleLabel: {
							display: true,
							labelString: 'Value'
						}
					}]
				},
				},
 });

});
</script>
    </div>
  </div>
  <div class="col-md-8">
    <div class="bg-white shadow-sm mt-5" style="border-radius: 0px;">
      <div class="card-body">
      <a href="admin.php?page=reports" class="float-right btn btn-system"><i class="fa fa-arrow-right"></i> <?php echo __("View All Activity","premiumpress"); ?></a>
        <h5><?php echo __("Recent Activity","premiumpress"); ?></h5>
        <hr />
        <?php

 
$wp_query = new WP_Query( array( 'post_type' => 'ppt_logs', 'posts_per_page' => 8  )); 

$tt = $wpdb->get_results($wp_query->request, OBJECT);
if ( $wp_query->have_posts() ) {
     
	 
	 while ( $wp_query->have_posts() ) {
    $wp_query->the_post();
	  
	    
		$data = $CORE->FUNC("format_logtype", $wp_query->post->ID );
		$user_id = $data['userid'];
		
		if(!is_numeric($user_id)){ continue; }
		 
		?>
        <div class="row no-gutters border-bottom mb-2 recentactivity pb-2">
          <div class="col-md-1"> <a href="<?php echo get_author_posts_url($user_id); ?>" class="text-dark" target="_blank" style="max-width:55px; max-height:45px; overflow:hidden;">
            <?php  echo str_replace("avatar ","avatar img-fluid ",get_avatar( $user_id, 40 )); ?>
            </a> </div>
          <div class="col-md-4 text-center text-muted small">
            <div class="mt-3"><i class="fal fa-clock"></i> <?php echo $data['time']; ?></div>
          </div>
          <div class="col-md-7">
          <i class="<?php echo $data['icon']; ?> fa-2x float-left pr-3"></i> 
          	<div class="small"><?php echo $data['name']; ?></div>
            <div class="tiny mt-2 text-muted">
              <?php echo $data['desc']; ?>
            </div>
          </div>
           
         
        </div>
        <?php

	  
	  }
}else{
?>
        <div class="text-muted"><?php echo __("No recent activity.","premiumpress"); ?></div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="shadow-sm mt-5" style="border-radius: 0px; height:400px; overflow:hidden; background: #0866c6  url('<?php echo esc_url( get_template_directory_uri() ); ?>/framework/images/bars4.png') bottom left; background-size:cover; ">
      <div class="card-body position-relative h-100">
        <div class="position-absolute" style="bottom:20px; left:20px;">
          <h1 class="text-light"><?php echo __("Design","premiumpress"); ?></h1>
          <div class="text-light"><?php echo __("Customize your website.","premiumpress"); ?></div>
          <a href="admin.php?page=design" class="btn btn-system shadow-sm mt-4"><?php echo __("go now","premiumpress"); ?> <i class="fa fa-arrow-right mr-0"></i> </a> </div>
      </div>
    </div>
    <div class="text-muted text-uppercase mt-5"><?php echo __("Helpful Articles","premiumpress"); ?></div>
    <a href="https://www.premiumpress.com/contact/" class="btn btn-dark shadow-sm btn-sm mt-4" target="_blank"><i class="fa fa-book mr-1"></i> <?php echo __("Getting Started","premiumpress"); ?> </a> <a href="https://www.premiumpress.com/contact/" class="btn btn-dark shadow-sm btn-sm mt-4" target="_blank"><i class="fa fa-book mr-1"></i> <?php echo __("Official Documentation","premiumpress"); ?> </a> </div>
  <div class="col-md-4">
    <div class="bg-white shadow-sm mt-5" style="border-radius: 0px;">
      <div class="card-body">
        <h6><?php echo __("New","premiumpress")." ".$CORE->LAYOUT("captions","2"); ?></h6>
        <ul class="list-group list-group-flush">
          <?php
 $i=0;
while($i < 6){


	$DATE1 = date("Y-m-d",mktime(0, 0, 0, date("m")-$i, 1, date("Y")));
	$DATE2 = date("Y-m-d",mktime(0, 0, 0, date("m")-$i, 30, date("Y")));
 
	if($i == 0){
	$days = 0;
	}else{
	$days = $i * 28;
	}
	
	$count = $wpdb->get_var("SELECT count(*) FROM ".$wpdb->prefix."posts WHERE ".$wpdb->prefix."posts.post_type = '".THEME_TAXONOMY."_type' AND ".$wpdb->prefix."posts.post_date >= '".$DATE1."' and ".$wpdb->prefix."posts.post_date < '".$DATE2."' ");

?>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-muted"> <span class="small"><?php echo date('F Y', strtotime("-".$days." days")); ?></span> <span class="badge <?php if($count > 0){ ?>bg-success<?php }else{ ?>bg-secondary<?php } ?> text-white badge-pill"> <?php echo $count; ?> </span> </li>
          <?php
$i++;
} 
?>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="bg-white shadow-sm mt-5" style="border-radius: 0px;">
      <div class="card-body">
        <h6><?php echo __("New Users","premiumpress"); ?></h6>
        <ul class="list-group list-group-flush">
          <?php
 $i=0;
while($i < 6){

	$DATE1 = date("Y-m-d",mktime(0, 0, 0, date("m")-$i, 1, date("Y")));
	$DATE2 = date("Y-m-d",mktime(0, 0, 0, date("m")-$i, 30, date("Y")));
 

	if($i == 0){
	$days = 0;
	}else{
	$days = $i * 28;
	}
	
	$count = $wpdb->get_var("SELECT count(*) FROM ".$wpdb->base_prefix."users WHERE  ".$wpdb->base_prefix."users.user_registered >= '".$DATE1."' and ".$wpdb->base_prefix."users.user_registered < '".$DATE2."' ");

?>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-muted"> <span class="small"><?php echo date('F Y', strtotime("-".$days." days")); ?></span> <span class="badge <?php if($count > 0){ ?>bg-success<?php }else{ ?>bg-secondary<?php } ?> text-white badge-pill"> <?php echo $count; ?> </span> </li>
          <?php
$i++;
} 
?>
        </ul>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="bg-white shadow-sm mt-5" style="border-radius: 0px;">
      <div class="card-body">
        <h6><?php echo __("New Orders","premiumpress"); ?></h6>
        <ul class="list-group list-group-flush">
          <?php
 $i=0;
while($i < 6){

	$DATE1 = date("Y-m-d",mktime(0, 0, 0, date("m")-$i, 1, date("Y")));
	$DATE2 = date("Y-m-d",mktime(0, 0, 0, date("m")-$i, 30, date("Y")));
 


	if($i == 0){
	$days = 0;
	}else{
	$days = $i * 28;
	}
 
	$SQL = "SELECT count(*) FROM ".$wpdb->prefix."posts WHERE ".$wpdb->prefix."posts.post_date >= '".$DATE1."' and ".$wpdb->prefix."posts.post_date < '".$DATE2."'   AND ".$wpdb->prefix."posts.post_type='ppt_orders' ";
 
	$count = $wpdb->get_var($SQL);

?>
          <li class="list-group-item d-flex justify-content-between align-items-center px-0 text-muted"> <span class="small"><?php echo date('F Y', strtotime("-".$days." days")); ?></span> <span class="badge <?php if($count > 0){ ?>bg-success<?php }else{ ?>bg-secondary<?php } ?> text-white badge-pill"> <?php echo $count; ?> </span> </li>
          <?php
$i++;
} 
?>
        </ul>
      </div>
    </div>
  </div>
</div>
</section>
<?php


_ppt_template('framework/admin/footer' ); 
?>
