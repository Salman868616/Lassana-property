/**
 * Interactive map component
 * @requires https://www.maptiler.com/
 * @requires https://leafletjs.com/
 */
import Map from './map/map-core'
import BindToMarker from './map/plugins/bind-to-marker'
import PutMarkerInCenter from './map/plugins/put-marker-in-center'

export default () => {
  // get all map elements
  const maps = document.querySelectorAll('[data-map]')
  if (!maps.length) {
    return
  }

  const readJsonFile = async (url) => {
    try {
      const response = await fetch(url)
      return await response.json()
    } catch (error) {
      console.error(error)
      return []
    }
  }

  // store all map instances
  const mapInstances = []

  // for each map element
  maps.forEach((map) => {
    // parse options from data attribute
    let options = JSON.parse(map.dataset.map || '{}')

    // create a new map instance
    const mapInstance = new Map(map, options)
    mapInstance.registerPlugin(new BindToMarker())
    mapInstance.registerPlugin(new PutMarkerInCenter())

    // store the map instance
    mapInstances.push(mapInstance)

    // now deal with features
    // to render the map you need to call the render() method with an array of features
    // this can be done by calling the API or via the data attribute [data-map-markers]
    // this attribute supports both JSON array and URL to a JSON file
    let hasFeatures = typeof map.dataset.mapMarkers !== 'undefined'
    if (hasFeatures) {
      let mapMarkers = map.dataset.mapMarkers || null
      // if is string and ends with .json, read the file
      if (typeof mapMarkers === 'string' && mapMarkers.endsWith('.json')) {
        readJsonFile(mapMarkers).then((data) => {
          mapInstance.render(data)
        })
        // if is string and is a valid JSON, parse it
        // for example is a string and starts with '[' or '{'
      } else if (
        typeof mapMarkers === 'string' &&
        (mapMarkers.startsWith('[') || mapMarkers.startsWith('{'))
      ) {
        let features = JSON.parse(mapMarkers)
        mapInstance.render(features)
      } else {
        console.warn('Invalid [data-map-markers] attribute:', mapMarkers)
        console.warn('Expected a JSON array or a URL to a JSON file')
      }
    } else {
      // at this point we assume that it's a developer's responsibility to call the render() method
      // but to make things works out of the box we can call the render() method without any features
      mapInstance.render()
    }
  })
}
