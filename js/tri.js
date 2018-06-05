/**
 * Created by Imad on 13/12/2016.
 */
/*
$(document).ready(function () {
    $('#sortable tbody tr:odd').addClass('odd');
    $('#sortable tbody tr:even').addClass('even');
})
$(document).ready(function () {
    $('#sortable').each(function () {
        var $table = $(this);
        $('th',$table).each(function (column) {
            var $header = $(this);
            if($header.is('.sort-alpha')){
                $header.addClass('clickable').hover(function () {
                    $header.addClass('hover')
                },function () {
                    $header.removeClass('hover');
                }).click(function(){
                    var rows = $table.find('tbody > tr').get();
                    rows.sort(function(a,b){
                        var keyA = $(a).children('td').eq(column).text().toUpperCase();
                        var keyB = $(b).children('td').eq(column).text().toUpperCase();
                        if(keyA < keyB) return -1;
                        if(keyA > keyB) return 1;
                        return 0;
                    });
                                $.each(rows,function (index,row) {
                        $table.children('tbody').append(row);
                    });
                });
            }
        });
    });
});
*/
// Pagination :
/*$(function() {                       //run when the DOM is ready
    $(".clickable").click(function() {  //use a class, since your ID gets mangled
        $(this).addClass("active");      //add the class to the clicked element
    });
});*/

$(document).ready(function () {
    $('table.paginated').each(function(){
        var currentPage = 0;
        var numPerPage = 5;
        var $table = $(this);
        $table.find('tbody tr').hide().slice(currentPage * numPerPage,(currentPage + 1) * numPerPage).show();

        $table.bind('repaginate',function(){
            $table.find('tbody tr').hide().slice(currentPage * numPerPage,(currentPage + 1) * numPerPage).show();
        });

        var numRows = $table.find('tbody tr').length;
        var numPages = Math.ceil(numRows / numPerPage);
        var $nav = $('<nav aria-label="Page navigation" class="center-block"></nav>');
        var $pager = $('<ul class="pager pagination"></ul>');
        var $lis = $('<li></li>');
        for (var page = 0; page < numPages; page++){
            $('<a class="page-number"></a>').text(page+1+' ').bind('click',{newPage: page},function (event) {
                currentPage = event.data['newPage'];
                $table.trigger('repaginate');
                $(this).addClass('active')
                    .siblings().removeClass('active');
            }).appendTo($lis).addClass('clickable');
        }
        $lis.appendTo($pager);
        $pager.appendTo($nav);
        $pager.find('span.page-number:first').addClass('active');
        $nav.insertAfter($table);

    });
});