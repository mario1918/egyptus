/*start navbar*/
function test(){
    var tabsNewAnim = $('#navbarSupportedContent'),
        selectorNewAnim = $('#navbarSupportedContent').find('li').length,
        activeItemNewAnim = tabsNewAnim.find('.active'),
        activeWidthNewAnimHeight = activeItemNewAnim.innerHeight(),
        activeWidthNewAnimWidth = activeItemNewAnim.innerWidth(),
        itemPosNewAnimTop = activeItemNewAnim.position(),
        itemPosNewAnimLeft = activeItemNewAnim.position();
    $(".hori-selector").css({
      "top":itemPosNewAnimTop.top + "px", 
      "left":itemPosNewAnimLeft.left + "px",
      "height": activeWidthNewAnimHeight + "px",
      "width": activeWidthNewAnimWidth + "px"
    });
    $("#navbarSupportedContent").on("click","li",function(e){
      $('#navbarSupportedContent ul li').removeClass("active");
      $(this).addClass('active');
      var activeWidthNewAnimHeight = $(this).innerHeight(),
          activeWidthNewAnimWidth = $(this).innerWidth(),
          itemPosNewAnimTop = $(this).position(),
          itemPosNewAnimLeft = $(this).position();
      $(".hori-selector").css({
        "top":itemPosNewAnimTop.top + "px", 
        "left":itemPosNewAnimLeft.left + "px",
        "height": activeWidthNewAnimHeight + "px",
        "width": activeWidthNewAnimWidth + "px"
      });
    });
  }
  $(document).ready(function(){
    setTimeout(function(){ test(); });
  });
  $(window).on('resize', function(){
    setTimeout(function(){ test(); }, 500);
  });
  $(".navbar-toggler").click(function(){
    setTimeout(function(){ test(); });
  });
  /*end navbar*/


  /*start silder*/
$(function () {
    'use strict'
    //Adjust Slider Height
    var winH   = $(window).height(),
        upperH = $('.second-nav').innerHeight();
        $('.slider, .carousel-item').height(winH - ( upperH ));   
});

$('.carousel').carousel({
    interval: 2000
  })
/*end silder*/



$('#demo-booking-timegrid').mobiscroll().datepicker({
  controls: ['calendar', 'timegrid'],
  min: '2021-09-10T00:00',
  max: '2022-03-10T00:00',
  minTime: '08:00',
  maxTime: '19:59',
  stepMinute: 60,
  // example for today's labels and invalids
  labels: [{
      start: '2021-09-11',
      textColor: '#e1528f',
      title: '1 SPOTS'
  }],
  invalid: [{
      start: '2021-09-10T08:00',
      end: '2021-09-10T13:00'
  }, {
      start: '2021-09-10T15:00',
      end: '2021-09-10T17:00'
  }, {
      start: '2021-09-10T19:00',
      end: '2021-09-10T20:00'
  }]
});


