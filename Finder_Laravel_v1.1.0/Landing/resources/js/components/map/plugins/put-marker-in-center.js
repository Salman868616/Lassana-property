/* eslint-disable no-undef */
import { merge } from '../map-utils'

/**
 * This plugin adds a marker to coordinates defined in the map center option.
 *
 * This will work as a fallback in case no features are provided to the map
 * or if you need just to show one marker, e.g. coordinates of your business location.
 */
export default class PutMarkerInCenter {
  _core
  _options
  _center
  _zoom
  _shouldAddMarker = true

  static defaultOptions = {
    template:
      '<div class="map-marker"><i class="fi-map-pin-filled text-primary fs-4"></i></div>',
  }

  /**
   * Constructor.
   *
   * @param {Object} options Plugin options
   */
  constructor(options) {
    this._options = merge(PutMarkerInCenter.defaultOptions, options)
  }

  /**
   * Register the plugin.
   *
   * @param {Map} core Map core instance
   */
  register(core) {
    this._core = core

    // as center can be defined in 3 ways:
    // - as an array of coordinates,
    // - as an object with lat and lng properties,
    // - as Leaflet LatLng object
    // we need to normalize it to a simple object with lat and lng properties
    // as expected by the features list and GeoJSON converter
    let center = this._core._options.center
    if (typeof center === 'undefined') {
      console.warn('Center is not defined, marker will not be added')
      this._shouldAddMarker = false
      return
    }

    if (Array.isArray(center)) {
      this._center = { lat: center[0], lng: center[1] }
    } else if (typeof center === 'object') {
      this._center = { lat: center.lat, lng: center.lng }
    } else if (typeof center === 'function') {
      this._center = { lat: center.lat, lng: center.lng }
    } else {
      // something went wrong, so we will not add the marker
      console.warn(
        'The center is not defined correctly, marker will not be added',
        center
      )
      this._shouldAddMarker = false
      return
    }

    // now it would be nice to adjust the zoom level to show the marker
    // because during the rendering of the features zoom will be set to fit the bounds
    // of the features, so we need to set it back to configured value in the options
    this._zoom = this._core._options.zoom

    L.DomEvent.addListener(
      core._map.getContainer(),
      'map.rendered',
      this.onMapRendered.bind(this)
    )
  }

  /**
   * Append a "center marker" to the features list.
   *
   * @param {Array} features Features list
   * @returns {Array} Features list with the center marker appended
   */
  features(features) {
    let featuresIsArray = Array.isArray(features)
    let featuresIsEmpty = featuresIsArray && features.length === 0
    if (this._shouldAddMarker && (!featuresIsArray || featuresIsEmpty)) {
      let feature = {
        geometryType: 'point',
        coordinates: this._center,
        markerTemplate: this._options.template,
        popupTemplate: '',
      }
      // if features is not an array, we need to create it
      // but if it is an array, we can just push the new feature
      if (!featuresIsArray) {
        features = [feature]
      } else {
        features.push(feature)
      }
    }
    return features
  }

  /**
   * Adjust zoom level after the map has been rendered.
   *
   * @param {Event} e Event object
   */
  onMapRendered() {
    if (this._shouldAddMarker) {
      this._core._map.setZoom(this._zoom)
    }
  }
}
