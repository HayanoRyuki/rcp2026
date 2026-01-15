/* ===================================================
viewport固定（375px以下は小さくさせない）
=====================================================*/
(function () {
  const viewport = document.querySelector('meta[name="viewport"]');

  function switchViewport() {
    if (!viewport) return;
    const value = window.outerWidth > 375
      ? "width=device-width,initial-scale=1"
      : "width=375";
    if (viewport.getAttribute("content") !== value) {
      viewport.setAttribute("content", value);
    }
  }
  addEventListener("resize", switchViewport, false);
  switchViewport();
})();

/* ===================================================
DOM構築後に処理をまとめる（★重要）
=====================================================*/
document.addEventListener('DOMContentLoaded', function () {

  /* ===================================================
  スクロール監視（in-view）
  =====================================================*/
  const intersectionObserver = new IntersectionObserver(function(entries){
    entries.forEach(function(entry) {
      if (entry.isIntersecting) {
        entry.target.classList.add("is-in-view");
      }
    });
  }, {
    root: null,
    rootMargin: "0px 0px -20% 0px",
    threshold: 0
  });

  document.querySelectorAll(".js-in-view").forEach(function(el) {
    intersectionObserver.observe(el);
  });

  /* ===================================================
  スムーススクロール
  =====================================================*/
  document.querySelectorAll('a[href^="#"]').forEach(item => {
    item.addEventListener("click", event => {
      event.preventDefault();
      const target = document.querySelector(item.getAttribute("href"));
      if (target) {
        target.scrollIntoView({
          behavior: "smooth",
          block: "start"
        });
      }
    });
  });

});
