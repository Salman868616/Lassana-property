import purgeCSS from '@fullhuman/postcss-purgecss';

// Only the homepage entry is reduced. Other pages keep the complete theme.
// Scan the shared partials and JS as well as the home views so conditional
// property cards, account menus and script-created controls keep their styles.
export default function homepageCss() {
    const purge = purgeCSS({
        content: [
            './resources/views/home/**/*.blade.php',
            './resources/views/layouts/**/*.blade.php',
            './resources/views/agents/cards.blade.php',
            './resources/views/properties/{category-badge,saved-badge,card-highlights}.blade.php',
            './resources/js/**/*.js',
        ],
        safelist: {
            standard: ['show', 'showing', 'hiding', 'active', 'fade', 'collapsing', 'is-stuck'],
            greedy: [/modal/, /offcanvas/, /swiper/, /noUi/],
        },
    });

    return {
        postcssPlugin: 'lassana-homepage-css',
        OnceExit(root, helpers) {
            const source = root.source?.input.file?.replaceAll('\\', '/') || '';
            if (source.endsWith('/resources/scss/home.scss')) {
                return purge.OnceExit(root, helpers);
            }
        },
    };
}
