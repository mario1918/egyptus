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

