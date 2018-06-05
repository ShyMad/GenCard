// JavaScript Document
/*
$(document).ready(function(){
   $('#recherche').keyup(function() {
        var mot = $(this).val();
        if(mot !== '') {
            $.get('js/result.php?key='+mot, function(returnData) {
            if (!returnData) {
                 $('#error').html('Try again');
             } else {
                        $('#affichs').html(returnData);
             }
             });
         }

    });
 
});
    */

$(function(){
   $('#recherche').bind('keyup',function(){
       //console.log('hhhhh');
          var found = true;
          var src =   $(".me").attr("name");
          var val = $(this).val().toLowerCase();
     //  alert(src);
      // $('#affichs').hide();
            //if(val.length == 0) val = "#";

                $.get('js/result.php?key='+val+'&path='+src, function (returnData) {
                    if (!returnData) {
                        found = false;
                        $('#error').html('Try again');
                    } else {
                        found = true;
                        $('#affichs').html(returnData);

                    }
                });



   })
});