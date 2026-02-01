/**
 * A function that initiates the swiper container.
 * Full api: https://swiperjs.com/swiper-api
 *
 * @constructor
 * @param {HTMLElement} el HTML node of the swiper container
 * @returns {void}
 */

export class swiperInit {
  constructor (el, additionalParams = {}) {
    this.swiper =  typeof el === "string" ? el.querySelector('swiper-container') : el;
    this.params = JSON.parse(this.swiper.dataset.options);
    this.additionalParams = additionalParams;
    this.init()
  }

  init = () => {
    if(!this.swiper.swiperinit) {
      delete this.params.thumbs
      delete this.params.navigation
      delete this.params.pagination
      delete this.params.paginationClickable
      Object.assign(this.swiper, this.params);
      Object.assign(this.swiper, this.additionalParams);
      this.swiper.initialize()
      this.swiper.removeAttribute('data-options')
      this.swiper.swiperinit = true
    }
  }
}

export async function loadSwiper() {
  if(document.querySelector('swiper-container')) {
    const { register } = await import('swiper/element/bundle');
    register();
  }
}
