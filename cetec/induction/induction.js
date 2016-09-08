$(document).ready(function() {
    $('a[href^="#"]').on('click', function(e) {
        e.preventDefault();
        
        var target = this.hash;
        
        var $target = $(target);
        
        $('html, body').animate({
            'scrollTop':$target.offset().top
        }, 1000, "swing");
    });
    
});

$(function() {
    $(window).scroll(function(){
        if($(this).scrollTop() !=0) {
            $('#top').fadeIn();
            } else {
            $('#top').fadeOut();
        }
    });
    
    $('#top').click(function() {
        $('body, html').animate({
            scrollTop:0
        }, 500);
    });
    
});