function initParallax() {
    const el = document.querySelector('[data-parallax]');
    if (!el) return;

    const speed = parseFloat(el.dataset.parallax) || 0.3;
    let ticking = false;

    function update() {
        const offset = window.scrollY * speed;
        el.style.transform = `translateY(${offset}px)`;
        ticking = false;
    }

    window.addEventListener('scroll', () => {
        if (!ticking) {
            requestAnimationFrame(update);
            ticking = true;
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initParallax();
});