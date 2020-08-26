$(document).ready(function(){

    function scrollToTop() {
        $("#scroll").click(function() {
            $('html,body').animate({scrollTop: 0}, 'slow');
        });
        $(window).scroll(function(){
            if($(window).scrollTop()<500){
                $("#scroll").fadeOut();
            } else{
                $("#scroll").fadeIn();
            }
        });
    }
    scrollToTop("#scroll");
    
})