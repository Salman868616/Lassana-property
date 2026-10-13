/**
 * Register a Service Worker and add PWA features like installing prompts,
 * but only if the HTML tag has data-pwa="true". Unregister service worker if not.
 */

import * as bootstrap from 'bootstrap'
  
export default () => {
  const htmlElement = document.documentElement

  // Check the 'data-pwa' attribute of the HTML element
  if (htmlElement.getAttribute('data-pwa') !== 'true') {
    // Unregister the service worker if it's registered and 'data-pwa' is not 'true'
    if ('serviceWorker' in navigator) {
      navigator.serviceWorker.getRegistrations().then((registrations) => {
        for (let registration of registrations) {
          registration.unregister()
        }
      })
    }
    return // Stop further execution to prevent PWA setup when not specified
  }

  // Settings
  const SETTINGS = {
    appName: 'Finder',
    remindAfterHours: 24, // Number of hours to wait before showing the prompt again
    serviceWorkerFile: '/service-worker.js', // Service worker file path and name
    serviceWorkerScope: '/', // Scope of the service worker
    diagnostics: false, // Set to true to enable diagnostic logs
  }

  /**
   * Helper function for logging messages to the console based on the message type.
   * @param {string} message - The message to log.
   * @param {string} type - The type of message ('info' or 'error').
   */
  const logMessage = (message, type = 'info') => {
    if (SETTINGS.diagnostics) {
      if (type === 'error') {
        console.error(message)
      } else {
        console.log(message)
      }
    }
  }

  // Helper functions for detecting user's operating system and browser
  const userAgent = window.navigator.userAgent.toLowerCase()

  const detectOS = () => {
    if (userAgent.includes('android')) return 'Android'
    if (/iphone|ipad|ipod/.test(userAgent)) return 'iOS'
    if (userAgent.includes('mac')) return 'macOS'
    if (userAgent.includes('win')) return 'Windows'
    if (userAgent.includes('cros')) return 'ChromeOS'
    if (userAgent.includes('linux')) return 'Linux'
    return 'Unknown'
  }

  const detectBrowser = () => {
    if (userAgent.includes('chrome') && !userAgent.includes('edg'))
      return 'Chrome'
    if (userAgent.includes('safari') && !userAgent.includes('chrome'))
      return 'Safari'
    if (userAgent.includes('firefox')) return 'Firefox'
    if (userAgent.includes('edg')) return 'Edge'
    if (userAgent.includes('opera') || userAgent.includes('opr')) return 'Opera'
    return 'Unknown'
  }

  // Register service worker
  if ('serviceWorker' in navigator) {
    window.addEventListener('load', () => {
      navigator.serviceWorker
        .register(SETTINGS.serviceWorkerFile, {
          scope: SETTINGS.serviceWorkerScope,
        })
        .then((registration) => {
          // Registration was successful
          logMessage(
            'Service Worker registration successful with scope: ' +
              registration.scope
          )
        })
        .catch((err) => {
          // Registration failed
          logMessage('Service Worker registration failed: ' + err, 'error')
        })
    })
  }

  // Store variables for future use across application
  const promptId = 'installPWAPrompt'
  const timeoutKey = `${SETTINGS.appName}-Prompt-Timeout`
  const foreverKey = `${SETTINGS.appName}-Prompt-Dismiss-Forever`
  const installedKey = `${SETTINGS.appName}-App-Installed`

  // Initialize deferredPrompt for use later to show the install prompt
  let deferredPrompt

  // Function to create and show an installation prompt
  const installationPrompt = () => {
    // Detecting user's browser
    const browser = detectBrowser()

    // Check if we should show the prompt
    const now = Date.now()
    const setupTime = localStorage.getItem(timeoutKey)
    const dismissForever = localStorage.getItem(foreverKey)
    const appInstalled = localStorage.getItem(installedKey)

    // Check if dismiss forever is set to true or app installed, or not enough time has passed
    if (
      dismissForever === 'true' ||
      appInstalled === 'true' ||
      (setupTime &&
        now - setupTime < SETTINGS.remindAfterHours * 60 * 60 * 1000)
    ) {
      return
    }

    // HTML content for the prompt
    const promptHTML = `
      <div class="modal fade" id="${promptId}" tabindex="-1" aria-labelledby="${promptId}Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-body text-center">
              <svg class="d-inline-block mb-3" xmlns="http://www.w3.org/2000/svg" width="95" viewBox="0 0 250 283.6"><g stroke="#9ca3af" stroke-miterlimit="10"><path d="M.7 283.5V37.4C.7 17.3 17 .9 37.2.9h175.4C232.7.9 249 17.2 249 37.4v246.1" fill="none"/><path d="M240.2 41.7V283H9.5V41.7c0-17.6 14-31.9 31.5-31.9h167.9c17.2-.1 31.3 14.2 31.3 31.9z" fill="none"/><path d="M146.2,41.3h-45.1c-4.8,0-8.7-3.9-8.7-8.7s3.9-8.7,8.7-8.7h45.1c4.8,0,8.7,3.9,8.7,8.7S151.1,41.3,146.2,41.3z" fill="none"/></g><path class="d-none-dark" d="M144.9 37.6c2.7 0 5-2.2 5-5a4.95 4.95 0 0 0-5-5c-2.7 0-5 2.2-5 5s2.3 5 5 5z" fill="#cad0d9"/><path class="d-none d-block-dark" d="M144.9 37.6c2.7 0 5-2.2 5-5a4.95 4.95 0 0 0-5-5c-2.7 0-5 2.2-5 5s2.3 5 5 5z" fill="#4e5562"/><path d="M68.2 120.3H40.4c-7.6 0-13.9-6.2-13.9-13.8V80.8c0-7.6 6.2-13.8 13.9-13.8h27.8c7.6 0 13.9 6.2 13.9 13.8v25.7c-.1 7.6-6.3 13.8-13.9 13.8zm70.4 0h-27.8c-7.6 0-13.9-6.2-13.9-13.8V80.8c0-7.6 6.2-13.8 13.9-13.8h27.8c7.6 0 13.9 6.2 13.9 13.8v25.7c-.1 7.6-6.2 13.8-13.9 13.8zm70.5 0h-27.8c-7.6 0-13.9-6.2-13.9-13.8V80.8c0-7.6 6.2-13.8 13.9-13.8h27.8c7.6 0 13.9 6.2 13.9 13.8v25.7c0 7.6-6.3 13.8-13.9 13.8zM68.2 190.9H40.4c-7.6 0-13.9-6.2-13.9-13.8v-25.7c0-7.6 6.2-13.9 13.9-13.9h27.8c7.6 0 13.9 6.2 13.9 13.9V177c-.1 7.6-6.3 13.9-13.9 13.9zm140.9 0h-27.8c-7.6 0-13.9-6.2-13.9-13.8v-25.7c0-7.6 6.2-13.9 13.9-13.9h27.8c7.6 0 13.9 6.2 13.9 13.9V177c0 7.6-6.3 13.9-13.9 13.9zM68.2 261.2H40.4c-7.6 0-13.9-6.2-13.9-13.8v-25.7c0-7.6 6.2-13.9 13.9-13.9h27.8c7.6 0 13.9 6.2 13.9 13.9v25.7c-.1 7.8-6.3 13.8-13.9 13.8zm70.4 0h-27.8c-7.6 0-13.9-6.2-13.9-13.8v-25.7c0-7.6 6.2-13.9 13.9-13.9h27.8c7.6 0 13.9 6.2 13.9 13.9v25.7c-.1 7.8-6.2 13.8-13.9 13.8zm70.5 0h-27.8c-7.6 0-13.9-6.2-13.9-13.8v-25.7c0-7.6 6.2-13.9 13.9-13.9h27.8c7.6 0 13.9 6.2 13.9 13.9v25.7c0 7.8-6.3 13.8-13.9 13.8z" stroke="#9ca3af" fill="none"/><path d="M140.7 196H109c-9.3 0-16.9-7.6-16.9-16.9v-29.3c0-9.3 7.6-16.9 16.9-16.9h31.7c9.3 0 16.9 7.6 16.9 16.9v29.3c.1 9.3-7.4 16.9-16.9 16.9z" fill="#d85151"/><path d="M123.893 157.482C118.219 157.482 113.544 162.157 113.544 167.831C113.544 173.505 118.219 178.179 123.893 178.179C129.567 178.179 134.241 173.505 134.241 167.831C134.241 162.157 129.567 157.482 123.893 157.482ZM106.631 167.831C106.631 158.339 114.4 150.569 123.893 150.569C133.385 150.569 141.154 158.339 141.154 167.831C141.154 171.334 140.096 174.603 138.283 177.333L142.67 181.719C144.019 183.069 144.019 185.258 142.67 186.608C141.32 187.958 139.131 187.958 137.781 186.608L133.395 182.221C130.665 184.034 127.396 185.093 123.893 185.093C114.4 185.093 106.631 177.323 106.631 167.831Z" fill="black" fill-opacity="0.05"/><path fill-rule="evenodd" clip-rule="evenodd" d="M123.698 151.8C116.885 151.8 111.362 157.323 111.362 164.136C111.362 170.949 116.885 176.472 123.698 176.472C130.511 176.472 136.034 170.949 136.034 164.136C136.034 157.323 130.511 151.8 123.698 151.8ZM105.313 164.136C105.313 153.983 113.544 145.751 123.698 145.751C133.852 145.751 142.083 153.983 142.083 164.136C142.083 174.29 133.852 182.521 123.698 182.521C113.544 182.521 105.313 174.29 105.313 164.136Z" fill="white"/><path fill-rule="evenodd" clip-rule="evenodd" d="M134.003 174.442C135.184 173.261 137.099 173.261 138.28 174.442L144.114 180.275C145.295 181.456 145.295 183.371 144.114 184.552C142.932 185.733 141.017 185.733 139.836 184.552L134.003 178.719C132.822 177.538 132.822 175.623 134.003 174.442Z" fill="white"/><path d="M135.17 160.053C139.036 160.053 142.17 156.919 142.17 153.053C142.17 149.188 139.036 146.054 135.17 146.054C131.304 146.054 128.17 149.188 128.17 153.053C128.17 156.919 131.304 160.053 135.17 160.053Z" fill="white"/><path fill-rule="evenodd" clip-rule="evenodd" d="M135.17 148.646C132.736 148.646 130.763 150.619 130.763 153.053C130.763 155.487 132.736 157.461 135.17 157.461C137.604 157.461 139.578 155.487 139.578 153.053C139.578 150.619 137.604 148.646 135.17 148.646ZM125.578 153.053C125.578 147.756 129.873 143.461 135.17 143.461C140.468 143.461 144.763 147.756 144.763 153.053C144.763 158.351 140.468 162.646 135.17 162.646C129.873 162.646 125.578 158.351 125.578 153.053Z" fill="#D85151"/></svg>
              <h5 class="pt-1" id="${promptId}Label">Install Finder app</h5>
              ${browser === 'Safari' ? `<p class="fs-sm mb-0">Add Finder to your home screen for convenient access to local directories and listings anytime, anywhere! Tap the <span class="fw-semibold">"Share"</span> icon in Safari and select <span class="fw-semibold">"Add to Home Screen"</span> from the options.</p>` : `<p class="fs-sm mb-0">Add Finder to your home screen for convenient access to local directories and listings anytime, anywhere!</p>`}
              <div class="d-flex flex-column align-items-center gap-3 pt-4">
                ${
                  browser === 'Safari'
                    ? `
                  <div class="d-flex justify-content-center gap-3 w-100">
                    <button type="button" class="btn btn-secondary pe-3 w-100" id="timeoutPWAButton">
                      <i class="fi-clock fs-base me-1 ms-n2"></i>
                      Remind later
                    </button>
                    <button type="button" class="btn btn-outline-secondary pe-3 w-100" id="dismissPWAButton">
                      <i class="fi-close fs-base me-1 ms-n2"></i>
                      Dismiss forever
                    </button>
                  </div>
                `
                    : `
                  <div class="d-flex justify-content-center gap-3 w-100">
                    <button type="button" class="btn btn-primary w-100" id="installPWAButton">
                      <i class="fi-download fs-base me-1 ms-n1"></i>
                      Install
                    </button>
                    <button type="button" class="btn btn-secondary w-100" id="timeoutPWAButton">
                      <i class="fi-clock fs-base me-1 ms-n2"></i>
                      Remind later
                    </button>
                  </div>
                  <button type="button" class="btn btn-outline-secondary border-0 mb-n1" id="dismissPWAButton">
                    <i class="fi-close fs-lg me-1 ms-n2"></i>
                    Dismiss forever
                  </button>
                `
                }
              </div>
            </div>
          </div>
        </div>
      </div>
      `

    // Append the prompt HTML to the body
    document.body.insertAdjacentHTML('beforeend', promptHTML)

    // Get prompt instance
    const promptElement = document.getElementById(promptId)
    /* eslint-disable no-undef */
    const promptInstance = new bootstrap.Modal(promptElement, {
      backdrop: 'static', // Optional: makes prompt not close when clicking outside
      keyboard: false, // Optional: makes prompt not close when pressing escape key
    })
    /* eslint-enable no-undef */

    // Show the prompt
    promptInstance.show()

    // Log the message
    logMessage('PWA installation prompt has been displayed.')

    // Event listeners to remove the prompt from the DOM when dismissed
    document
      .getElementById('timeoutPWAButton')
      .addEventListener('click', () => {
        promptInstance.hide()
        localStorage.setItem(timeoutKey, Date.now()) // Set the new timeout value when dismissed
      })

    document
      .getElementById('dismissPWAButton')
      .addEventListener('click', () => {
        promptInstance.hide()
        localStorage.setItem(foreverKey, true) // Set the foreverKey value to true
      })

    promptElement.addEventListener('hidden.bs.modal', () => {
      promptInstance.dispose() // Ensure the prompt is cleaned up correctly
      promptElement.remove() // Remove the prompt from the DOM
    })
  }

  // Handling appinstalled event for cases when PWA installed from the address bar or other browser components
  window.addEventListener('appinstalled', () => {
    localStorage.setItem(installedKey, true) // Set the installedKey value to true
    deferredPrompt = null // Clear the deferredPrompt so it can be garbage collected
    logMessage('PWA was installed') // Log message
  })

  // Funtion for initialization and configuration of Progressive Web App (PWA) installation prompts based on the user's operating system and browser
  const setupPWAInstallation = () => {
    const os = detectOS()
    const browser = detectBrowser()

    // Check if the PWA is already installed
    const isInStandaloneMode = () =>
      ('standalone' in navigator && navigator.standalone) ||
      window.matchMedia('(display-mode: standalone)').matches

    if (os === 'iOS' && browser === 'Safari') {
      // Specific instructions for Safari on iOS
      setTimeout(() => {
        if (!isInStandaloneMode()) {
          installationPrompt()
          logMessage('PWA installation prompt has been displayed.')
        }
      }, 3500)
    } else if (
      os !== 'iOS' &&
      (browser === 'Chrome' || browser === 'Edge' || browser === 'Opera')
    ) {
      // Setup for Chrome, Edge, and Opera on non-iOS devices
      if (!isInStandaloneMode()) {
        window.addEventListener('beforeinstallprompt', (e) => {
          // Log message
          logMessage(`'beforeinstallprompt' event was fired.`)
          // Prevent the mini-infobar from appearing on mobile
          e.preventDefault()
          // Stash the event so it can be triggered later
          deferredPrompt = e
          // Show the installation prompt to the user
          setTimeout(() => {
            installationPrompt()
          }, 3500)
        })

        // Handle "Install" button click event
        document.body.addEventListener('click', (e) => {
          const target = e.target

          // Check if the clicked element is an "Install" button
          if (target.id === 'installPWAButton') {
            const promptElement = document.getElementById(promptId)
            /* eslint-disable no-undef */
            const promptInstance = bootstrap.Modal.getInstance(promptElement)
            /* eslint-enable no-undef */

            if (promptInstance) {
              promptInstance.hide() // Hide the prompt
            }

            deferredPrompt.prompt() // Show the installation prompt
            deferredPrompt.userChoice.then((choiceResult) => {
              if (choiceResult.outcome === 'accepted') {
                logMessage('User accepted the A2HS prompt. PWA was installed')
                localStorage.setItem(installedKey, true) // Set the installedKey value to true
              } else {
                logMessage('User dismissed the A2HS prompt')
                localStorage.setItem(timeoutKey, Date.now()) // Set the new timeout value
              }
              deferredPrompt = null // We've used the prompt and can't use it again, throw it away
            })
          }
        })
      }
    } else {
      logMessage('PWA installation is not supported on your device or browser.')
    }
  }

  // Call the setup function
  setupPWAInstallation()
}
