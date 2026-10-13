/* eslint-disable no-undef */
import MapGeoJsonConverter from './map-geojson-converter'
import MapPluginManager from './map-plugin-manager'
import { merge, template } from './map-utils'

/**
 * Core class for the map component.
 */
export default class Map {
  _map
  _markersLayer
  _options = {}
  _converter
  _pluginManager

  static defaultOptions = {
    center: [51.509865, -0.118092],
    zoom: 10,
    minZoom: 1,
    maxZoom: 22,
    tileLayer: 'https://tile.openstreetmap.org/{z}/{x}/{y}.png',
    attribution: '© OpenStreetMap contributors',
    tileSize: 256,
    setViewStrategy: 'bounds', // 'center' or 'bounds'
    zoomOffset: 0,
    plugins: [],
    templates: {
      marker:
        '<div class="map-marker"><i class="fi-map-pin-filled text-primary fs-4"></i></div>',
      popup: '',
    },
  }

  /**
   * Constructor
   *
   * @param {HTMLElement} htmlElement Map container element
   * @param {object} options Options object
   */
  constructor(htmlElement, options) {
    // initialize dependencies
    this._converter = new MapGeoJsonConverter()
    this._pluginManager = new MapPluginManager(this)

    // merge the provided options with the default options
    this._options = merge(Map.defaultOptions, options)
    this._map = this._createMap(htmlElement)

    // create and add markers layer to the map
    this._markersLayer = this._createMarkersLayer()
    this._map.addLayer(this._markersLayer)

    // register the provided plugins
    this._pluginManager.registerPlugins(this._options.plugins)
  }

  /**
   * Render the map with the provided features.
   *
   * @param {Array} features List of features
   */
  render(features) {
    // process the features with the registered plugins
    let processedItems = this._pluginManager.handleFeatures(features)
    // convert the processed items to GeoJSON
    let geodata = this._converter.featureCollection(processedItems)
    // create a GeoJSON layer
    let geoJsonLayer = this._createGeoJsonLayer(geodata)
    // clear existing markers
    this._markersLayer.clearLayers()
    // add new markers
    this._markersLayer.addLayer(geoJsonLayer)

    // if center is defined in the options, set the map center
    // otherwise, fit the map to the bounds of the markers
    if (this._options.center && this._options.setViewStrategy === 'center') {
      this._map.setView(this._options.center, this._options.zoom)
    } else {
      this._map.fitBounds(this._markersLayer.getBounds())
    }

    // fire the 'map.rendered' event
    this._event('map.rendered', {
      features: processedItems,
      geoJsonLayer: geoJsonLayer,
      markersLayer: this._markersLayer,
      map: this._map,
    })
  }

  /**
   * Get options.
   *
   * @returns {object} Options object
   */
  getOptions() {
    return this._options
  }

  /**
   * Register a plugin.
   *
   * @param {object} plugin Plugin object
   */
  registerPlugin(plugin) {
    this._pluginManager.registerPlugin(plugin)
  }

  /**
   * Create a Leaflet map.
   *
   * @param {HTMLElement} htmlElement Map container element
   * @returns {L.Map}
   */
  _createMap(htmlElement) {
    const map = L.map(htmlElement, {
      zoom: this._options.zoom,
      minZoom: this._options.minZoom,
      maxZoom: this._options.maxZoom,
    })
    const tiles = L.tileLayer(this._options.tileLayer, {
      tileSize: this._options.tileSize,
      zoomOffset: this._options.zoomOffset,
      attribution: this._options.attribution,
    })
    map.addLayer(tiles)
    return map
  }

  /**
   * Create a Leaflet feature group.
   *
   * Feature group is a layer that holds other layers (like markers).
   * Of course, you can add markers directly to the map, but using a feature group
   * allows you to manipulate multiple markers at once. Also, it will make it easier
   * to clear all markers at once, for example. Or replace a feature group with a cluster group.
   *
   * @returns {L.FeatureGroup}
   */
  _createMarkersLayer() {
    return L.featureGroup()
  }

  /**
   * Create a Leaflet GeoJSON layer.
   *
   * @param {object} geodata GeoJSON data
   * @returns {L.GeoJSON}
   */
  _createGeoJsonLayer(geodata) {
    return L.geoJSON(geodata, {
      pointToLayer: (feature, latlng) => {
        let markerTemplate = this._getMarkerTemplate(feature)
        let markerContent = template(markerTemplate, feature.properties)

        let marker
        if (markerContent.trim() !== '') {
          marker = L.marker(latlng, {
            icon: L.divIcon({
              html: markerContent,
              className: 'map-marker',
            }),
          })
        } else {
          marker = L.marker(latlng)
        }

        return this._pluginManager.handleMarker(marker, feature)
      },
      onEachFeature: (feature, layer) => {
        let popupTemplate = this._getPopupTemplate(feature)
        let popupContent = this._pluginManager.handlePopupContent(
          template(popupTemplate, feature.properties),
          feature
        )

        // bind the popup to the marker if the popup content is not empty
        if (popupContent.trim() !== '') {
          layer.bindPopup(popupContent)
        }
      },
    })
  }

  /**
   * Get the marker template.
   *
   * The 'markerTemplate' property from the feature will be used if it exists.
   * Otherwise, use the default template from this._options.templates.marker
   *
   * @param {object} feature Feature object
   * @return {string} Marker template
   */
  _getMarkerTemplate(feature) {
    let hasProps = Object.prototype.hasOwnProperty.call(feature, 'properties')
    let hasTemplate = Object.prototype.hasOwnProperty.call(
      feature.properties,
      'markerTemplate'
    )
    // make sure markerTemplate is a string
    let correctType = typeof feature.properties.markerTemplate === 'string'
    let canUseTemplate = hasProps && hasTemplate && correctType

    return canUseTemplate
      ? feature.properties.markerTemplate
      : this._options.templates.marker
  }

  /**
   * Get the popup template.
   *
   * The 'popupTemplate' property from the feature will be used if it exists.
   * Otherwise, use the default template from this._options.templates.popup
   *
   * @param {object} feature Feature object
   * @returns {string} Popup template
   */
  _getPopupTemplate(feature) {
    let hasProps = Object.prototype.hasOwnProperty.call(feature, 'properties')
    let hasTemplate = Object.prototype.hasOwnProperty.call(
      feature.properties,
      'popupTemplate'
    )
    // make sure popupTemplate is a string
    let correctType = typeof feature.properties.popupTemplate === 'string'
    let canUseTemplate = hasProps && hasTemplate && correctType

    return canUseTemplate
      ? feature.properties.popupTemplate
      : this._options.templates.popup
  }

  /**
   * Fire an event on the map container.
   *
   * @param {string} name Name of the event
   * @param {any} data Data to pass with the event
   */
  _event(name, data) {
    const event = new CustomEvent(name, { detail: data })
    this._map.getContainer().dispatchEvent(event)
  }
}
