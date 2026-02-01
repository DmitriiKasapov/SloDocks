import { elementOffset } from "../exports/helpers";

export default () => ({
  animation: null,
  isOpen: false,
  isClosing: false,
  isExpanding: false,
  closedByUser: false,
  zero: null,
  duration: 400,
  opened: false,
  disabled: false,
  trackTop: false,
  clickOutside: false,
  initialHeight: 0,
  initialized: false,

  // el: {
  //   ['x-ref']: 'el',
  //   [':class']: {
  //     'animation-open': this.isExpanding,
  //     'animation-close': this.isClosing,
  //     'open': this.isOpen && !this.isExpanding && !this.isClosing,
  //   }
  // },

  // trigger: {
  //   ['x-ref']: 'trigger',
  //   [':aria-expanded']: this.isOpen,
  //   ['@click']: this.onClick
  // },

  // content: {
  //   ['x-ref']: 'content',
  //   [':style']: !this.isOpen && { overflow: 'hidden' },
  //   [':hidden']: !this.isOpen || !this.isClosing || !this.isExpanding
  // },

  onClick(e) {
    e.stopPropagation();
    if (this.disabled) return;
    e.preventDefault();
    if (this.isClosing || !this.isOpen) {
      this.open(this.duration);
      this.isOpen = true;
    } else if (this.isExpanding || this.isOpen) {
      this.shrink(this.duration, this.$refs.el);
      this.closedByUser = true;
    }
  },

  open(duration) {
    if (!this.isExpanding) {
      this.isExpanding = true;
      this.isClosing = false;
      window.requestAnimationFrame(() => {
        this.zero = performance.now();
        this.trackTopFunc();
        this.expand(duration);
      });
    }
  },

  expand(duration) {
    const startHeight = `${this.initialHeight}px`;
    const endHeight = `${this.$refs.content.children[0].offsetHeight}px`;
    if (this.animation) {
      this.animation.cancel();
    }
    this.animation = this.$refs.content.animate(
      {
        height: [startHeight, endHeight, "auto"],
        offset: [0, 0.999, 1],
      },
      {
        duration: duration,
        easing: "ease-out",
        fill: "forwards",
      }
    );
    this.animation.onfinish = () => this.onAnimationFinish(true);
    this.animation.oncancel = () => (this.isExpanding = false);
  },

  shrink(duration, el) {
    if (el === this.$refs.el) {
      this.isExpanding = false;
      this.isClosing = true;
      const startHeight = `${this.$refs.content.offsetHeight}px`;
      const endHeight = `${this.initialHeight}px`;
      if (this.animation) {
        this.animation.cancel();
      }
      this.animation = this.$refs.content.animate(
        {
          height: [startHeight, endHeight],
        },
        {
          duration: duration,
          easing: "ease-out",
          fill: "forwards",
        }
      );
      this.animation.onfinish = () => this.onAnimationFinish(false);
      this.animation.oncancel = () => (this.isClosing = false);
    }
  },

  onAnimationFinish(open) {
    if(this.clickOutside) {
      open ?
        window.addEventListener('click', this.clickOutside) :
        window.removeEventListener('click', this.clickOutside)
    }

    this.isOpen = open;
    this.animation = null;
    this.isClosing = false;
    this.isExpanding = false;
  },

  trackTopFunc() {
    if (this.trackTop) {
      const value = (performance.now() - this.zero) / this.duration;
      if (value < 1) {
        const elOffset = elementOffset(this.$refs.el);
        if (elOffset.top < window.scrollY) window.scrollTo(0, elOffset.top);
        window.requestAnimationFrame((t) => this.trackTopFunc(t));
      }
    }
  },

  clickOutside(e) {
    if (
      !this.$refs.el ||
      this.$refs.el === e.target ||
      e.composedPath().includes(this.$refs.el) ||
      e.composedPath().includes(this.$refs.trigger) ||
      (this.opened && !this.closedByUser)
    )
      return

    this.shrink(this.duration, this.$refs.el)
  },

  init() {
    this.$nextTick(() => {
      this.opened ? this.open(0) : this.shrink(0, this.$refs.el);
      this.$refs.content.removeAttribute('hidden');
      this.initialized = true;
    });
  },
});
