<footer class="footer-minimam">
  <div class="footer-minimam-inner">
    <ul class="footer-minimam-links">
      <li><a href="https://help.receptionist.jp/?p=402">個人情報保護方針</a></li>
      <li><a href="https://help.receptionist.jp/?p=398">利用規約</a></li>
    </ul>
    <p class="copyright">
      <small>© RECEPTIONIST, Inc</small>
    </p>
  </div>
</footer>

<?php wp_footer(); ?>

<!-- GTM計測 -->
<script>
  document.addEventListener('DOMContentLoaded', function () {
    const forms = document.querySelectorAll('form.form-track');
    if (!forms.length) return;

    forms.forEach(function (form) {
      form.addEventListener('submit', function () {
        const eventType = form.dataset.event || 'form_submit';
        const formId = form.dataset.formId || form.id || 'unknown';

        window.dataLayer = window.dataLayer || [];
        window.dataLayer.push({
          event: eventType,
          form_id: formId,
          page_path: window.location.pathname
        });
      });
    });
  });
</script>
</body>
</html>
