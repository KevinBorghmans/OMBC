//Show gallery content ------------------------------------------------
$('.galleryItem').mouseover(function() {
    $('#' + this.id).children().stop().fadeIn( "slow", function() {
    });
});
$('.galleryItem').mouseleave(function() {
    $('#' + this.id).children().stop().fadeOut( "slow", function() {
    });
});





//Advertise slideshow -------------------------------------------------
$("#slideshow > div:gt(0)").hide();
   
setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(500)
    .next()
    .fadeIn(500)
    .end()
    .appendTo('#slideshow');
},  5000);




//Hamburger menu -------------------------------------------------------
$("#hamburgerIcon").click(function() {
    $('#mobileMenu').stop().fadeIn( "slow", function() {
        $('body').css('overflow','hidden');
    });
});

$("#hamburgerIconHide").click(function() {
    $('#mobileMenu').stop().fadeOut( "slow", function() {
        $('body').css('overflow','scroll');
    });
});

//Hide responsive menu if screen is bigger than...
$(window).resize(function() { 
  if ($(window).width() > 960) {
    $('#mobileMenu').fadeOut( "fast", function() {
        $('body').css('overflow','scroll');
    });
  }
});
