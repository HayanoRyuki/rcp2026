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


// =========================================================
//  マーカーアニメーション
// =========================================================
document.addaddEventListener('DOMContentLoaded', function () {
  const markers = document.querySelectorAll('.case-marker');

  if (markers.length > 0) {
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
  }
});


// =========================================================
–  パートナーヘッダー用メニュー開閉処理
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
//  RECEPTIONIST 共通フォーム送信
// =========================================================
document.addEventListener('DOMContentLoaded', function () {

  const ENDPOINT = "https://api.receptionist.jp/api/contacts";

  /**
   * form → JSON
   */
  function serializeForm(form) {
    const fd = new FormData(form);
    const data = {};

    fd.forEach((value, key) => {
      if (Object.prototype.hasOwnProperty.call(data, key)) {
        if (!Array.isArray(data[key])) {
          data[key] = [data[key]];
        }
        data[key].push(value);
      } else {
        data[key] = value;
      }
    });

    return data;
  }

  /**
   * LambdaへPOST
   */
  async function postToLambda(payload) {
    const res = await fetch(ENDPOINT, {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(payload),
    });

    if (!res.ok) throw new Error("Lambda request failed");
    return await res.json();
  }

  /**
   * submit handler
   */
  async function handleFormSubmit(e) {
    e.preventDefault();

    const form = e.currentTarget;
    if (form.dataset.submitting === "true") return;
    form.dataset.submitting = "true";

    const submitBtn = form.querySelector("[type=submit]");
    const originalText = submitBtn ? submitBtn.textContent : "";

    if (submitBtn) {
      submitBtn.disabled = true;
      submitBtn.textContent = "送信中…";
    }

    try {
      const payload = serializeForm(form);

      if (!payload.contact_type) {
        throw new Error("contact_type が不足しています。");
      }

      const result = await postToLambda(payload);

      if (result && result.status === "success" && result.redirect_url) {
        window.location.href = result.redirect_url;
      } else {
        alert("送信は完了しましたが、遷移先が取得できませんでした。");
      }
    } catch (err) {
      console.error("フォーム送信エラー:", err);
      alert("送信に失敗しました。時間をおいて再度お試しください。");
    } finally {
      form.dataset.submitting = "false";
      if (submitBtn) {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
      }
    }
  }

  /**
   * bind all .js-rcp-contact-form
   */
  function bindRcpForms() {
    const forms = document.querySelectorAll("form.js-rcp-contact-form");
    if (!forms.length) return;

    forms.forEach((form) => {
      form.addEventListener("submit", handleFormSubmit);
    });
  }

  bindRcpForms();
});
