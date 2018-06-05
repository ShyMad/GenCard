$(document).ready(function(){
    $('#recherche').click(function() {
        var mot = $('#ref').val();
        if(mot !== '') {
            $.get('js/carte.php?key='+mot, function(returnData) {
                if (!returnData) {
                    $('#affichs').html('<p style="padding:5px;">Try again</p>');
                } else {
                    $('#affichs').html(returnData);
                }
            });
        }else{
            $('#affichs').html(' <span class="fa-border center-block text-center">Zone Carte Informations!</span>');
        }

    });

});