function applyTheme(isDark) {
    document.documentElement.classList.toggle('dark', isDark);
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
}

function initThemeToggle() {
    const btn = document.querySelector('[data-theme-toggle]');
    if (!btn) return;

    btn.addEventListener('click', async () => {
        const willBeDark = !document.documentElement.classList.contains('dark');

        // browser lama / user minta kurangi animasi: ganti langsung tanpa efek
        if (!document.startViewTransition) {
            applyTheme(willBeDark);
            return;
        }

        const rect = btn.getBoundingClientRect();
        const xPercent = ((rect.left + rect.width / 2) / window.innerWidth) * 100;
        const yPercent = ((rect.top + rect.height / 2) / window.innerHeight) * 100;

        const transition = document.startViewTransition(() => applyTheme(willBeDark));

        await transition.ready;

        document.documentElement.animate(
            {
                clipPath: [
                    `circle(0% at ${xPercent}% ${yPercent}%)`,
                    `circle(150% at ${xPercent}% ${yPercent}%)`,
                ],
            },
            {
                duration: 1000,
                easing: 'cubic-bezier(0.22, 1, 0.36, 1)',
                pseudoElement: '::view-transition-new(root)',
            }
        );
    });
}

document.addEventListener('DOMContentLoaded', initThemeToggle);
