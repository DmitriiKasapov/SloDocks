/* NEEDS REWRITE TO COMPLY WITH ACCESSIBILITY
  TO-DO:
  Keyboard Navigation. Pay special attention to Tab.
  https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Roles/tablist_role
  https://developer.mozilla.org/en-US/docs/Web/Accessibility/ARIA/Roles/tab_role
  aria-selected
  tab roles, tabpanel roles, tablist roles
*/

export default class {
  constructor ( navLink ) {
    this.navLinks = document.querySelectorAll( navLink )
    this.#init()
  }

  #switcher(event) {
    event.preventDefault()
    if(event.target.classList.contains('active')) return;
    this.navLinks.forEach(el => {
      el.classList.remove('active')
      const target = document.querySelector(`#${el.dataset.id}`)
      if(target) target.classList.add('hidden')
    })
    event.target.classList.add('active')
    document.querySelector(`#${event.target.dataset.id}`).classList.remove('hidden')
  }

  #attachListeners() {
    this.navLinks.forEach (el => {
      el.addEventListener( 'click', this.#switcher )
    })
  }

  #init() {
    this.#attachListeners()
    this.navLinks.forEach(el => {
      if (!el.classList.contains('active')) {
        const target = document.querySelector(`#${el.dataset.id}`)
        if (target) target.classList.add('hidden')
      }
    })
  }
}
