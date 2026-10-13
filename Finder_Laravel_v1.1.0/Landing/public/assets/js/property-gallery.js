(() => {
  'use strict';

  document.querySelectorAll('[data-property-gallery]').forEach((gallery) => {
    const photos = Array.from(gallery.querySelectorAll('[data-gallery-photo]'));
    const thumbnails = Array.from(gallery.querySelectorAll('[data-gallery-thumbnail]'));
    const strip = gallery.querySelector('[data-gallery-thumbnails]');
    const counter = gallery.querySelector('[data-gallery-current]');
    const status = gallery.querySelector('[data-gallery-status]');
    if (photos.length < 2) return;

    let current = 0;
    const selectPhoto = (index, focusThumbnail = false) => {
      current = (index + photos.length) % photos.length;
      photos.forEach((photo, position) => { photo.hidden = position !== current; });
      thumbnails.forEach((thumbnail, position) => {
        thumbnail.setAttribute('aria-pressed', position === current ? 'true' : 'false');
      });
      if (counter) counter.textContent = String(current + 1);
      if (status) {
        status.textContent = status.dataset.galleryStatusFormat
          .replace(':current', String(current + 1)).replace(':total', String(photos.length));
      }
      const thumbnail = thumbnails[current];
      if (thumbnail && strip) {
        const frame = strip.getBoundingClientRect();
        const item = thumbnail.getBoundingClientRect();
        if (item.left < frame.left || item.right > frame.right) {
          strip.scrollBy({left: item.left - frame.left - (frame.width - item.width) / 2, behavior: 'auto'});
        }
        if (focusThumbnail) thumbnail.focus({preventScroll: true});
      }
    };

    gallery.querySelector('[data-gallery-prev]')?.addEventListener('click', () => selectPhoto(current - 1));
    gallery.querySelector('[data-gallery-next]')?.addEventListener('click', () => selectPhoto(current + 1));
    thumbnails.forEach((thumbnail, index) => thumbnail.addEventListener('click', () => selectPhoto(index)));
    gallery.addEventListener('keydown', (event) => {
      if (event.altKey || event.ctrlKey || event.metaKey || event.shiftKey) return;
      const fromThumbnail = event.target.closest('[data-gallery-thumbnail]');
      if (!fromThumbnail && !event.target.matches('[data-gallery-photo]')) return;
      const index = {ArrowLeft: current - 1, ArrowRight: current + 1, Home: 0, End: photos.length - 1}[event.key];
      if (index === undefined) return;
      event.preventDefault();
      selectPhoto(index, Boolean(fromThumbnail));
      if (!fromThumbnail) photos[current].focus({preventScroll: true});
    });
  });
})();
