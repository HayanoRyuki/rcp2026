document.addEventListener('DOMContentLoaded', () => {

  // ===== Tabs =====
  const tabs = document.querySelectorAll('.rcp-partnerlist__tab');
  const panels = document.querySelectorAll('.rcp-partnerlist__section');
  const filterBtns = document.querySelectorAll('.rcp-partnerlist__filterbtn');

  // ---- パネル切替（タブクリック時のみ発動） ----
  const activatePanel = (targetId) => {

    // タブの状態切替
    tabs.forEach(t => {
      const isActive = t.dataset.target === targetId;
      t.classList.toggle('is-active', isActive);
      t.setAttribute('aria-selected', isActive);
    });

    // パネル表示切替
    panels.forEach(p => {
      const show = p.dataset.panel === targetId;
      p.classList.toggle('is-active', show);
    });
  };

  // ===== Filter =====
  const applyFilter = (label) => {
    const isAll = label === 'すべて';

    // 現在アクティブなパネル（タブ未選択なら2つとも）
    const activePanels = document.querySelectorAll('.rcp-partnerlist__section.is-active');

    activePanels.forEach(panel => {
      panel.querySelectorAll('.rcp-partnerlist__item').forEach(item => {
        const tags = (item.dataset.tags || '').split(',').map(s => s.trim());
        item.style.display =
          isAll || tags.includes(label) ? '' : 'none';
      });
    });
  };

  // フィルタボタンのイベント
  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');
      applyFilter(btn.dataset.filter);
    });
  });

  // ===== タブクリック（ここから切替モードへ） =====
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {

      // パネル切替
      activatePanel(tab.dataset.target);

      // フィルタを「すべて」に戻す
      const allBtn = document.querySelector('.rcp-partnerlist__filterbtn[data-filter="すべて"]');
      if (allBtn) {
        filterBtns.forEach(b => b.classList.remove('is-active'));
        allBtn.classList.add('is-active');
        applyFilter("すべて");
      }
    });
  });

  // ===== 初期状態（タブ未選択 & 両方 is-active） =====

  // ★ パネルは両方アクティブ（JS 初期化時に有効化）
  panels.forEach(p => p.classList.add('is-active'));

  // ★ タブはどちらもアクティブにしない

  // ★ 初期フィルタ「すべて」
  const initFilter = document.querySelector('.rcp-partnerlist__filterbtn.is-active');
  if (initFilter) applyFilter(initFilter.dataset.filter);

});
