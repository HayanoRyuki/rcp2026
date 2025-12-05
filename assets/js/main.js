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

  const header =
    document.querySelector('.site-header') ||
    document.querySelector('.lp-header');

  const main = document.querySelector('.site-main');

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

const REGISTER_TYPES = [
  "new_user",
  "trial",
];

const FREE_TYPES = [
  "user",
  "proposal",
];

const PARTNER_RESOURCE_TYPES = [
  "partner_guide",
];

const PARTNER_CONTACT_TYPES = [
  "agency",
];

function resolveThanksUrl(contactType) {
  if (REGISTER_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/register-thanks/";
  }
  if (PARTNER_RESOURCE_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/partner-resource-thanks/";
  }
  if (PARTNER_CONTACT_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/partner-contact-thanks/";
  }
  if (RESOURCE_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/resource-thanks/";
  }
  if (FREE_TYPES.includes(contactType)) {
    return "https://staging.receptionist.jp/thanks/";
  }
  return "https://staging.receptionist.jp/thanks/";
}


// =========================================================
//  RECEPTIONIST 共通フォーム送信（WP 側）
// =========================================================
document.addEventListener('DOMContentLoaded', function () {

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

      // ★ テスト：trial は API 呼ばずに即 thanks
      if (contactType === "trial") {
        window.location.href = "https://staging.receptionist.jp/register-thanks/";
        return;
      }

      const apiType = form.dataset.api;
      let endpoint = ENDPOINT;
      let body = null;

      if (apiType === "staging-auth") {
        endpoint = "https://staging.api.receptionist.jp/api/auth";
        body = new URLSearchParams();

        body.append("email", fd.get("email"));
        body.append("password", fd.get("password"));
        body.append("contact_type", contactType);

        // 暫定追加
        body.append("company_name", "Temporary Test Company");
        body.append("contact_person_name", "Temporary User");
        body.append("phone", "000-0000-0000");
        body.append("agree", "1");

        body.append("utm_source", fd.get("utm_source") || "");
        body.append("utm_medium", fd.get("utm_medium") || "");
        body.append("utm_campaign", fd.get("utm_campaign") || "");
        body.append("utm_term", fd.get("utm_term") || "");
        body.append("utm_content", fd.get("utm_content") || "");

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
