<?php
/* Create JS global-data CONSTANS */
function list_globals_dir( $GLOBALDATA_PATH ){
	$output = array();
	foreach(glob($GLOBALDATA_PATH.'*', GLOB_ONLYDIR) as $dir) {
		$dir = str_replace($GLOBALDATA_PATH, '', $dir);
		$output[] = $dir;
	}
	return $output;
}
//echo '<pre>';
//var_dump( list_globals_dir( GLOBALDATA_PATH ) );
//echo '</pre>';
?>




<script>
	<?php
		foreach(list_globals_dir( GLOBALDATA_PATH ) as $var_name) {
			$var_name = str_replace('-', '_', $var_name);
			echo "var const_".$var_name."='test';\n";
		}
		/* Create JS global-data CONSTANS */
		//var_dump( list_globals_dir( GLOBALDATA_PATH ) );	
	?>
</script>