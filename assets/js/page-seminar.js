/* ===================================================
viewport固定（375px以下は小さくさせない）
=====================================================*/
// (function () {
//   const viewport = document.querySelector('meta[name="viewport"]');

//   function switchViewport() {
//     const value = window.outerWidth > 375 ? "width=device-width,initial-scale=1" : "width=375";
//     if (viewport.getAttribute("content") !== value) {
//       viewport.setAttribute("content", value);
//     }
//   }
//   addEventListener("resize", switchViewport, false);
//   switchViewport();
// })();

/* ===================================================
スクロール監視（復活）
=====================================================*/
const intersectionObserver = new IntersectionObserver(function(entries){
  entries.forEach(function(entry) {
    if(entry.isIntersecting){
      entry.target.classList.add("is-in-view");
    } else {
      //entry.target.classList.remove("is-in-view");
    }
  });
}, {
  root: null,
  rootMargin: "0px 0px -20% 0px",
  threshold: 0
});

const inViewItems = document.querySelectorAll(".js-in-view");
inViewItems.forEach(function(inViewItem) {
  intersectionObserver.observe(inViewItem);
});
/* ===================================================
スムーススクロール（ノーマル）＋ 初期化維持
=====================================================*/
document.addEventListener('DOMContentLoaded', function() {
  // 初期化確認
  console.log('page-seminar.js initialized');

  // スムーススクロール（元のまま）
  const links = document.querySelectorAll('a[href^="#"]');
  links.forEach(item => {
    item.addEventListener("click", event => {
      event.preventDefault();
      const targetId = item.getAttribute("href");
      const target = document.querySelector(targetId);
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start"
        });
      }
    });
  });
});