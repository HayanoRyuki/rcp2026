/* ===================================================
viewport固定（375px以下は小さくさせない）
=====================================================*/
(function () {
  const viewport = document.querySelector('meta[name="viewport"]');

  function switchViewport() {
    const value = window.outerWidth > 375 ? "width=device-width,initial-scale=1" : "width=375";
    if (viewport.getAttribute("content") !== value) {
      viewport.setAttribute("content", value);
    }
  }
  addEventListener("resize", switchViewport, false);
  switchViewport();
})();

/* ===================================================
スクロール監視
=====================================================*/
const intersectionObserver = new IntersectionObserver(function(entries){
  entries.forEach(function(entry) {
    if(entry.isIntersecting){
      entry.target.classList.add("is-in-view");
    } else {
      entry.target.classList.remove("is-in-view");
    }
  });
});

const inViewItems = document.querySelectorAll(".js-in-view");
inViewItems.forEach(function(inViewItem) {
  intersectionObserver.observe(inViewItem);
});


/* ===================================================
スムーススクロール（ノーマル）
=====================================================*/
document.addEventListener('DOMContentLoaded', function() {
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

/* ===================================================
FAQアコーディオン
=====================================================*/
// アニメーションの時間とイージング
const animTiming = {
	duration: 300,
	easing: "ease-in-out",
};

// アコーディオンを閉じるときのキーフレーム
const closingAnimation = (answer) => [
	{
		height: answer.offsetHeight + "px",
		opacity: 1,
	},
	{
		height: 0,
		opacity: 0,
	},
];

// アコーディオンを開くときのキーフレーム
const openingAnimation = (answer) => [
	{
		height: 0,
		opacity: 0,
 },
 {
		height: answer.offsetHeight + "px",
		opacity: 1,
	},
];


document.addEventListener("DOMContentLoaded", () => {
	document.querySelectorAll(".js-details").forEach(function (el) {
			const summary = el.querySelector(".js-summary");
			const answer = el.querySelector(".js-content");
			summary.addEventListener("click", (event) => {
				// デフォルトの挙動を無効化
				event.preventDefault();
				// detailsのopen属性を判定
				if (el.getAttribute("open") !== null) {
					// アコーディオンを閉じるときの処理
					const closingAnim = answer.animate(closingAnimation(answer), animTiming);
					closingAnim.onfinish = () => {
						// アニメーションの完了後にopen属性を取り除く
						el.removeAttribute("open");
					};
				} else {
					// open属性を付与
					el.setAttribute("open", "true");
					// アコーディオンを開くときの処理
					const openingAnim = answer.animate(openingAnimation(answer), animTiming);
				}
			});
		});
	});
