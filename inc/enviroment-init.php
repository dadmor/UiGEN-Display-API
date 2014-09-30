<?php 
$api_uri = plugins_url().'/UiGEN-Display-API'; 
?>
<link rel="stylesheet" href="<?php echo $api_uri;?>/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="<?php echo $api_uri;?>/bootstrap/css/bootstrap-theme.min.css">
<style type="text/css" media="screen">
/* Json-editor like a folders tree */
.builder .icon{float:right;}
.builder blockquote { padding:0px 0px 0px 5px; margin:0px 0px 1px 0px; border-left:1px solid #fff; border-bottom: 1px solid #fff;}
.builder blockquote :hover{ background-color:rgba(200,200,200,.3); border-radius: 3px; }
.builder .glyphicon-file { margin-top:3px; margin-bottom:6px; }
.builder .glyphicon-file .editable{ color:#333; }
.builder .glyphicon-folder-open{ 
	border:1px solid #444; 
	padding:4px 3px 6px 5px; 
	background-color:#666; 
	border-radius: 3px; 
	margin-top:1px;
}
.builder .edit_field{
	border:1px solid #aaa;
	margin:-7px 0px;
	font-size:11px;
	line-height:16px;
	outline: #fff solid 1px;
	box-shadow: 0px 0px 5px #888888;
	border-radius: 2px; 
}
.function_buttons {text-align: right;}
.builder .glyphicon-remove-sign , .builder .glyphicon-plus-sign{margin:1px;}
.json-editor textarea {width:100%; height:480px;}
</style>
<style type="text/css" media="screen">
/* ACE */
    #editor { 
        position: absolute;
        width:100%;        
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }
</style>
<script src="<?php echo $api_uri; ?>/js/uigen-display-api.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php echo $api_uri; ?>/js/jquery.json-editor.js" type="text/javascript" charset="utf-8"></script>
<!--<script src="<?php echo $api_uri; ?>/js/ace.js" type="text/javascript" charset="utf-8"></script>-->
<script src="http://cdnjs.cloudflare.com/ajax/libs/ace/1.1.3/ace.js" type="text/javascript" charset="utf-8"></script>
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
/* ^^^^^^^^^^^^^^ */
</script>