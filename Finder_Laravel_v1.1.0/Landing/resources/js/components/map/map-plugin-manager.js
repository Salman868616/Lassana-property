export default class MapPluginManager {
  _mapCore
  _registeredPlugins = new Set()

  /**
   * Constructor.
   *
   * @param {object} mapCore The instance of the Map class
   */
  constructor(mapCore) {
    this._mapCore = mapCore
  }

  /**
   * Register plugins.
   *
   * @param {Array} plugins List of plugins
   */
  registerPlugins(plugins) {
    plugins.forEach((plugin) => {
      this.registerPlugin(plugin)
    })
  }

  /**
   * Register a plugin.
   *
   * @param {object} plugin Plugin object
   */
  registerPlugin(plugin) {
    if (!this._registeredPlugins.has(plugin)) {
      if (typeof plugin.register === 'function') {
        // register the plugin with the map instance
        plugin.register(this._mapCore)
        // add the plugin to the list of registered plugins to avoid re-registering it
        this._registeredPlugins.add(plugin)
      }
    } else {
      console.warn('Plugin already registered:', plugin)
    }
  }

  /**
   * Handle features before they will be rendered on the map.
   *
   * Suitable for filtering, modifying, or processing features before they are rendered on the map.
   *
   * This method applies the 'filter' method of each registered plugin to the list of features.
   * Method calls are chained, so the output of one plugin is passed as input to the next plugin.
   * Features are processed in the order in which the plugins were registered.
   *
   * @param {Array} features List of features
   * @returns {Array} Processed features
   */
  handleFeatures(features) {
    let processedItems = features
    this._registeredPlugins.forEach((plugin) => {
      if (typeof plugin.features === 'function') {
        processedItems = plugin.features(processedItems)
      }
    })
    return processedItems
  }

  /**
   * Handle the marker instance.
   *
   * Suitable for modifying the marker instance before it is added to the map.
   *
   * This method applies the 'marker' method of each registered plugin to the marker instance.
   * Method calls are chained, so the output of one plugin is passed as input to the next plugin.
   * The marker instance is processed in the order in which the plugins were registered.
   *
   * @param {L.Marker} marker Marker instance
   * @param {object} feature Feature object
   * @returns {L.Marker} Marker instance
   */
  handleMarker(marker, feature) {
    let instance = marker
    this._registeredPlugins.forEach((plugin) => {
      if (typeof plugin.marker === 'function') {
        instance = plugin.marker(instance, feature)
      }
    })
    return instance
  }

  /**
   * Handle the popup content.
   *
   * Suitable for modifying the popup content before it binds to the marker.
   * By returning an empty string from the plugin method, you can prevent the popup from being displayed.
   *
   * This method applies the 'popup' method of each registered plugin to the popup template.
   * Method calls are chained, so the output of one plugin is passed as input to the next plugin.
   * The popup template is processed in the order in which the plugins were registered.
   *
   * @param {string} template Popup template
   * @param {object} feature Feature object
   * @returns {string} Popup template
   */
  handlePopupContent(template, feature) {
    let popupTemplate = template
    this._registeredPlugins.forEach((plugin) => {
      if (typeof plugin.popup === 'function') {
        popupTemplate = plugin.popup(popupTemplate, feature)
      }
    })
    return popupTemplate
  }
}
