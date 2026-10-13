document.querySelectorAll('[data-property-share]').forEach((group) => {
    const shareButton = group.querySelector('[data-share-native]');
    const copyButton = group.querySelector('[data-share-copy]');
    const status = group.querySelector('[data-share-status]');
    const fallback = group.querySelector('[data-share-fallback]');
    const input = fallback.querySelector('input');
    const data = { title: group.dataset.title, text: group.dataset.text, url: group.dataset.url };
    shareButton.hidden = typeof navigator.share !== 'function';
    copyButton.hidden = false;
    const copyLink = async () => {
        try {
            if (!navigator.clipboard?.writeText) throw new Error('Clipboard unavailable');
            await navigator.clipboard.writeText(data.url);
            fallback.hidden = true;
            status.textContent = group.dataset.copiedMessage || 'Property link copied.';
        } catch {
            fallback.hidden = false;
            input.focus();
            input.select();
            status.textContent = group.dataset.copyMessage || 'Copy the selected link to share this property.';
        }
    };
    copyButton.addEventListener('click', copyLink);
    shareButton.addEventListener('click', async () => {
        status.textContent = '';
        if (typeof navigator.share === 'function') {
            try {
                await navigator.share(data);
                return;
            } catch (error) {
                if (error.name === 'AbortError') return;
            }
        }
        await copyLink();
    });
});