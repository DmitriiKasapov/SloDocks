/**
 * Call one or more functions on a breakpoint
 * @param {String} breakpoint Breakpoint number (in pixels)
 * @param {String} triggerOn Determine when to trigger: either on 'desktop' or 'mobile'
 * @param {Function[]} actions Array of one or more functions
 * @returns {void}
 */

export function triggerOnWindowBreak(breakpoint, actions, triggerOn = 'mobile') {
  let screenBreak

  // Set screen above or below breakpoint for event to take place
  if (triggerOn === 'desktop') {
    screenBreak = window.matchMedia(`(min-width: ${breakpoint}px)`)
  } else {
    screenBreak = window.matchMedia(`(max-width: ${breakpoint}px)`)
  }

  // Attach listener
  screenBreak.addEventListener('change', function(event) {
    if (event.target.matches) {
      actions.forEach( function(action) {
        action()
      })
    }
  })

  // Call functions
  if (screenBreak.matches) {
    actions.forEach(function(action) {
      action()
    })
  }
}

/**
 * Append uploaded file name(s)
 * @param {String} inputId Id of the input with type='file'
 * @param {String} nameHolder Selector for element where span elements with file name are appended
 * @returns {void}
 */

export function appendUploadName(inputId, nameHolder) {
  document.getElementById(inputId).addEventListener('change', function() {
    let loadedFiles = [
      ...document.getElementById(inputId).files
    ]
    if (loadedFiles) {
      document.querySelector(nameHolder).classList.add('active')

      loadedFiles.forEach((file) => {
        let fileNameEl = document.createElement('span')
        let fileNameText = document.createTextNode(file.name)
        fileNameEl.appendChild(fileNameText)
        document.querySelector(nameHolder).appendChild(fileNameEl)
      })
    }
  })
}

/**
 * A promise. Await element to appear before moving to the next line of code.
 * Returns the element it was waiting to appear.
 * Use in async ... await functions.
 * @param {String} selector CSS selector of the element.
 * @returns {HTMLElement}
 */

export function elementAppear(selector) {
  return new Promise(resolve => {
      if (document.querySelector(selector)) return resolve(document.querySelector(selector))
      const observer = new MutationObserver(mutations => {
          if (document.querySelector(selector)) {
              resolve(document.querySelector(selector))
              observer.disconnect()
          }
      })

      observer.observe(document.body, {
          childList: true,
          subtree: true
      })
  })
}

/**
 * Helper function to set CSS custom properties (CSS variables) to :root or defined element.
 * @param {String} CSSproperty Name of CSS custom property / variable i.e. --variable.
 * @param {String} value CCS value the custom property takes on.
 * @param {HTMLElement} el HTML element to append the value to. If empty defaults to documentElement
 */

export function setCSSProperty(CSSproperty, value, el = null) {
  el ?
    el.style.setProperty(CSSproperty, value) :
    document.documentElement.style.setProperty(CSSproperty, value)
}


/**
 * Function to get the offset of an element compared to document
 * @param {HTMLElement} el HTML element to be evaluated
 * @returns {object}
 */

export function elementOffset(el) {
  const rect = el.getBoundingClientRect(),
    scrollLeft = window.pageXOffset || document.documentElement.scrollLeft,
    scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  return {
    top: rect.top + scrollTop,
    left: rect.left + scrollLeft,
    bottom: rect.bottom + scrollTop,
    right: rect.right + scrollLeft
  };
}

/**
 * Check if element is wholly in view
 * @param {String} target CSS selector for target element
 * @returns {Boolean}
 */

export function isInViewport(target) {
  const el = document.querySelector(target)
  const rect = el.getBoundingClientRect();
  return (
    rect.top >= 0 &&
    rect.left >= 0 &&
    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
  );
}

/**
 * Hide/show header on scroll
 */

export function hideHeader(el = '') {
  const header = document.querySelector('header')
  var shadowHeader, currentY = 0, deltaY
  if(el)
    shadowHeader = document.querySelector(el)
  window.addEventListener('scroll', () => {
    deltaY = window.scrollY - currentY
    if(shadowHeader){
      if(deltaY > 0 && window.scrollY > shadowHeader.offsetHeight)
        header.classList.add('hide-header')
    }
    if(!shadowHeader){
      if(deltaY > 0)
        header.classList.add('hide-header')
    }
    if(deltaY < 0){
      if(header.classList.contains('hide-header'))
        header.classList.remove('hide-header')
    }
    currentY = window.scrollY
  })
}

/**
 * Normalize heights of elements within a container.
 * Checks all the elements and writes a css property --height to parentSelector element.
 * @param {String} parentSelector CSS selector for container that holds ALL the elements of the childSelector
 * @param {String} childSelector CSS selector of elements within container to compare sizes between
 */

export function normalizeHeight(parentSelector, childSelector) {
  const parents = typeof parentSelector === 'string' ? document.querySelectorAll(parentSelector) : parentSelector;
  if (parents.length) {
    parents.forEach((parent) => {
      let height = 0;
      setCSSProperty("--height", `auto`, parent);
      const children = parent.querySelectorAll(childSelector);

      if (children.length) {
        children.forEach((child) => {
          height = height > child.offsetHeight ? height : child.offsetHeight;
        });
        setCSSProperty("--height", `${height}px`, parent);
      }
    });
  }
}
