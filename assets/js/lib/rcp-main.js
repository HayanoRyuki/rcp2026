
document.addEventListener('DOMContentLoaded', function () {
  const body = document.body;

  // 共通ヘッダー開閉
  body.addEventListener('click', function (e) {
    const toggle = e.target.closest('.menu-toggle');
    const nav = document.querySelector('.main-nav');

    if (toggle && nav) {
      nav.classList.toggle('open');
      console.log('共通ヘッダー開閉');
    }
  });

  const adsToggle = document.querySelector('.ads-menu-toggle');
  const adsNav = document.querySelector('.ads-nav');

  if (adsToggle && adsNav) {
    adsToggle.addEventListener('click', () => {
      adsNav.classList.toggle('open');
      console.log('広告LPメニュー開閉');
    });
  }

  // ==== partner用ハンバーガー ====
  const partnerToggles = document.querySelectorAll('.partner-menu-toggle');
  partnerToggles.forEach(btn => {
    const nav = document.querySelector('.main-nav'); // HTML上は .main-nav
    if (!nav) return;

    btn.addEventListener('click', () => {
      nav.classList.toggle('open');
      btn.classList.toggle('active'); // ハンバーガーのアニメーション用
      console.log('パートナーメニュー開閉');
    });
  });
  // ==== 修正・追加ここまで ====

  console.log('main.js 読み込み完了');

  // ▼▼▼ registerページだけ処理する ▼▼▼
  if (body.id === 'register') {
    $(function () {
      // register.js の全コードをここにペーストでOK
    });
  }
});


// ===== contactUtil をグローバル公開 =====
window.contactUtil = (function ($) {
  if (typeof $ === 'undefined') {
    console.error('[contactUtil] jQuery が読み込まれていません。');
    return { sendRequest: function(){ console.error('jQuery未読込'); } };
  }

  const PROD_ENDPOINT = 'https://zng21zoto0.execute-api.ap-northeast-1.amazonaws.com/production';
  const TEST_ENDPOINT = 'https://t8k8whvjnj.execute-api.ap-northeast-1.amazonaws.com/test/';

  function resolveEnv() {
    const h = location.hostname || '';
    const isLocal   = h.includes('localhost');
    const isStaging = h.includes('staging');
    const isTesting = h.includes('testing');
    const isEnablePardot = !(isLocal || isStaging || isTesting);
    const endpoint = isEnablePardot ? PROD_ENDPOINT : TEST_ENDPOINT;

    console.log('[contactUtil] resolveEnv:', { h, isLocal, isStaging, isTesting, isEnablePardot, endpoint });
    return { isEnablePardot, endpoint };
  }

  function generateRedirectPath() {
    return '/thanks';
  }

  function setSubmitting($form, on) {
    const $btn = $form.find('button[type="submit"], input[type="submit"]');
    if (on) { $btn.prop('disabled', true).data('orig-text', $btn.text()).text('送信中…'); }
    else    { $btn.prop('disabled', false).each(function(){ const t=$(this).data('orig-text'); if(t) $(this).text(t); }); }
  }

  function precheck($form) {
    const formEl = $form.get(0);
    if (formEl && !formEl.checkValidity && !formEl.reportValidity) return true;
    if (formEl && !formEl.checkValidity()) {
      formEl.reportValidity && formEl.reportValidity();
      return false;
    }
    const $agree = $form.find('input[type="checkbox"][required]');
    if ($agree.length && !$agree.prop('checked')) {
      alert('必須項目に同意してください。');
      return false;
    }
    const hp = ($form.find('input[name="hp"]').val() || '').trim();
    if (hp !== '') return false;
    return true;
  }

  // ==== 修正ここ ====
  function sendRequest({ formName, isNew, requestParams }) {
    const $form = $(`form[name="${formName}"]`);
    if ($form.length === 0) {
      console.error(`form[name="${formName}"] が見つかりません`);
      return;
    }
    if (!precheck($form)) return;

    const { isEnablePardot, endpoint } = resolveEnv();

    // 送信ペイロード
    let contactPayload;
    if (requestParams) {
      contactPayload = requestParams;
    } else {
      contactPayload = $form.serializeArray().reduce((acc, { name, value }) => {
        acc[name] = value;
        return acc;
      }, {});
    }
    contactPayload.form_name = formName; // 任意: サーバ側識別用

    // contact で括る
    const payload = { contact: contactPayload };

    console.log('[contactUtil] sendRequest start:', { formName, isNew, endpoint, payload });

    setSubmitting($form, true);

    $.ajax({
      url: endpoint,
      method: 'POST',
      contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
      data: $.param(payload),  // ← JSON ではなく urlencoded で送信
      dataType: 'json',
      timeout: 15000
    })
    
	  .done(function (data) {
  console.log('[contactUtil] success raw:', data);

  // data.body が JSON文字列なのでパース
  let parsed = {};
  if (data && data.body) {
    try {
      parsed = JSON.parse(data.body);
    } catch (e) {
      console.error('JSON parse error:', e, data.body);
    }
  }

  const fh = parsed.form_handler_endpoint || data.form_handler_endpoint || data.formHandlerEndpoint;
  console.log('form_handler_endpoint:', fh);

  if (isNew) {
    if (isEnablePardot) {
      if (!fh) {
        console.error('form_handler_endpoint が取得できませんでした:', data);
        alert('送信先の取得に失敗しました。時間を置いてお試しください。');
        return;
      }
      $form.attr('action', fh);
      $form.attr('method', 'post');
      $form.off('submit');
      $form.trigger('submit');
    } else {
      console.log('[contactUtil] TEST環境 → thanks にリダイレクト');
      window.location.href = window.location.origin + generateRedirectPath();
    }
  } else {
    window.location.href = window.location.origin + generateRedirectPath();
  }
})

	  
	  
	  
    .fail(function (xhr, status) {
      console.error('[contactUtil] 送信失敗', status, xhr);
      alert('送信に失敗しました。時間を置いてお試しください。');
    })
    .always(function () {
      setSubmitting($form, false);
    });
  }
  // ==== 修正ここまで ====

  return {
    sendRequest: sendRequest
  };

})(jQuery);


// ===============================
// 無料トライアルフォーム送信処理
// ===============================
document.addEventListener('DOMContentLoaded', function () {
  const form = document.getElementById('register-form');
  if (!form) return;

  form.addEventListener('submit', function (e) {
    e.preventDefault(); // ページリロード防止

    // 簡易バリデーション
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const agree = document.getElementById('check').checked;

    if (!email || !password || !agree) {
      alert('必要項目を入力・同意してください。');
      return;
    }

    // ローディング表示（任意）
    const submitBtn = document.getElementById('sub-mit');
    submitBtn.disabled = true;
    submitBtn.textContent = '送信中...';

    // ダミー送信処理（旧APIがないため擬似的に成功扱い）
    setTimeout(() => {
      // 送信成功後にサンクスページへリダイレクト
      window.location.href = '/thanks/';
    }, 1200);
  });
});


