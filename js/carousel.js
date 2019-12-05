const setCarouselParams = interval => {
  $(".carousel.carousel-jumbotron").carousel({
    interval: 2000
  });

  $(".carousel.carousel-blog").carousel("pause", {
    interval
  });
};
