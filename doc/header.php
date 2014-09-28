<!DOCTYPE html>
<html lang="en">
	<head>
  	<?php
	/* INIT WORDPRESS LOADER (WP Globals, constans and classes) */
	//require_once("../../../../../wp-load.php");
	/* LOAD UiGEN WP PLUGIN CONSTANS */
	//require_once( ABSPATH . 'wp-content/plugins/UiGEN-Core/core-files/defines-const.php' );
	/* LOAD UiGEN DISPLAY API FUNCTIONS */
	require_once plugin_dir_path(  __FILE__ ) . '/../inc/functions.php';
	/* LOAD YAML -> PHP PARSER */
	require_once plugin_dir_path(  __FILE__ ) . '/../inc/Spyc.php';
	/* INIT UiGEN DISPLAY API CLASS */
	require_once plugin_dir_path(  __FILE__ ) . '/../inc/uigen-display-api.class.php';
	$UIGEN_API = new UiGEN_display_api();

	$menu_prefix =  plugins_url().'/UiGEN-Display-API/doc/';
	$api_uri = plugins_url().'/UiGEN-Display-API';
	var_dump($menu_prefix);
	?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
<!--     <link rel="icon" href="../../favicon.ico"> -->

    <title>Jumbotron Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
   	<link rel="stylesheet" href="<?php echo $api_uri;?>/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo $api_uri;?>/bootstrap/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="<?php echo $api_uri;?>/css/colorize-github.css">
	<link rel="stylesheet" href="<?php echo $api_uri;?>/css/jquery.json-editor.css">
	<link rel="stylesheet" href="<?php echo $api_uri;?>/css/alpaca-bootstrap.css">
	<style>
   		/* DISPLAY API RIGHT AND LEFT PANELS ANIMATION */
	   .row div {
		/* 		    
		-webkit-transition: width 0.3s ease, margin 0.3s ease;
		-moz-transition: width 0.3s ease, margin 0.3s ease;
		-o-transition: width 0.3s ease, margin 0.3s ease;
		transition: width 0.3s ease, margin 0.3s ease; 
		*/
		}
		.sub_hor_tree > li:hover,
		.sub_hor_tree > li:target {
		    color: #3e5706;
		    
		}
		.uigen_tree{ 
			background-color:#BDBDBD; 
			margin:0px 0px 0px -16px;
			padding:0px;
		}
		.uigen_tree > li{ 
			font-size:16px;
			line-height:36px;
			color:#333;
			list-style:none;
			text-shadow: 0px 0px 3px #fff;
			margin-left:20px;
		}
		.uigen_tree > li > span{ 
			text-shadow: 0px 0px 3px #000;
		}
		.uigen_tree > li > span{ 
			text-shadow: 0px 0px 3px #000;
		}

		

		.uigen_tree ul { 
			margin:0px !important;
			padding:0px !important;
			border-bottom:1px solid #ccc;
		}
		.uigen_tree ul li{ 
			background-color:#fff;
		}
		.uigen_tree .folder{
			border-bottom:1px solid #fff;
		}

		.uigen_tree .btn{
			margin-top:-3px;
		}
		.sub_dir{
			background-color:#fff;
			font-size:12px;
			line-height:22px;
			color:#333;
			margin:5px;
			list-style:none;
			text-shadow: none;
		}
		.sub_dir li{
			margin-left:20px;
			padding:1px;
		}
		.sub_dir .tree_value{
			margin-left:0px;
			list-style:none;
		}
		.sub_dir .tree_value:hover{
			background-color:#eee;
			outline:#eee solid 2px;
			cursor:pointer;
		}
		.sub_dir:hover{
			outline:#FFA500 dashed 1px;
			box-shadow: 0px 0px 5px #FFA500;
		}

		

		.uigen_tree .glyphicon-folder-open, .uigen_tree .glyphicon-folder-close {
			color:#FFA500; margin-right:15px; margin-left:15px;
			cursor:pointer;
		}
		.sub_dir .glyphicon-folder-open {
			color:#FFA500; margin-right:5px; margin-left:0px;
			cursor:pointer;
		}
		.uigen_tree .glyphicon-file, .uigen_tree .glyphicon-link { 
			margin-left:15px !important;
			margin-right:15px !important;
		}

		.uigen_tree .glyphicon-file{
			color:#C69951;
		}



	</style>
	<script>
		/* print JS CONST */
		<?php
			echo "var PHP_API_CLASS = '".$api_uri."/inc/uigen-display-api.class.php';\n";
			$wp_upload = wp_upload_dir();
			echo "var GLOBALDATA_PATH = '".$wp_upload['basedir']."/global-data/';\n";
			echo "var GLOBALDATA_URI = '".$wp_upload['basedir']."/global-data/';\n";

			//define( 'GFX_URL' , $wp_upload['baseurl'].'/gfx/' );
			//define( 'GFX_DIR' , $wp_upload['basedir'].'/gfx/' );
		?>
	</script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="<?php echo plugins_url();; ?>/UiGEN-Core/js-lib/lodash.js"></script>
    <script src="<?php echo $api_uri; ?>/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $api_uri; ?>/js/uigen-display-api.js"></script>
    <script src="<?php echo $api_uri; ?>/js/rainbow-custom.min.js"></script>
    <script src="<?php echo $api_uri; ?>/js/uigen_tree.js"></script>
    <script src="<?php echo $api_uri; ?>/js/json2.js"></script>
    <script src="<?php echo $api_uri; ?>/js/jquery.json-editor.js"></script>
    <script src="<?php echo $api_uri; ?>/js/jquery.tmpl.js"></script>
    <script src="<?php echo $api_uri; ?>/js/alpaca.js"></script>
    


    

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	</head>

	<body>



