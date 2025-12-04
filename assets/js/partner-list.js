document.addEventListener('DOMContentLoaded', () => {

  // ===== Tabs =====
  const tabs = document.querySelectorAll('.rcp-partnerlist__tab');
  const panels = document.querySelectorAll('.rcp-partnerlist__section');

  const activatePanel = (targetId) => {
    // タブの色切替
    tabs.forEach(t => {
      const isActive = t.dataset.target === targetId;
      t.classList.toggle('is-active', isActive);
      t.setAttribute('aria-selected', isActive);
    });

    // パネルの表示切替
    panels.forEach(p =>
      p.classList.toggle('is-active', p.dataset.panel === targetId)
    );
  };

  // タブクリック時
  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      activatePanel(tab.dataset.target);

      // フィルタをリセット
      const allBtn = document.querySelector('.rcp-partnerlist__filterbtn[data-filter="すべて"]');
      if (allBtn) allBtn.click();
    });
  });

  // ===== Filter =====
  const filterBtns = document.querySelectorAll('.rcp-partnerlist__filterbtn');

  const applyFilter = (label) => {
    // 全パネルのアイテムを対象にフィルタ
    panels.forEach(panel => {
      const items = panel.querySelectorAll('.rcp-partnerlist__item');
      items.forEach(item => {
        const tags = (item.dataset.tags || '').split(',').map(s => s.trim()).filter(Boolean);
        const isAll = label === 'すべて';
        item.style.display = isAll || tags.includes(label) ? '' : 'none';
      });
    });
  };

  filterBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      filterBtns.forEach(b => b.classList.remove('is-active'));
      btn.classList.add('is-active');
      applyFilter(btn.dataset.filter);
    });
  });

  // ===== Priority sort (RAP -> RSP -> その他) =====
  document.querySelectorAll('.rcp-partnerlist__list').forEach(list => {
    const items = Array.from(list.children);
    items.sort((a, b) => {
      const pa = Number(a.dataset.priority || 2);
      const pb = Number(b.dataset.priority || 2);
      return pa - pb;
    });
    items.forEach(i => list.appendChild(i));
  });

  // ===== 初期状態 =====
  // パネルは両方表示、タブは押されていない状態
  panels.forEach(p => p.classList.add('is-active'));
  // タブの is-active は初期では付与しない
  // 初期フィルタ（すべて）は自動適用
  const initFilter = document.querySelector('.rcp-partnerlist__filterbtn.is-active');
  if (initFilter) applyFilter(initFilter.dataset.filter);

});
