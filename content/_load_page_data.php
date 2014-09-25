<?php  
	require_once("../../../../../wp-load.php");
	require_once get_template_directory() . '/uigen-display-api/content/header.php';
?>
    <div class="">
      <!-- Example row of columns -->
      <br/><br/><br/>
		<div class="row">
			
			<div id="app-left-panel-wraper" class="col-md-1" style="">
				<div id="app-left-panel" style="position:fixed; overflow-y:scroll; overflow-x:hidden; width:auto ">

				</div>
			</div>

			<div id="app-body" class="col-md-10">
				<div class="row">
					<div class="col-md-12">
						<div class="blog-header">
							<h1 class="blog-title">Load page data</h1>
							<p class="lead blog-description">JavaScript API metchods to load and display UiGEN web-app data.</p>
						</div>
					</div>
					<div class="col-md-6">
						
						<h2>Load data</h2>
						<!-- PANEL -->
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4>metchod: load_data</h4>
								<h5>load_UiGEN_API_Method({ /* args */ });</h5>
							</div>							
							<div class="panel-body">
								<p>EXAMPLE 1. Console.log directory list (JSON) where localized all properties files</p>
<pre><code data-language="javascript">load_UiGEN_API_Method(
    {
        'method':'load_data',
        'args': {
            'input': {
                'path': GLOBALDATA_PATH + 'template-hierarchy/arguments/',
                'file': 'index-slots-properties.yaml',
                'type': 'YAML'
            },
            'output': {
                'type': 'JSON',
                'display' : 'alert' // alert, appednd, log 
            }
        }
    }
);</code></pre>
								<button class="run-js btn btn-default pull-right btn-xs" href="#" role="button">Test IT &raquo;</button>
							</div> 

<ul class="list-group">
								<li class="list-group-item clearfix">
									<p>EXAMPLE 2. alert directory list (html list) where localized all properties files</p>
<pre><code data-language="javascript">load_UiGEN_API_Method({
	'method':'load_data',
	'args': {
		'input': {
			'path': GLOBALDATA_PATH + 'template-hierarchy/arguments/',
			'file': 'index-slots-properties.yaml',
			'type': 'YAML'
		},
		'output': {
			'type': 'JSON',
			'remove_old': 'true'
		},
		'responce': function(e){

			var tree_data = jQuery.parseJSON( e );			
			jQuery('#app-left-panel').append( UiGEN_tree(tree_data) );			
			update_UiGEN_APP_Object('prop',tree_data,'compare');
		}
	}
});
UiWS_panels({ 'left':4 , 'body':7 , 'right':1 });</code></pre>
									<button class="run-js btn btn-default pull-right btn-xs" href="#" role="button">Test IT &raquo;</button>
								</li>
														
							</ul>



<ul class="list-group">
								<li class="list-group-item clearfix">
									<p>EXAMPLE 3. Displae with external js editor</p>
<pre><code data-language="javascript">load_UiGEN_API_Method({
	'method':'load_data',
	'args': {
		'input': {
			'path': GLOBALDATA_PATH + 'template-hierarchy/arguments/',
			'file': 'index-slots-properties.yaml',
			'type': 'YAML'
		},
		'output': {
			'type': 'JSON',
			'remove_old': 'true'
		},
		'responce': function(e){
			var tree_data = jQuery.parseJSON( e );
				
			jQuery('#app-left-panel').append( '<textarea id="example1"></textarea>' );
			jQuery("#example1").val(e);
		  	
		  	var example1 = new JSONEditor(jQuery("#example1"), { showWipe: false });
   			example1.doTruncation(true);
    		example1.showFunctionButtons();
			$(document).on('click', ".map-to-schema", function() { 
				alert(example1.getJSONText());
				jQuery("#example1").val(e);
				example1.setJsonFromText();
				example1.rebuild();
		

			});


			update_UiGEN_APP_Object('prop',tree_data,'compare');

		}
	}
});
UiWS_panels({ 'left':4 , 'body':7 , 'right':1 });</code></pre>
									<button class="run-js btn btn-default pull-right btn-xs" href="#" role="button">Test IT &raquo;</button>
								</li>
														
							</ul>


						</div>
						<!-- END PANEL -->


						
						
					</div> 

					<div class="col-md-6">

						<h2>List directory</h2>
						<!-- PANEL -->
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4>metchod: list_dir</h4>
								<h5>load_UiGEN_API_Method({ /* args */ });</h5>
							</div>							
							<div class="panel-body">
								<p>EXAMPLE 1. Console.log directory list (JSON) where localized all properties files</p>
