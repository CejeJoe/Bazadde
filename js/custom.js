
  (function ($) {
    AOS.init();
  "use strict";

    // COUNTER NUMBERS
    jQuery('.counter-thumb').appear(function() {
      jQuery('.counter-number').countTo();
    });
    
    // CUSTOM LINK
    $('.smoothscroll').click(function(){
    var el = $(this).attr('href');
    var elWrapped = $(el);
    var header_height = $('.navbar').height();

    scrollToDiv(elWrapped,header_height);
    return false;

    document.addEventListener("DOMContentLoaded", function() {
      // Get the "About" main link element
      var aboutMainLink = document.querySelector('.nav-item.dropdown .nav-link');

      // Add a click event listener to the "About" main link
      aboutMainLink.addEventListener('click', function(event) {
          // Navigate to the "about.html" page
          window.location.href = aboutMainLink.getAttribute('href');
      });
  });

    function scrollToDiv(element,navheight){
      var offset = element.offset();
      var offsetTop = offset.top;
      var totalScroll = offsetTop-navheight;

      $('body,html').animate({
      scrollTop: totalScroll
      }, 300);
    }
});
    
  })(window.jQuery);


