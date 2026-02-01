import { gsap } from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

export function initGsapScrollTrigger() {
  gsap.registerPlugin(ScrollTrigger);
  /* Refresh ScrollTrigger */
  ScrollTrigger.refresh();
}

/**
 * Imports scrolltriggered fade animations powered by GSAP and ScrollTrigger plugin
 * @constructor
 * @returns {void}
 */

export function ScrollAnimations() {
  this.val = {
    fadeLeft: ".fade-left",
    fadeRight: ".fade-right",
    fadeBottom: ".fade-bottom",
    fade: ".fade",
  };

  this.init = function () {
    this.attachScrollTrigger();
  };

  this.attachScrollTrigger = function () {
    gsap.utils.toArray(this.val.fadeLeft).forEach((item) => {
      gsap.from(item, {
        x: 20,
        opacity: 0,
        duration: 1.5,
        ease: "expo.out",
        scrollTrigger: {
          trigger: item,
          start: "top bottom-=60",
          end: "bottom top",
          // markers: true,
          once: true,
        },
      });
    });

    gsap.utils.toArray(this.val.fadeRight).forEach((item) => {
      gsap.from(item, {
        x: 20,
        opacity: 0,
        duration: 1.5,
        ease: "expo.out",
        scrollTrigger: {
          trigger: item,
          start: "top bottom-=60",
          end: "bottom top",
          // markers: true,
          once: true,
        },
      });
    });

    gsap.utils.toArray(this.val.fadeBottom).forEach((item) => {
      gsap.from(item, {
        y: 20,
        opacity: 0,
        duration: 1.5,
        ease: "power4.out",
        scrollTrigger: {
          trigger: item,
          start: "top bottom-=60",
          end: "bottom top",
          // markers: true,
          once: true,
        },
      });
    });

    gsap.utils.toArray(this.val.fade).forEach((item) => {
      gsap.from(item, {
        opacity: 0,
        duration: 1,
        ease: "Power1.easeIn",
        scrollTrigger: {
          trigger: item,
          start: "top bottom-=60",
          end: "bottom top",
          // markers: true,
          once: true,
        },
      });
    });
  };

  this.init();
}

export function Count(
  counters,
  { once = true, start = "bottom bottom", stagger = "0.4", target = '', markers = false } = {}
) {
  this.counters =
    typeof counters === "string"
      ? document.querySelectorAll(counters)
      : counters;
  this.start = start;
  this.once = once;
  this.stagger = stagger;
  this.target = target;
  this.markers = markers;

  ScrollTrigger.batch(this.counters, {
    once: this.once,
    start: this.start,
    markers: this.markers,
    onEnter: (batch) => {
      const mainTimeline = gsap.timeline();
      batch.forEach((el, index) => {
        const target = this.target ? el.querySelector(this.target) : el;
        const startValue = target.dataset.startVal;
        const endValue = target.dataset.endVal;
        const counting = { val: startValue };
        const singleTimeline = gsap.timeline();

        const options = {
          val: endValue,
          duration: 2,
          ease: "ease-in",
          onUpdate: () => {
            console.log(index, counting)
            const number = gsap.utils.snap(1, counting.val);
            target.innerHTML = number;
          },
        };

        if (target) singleTimeline.to(counting, options);
        mainTimeline.add(singleTimeline, index * this.stagger);
      });
    },
  });
}

export function BackgroundParallax(
  element,
  trigger,
  {
    endX = 0,
    endY = 0,
    endTop = 0,
    start = "top bottom",
    end = "bottom top",
    ease = "linear",
    markers = false,
  } = {}
) {
  this.element =
    typeof element === "string" ? document.querySelector(element) : element;
  if (this.element) {
    gsap.to(this.element, {
      scrollTrigger: {
        trigger: trigger,
        start: start,
        end: end,
        scrub: true,
        markers: markers,
      },
      x: endX,
      y: endY,
      top: endTop,
      ease: ease,
    });
  }
}