<!-- Button trigger modal -->
	<!-- Modal -->
	<div class="modal fade" id="workspaceModal" tabindex="-1" role="dialog" aria-labelledby="workspaceModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
	        <h4 class="modal-title" id="workspaceModalLabel">Modal title</h4>
	      </div>
	      <div class="modal-body">	        
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary">Save changes</button>
	      </div>
	    </div>
	  </div>
	</div>


    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">UiGEN Display API <span style="font-size:12px">:: WordpPress MOD ver.0.1</span></a>
        </div>
        <div class="navbar-collapse collapse">
	
		<ul class="nav navbar-nav">
	        <!-- <li class="active"><a href="#">xxx</a></li> -->
	         <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Getting started <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	          	<li><a href="#">UiGEN + WordPress</a></li>
	            <li><a href="#">API workspace</a></li>
	            <li><a href="#">Global constans</a></li>
	            <li><a href="#">PHP API class</a></li>
	            <li><a href="#">Ajax support</a></li>
	            <li class="divider"></li>
	            <li><a href="#">UiGEN data model</a></li>
	            <li><a href="<?php echo $menu_prefix.'_load_page_data.php' ?>">Load data</a></li>
	          	<li><a href="<?php echo $menu_prefix.'_load_page_data.php' ?>">Save data</a></li>
	          </ul>
	        </li>

	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Create site <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Load sitemap</a></li>
	            <li><a href="#">Load page properties</a></li>
	            <li><a href="#">Load page hierarchy</a></li>
	            <li><a href="#">Load grid</a></li>
	            <li><a href="#">Display elements</a></li>
	            <li><a href="#">Change skin</a></li>

	            <li class="divider"></li>
	            <li><a href="#">Drag elements into grid</a></li>
	            <li><a href="#">Save page hierarchy</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Change element properties</a></li>
	            <li><a href="#">Save properties</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Change and save grid</a></li>
	            <li class="divider"></li>
	            <li><a href="#">Drag elements from assets</a></li>
	            <li><a href="#">Save assets</a></li>
	             <li class="divider"></li>
	            <li><a href="#">Storage saved data</a></li>
	            <li><a href="#">Update saved data</a></li>
	            <li><a href="#">Storage Cashe Concept</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Forms <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Create form</a></li>
	            <li><a href="#">Create flow</a></li>
	            <li><a href="#">Flow controllers</a></li>	
	            <li><a href="#">Flow formula</a></li>            
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">TutorRecord <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	            <li><a href="#">Run tutorial</a></li>
	            <li><a href="#">Load tutorial</a></li>
	            <li><a href="#">Record tutorial</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">BlockBox <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	          	<li><a href="#">Import elements</a></li>
	            <li><a href="#">Create and published elements</a></li>
	            <li><a href="#">Elements properties API</a></li>
	            <li><a href="#">Elements controllers</a></li>
	            <li><a href="#">Manage elements</a></li>
	            <li><a href="#">Examples</a></li>
	          </ul>
	        </li>
	        <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">MockupMe <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	          	<li><a href="#">Import mockup</a></li>
	            <li><a href="#">Generate WebApplication</a></li>
	            <li><a href="#">Create and published mockups</a></li>
	          </ul>
	        </li>
	         <li class="dropdown">
	          <a href="#" class="dropdown-toggle" data-toggle="dropdown">AddON Market <span class="caret"></span></a>
	          <ul class="dropdown-menu" role="menu">
	          	<li><a href="#">Complete solutions: forms</a></li>
	          	<li><a href="#">Complete solutions: flows</a></li>
	          	<li><a href="#">Complete solutions: relations</a></li>
	          	<li><a href="#">Complete solutions: cases</a></li>
	          </ul>
	        </li>
	      </ul>

          <div class="navbar-form navbar-right" style="margin-right:0px">
            <button data-panel-right="3" class="btn btn-default navbar-right">Test panels</button>
          </div>

        </div><!--/.navbar-collapse -->
      </div>
    </div>
