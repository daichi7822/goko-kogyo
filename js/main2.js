var slider1 = new Swiper('.slider1', {
  loop: true,
  effect: "fade",

  autoplay: {
    delay: 5000,
  },

  pagination: {
    el: '.swiper-pagination',
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

  scrollbar: {
    el: '.swiper-scrollbar',
  },
});
