(function( $ ) {

  $.fn.carousel = function(options,controls) {
    var defaultOptions = {
      transitionSpeed : 1000,
      sliderHighlighClass : "selected",
      sliderClass : "slider"
    } 
    this.each(function() {
      var carousel = this;
      var isSliding = false;
      var $this = $(this);
      var slideContainer = $this.children().first();
      var slides = slideContainer.children();
      var currentSlide = 0;
      var transitionEndEvents = "transitionend webkitTransitionEnd oTransitionEnd MSTransitionEnd";

      slides.first().css("left","0%");

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
          carousel.slideTo(counter);
        });
        innerSlideCounter++;
      });

      var hideArrows = function()
      {
        controls.left.show();
        controls.right.show();

        if(currentSlide == 0)
        {
          controls.left.hide();
        }
        if(currentSlide == slides.length - 1)
        {
          
          controls.right.hide();
        }
      }

      carousel.slideLeft = function(noAsignSliding) {
        if(isSliding) return;
        if(currentSlide == slides.length - 1) return false;
        if(!noAsignSliding)isSliding = true;
        $(slides[currentSlide]).css("left","-100%");
        currentSlide++;
        $(slides[currentSlide]).css("left","0%");
        controls.sliders.highlight(currentSlide);
        hideArrows();
        return true;
      }

      carousel.slideRight = function(noAsignSliding) {
        if(isSliding) return;
        if(currentSlide == 0) return false;
        if(!noAsignSliding)isSliding = true;
        $(slides[currentSlide]).css("left","100%");
        currentSlide--;
        $(slides[currentSlide]).css("left","0%");
        controls.sliders.highlight(currentSlide);
        hideArrows();
        return true;
      }

      $(slideContainer).bind(transitionEndEvents,function() {
        isSliding = false;
      });

      carousel.slideTo = function(slide) {
        if(isSliding)return;
        if(slide < 0) return;
        if(slide > slides.length - 1) return;
        var slideCount = currentSlide - slide;
        var slider;
        if(slideCount < 0) slider = function(){
          var result = carousel.slideLeft(true);
          slideCount++;
          return result;
        }
        else slider = function() {
          var result = carousel.slideRight(true);
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
        carousel.slideLeft();
      });

      controls.left.click(function(){
        carousel.slideRight();
      });


      hideArrows();

    });

    return this;
  };
})( jQuery );