import './bootstrap';
import Splide from '@splidejs/splide';
import '@splidejs/splide/dist/css/splide.min.css';


document.addEventListener('DOMContentLoaded', function () {
    new Splide('.splide', {
        type   : 'loop',
        perPage: 3,
        autoplay: true,
    }).mount();
});
