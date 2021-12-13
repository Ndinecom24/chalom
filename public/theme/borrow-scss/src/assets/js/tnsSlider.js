(function () {


  // slider first

  if ($('.sliderFirst').length) {

    var slider = tns({
      container: '.sliderFirst',
      loop: true,
      startIndex: 1,
      items: 1,
      nav: false,
      autoplay: true,
      swipeAngle: false,
      speed: 400,
      autoplayButtonOutput: false,
      mouseDrag: true,
      lazyload: true,
      gutter: 20,
      controlsContainer: "#sliderFirstControls"

    });

  }




  // slider second


  if ($('.sliderSecond').length) {

    var slider = tns({
      container: '.sliderSecond',
      loop: true,
      startIndex: 1,
      items: 1,
      nav: false,
      autoplay: true,
      swipeAngle: false,
      speed: 400,
      autoplayButtonOutput: false,
      mouseDrag: true,
      lazyload: true,
      gutter: 20,
      controlsContainer: "#sliderSecondControls",
      responsive: {
        768: {
          items: 2
        },

        990: {
          items: 3
        }
      }

    });

  }






})();