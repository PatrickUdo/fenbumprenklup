// Mobiel menu in de navbar
const toggle = document.querySelector('[data-menu-toggle]');
const menu = document.querySelector('[data-menu]');

if (toggle && menu) {
    const label = toggle.querySelector('.sr-only');

    const setOpen = (open) => {
        menu.classList.toggle('hidden', !open);
        toggle.setAttribute('aria-expanded', String(open));
        toggle.querySelector('[data-menu-icon="open"]').classList.toggle('hidden', open);
        toggle.querySelector('[data-menu-icon="close"]').classList.toggle('hidden', !open);
        label.textContent = open ? 'Menu sluiten' : 'Menu openen';
    };

    toggle.addEventListener('click', () => {
        setOpen(toggle.getAttribute('aria-expanded') !== 'true');
    });

    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && toggle.getAttribute('aria-expanded') === 'true') {
            setOpen(false);
            toggle.focus();
        }
    });

    window.matchMedia('(min-width: 48rem)').addEventListener('change', (event) => {
        if (event.matches) setOpen(false);
    });
}

// Fotogalerij met lightbox
const lightbox = document.querySelector('[data-lightbox]');

if (lightbox) {
    const image = lightbox.querySelector('[data-lightbox-image]');
    const caption = lightbox.querySelector('[data-lightbox-caption]');
    const counter = lightbox.querySelector('[data-lightbox-counter]');
    let items = [];
    let current = 0;
    let opener = null;

    const show = (index) => {
        current = (index + items.length) % items.length;
        const item = items[current];
        image.src = item.dataset.src;
        image.alt = item.dataset.alt;
        caption.textContent = item.dataset.alt;
        counter.textContent = `${current + 1} / ${items.length}`;
    };

    document.querySelectorAll('[data-gallery]').forEach((gallery) => {
        const galleryItems = [...gallery.querySelectorAll('[data-gallery-item]')];

        galleryItems.forEach((item, index) => {
            item.addEventListener('click', () => {
                items = galleryItems;
                opener = item;
                show(index);
                lightbox.showModal();
            });
        });
    });

    lightbox.querySelector('[data-lightbox-prev]').addEventListener('click', () => show(current - 1));
    lightbox.querySelector('[data-lightbox-next]').addEventListener('click', () => show(current + 1));
    lightbox.querySelector('[data-lightbox-close]').addEventListener('click', () => lightbox.close());

    // Klik naast de foto sluit de lightbox
    lightbox.addEventListener('click', (event) => {
        if (event.target === lightbox || event.target.tagName === 'FIGURE') lightbox.close();
    });

    lightbox.addEventListener('keydown', (event) => {
        if (event.key === 'ArrowLeft') show(current - 1);
        if (event.key === 'ArrowRight') show(current + 1);
    });

    lightbox.addEventListener('close', () => {
        image.removeAttribute('src');
        opener?.focus();
    });
}

// Collectielijst: voorbeeldfoto wisselt mee met de auto onder de muis of focus
document.querySelectorAll('[data-preview-list]').forEach((list) => {
    const preview = list.querySelector('[data-preview-image]');
    const items = [...list.querySelectorAll('[data-preview-item]')];
    if (! preview) return;

    // Alvast laden, zodat het wisselen direct gaat
    items.forEach((item) => { new Image().src = item.dataset.src; });

    const activate = (item) => {
        if (item.hasAttribute('data-active')) return;
        items.forEach((other) => other.removeAttribute('data-active'));
        item.setAttribute('data-active', '');
        preview.style.opacity = '0';
        setTimeout(() => {
            preview.src = item.dataset.src;
            preview.alt = item.dataset.alt;
            preview.style.opacity = '1';
        }, 150);
    };

    items.forEach((item) => {
        item.addEventListener('mouseenter', () => activate(item));
        item.addEventListener('focus', () => activate(item));
    });
});
