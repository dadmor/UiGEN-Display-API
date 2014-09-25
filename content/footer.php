      <footer>
      	
      		<div style="margin-left:20px">
        	<p>&copy; Company 2014</p>
        	</div>
       
      </footer>
    </div> <!-- /container -->







    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   
    <script>
    	

    	/* DISPLAY API RIGHT AND LEFT PANELS CONTROLLER */

		//var app_panels = { 'left':1 , 'body':10 , 'right':1 }
		function UiWS_panels(app_panels){
			
			var app_Lpan = jQuery('#app-left-panel-wraper');
			var app_Rpan = jQuery('#app-right-panel-wraper');

			var bottom_cut = 65;

			app_Lpan.toggleClass(app_Lpan.attr('class')+' col-md-'+app_panels['left']);
			
			jQuery('#app-body').toggleClass(jQuery('#app-body').attr('class')+' col-md-'+app_panels['body']);
			app_Rpan.toggleClass(app_Rpan.attr('class')+' col-md-'+app_panels['right']);
			
			if(app_panels['left'] > 1){
				app_Lpan.children('#app-left-panel').css('display','none');
				app_Lpan.children('#app-left-panel').fadeIn();
				app_Lpan.children('#app-left-panel').css('border-right','1px solid #ccc');

				//app_Lpan.css('height',app_Lpan.parent().height());
				app_Lpan.children('#app-left-panel').css('height', jQuery(window).height() - bottom_cut);
				app_Lpan.children('#app-left-panel').css('width', jQuery(app_Lpan).width());

				app_Lpan.one('transitionend webkitTransitionEnd oTransitionEnd otransitionend', function(){
					//app_Lpan.css('height',app_Lpan.parent().height());
				});

			}else{
				app_Lpan.css('border-right','none');
			}

			if(app_panels['right'] > 1){
				app_Rpan.css('height', jQuery(window).height());
				//app_Rpan.css('height',app_Rpan.parent().height());
				app_Rpan.css('border-left','1px dashed #ccc');
				app_Rpan.one('transitionend webkitTransitionEnd oTransitionEnd otransitionend', function(){
					//app_Rpan.css('height',app_Rpan.parent().height());
				});
			}else{
				app_Rpan.css('border-left','none');
			}

		}	
		UiWS_panels({ 'left':1 , 'body':10 , 'right':1 });	

		jQuery('.run-js').click(function(){
			var toEval = jQuery.trim(jQuery(this).prev().text());
			//alert(toEval);
			jQuery.globalEval(toEval);
		});

	</script>



	<?php

	?>



	</body>
</html>
