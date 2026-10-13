/* eslint-disable no-undef */
import { merge } from '../map-utils'

/**
 * This plugin binds markers to the corresponding elements.
 *
 * It adds the "is-highlighted" class to the marker and the corresponding element
 * when the mouse enters the marker or the element. And removes the class
 * when the mouse leaves the marker or the element.
 */
export default class BindToMarker {
  _core
  _options
  _markers = {} // markers hashmap
  _shouldInit = true

  static defaultOptions = {
    lookupAttributeName: 'data-map-bind-to-marker',
    lookupAttributeKey: 'id',
  }

  constructor(options) {
    this._options = merge(BindToMarker.defaultOptions, options)
  }

  /**
   * Register the plugin.
   *
   * @param {Map} core Map core instance
   */
  register(core) {
    this._core = core
    // attach the mouseover event to binded elements
    let bindedElements = document.querySelectorAll(
      '[' + this._options.lookupAttributeName + ']'
    )

    // check if we have elements to bind
    if (!bindedElements.length) {
      this._shouldInit = false
      return
    }

    bindedElements.forEach((element) => {
      // bind the mouseenter event to the element
      L.DomEvent.addListener(
        element,
        'mouseenter',
        this._onBindedElementMouseenter.bind(this, element)
      )
      // bind the mouseleave event to the element
      L.DomEvent.addListener(
        element,
        'mouseleave',
        this._onBindedElementMouseleave.bind(this, element)
      )
    })
  }

  /**
   * Save markers for futher usage.
   * @param {L.Marker} instance Leaflet marker instance
   * @param {object} feature Feature object
   * @returns {L.Marker} Leaflet marker instance
   */
  marker(instance, feature) {
    if (!this._shouldInit) {
      return instance
    }

    // get the real value of the lookup attribute key from the feature object
    // the name of the key is stored in the options `lookupAttributeKey`
    // and it is expected that the feature object has this key
    let key = feature.properties[this._options.lookupAttributeKey]

    // save marker instance to the hashmap
    this._markers[key] = instance

    // bind the mouseover event to the marker
    L.DomEvent.addListener(
      instance,
      'mouseenter',
      this._onMarkerMouseenter.bind(this, instance, feature)
    )
    L.DomEvent.addListener(
      instance,
      'mouseleave',
      this._onMarkerMouseleave.bind(this, instance, feature)
    )

    return instance
  }

  /**
   * Handle marker mouseenter event.
   *
   * @param {L.Marker} marker Marker instance
   * @param {Object} feature Feature object
   * @param {Event} e Event object
   */
  _onMarkerMouseenter(marker, feature) {
    // find corresponding binded element
    let key = feature.properties[this._options.lookupAttributeKey]
    let selector = `[${this._options.lookupAttributeName}="${key}"]`
    let el = document.querySelector(selector)
    if (!el) {
      return
    }

    // scroll the binded element into view
    // and add class "is-highlighted" to the marker and to the corresponding binded element
    el.scrollIntoView({ behavior: 'smooth', block: 'center' })
    el.classList.add('is-highlighted')
    marker._icon.classList.add('is-highlighted')
  }

  /**
   * Handle marker mouseleave event.
   *
   * @param {L.Marker} marker Marker instance
   * @param {Object} feature Feature object
   * @param {Event} e Event object
   */
  _onMarkerMouseleave(marker, feature) {
    // find corresponding binded element
    let key = feature.properties[this._options.lookupAttributeKey]
    let selector = `[${this._options.lookupAttributeName}="${key}"]`
    let el = document.querySelector(selector)
    if (!el) {
      return
    }

    // no need to scroll the binded element out of view
    // but we need to remove class "is-highlighted"
    el.classList.remove('is-highlighted')
    marker._icon.classList.remove('is-highlighted')
  }

  /**
   * Handle binded item mouseenter event.
   *
   * @param {Element} el Binded element
   * @param {Event} e Event object
   */
  _onBindedElementMouseenter(el) {
    // we need to find the binded marker in the hashmap
    // to do this we need to know the key
    // it is expected that key is stored in the data attribute
    let key = el.getAttribute(this._options.lookupAttributeName)
    if (!Object.prototype.hasOwnProperty.call(this._markers, key)) return
    let marker = this._markers[key]

    // add class "is-highlighted" to the binded element and to the corresponding marker
    el.classList.add('is-highlighted')
    marker._icon.classList.add('is-highlighted')
  }

  /**
   * Handle binded item mouseleave event.
   *
   * @param {Element} el Binded element
   * @param {Event} e Event object
   */
  _onBindedElementMouseleave(el) {
    let key = el.getAttribute(this._options.lookupAttributeName)
    if (!Object.prototype.hasOwnProperty.call(this._markers, key)) return
    let marker = this._markers[key]

    // remove class "is-highlighted" from the binded element and from the corresponding marker
    el.classList.remove('is-highlighted')
    marker._icon.classList.remove('is-highlighted')
  }
}
