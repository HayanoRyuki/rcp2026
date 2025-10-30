jQuery(function ($) {
  console.log('register.js ready');

  $('#sub-mit').on('click', function () {
    // フォーム値の取得
    const email = $('#email').val().trim();
    const password = $('#password').val().trim();
    const checked = $('.check').is(':checked');

    // バリデーション初期化
    $('#error-email').text('');
    $('#error-password').text('');
    $('#error-check').text('');
    $('#error').text('');

    // 入力チェック
    if (!email) {
      $('#error-email').text('メールアドレスを入力してください。');
      return;
    }
    if (!password) {
      $('#error-password').text('パスワードを入力してください。');
      return;
    }
    if (!checked) {
      $('#error-check').text('利用規約への同意が必要です。');
      return;
    }

    // ローディング表示
    $('#loading').show();
    $('#sub-mit').prop('disabled', true);

    // Ajax送信
    $.ajax({
      type: 'POST',
      url: 'https://staging.api.receptionist.jp/api/auth',
      data: JSON.stringify({
        email: email,
        password: password
      }),
      contentType: 'application/json',
      dataType: 'json',
      timeout: 15000,

      success: function (res) {
        console.log('✅ 成功:', res);
        window.location.href = '/register-thanks/';
      },

      error: function (xhr) {
        console.error('❌ エラー:', xhr);
        $('#loading').hide();
        $('#sub-mit').prop('disabled', false);

        if (xhr.responseJSON && xhr.responseJSON.message) {
          $('#error').text(xhr.responseJSON.message);
        } else {
          $('#error').text('エラーが発生しました。時間をおいて再度お試しください。');
        }
      }
    });
  });
});
