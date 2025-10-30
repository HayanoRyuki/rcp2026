document.addEventListener('DOMContentLoaded', () => {
  let isFormInteracted = false;

  // 入力やフォーカスがあればフラグON
  document.querySelectorAll('form input, form textarea, form select').forEach((el) => {
    el.addEventListener('focus', () => {
      console.log('フォームが注目された');
      isFormInteracted = true;
    });
    el.addEventListener('input', () => {
      isFormInteracted = true;
    });
  });

  // ページ離脱時に警告
  window.addEventListener('beforeunload', function (e) {
    if (isFormInteracted) {
      console.log('離脱警告を表示する状態');
      e.preventDefault();
      e.returnValue = '';
    }
  });

  // フォーム送信時はフラグOFF
  document.querySelectorAll('form').forEach((form) => {
    form.addEventListener('submit', () => {
      console.log('フォーム送信で警告解除');
      isFormInteracted = false;
    });

    // 送信ボタンクリックでもフラグOFF（Ajax送信対応）
    form.querySelectorAll('button[type="submit"], input[type="submit"]').forEach((btn) => {
      btn.addEventListener('click', () => {
        console.log('送信ボタンクリックで警告解除');
        isFormInteracted = false;
      });
    });
  });
});
