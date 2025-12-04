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

  // ▼ 修正ポイント：トップページの site-header と LP の lp-header の両方に対応
const header =
  document.querySelector('.site-header') ||
  document.querySelector('.lp-header');

const main = document.querySelector('.site-main');

// LP 固定ページ（page-ads.php）だけ無効化
if (header && main && !document.body.classList.contains('page-template-page-ads')) {
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
//  サンクスページ分岐ロジック
// =========================================================
const RESOURCE_TYPES = [
  "ms365",
  "security",
  "backoffice-dx",
  "installation_case",
  "document_gate",
  "document_price",
  "document_factory",
  "guide-3min",
  "reception_lp",
];

// ★ 新規登録系（REGISTER TYPES）
const REGISTER_TYPES = [
  "new_user", // /new-register/
];

// ★ 無料問い合わせ系（FREE TYPES）
const FREE_TYPES = [
  "user",
  "proposal",
  // "agency" はパートナー問い合わせ専用 thanks に飛ばすため除外
];

// ★ パートナー資料DL（resource とは別の thanks）
const PARTNER_RESOURCE_TYPES = [
  "partner_guide",
];

// ★ パートナー問い合わせ（agency）
const PARTNER_CONTACT_TYPES = [
  "agency",
];

function resolveThanksUrl(contactType) {

  // ★ 1) 新規登録フォーム
  if (REGISTER_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/register-thanks/";
  }

  // ★ 2) パートナー資料DL専用
  if (PARTNER_RESOURCE_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/partner-resource-thanks/";
  }

  // ★ 3) パートナー問い合わせ専用
  if (PARTNER_CONTACT_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/partner-contact-thanks/";
  }

  // ★ 4) 資料請求系（一般）
  if (RESOURCE_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/resource-thanks/";
  }

  // ★ 5) 無料問い合わせ系（一般）
  if (FREE_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/thanks/";
  }

  // ★ 6) デフォルト
  return "https://staging.receptionist.jp/thanks/";
}



// =========================================================
//  RECEPTIONIST 共通フォーム送信（WP 側）
// =========================================================
document.addEventListener('DOMContentLoaded', function () {

  // ★ API Gateway (staging)
  const ENDPOINT = "https://t8k8whvjnj.execute-api.ap-northeast-1.amazonaws.com/test/";


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
      const fd = new FormData(form);
      const contactType = fd.get("contact_type") || "";
      if (!contactType) throw new Error("contact_type が不足しています。");

      const apiType = form.dataset.api; // data-api="staging-auth"

      let endpoint = ENDPOINT;
      let body = null;

      if (apiType === "staging-auth") {
        endpoint = "https://staging.api.receptionist.jp/api/auth";
        body = new URLSearchParams();
        body.append("email", fd.get("email"));
        body.append("password", fd.get("password"));
      } else {
        const params = new URLSearchParams();
        fd.forEach((value, key) => {
          params.append(`contact[${key}]`, value);
        });
        body = params;
      }

      const res = await fetch(endpoint, {
        method: "POST",
        body: body,
      });

      if (!res.ok) throw new Error("API request failed");

      let result = {};
      try {
        result = await res.json();
      } catch (_) {}

      // --- ★ ここでサンクスURLを決定 ★ ---
      const thanksUrl = resolveThanksUrl(contactType);

      if (result && result.redirect_url) {
        window.location.href = result.redirect_url;
      } else {
        window.location.href = thanksUrl;
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
