function applyTheme(isDark) {
    document.documentElement.classList.toggle('dark', isDark);
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
}

function initThemeToggle() {
    const btn = document.querySelector('[data-theme-toggle]');
    if (!btn) return;

    btn.addEventListener('click', async () => {
        const willBeDark = !document.documentElement.classList.contains('dark');
        const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        // browser lama / user minta kurangi animasi: ganti langsung tanpa efek
        if (!document.startViewTransition || reduceMotion) {
            applyTheme(willBeDark);
            return;
        }

        // titik pusat gelombang = tengah tombol
        const rect = btn.getBoundingClientRect();
        const x = rect.left + rect.width / 2;
        const y = rect.top + rect.height / 2;

        // radius sampai sudut layar terjauh, biar gelombang nutup penuh
        const endRadius = Math.hypot(
            Math.max(x, window.innerWidth - x),
            Math.max(y, window.innerHeight - y)
        );

        const transition = document.startViewTransition(() => applyTheme(willBeDark));

        await transition.ready;

        document.documentElement.animate(
            {
                clipPath: [
                    `circle(0px at ${x}px ${y}px)`,
                    `circle(${endRadius}px at ${x}px ${y}px)`,
                ],
            },
            {
                duration: 550,
                easing: 'cubic-bezier(0.4, 0, 0.2, 1)',
                pseudoElement: '::view-transition-new(root)',
            }
        );
    });
}

document.addEventListener('DOMContentLoaded', initThemeToggle);