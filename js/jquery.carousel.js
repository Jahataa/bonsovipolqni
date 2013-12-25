(function( $ ) {

  $.fn.carousel = function(options,controls) {
    var defaultOptions = {
      transitionSpeed : 1000
    } 
    this.each(function() {
      var $this = $(this);
      var slideContainer = $this.children().first();
      var slides = slideContainer.children();
      var currentSlide = 0;

      slides.each(function(){
        $(this).css("left","100%");
      });

      slides.first().css("left","0%");

      slides.each(function(){
        $(this).css("transition","all 1s");
      });

      slides.slideLeft = function() {
        if(currentSlide == slides.length - 1) return;
        $(slides[currentSlide]).css("left","-100%");
        currentSlide++;
        $(slides[currentSlide]).css("left","0%");
      }

      slides.slideRight = function() {
        if(currentSlide == 0) return;
        $(slides[currentSlide]).css("left","100%");
        currentSlide--;
        $(slides[currentSlide]).css("left","0%");
      }

      controls.right.click(function(){
        slides.slideLeft();
      });

      controls.left.click(function(){
        slides.slideRight();
      });

    });

    return this;
  };
})( jQuery );