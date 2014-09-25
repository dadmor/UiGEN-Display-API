<?php
class UiGEN_display_api {
	
	/* ####################################################################### */
	/* Class properties */
	/* ----------------------------------------------------------------------- */
	
	public $accesable_ajax_metchods = array(
			'ui_load_page_data',
		);

	/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

	/* ####################################################################### */
	/* Constructor */
	/* ----------------------------------------------------------------------- */
	public function __construct(){
		// INIT CONSTRUCTOR 
	}
	/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

	/* ####################################################################### */
	/* core PHP methods */
	/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

	/* ####################################################################### */
	/* ajax methods */
	/* ----------------------------------------------------------------------- */
	
	/* Read directory and create subdirectories object from this */
	public function list_dir( $args ){

		$output = array();
		foreach(glob($args['input']['path'].'*', GLOB_ONLYDIR) as $dir) {
			$dir = str_replace( $args['input']['path'], '', $dir);
			$output[] = $dir;
		}

		$output = $this -> outputModel($output, $args['output']['type']);		
		return $output;

	}
	/* ----------------------------------------------------------------------- */

	/* Read directory and create files object from this */
	public function list_files( $args ){
		$output = array();
		if ($handle = opendir($args['input']['path'])) {
		    while (false !== ($entry = readdir($handle))) {
		    	if( is_file($args['input']['path'].'/'.$entry) ){
		        	if ($entry != "." && $entry != "..") {
		           		$output[] = $entry;
		           	}
		        }
		    }
		    closedir($handle);
		}
		//var_dump($output);

		$output = $this -> outputModel($output, $args['output']['type']);		
		return $output;

	}
	/* ----------------------------------------------------------------------- */

	/* Read directory and create files tree structure object from this */
	public function list_tree( $args ){

		$output = array();
		$dir = $args['input']['path'];
		$output = $this -> dirToArray($dir);
		$output = $this -> outputModel($output, $args['output']['type']);		
		return $output;

	}
	/* ----------------------------------------------------------------------- */
	/* Read file and create data object form this */

	public function load_data( $args ){
		$output = array();

		if( $args['input']['type'] == 'YAML' ){

			require_once realpath(dirname(__FILE__)) . '/Spyc.php';
			$output = Spyc::YAMLLoad( $args['input']['path'] . $args['input']['file'] );

		}
		if( $args['input']['type'] == 'PHP' ){
			
			require_once $schema_path . '/' . $schema_file_name;

		}

		$output = $this -> outputModel($output, $args['output']['type']);	

		return $output;

	}
	/* ----------------------------------------------------------------------- */
	/* ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^ */

	/* ####################################################################### */
	/* tech methods */
	/* ----------------------------------------------------------------------- */

	

	/* ----------------------------------------------------------------------- */
	private function outputModel($output, $output_type){
		
		if($output_type == 'JSON'){
			$output = json_encode($output);
		}

		if($output_type == 'list'){
			$_output = '<ul>'; 
			foreach($output as $value ){
				$_output .= '<li>'.$value.'</li>';
			}
			$_output .= '</ul>'; 
			$output = $_output;			
		}


		if($_POST['loaderClass']=='UiGEN_display_api'){
			echo $output;
		}
		return $output;

	}
	/* ----------------------------------------------------------------------- */
	private function dirToArray($dir) { 
	   
	   $result = array(); 

	   $cdir = scandir($dir); 
	   foreach ($cdir as $key => $value) 
	   { 
	      if (!in_array($value,array(".",".."))) 
	      { 
	         if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
	         { 
	            $result[$value] = $this -> dirToArray($dir . DIRECTORY_SEPARATOR . $value); 
	         } 
	         else 
	         { 
	            $result[] = $value; 
	         } 
	      } 
	   } 
	   
	   return $result; 
	} 
	/* ----------------------------------------------------------------------- */
	
	/*	private function method_request($output){
		if($_POST['loaderClass']=='UiGEN_display_api'){
			echo $output;
		}else{
			return $output;	
		}

	}*/

}




if($_POST['loaderClass']=='UiGEN_display_api'){
	
	
	
	$guardian = false;
	$acces_methods = array(
		'list_dir',
		'list_files',
		'load_data'

		);

	foreach ($acces_methods as $key) {
		if($key == $_POST['method']){
			$guardian = true;
		}
	}
	if($guardian == true){
		//$UIGEN_API -> list_dir( $_POST['args'] );
		$UIGEN_API = new UiGEN_display_api();
		call_user_func( array( $UIGEN_API , $_POST['method']) , $_POST['args'] ); 
	}else{
		echo 'Acces sracces';
	}	

}
