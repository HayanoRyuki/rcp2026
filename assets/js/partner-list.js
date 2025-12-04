document.addEventListener('DOMContentLoaded', () => {

  // ===== Tabs =====
  const tabs = document.querySelectorAll('.rcp-partnerlist__tab');
  const panels = document.querySelectorAll('.rcp-partnerlist__section');

  const activatePanel = (targetId) => {
    tabs.forEach(t => {
      const isActive = t.dataset.target === targetId;
      t.classList.toggle('is-active', isActive);
      t.setAttribute('aria-selected', isActive);
    });

    panels.forEach(p =>
      p.classList.toggle('is-active', p.dataset.panel === targetId)
    );
  };

  tabs.forEach(tab => {
    tab.addEventListener('click', () => {
      activatePanel(tab.dataset.target);

      // フィルタをリセット
      const allBtn = document.querySelector(
        '.rcp-partnerlist__filterbtn[data-filter="すべて"]'
      );
      if (allBtn) allBtn.click();
    });
  });

  // ===== Filter =====
  const filterBtns = document.querySelectorAll('.rcp-partnerlist__filterbtn');

  const applyFilter = (label) => {
    // 全パネルのアイテムを対象にフィルタ
    panels.forEach(activePanel => {
      const items = activePanel.querySelectorAll('.rcp-partnerlist__item');
      items.forEach(item => {
        const tags = (item.dataset.tags || '')
          .split(',')
          .map(s => s.trim())
          .filter(Boolean);

        const isAll = label === 'すべて';
        const visible = isAll || tags.includes(label);
        item.style.display = visible ? '' : 'none';
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
  // 全パネルを表示
  panels.forEach(p => p.classList.add('is-active'));

  // 初期フィルタ適用
  const initFilter = document.querySelector('.rcp-partnerlist__filterbtn.is-active');
  if (initFilter) applyFilter(initFilter.dataset.filter);

});
