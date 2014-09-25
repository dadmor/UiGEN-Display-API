/* Global APP OBJECT */
var UiGEN_APP_Object = {
    map:'empty',
    prop:'empty',
    hierarchy:'empty'
}

if(localStorage.UiGEN_APP_Object != undefined){
    UiGEN_APP_Object = jQuery.parseJSON( localStorage.UiGEN_APP_Object );
    console.log(UiGEN_APP_Object);
}
/* Update webStorage object */
function update_UiGEN_APP_Object(type, data, model){
    if(model == 'compare'){
        UiGEN_APP_Object[type] = data;
    }
    if(model == 'recursive'){
        UiGEN_APP_Object[type] = jQuery.extend( true, object1, object2 )
    }
}


function load_UiGEN_API_Method(args){

    /* prepare callback responce */
    var catch_responce = args['args']['responce'];
    args['args']['responce'] = null;
    /* ------------------------ */

    var this_args = args;

    jQuery.ajax({
        type: "POST",
        url: PHP_API_CLASS,
        data: {
            'loaderClass': 'UiGEN_display_api',
            'method': this_args['method'],
            'args': this_args['args'],
        }
    })
    .done(function( msg ) {

        var out = this_args['args']['output'];

        if(out['display'] == 'alert'){
            alert(msg);
        }
        if(out['display'] == 'log'){
            console.log(msg);
        }

        if(out['remove_old'] == 'true'){
            //alert(jQuery(out['append_target']).children());
            jQuery(out['append_target']).empty();
        }
        if(out['display'] == 'append'){
            jQuery(out['append_target']).append(msg);
        }

        catch_responce(msg);

    });
}

function init_UiGEN_alpaca(target, data, schema, options){
      
    if(target == 'modal'){
        $('#workspaceModal').modal('show');
        $("#workspaceModal .modal-body").empty();
        target = "#workspaceModal .modal-body";
    }

    $(target).alpaca({
        "schema": schema,
    });

}





