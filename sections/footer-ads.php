<?php wp_footer(); ?>
<footer class="ads-footer">
  <p>© RECEPTIONIST, Inc</p>
</footer>

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

        console.log('[GTM] dataLayer push:', {
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
