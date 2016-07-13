/*===================================
=            GLOBAL INIT            =
===================================*/
// makes sure the whole site is loaded
jQuery(window).load(function() {
        // will first fade out the loading animation
    jQuery(".status").fadeOut();
        // will fade out the whole DIV that covers the website.
    jQuery(".preloader").delay(1000).fadeOut("slow");
})
/*=============================================
=            Video backgroundVideo           =
=============================================*/
// $(document).ready(function() {
//     var videobackground = new $.backgroundVideo($('body'), {
//       'postion':'topXY',
//       'width':1920,
//       "path": "img/vidbg/",
//       "filename": "bg",
//       "types": ["mp4","ogg","webm"]
//     });

//   });
/* =================================
===  WOW ANIMATION             ====
=================================== */
wow = new WOW(
  {
  });
wow.init();

jQuery.localScroll();
/*=========================================
=            Create New Object            =
=========================================*/
    $(function () {

      // Slideshow 1
      $(".rslides").responsiveSlides({
        maxwidth: 960,
        minheight: 400,
        speed: 700,
        auto:false,
        pager: true,
        // nav: true,
        prevText: "",   // String: Text for the "previous" button
        // nextText: "Next Step" 
      });

     

    });



