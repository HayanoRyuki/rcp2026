<style>
.function-hero {
  background: #ffffff;
  padding: 60px 20px;
  text-align: center;
}

.function-hero h2 {
  font-size: 2em;
  margin-bottom: 16px;
}

.function-hero p {
  font-size: 1rem;
  color: #333;
  margin-bottom: 32px;
}

.function-links {
  display: flex;
  justify-content: center;
  gap: 24px;
  flex-wrap: wrap;
  margin-top: 32px;
}

.function-link {
  display: flex;
  flex-direction: column;
  align-items: center;
  text-decoration: none;
  background: #f8f8f8;
  padding: 20px;
  border-radius: 12px;
  width: 180px;
  box-shadow: 0 4px 8px rgba(0,0,0,0.05);
  transition: transform 0.2s;
}

.function-link:hover {
  transform: translateY(-4px);
}

.function-link img {
  width: 48px;
  margin-bottom: 12px;
}

.function-link span {
  font-size: 1rem;
  color: #333;
}
</style>

<section class="function-hero">
  <div class="function-links">
    <a href="#func01" class="function-link">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-counter.svg" alt="">
      <span>来客業務の効率化</span>
    </a>
    <a href="#func02" class="function-link">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-security.svg" alt="">
      <span>セキュリティ対策</span>
    </a>
    <a href="#func03" class="function-link">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/function/icons/icon-counter.svg" alt="">
      <span>大企業向け機能</span>
    </a>
  </div>
</section>
