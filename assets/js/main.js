// ========== Swiper 初期化 ==========
// 複数箇所対応：.js-swiper が存在する分だけ全て初期化
document.addEventListener('DOMContentLoaded', function () {

  const genericSwipers = document.querySelectorAll('.js-swiper');
  genericSwipers.forEach(el => {
    new Swiper(el, {
      loop: true,
      autoplay: {
        delay: 3000,
        disableOnInteraction: false,
      },
      slidesPerView: 1,
      speed: 600,
      breakpoints: {
        768: {
          slidesPerView: 3,
        },
      },
    });
  });

});
