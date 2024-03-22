//page index
$(document).ready(function() {
  $("[href]").each(function() {
    if (this.href == window.location.href) {
      $(this).addClass("active");
      }
  });
});


//scroll header
$(window).scroll(function() {    
  var scroll = $(window).scrollTop();

  if (scroll >= 100) {
      $("header").addClass("scrolled");
  } else {
      $("header").removeClass("scrolled");
  }
});

//services clickable on footer
$('.footer-nav .dropdown-toggle').removeAttr('data-bs-toggle');
$('.footer-nav .dropdown-toggle').addClass('disabled');