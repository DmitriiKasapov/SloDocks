//// Modules ////
import * as CookieConsent from "vanilla-cookieconsent";
import "vanilla-cookieconsent/dist/css-components/base.css";
import "vanilla-cookieconsent/dist/css-components/preferences-modal.css";
// import { Livewire, Alpine } from '../../vendor/livewire/livewire/dist/livewire.esm';

import { Expandable } from "./exports/expandable";
// import alpineCountdown from './alpine/alpineCountdown';
// import alpineExpandable from './alpine/alpineExpandable';
import Menu from "./exports/menu";
import Modal from "./exports/modal";
// import SetScreenHeight from './exports/screenHeight'
import { initGsapScrollTrigger, Count, BackgroundParallax } from "./exports/scrollAnimations";
import { normalizeHeight } from "./exports/helpers";
import { swiperInit, loadSwiper } from "./exports/swiperProps";
import { loadLeaflet } from "./exports/map";
import "../../node_modules/leaflet/dist/leaflet.css";

//// GSAP ////

initGsapScrollTrigger();
// const scrollAnimations = new ScrollAnimations()

//// Swiper ////
loadSwiper().then(() => {
  document.querySelectorAll("swiper-container").forEach(
    (swiper) =>
      new swiperInit(swiper, {
        on: {
          init: () => {
            if (document.querySelector(".cards__apartment-thumb"))
              normalizeHeight(
                [
                  document
                    .querySelector(".cards__apartment-thumb")
                    .parentNode.closest("div"),
                ],
                ".picture"
              );
          },
        },
      })
  );
});

loadLeaflet().then(() => {
  document.dispatchEvent(new Event("leafletLoaded"));
});

//// Menu ////

new Menu("#main-menu");


//// Modal ////
document.querySelectorAll(".modal").forEach((el) => {
  new Modal(
    el,
    ".modal-body",
    ".modal-close"
  );
});

//// Expandables ////

document.querySelectorAll(".expandable").forEach((el) => {
  el.expandable = new Expandable(
    el,
    ".expandable__trigger",
    ".expandable__content"
  );
});

//// DOC load ////

/* Safari fix */
if (document.readyState !== "loading") {
  load();
} else {
  document.addEventListener("DOMContentLoaded", function () {
    load();
  });
}

/* Load function for 'DOMContentLoaded' or document.readyState */
function load() {
  /* Remove preload class to allow transitions */
  // document.body.classList.remove('loading')
  new Count('.elements__stat-holder', { target: '.counter' })
  new BackgroundParallax('.block__image-full-width img', '.block__image-full-width')
  new BackgroundParallax('.block__hero-banner img', '.block__hero-banner', {endY: '20%', start: "top top", end:"bottom top",})
  window.CookieConsent = CookieConsent;
  if (document.querySelector(".cards__apartment-thumb"))
    normalizeHeight(
      [
        document
          .querySelector(".cards__apartment-thumb")
          .parentNode.closest("div"),
      ],
      ".picture"
    );
}

/* Alpine components */
// Alpine.data('alpineCountdown', alpineCountdown)
// Alpine.data('alpineExpandable', alpineExpandable)
// console.log(Alpine)
// Livewire.start()
