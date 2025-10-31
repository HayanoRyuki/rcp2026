// =========================================================
//  共通スクリプト：Swiper初期化＋ヘッダー高さ調整
// =========================================================
document.addEventListener('DOMContentLoaded', function () {

  // ========== Swiper 初期化 ==========
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

  // ========== ヘッダー高さを自動取得して main padding-top を調整 ==========
  const header = document.querySelector('header');
  const main = document.querySelector('.site-main');

  if (header && main) {
    const adjustPadding = () => {
      const headerHeight = header.offsetHeight;
      main.style.paddingTop = `${headerHeight}px`;
    };

    // 初回実行
    adjustPadding();

    // リサイズ時に再計算（レスポンシブ対応）
    window.addEventListener('resize', adjustPadding);
  }

});

// ===== マーカーアニメーション =====
document.addEventListener('DOMContentLoaded', function () {
  const markers = document.querySelectorAll('.case-marker');

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add('is-visible');
          observer.unobserve(entry.target); // 一度きり発火
        }
      });
    },
    { threshold: 0.3 }
  );

  markers.forEach((el) => observer.observe(el));
});
