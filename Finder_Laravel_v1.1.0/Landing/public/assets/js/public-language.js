document.querySelectorAll('[data-auto-language]').forEach((select) => {
    select.addEventListener('change', () => {
        if (select.form) select.form.requestSubmit();
    });
});
