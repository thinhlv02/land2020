$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        loop: true,
        autoplayHoverPause: true,
        margin:30,
        dots: true,
    });
    $(".website-basic").click(function () {
        $(".nav-modal").removeClass('nav-modal-active');
        $(".website-basic").addClass('nav-modal-active');
        $("#website-basic").show();
        $("#website-process").hide();

    });
    $(".website-process").click(function () {
        $(".nav-modal").removeClass('nav-modal-active');
        $(".website-process").addClass('nav-modal-active');
        $("#website-basic").hide();
        $("#website-process").show();
    });

    $(".li-home").click(function () {
        $('html, body').animate({ scrollTop: $('.first-section').offset().top }, 'slow');
    });
    $(".li-intro").click(function () {
        $('html, body').animate({ scrollTop: $('.intro').offset().top }, 'slow');
    });
    $(".li-product").click(function () {
        $('html, body').animate({ scrollTop: $('.product').offset().top }, 'slow');
    });
    $(".li-recruitment").click(function () {
        $('html, body').animate({ scrollTop: $('.recruitment').offset().top }, 'slow');
    });
    $(".li-contact").click(function () {
        $('html, body').animate({ scrollTop: $('.contact-footer').offset().top }, 'slow');
    });

    var year = 0;
    var employer = 0;
    var customer = 0;
    var increase = null;

    var scrollTop = $(window).scrollTop();
    var yearToTop = $('.item-count-year').offset().top;
    var customerToTop = $('.item-count-customer').offset().top;
    var wHeight = $( window ).height();
    if(scrollTop >= yearToTop-wHeight && scrollTop <= customerToTop){
        increase = setInterval(function () {
            if(year < 5) year++;
            if(employer <= 29) employer += 2;
            if(customer < 1999) customer += 99;
            if(year >= 5 && employer >= 30 && customer >= 2000){
                customer = 2000;
                clearInterval(increase);
            }
            $('.count-year').text(year + "+");
            $('.count-employer').text(employer + "+");
            $('.count-customer').text(customer + "+");
        }, 100);
    }

    var introToTop = $('.intro').offset().top;
    $(window).scroll(function() {
       scrollTop = $(this).scrollTop();
       if(scrollTop >= introToTop){
            $('.sub-nav').show();
       }
       else{
           $('.sub-nav').hide();
       }
        if(scrollTop >= yearToTop-wHeight && scrollTop <= customerToTop && customer != 2000 && !increase){
            console.log('ifffffffff');
            increase = setInterval(function () {
                if(year < 5) year++;
                if(employer <= 29) employer += 2;
                if(customer < 1999) customer += 99;
                if(year >= 5 && employer >= 30 && customer >= 2000){
                    customer = 2000;
                    clearInterval(increase);
                }
                $('.count-year').text(year + "+");
                $('.count-employer').text(employer + "+");
                $('.count-customer').text(customer + "+");
            }, 100);
        }
    });
});

