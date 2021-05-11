<?php
/*
Template Name: [DATING - CHATROOM]
 
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
 
global  $userdata, $CORE_DATING, $CORE;



// REDIRECT IF NOT LOGGED IN
$CORE->Authorize(); 


	$canView = true;
	
	// CHECK USER ACCESS FOR MEMBERSHIP LEVELS
	
	if( current_user_can('editor') || current_user_can('administrator') ) { 
	$canView = true;
	}else{
	
	
		if($CORE->USER("membership_hasaccess", "view_chatroom") == 1){ 
		 
		$canView = true;
		}else{ 
		
		
		
			header('location: '._ppt(array('links','memberships'))."?noaccess=1" );
			exit();
		
		}
	}


function INSTALLTABLES(){ global $wpdb, $CORE, $userdata;	
		
	// INSTALL TABLES
	if(get_option("datingtabledinstalled1") == ""){
		
			 $wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."core_useronline` (	 
			  `id` int(10) NOT NULL auto_increment, 
			  `user_id` int(10) NOT NULL, 
			  `session` char(100) NOT NULL default '',
			  `ip` varchar(15) NOT NULL default '', 
			  `timestamp` varchar(15) NOT NULL default '', 
			  PRIMARY KEY (`id`), 
			  UNIQUE KEY `id`(`id`) );");		  
	
	
			$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."core_chat_messages` (
			  `username` varchar(50) DEFAULT NULL,
			  `user_id` int(10) NOT NULL,
			  `message` text,
			  `date` datetime DEFAULT NULL
			)");
			
			$wpdb->query("CREATE TABLE IF NOT EXISTS `".$wpdb->prefix."core_chat_users` (
			  `username` varchar(50) DEFAULT NULL,
			  `user_id` int(10) NOT NULL,
			  `last_activity` datetime DEFAULT NULL,
			  `is_kicked` int(11) DEFAULT '0',
			  `is_banned` int(11) DEFAULT '0',
			  `kick_ban_message` varchar(100) DEFAULT NULL,
			  UNIQUE KEY `username` (`username`)
			)");
			update_option("datingtabledinstalled1", true);
	}
		
}
INSTALLTABLES();

 
	get_header();
	 

	
	// CAN WE ACCESS THIS PAGE?
	if($canView){ ?>
    
    
    	<?php if( in_array(_ppt(array("comchat","enable")), array("1")) ){  $GLOBALS['COMCHATSET'] = 1; ?>
	 
    <div class="container py-5">
    <script>
  var chat_appid = '<?php echo _ppt(array("comchat","appid")); ?>';
  var chat_auth = '<?php echo _ppt(array("comchat","authkey")); ?>';
    var chat_id = '<?php echo $userdata->ID; ?>';
    var chat_name = '<?php echo $CORE->USER("get_username", $userdata->ID); ?>';
    var chat_avatar = '<?php echo $CORE->USER("get_avatar", $userdata->ID); ?>';
    var chat_link = '<?php echo $CORE->USER("get_user_profile_link", $userdata->ID); ?>';
 
  var chat_height = '600px';
  var chat_width = '100%'; 

  document.write('<div id="cometchat_embed_synergy_container" style="width:'+chat_width+';height:'+chat_height+';max-width:100%;border:1px solid #CCCCCC;border-radius:5px;overflow:hidden;"></div>');

  var chat_js = document.createElement('script'); chat_js.type = 'text/javascript'; chat_js.src = 'https://fast.cometondemand.net/'+chat_appid+'x_xchatx_xcorex_xembedcode.js';
  chat_js.onload = function() {
    var chat_iframe = {};chat_iframe.module="synergy";chat_iframe.style="min-height:"+chat_height+";min-width:"+chat_width+";";chat_iframe.width=chat_width.replace('px','');chat_iframe.height=chat_height.replace('px','');chat_iframe.src='https://'+chat_appid+'.cometondemand.net/cometchat_embedded.php'; if(typeof(addEmbedIframe)=="function"){addEmbedIframe(chat_iframe);}
  }
  var chat_script = document.getElementsByTagName('script')[0]; chat_script.parentNode.insertBefore(chat_js, chat_script);
</script>
</div>



    <?php }else{ ?>
    
    
    <?php 			
					
		// CLEAR OUR KICKED USERS AFTER 1 HOUR
		$wpdb->query("UPDATE ".$wpdb->prefix."core_chat_users SET is_kicked ='' WHERE last_activity < '".date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s")."-1 hour"))."'");
		 
		// CLEAR OUR BANNED USERS AFTER 1 WEEK
		$wpdb->query("UPDATE ".$wpdb->prefix."core_chat_users SET is_banned ='' WHERE last_activity < '".date("Y-m-d h:i:s",strtotime(date("Y-m-d h:i:s")."-1 week"))."'");


		// CHECK IF THIS USER HAS BEEN KICKED OR BANNED
		$sql = "SELECT is_kicked, is_banned, kick_ban_message FROM ".$wpdb->prefix."core_chat_users WHERE username = ('".$userdata->user_nicename."')";	 
		$result = $wpdb->get_results($sql);
	
		$blocked_message = "";
		if(isset($result[0])){
			if($result[0]->is_kicked == 1){
				$blocked_title = "You've been kicked!";
				$blocked_message = $result[0]->kick_ban_message;
			}elseif($result[0]->is_banned == 1){
				$blocked_title = "You've been banned!";
				$blocked_message = $result[0]->kick_ban_message;
			}
		}
		
		// CHECK FOR BLOCKED MESSAGE
		if($blocked_message == ""){
		?>
	 
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/_dating/chat/css/chat.css">
		<script  src="<?php echo get_template_directory_uri(); ?>/_dating/chat/js/chat.js"></script>
        
<section class="section-60">
<div class="container">
<div class="row">

      <div class="col-12 mx-auto">	                 
        <div id="wlt_chatwindow">
			<p id="error"></p>
		</div>
      </div>
      
      </div>
   </div> 
</section>

<style>
#chat-window ul { min-height:500px; }
</style>
		
		<script>
		// Binds login window elements
		jQuery(document).ready(function(){
		
			window.server_path = '<?php echo get_template_directory_uri(); ?>/_dating/chat/';
			<?php if(current_user_can('administrator')){ ?>
			window.is_admin = true;
			<?php }else{ ?>
			window.is_admin = false;
			<?php } ?>
			
			Chat.init('<?php echo $userdata->user_nicename; ?>');
			
		 	 setTimeout(function(){
			 
			 
			 	jQuery("#chatroomtitle").html("<?php echo __("Chatroom","premiumpress") ?>");
				jQuery("#sendbuttontxt").html("<?php echo __("Send","premiumpress") ?>");
				
				jQuery(".text_welcome").html("<?php echo __("Welcome","premiumpress") ?>");
				jQuery(".text_username_<?php echo $userdata->ID; ?>").html("<?php echo $CORE->USER("get_username", $userdata->ID); ?>");
				
				 
			}, 2000);
			
			
			 setTimeout(function(){
			 
			 
			 jQuery(".text_welcome_username").html("<?php echo $CORE->USER("get_username", $userdata->ID); ?>");
				
			 
			 }, 40000 );
			
	 
			
		});
		</script>
       
		
		<?php }else{ ?>
		
		<div class="well">
			<div class="text-center"><h1><?php echo $blocked_title; ?></h1><p><?php echo $blocked_message; ?></p></div>
		</div>
		<?php } ?>
        
         
        <?php } ?>

	<?php }?>
 
<?php get_footer();   ?>