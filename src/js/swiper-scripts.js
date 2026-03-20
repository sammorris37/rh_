import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

const sliders = document.querySelectorAll('.swiper');

if (sliders.length) {

  sliders.forEach((slider) => {

    new Swiper(slider, {
      modules: [Navigation, Pagination],
      loop: true,

      navigation: {
        nextEl: slider.querySelector('.swiper-button-next'),
        prevEl: slider.querySelector('.swiper-button-prev'),
      },

      pagination: {
        el: slider.querySelector('.swiper-pagination'),
        clickable: true,
      }

    });

  });

}