<pre><code data-language="javascript">load_UiGEN_API_Method(
    {
        'method':'list_dir',
        'args': {
            'input': {
                'path': GLOBALDATA_PATH
            },
            'output': {
                'type': 'JSON',
                'display' : 'alert' // alert, appednd, log 
            }
        }
    }
);</code></pre>
								<button class="run-js btn btn-default pull-right btn-xs" href="#" role="button">Test IT &raquo;</button>
							</div> 

							<ul class="list-group">
								<li class="list-group-item clearfix">
									<p>EXAMPLE 2. alert directory list (html list) where localized all properties files</p>
<pre><code data-language="javascript">load_UiGEN_API_Method(
    {
        'method':'list_dir',
        'args': {
            'input': {
                'path': GLOBALDATA_PATH
            },
            'output': {
                'type': 'list',
                'display' : 'append', // alert, appednd, log 
                'append_target': '#app-left-panel',
                'remove_old': 'true'
            }
        }
    }
);
UiWS_panels({ 'left':2 , 'body':9 , 'right':1 });</code></pre>
									<button class="run-js btn btn-default pull-right btn-xs" href="#" role="button">Test IT &raquo;</button>
								</li>
														
							</ul>
						
							<!-- <div class="panel-footer clearfix">
								<a class="btn btn-default pull-right btn-small" href="#" role="button">View details &raquo;</a>
							</div> -->
						</div>
						<!-- END PANEL -->

						<h2>File list</h2>
						<!-- PANEL -->
						<div class="panel panel-info">
							<div class="panel-heading">
								<h4>metchod: list_file</h4>
								<h5>load_UiGEN_API_Method({ /* args */ });</h5>
							</div>							
							<div class="panel-body">
								<p>EXAMPLE 1. alert directory list (html list) where localized all properties files</p>
<pre><code data-language="javascript">load_UiGEN_API_Method(
    {
        'method':'list_files',
        'args': {
            'input': {
                'path': GLOBALDATA_PATH + 'template-hierarchy/arguments'
            },
            'output': {
                'type': 'list',
                'display' : 'append', // alert, appednd, log 
                'append_target': '#app-left-panel',
                'remove_old': 'true'
            }
        }
    }
);
UiWS_panels({ 'left':3 , 'body':8 , 'right':1 });
</code></pre>
									<button class="run-js btn btn-default pull-right btn-xs" href="#" role="button">Test IT &raquo;</button>

							</div> 

							
						
							<!-- <div class="panel-footer clearfix">
								<a class="btn btn-default pull-right btn-small" href="#" role="button">View details &raquo;</a>
							</div> -->
						</div>
						<!-- END PANEL -->
					</div>
				</div>

      <hr>
	<div class="col-md-12">
		<div class="blog-header">
			<!-- <h1 class="blog-title">Load page data</h1> -->
			<p class="lead blog-description">PHP API metchods to load and display UiGEN web-app data.</p>
		</div>
	</div>

	<div class="col-md-6">

      <h2>List directory</h2>
      <p>List dir php method</p>
      <pre>
$UIGEN_API = new UiGEN_display_api();
var_dump(
	$UIGEN_API ->list_dir( 
		array( 
			'input' => array(
				'path' => GLOBALDATA_PATH
			),
			'output' => array(
				'type' => 'JSON'
			)
		) 
	) 
);</pre>
		<p>return</p>
      	<pre style="font-size:12px; color:#326336"><?php 
				var_dump(
					$UIGEN_API ->list_dir( 
						array( 
							'input' => array(
								'path' => GLOBALDATA_PATH
							),
							'output' => array(
								'type' => 'JSON'
							)
						) 
					) 
				);
			?>
		</pre>

	</div>


	<div class="col-md-6">


<h2>PHP LIST FILES</h2>
      	<pre style="font-size:12px; color:#326336">
			<?php 
				var_dump(
					$UIGEN_API ->list_files( 
						array( 
							'input' => array(
								'path' => GLOBALDATA_PATH
							),
							'output' => array(
								'type' => 'JSON'
							)
						) 
					) 
				);
			?>
		</pre>


		</div>




			</div>
			<div id="app-right-panel" class="col-md-1">
			</div>
		</div>
      <hr>




		
<?php	
	require_once get_template_directory() . '/uigen-display-api/content/footer.php';
?>



CO TO MA KORWWA BUC 
ALPACA FORM


