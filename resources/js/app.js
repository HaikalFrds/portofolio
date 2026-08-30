import AOS from 'aos';
import 'aos/dist/aos.css';
import Lenis from 'lenis';
import './scrollAnimations';
import './theme';

AOS.init({
    duration: 700,
    easing: 'ease-out-cubic',
    once: false,
    offset: 60,
});

const lenis = new Lenis();
function raf(time) {
    lenis.raf(time);
    requestAnimationFrame(raf);
}
requestAnimationFrame(raf);