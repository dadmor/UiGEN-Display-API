/* UiGEN API TREE */
var first_ul = false;
var last_key = '';
var JSONpath = [];



function UiGEN_tree(jsonObj) {

    if(first_ul == false){
        var cont = jQuery('<ul class="uigen_tree"></ul>');
        first_ul = true;
    }else{
        var cont = jQuery('<ul class="sub_dir"></ul>');
    }

    jQuery.each(jsonObj, function (key, value) {
        
        var el = jQuery('<li/>');

        JSONpath.push(key);


        
        if (typeof(jsonObj[key]) == "object") {

            el.attr('class', 'folder open');
            el.append('<span class="glyphicon glyphicon-folder-open"></span>['+ _.findLastKey(jsonObj[key]) +'] '+key+' '+ _.size(jsonObj[key]) +'<button class="btn btn-xs btn-default">Form edit</button> ');
            // el.append('<span class="glyphicon glyphicon-folder-open"></span>LAST:'+jsonObj[key]+' ');
            el.append(UiGEN_tree(value));

          //  alert('1');
          //  last_key = _.findLastKey(jsonObj[key]);
           //alert(_.findLast(jsonObj[key]));

        } else {

            last_key = _.findLastKey(jsonObj[key]);

           // alert('2');
            //el.attr('class','tree_value');
            el.text(key);
            var jsonPathString = JSONpath.join();
            el.prepend('<span class="glyphicon glyphicon-file"></span>['+last_key+'] ');
            el.append('<ul style="position:relative"><li class="tree_value" data-JSONpath="'+jsonPathString+'"><span class="glyphicon glyphicon-link"></span><input style="border:1px solid #ccc; width:200px; padding:0px 5px; border-radius: 3px;" type="text" value="'+value+'"> <button class="btn btn-xs btn-default update_value">Value edit</button> </li></ul>');

            //el.append('<ul style="position:relative"><li class="tree_value">>>>'+_.countBy(jsonObj)+'</li></ul>');
            
/*            if(last_key == key){
                  alert(key);
                el.prepend('<span class="glyphicon glyphicon-file"></span>');
            }*/

            //JSONpath = [];
        }

        //JSONpath.push(el.text(key));
        
        cont.append(el);
    });

    return cont;
}

jQuery(document).on('click', ".folder span", function() { 
    if(jQuery(this).hasClass('glyphicon-folder-open')){
        jQuery(this).addClass('glyphicon-folder-close');
        jQuery(this).removeClass('glyphicon-folder-open');
        jQuery(this).parent('li').children('ul').css('display','none');
    }else{
        jQuery(this).removeClass('glyphicon-folder-close');
        jQuery(this).addClass('glyphicon-folder-open');
        jQuery(this).parent('li').children('ul').css('display','block');
    }    
})

jQuery(document).on('click', ".update_value", function() { 
    alert(jQuery(this).prev().val());
})