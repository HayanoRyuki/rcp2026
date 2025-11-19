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

  const ENDPOINT = "https://staging.api.receptionist.jp/api/contacts";

  function serializeForm(form) {
    const fd = new FormData(form);
    const data = {};
    fd.forEach((value, key) => {
      if (data[key]) {
        if (!Array.isArray(data[key])) data[key] = [data[key]];
        data[key].push(value);
      } else {
        data[key] = value;
      }
    });
    return data;
  }

  async function postToLambda(payload) {
    const res = await fetch(ENDPOINT, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
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
      const payload = serializeForm(form);
      if (!payload.contact_type) throw new Error("contact_type が不足しています。");

      await postToLambda(payload);

      window.location.href = "https://staging.receptionist.jp/thanks/";
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
