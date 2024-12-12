$(document).ready(function() {
    $('.select').niceSelect({
    });
    
});


$('.slick-home').slick({
  prevArrow: false,
  nextArrow: false,
  dots: false,
  slidesToShow: 1,
  slidesToScroll: 1,
});

$('.slick-destination').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  prevArrow: '<span class="prevArrow"><i class="ion ion-ios-arrow-back"></i></span>',
  nextArrow: '<span class="nextArrow"><i class="ion ion-ios-arrow-forward"></i></span>',

});

$('.slick-menu').slick({
  slidesToShow: 4,
  slidesToScroll: 1,
  prevArrow: '<span class="prevArrow"><i class="ion ion-ios-arrow-back"></i></span>',
  nextArrow: '<span class="nextArrow"><i class="ion ion-ios-arrow-forward"></i></span>',

});

$(function(){
    $('.form-group #date').datepicker({
        'format':'yy-mm-dd',
        'autoclose':true
    });
});

AOS.init({
	offset : 200,
	duration : 800,
	easing : 'ease-in-shine',
	delay : 500,
});

