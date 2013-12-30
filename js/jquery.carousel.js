(function( $ ) {

  $.fn.carousel = function(options,controls) {
    var defaultOptions = {
      transitionSpeed : 1000,
      sliderHighlighClass : "selected",
      sliderClass : "slider"
    } 
    this.each(function() {
      var isSliding = false;
      var $this = $(this);
      var slideContainer = $this.children().first();
      var slides = slideContainer.children();
      var currentSlide = 0;
      var transitionEndEvents = "transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd";

      /*slides.slice(1).each(function(){
        $(this).css("left","100%");
      });*/

      slides.first().css("left","0%");

      slides.each(function(){
        $(this).css("transition","all 1s");
        $(this).css("transition-timing-function","linear");
      });

      slides.each(function(){
        $(this).stop();
      })

      var innerSlideCounter = 0;
      controls.sliders.currentlyMarked = 0;
      $(controls.sliders[0]).addClass(defaultOptions.sliderHighlighClass);
      controls.sliders.highlight = function(slide){
        $(controls.sliders[controls.sliders.currentlyMarked]).removeClass(defaultOptions.sliderHighlighClass);
        $(controls.sliders[slide]).addClass(defaultOptions.sliderHighlighClass);
        controls.sliders.currentlyMarked = slide;
      }
      controls.sliders.each(function(){
        var counter = innerSlideCounter;
        $(this).click(function(){
          $this.slideTo(counter);
        });
        innerSlideCounter++;
      });

      $this.slideLeft = function() {
        if(currentSlide == slides.length - 1) return false;
        isSliding = true;
        $(slides[currentSlide]).css("left","-100%");
        currentSlide++;
        $(slides[currentSlide]).css("left","0%");
        controls.sliders.highlight(currentSlide);
        return true;
      }

      $this.slideRight = function() {
        if(currentSlide == 0) return false;
        $(slides[currentSlide]).css("left","100%");
        currentSlide--;
        $(slides[currentSlide]).css("left","0%");
        controls.sliders.highlight(currentSlide);
        return true;
      }

      $this.slideTo = function(slide) {
        if(slide < 0) return;
        if(slide > slides.length - 1) return;
        var slideCount = currentSlide - slide;
        var slider;
        if(slideCount < 0) slider = function(){
          var result = $this.slideLeft();
          slideCount++;
          return result;
        }
        else slider = function() {
          var result = $this.slideRight();
          slideCount--;
          return result;
        }
        var slideFunction = function(){
          /*var a = Math.min(slide,currentSlide);
          var b = Math.max(slide,currentSlide);
          for(var i = a ; i < b;i++)
          {
            slider();
          }*/
          
          $(this).unbind(transitionEndEvents);
          if(slideCount != 0)
          {
            if(slider())
            {
              $(slides[currentSlide]).bind(transitionEndEvents, slideFunction);
            }
          }
        }
        slideFunction();
      }

      controls.right.click(function(){
        $this.slideLeft();
      });

      controls.left.click(function(){
        $this.slideRight();
      });

    });

    return this;
  };
})( jQuery );