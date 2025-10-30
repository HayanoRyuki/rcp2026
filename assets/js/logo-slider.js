document.addEventListener('DOMContentLoaded', function () {
  new Swiper('.logo-swiper', {
    loop: true,
    slidesPerView: 4,
    spaceBetween: 30,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    breakpoints: {
      1024: { slidesPerView: 4 },
      768:  { slidesPerView: 3 },
      480:  { slidesPerView: 2 },
      0:    { slidesPerView: 1 }
    }
  });
});
