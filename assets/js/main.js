// =========================================================
//  共通スクリプト：Swiper初期化＋ヘッダー高さ調整
// =========================================================
document.addEventListener('DOMContentLoaded', function () {

  const genericSwipers = document.querySelectorAll('.js-swiper');
  genericSwipers.forEach(el => {
    new Swiper(el, {
      loop: true,
      autoplay: { delay: 3000, disableOnInteraction: false },
      slidesPerView: 1,
      speed: 600,
      breakpoints: { 768: { slidesPerView: 3 } }
    });
  });

  const header = document.querySelector('header');
  const main = document.querySelector('.site-main');

  if (header && main) {
    const adjustPadding = () => {
      main.style.paddingTop = `${header.offsetHeight}px`;
    };
    adjustPadding();
    window.addEventListener('resize', adjustPadding);
  }
});


// =========================================================
//  マーカーアニメーション
// =========================================================
document.addEventListener('DOMContentLoaded', function () {
  const markers = document.querySelectorAll('.case-marker');
  if (markers.length > 0) {
    const observer = new IntersectionObserver(
      (entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.3 }
    );
    markers.forEach(el => observer.observe(el));
  }
});


// =========================================================
//  パートナーヘッダー用メニュー開閉処理
// =========================================================
document.addEventListener('DOMContentLoaded', function () {
  const toggle = document.querySelector('.header-partner__menu-toggle');
  const nav = document.querySelector('.header-partner__nav');

  if (toggle && nav) {
    toggle.addEventListener('click', function () {
      toggle.classList.toggle('active');
      nav.classList.toggle('open');
    });
  }
});


// =========================================================
//  通常ヘッダー用メニュー開閉処理
// =========================================================
document.addEventListener('DOMContentLoaded', function () {
  const menuToggle = document.querySelector('.menu-toggle');
  const mainNav = document.querySelector('.main-nav');

  if (menuToggle && mainNav) {
    menuToggle.addEventListener('click', function () {
      menuToggle.classList.toggle('active');
      mainNav.classList.toggle('open');
      document.body.classList.toggle('nav-open');
    });
  }
});


// =========================================================
//  RECEPTIONIST 共通フォーム送信（WP 側）
// =========================================================
document.addEventListener('DOMContentLoaded', function () {

  // ★ API Gateway (staging)
  const ENDPOINT = "https://t8k8whvjnj.execute-api.ap-northeast-1.amazonaws.com/test/";

  // contact[foo]=bar 形式に変換
  function buildContactParams(form) {
    const fd = new FormData(form);
    const params = new URLSearchParams();

    fd.forEach((value, key) => {
      params.append(`contact[${key}]`, value);
    });

    const contactType = fd.get('contact_type') || "";
    return { params, contactType };
  }

  async function postToLambda(params) {
    const res = await fetch(ENDPOINT, {
      method: "POST",
      body: params, // URLSearchParams → application/x-www-form-urlencoded
    });
    if (!res.ok) throw new Error("Lambda request failed");
    return await res.json();
  }

  async function handleFormSubmit(e) {
  e.preventDefault();

  const form = e.currentTarget;
  if (form.dataset.submitting === "true") return;

  form.dataset.submitting = "true";

  const submitBtn = form.querySelector("[type=submit]");
  const originalText = submitBtn?.textContent || "";

  if (submitBtn) {
    submitBtn.disabled = true;
    submitBtn.textContent = "送信中…";
  }

  try {
    const { params, contactType } = buildContactParams(form);
    if (!contactType) throw new Error("contact_type が不足しています。");

    // ★★★ API 出し分け（無料トライアルだけ別APIに送る）★★★
    const apiType = form.dataset.api; // ← data-api="staging-auth"
    let endpoint = ENDPOINT;          // ← デフォルトは Lambda

    if (apiType === "staging-auth") {
      // 無料トライアルだけ auth API に直送
      endpoint = "https://staging.api.receptionist.jp/api/auth";
    }

    // ★ POST（Lambda or auth API）
    const res = await fetch(endpoint, {
      method: "POST",
      body: params,
    });

    if (!res.ok) throw new Error("API request failed");

    let result = {};
    try {
      result = await res.json();
    } catch (_) {}

    // redirect_url が返ってきたら優先
    if (result && result.redirect_url) {
      window.location.href = result.redirect_url;
    } else {
      window.location.href = "https://staging.receptionist.jp/thanks/";
    }
    return;

  } catch (err) {
    console.error("フォーム送信エラー:", err);
    window.location.href = "https://staging.receptionist.jp/thanks/";
    return;

  } finally {
    form.dataset.submitting = "false";
    if (submitBtn) {
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
    }
  }
}

  function bindRcpForms() {
    const forms = document.querySelectorAll("form.js-rcp-contact-form");
    forms.forEach((form) => {
      form.addEventListener("submit", handleFormSubmit);
    });
  }

  bindRcpForms();
});
