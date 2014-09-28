<?php
/*
Plugin Name: UiGEN Display API
Plugin URI: http://addonmarket.com
Description: UiGEN Display Framework API
Authors: dadmor
Authors URI: dadmor@gmail.com
*/

/* set API version */
define( 'UiGEN_DISPLAY_API', "0.1" );
$wp_upload = wp_upload_dir();
define( 'GLOBALDATA_PATH', $wp_upload['basedir'].'/global-data/' );
define( 'GLOBALDATA_URI', $wp_upload['baseurl'].'/global-data/' );

add_action('admin_menu', 'UiGEN_DISPLAY_API_menu');

function UiGEN_DISPLAY_API_menu()
{   
	// editor + administrator = moderate_comments;
	add_menu_page('UiGEN DISPLAY API', 'UiGEN API', 'administrator', 'url_UiGEN_DISPLAY_API', 'UiGEN_DISPLAY_API_callback');

	// submenu with calbac
	//add_submenu_page('url_WP_Executor', 'UiGEN Theme Grid', 'UiGEN Theme Grid', 'administrator', 'url_WP_Executor', 'WP_Executor_callback');
}


function UiGEN_DISPLAY_API_callback(){
	echo '<div class="wrap">';
 		echo '<H2>UiGEN</h2>';
  		echo '<H3>Display Framework API</h3>';
 		echo 'http://getblockbox.com/executor_sandbox/wp-content/plugins/UiGEN-Display-API/doc';
	echo '</div>';
}

register_activation_hook( __FILE__, 'my_first_install' );
register_deactivation_hook( __FILE__, 'my_first_reinstall' );

function my_first_install() {

	//echo '<div class="wrap">';
	//echo '<h2>UiGEN CORE Data Loader.</h2>';
	//echo '<p>Customizing your page from external assets, settings and complete buisness cases</p>';

	// check yaml prop structure

	if( file_exists ( GLOBALDATA_PATH )){
		
		//echo '<div id="message" class="updated"><p>Global UiGEN Data container exist on: <span style="font-family:monospace;"> '.GLOBALDATA_PATH.' </span></p>';
		//echo '</div>';

	}else{

		// create ditectory
		$wp_upload = wp_upload_dir();		
		mkdir($wp_upload['basedir'].'/global-data', 0744);
		
		$path = GLOBALDATA_PATH;
		$file = 'global-data-defalut-set_1.zip'; 

		$copy_callback = copy( plugin_dir_path( __FILE__ ) . 'global-data-zip/'.$file , $wp_upload['basedir'].'/global-data/'.$file);
		WP_Filesystem();
		$return = unzip_file($path.$file, $path); 
		if($return == true){
			//echo '<div id="message" class="updated"><p>Global UiGEN Data container was installed succesfully</a></p></div>';
		}else{
			//echo '<div id="message" class="updated">';
			//echo '<pre>';
			//var_dump($return);
			//echo '</pre></div>';
		}

	}
	//echo '</div>';
}

function my_first_reinstall() {
	// remove global-data files container
	$wp_upload = wp_upload_dir();
	function deleteDir($path) {
	    return is_file($path) ?
	            @unlink($path) :
	            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
	}
	deleteDir($wp_upload['basedir'].'/global-data');
}