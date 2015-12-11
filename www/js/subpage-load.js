/**
 * Created by Branislav on 11.12.2015.
 */
(function(){
    'use strict';

    function switchActive(el) {
        var ul = $(el).parent().parent();
        var li = $(el).parent();

        $('li,a', ul).removeClass('active');
        $(li).addClass('active');
        $(el).addClass('active');
    }

    var loadedCache = {};

    $('.main-nav a').click(function(e){
        e.preventDefault();

        var url = $(this).attr('href');
        var el  = this;

        if( loadedCache[url] !== undefined ) {
            $('#about').html(loadedCache[url]);
            switchActive(el);
            return;
        }

        $.ajax({
            url: url,
            success: function(data) {
                loadedCache[url] = $(data).find('#about').html();
                $('#about').html(loadedCache[url]);
                switchActive(el);
            }
        });
    });


})();
