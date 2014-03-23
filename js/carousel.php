<html>
  <head>
    <script type="text/javascript" src="jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="jquery.carousel.js"></script>
    <style>
      #carousel
      {
        width: 100%;
        height: 250px;
        overflow: hidden;
        position: relative;
      }
      .slide
      {
        position: absolute;
        width: 100%;
        height: 250px;
        background: red;
        text-align: center;
      }
      #leftArrow
      {
        position: absolute;
        left:15px;
        top:70%;
        border-top:5px solid transparent;
        border-bottom: 5px solid transparent;
        border-right: 25px solid white;
        transition:all 0.5s;
      }
      #leftArrow:hover
      {
        border-right: 25px solid #a0a0a0;
      }
      #leftArrow.disabled
      {
        border-right: 25px solid gray;
      }
      #rightArrow
      {
        position: absolute;
        right:15px;
        top:70%;
        border-top:5px solid transparent;
        border-bottom: 5px solid transparent;
        border-left: 25px solid white;
      }
      #rightArrow:hover
      {
        border-left: 25px solid #a0a0a0;
      }
      #rightArrow.disabled
      {
        border-right: 15px solid gray;
      }
    </style>
  </head>
  <body>
    <h1>
      Carousel Jquery plugin test
    </h2>
    <div id="carousel">
      <div id="slides">
        <div class="slide">
          slide1
        </div>
        <div class="slide">
          slide2
        </div>
        <div class="slide">
          slide3
        </div>
      </div>

      <div id="leftArrow"></div>
      <div id="rightArrow"></div>
      <div class="slider">
      
      </div>
    </div>
    <script type="text/javascript">
      $(document).ready(function(){
        var left = $("#leftArrow");
        var right = $("#rightArrow");
        $("#carousel").carousel(0,{
          left:left,
          right:right
        });
      });
    </script>
  </body>
</html>