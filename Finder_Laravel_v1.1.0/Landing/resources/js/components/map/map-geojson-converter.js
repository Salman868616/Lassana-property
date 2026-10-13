export default class MapGeoJsonConverter {
  constructor() {}

  /**
   * Get FeatureCollection from the provided data.
   *
   * @param {Array} data Data to convert to GeoJSON
   * @returns {object} GeoJSON FeatureCollection
   */
  featureCollection(data) {
    // convert each item to GeoJSON format
    const features = data.map((item) => {
      // build geometry based on the property item.geometryType
      // if the property is not provided, default to 'Point'
      // convert to lower case to make it case-insensitive
      let geometryType = item.geometryType
        ? item.geometryType.toLowerCase()
        : 'point'

      switch (geometryType) {
        case 'polygon':
          return this.polygon(item)
        default:
          return this.point(item)
      }
    })
    return {
      type: 'FeatureCollection',
      features: features,
    }
  }

  /**
   * Get GeoJSON feature with geometry type 'Point' from the provided item.
   *
   * @param {object} item Single item to convert to GeoJSON
   * @returns {object} GeoJSON Feature with geometry type 'Point'
   */
  point(item) {
    const { coordinates, ...properties } = item
    return {
      type: 'Feature',
      properties: properties,
      geometry: {
        type: 'Point',
        coordinates: [coordinates.lng, coordinates.lat],
      },
    }
  }

  /**
   * Get GeoJSON feature with geometry type 'Polygon' from the provided item.
   *
   * @param {object} item Single item to convert to GeoJSON
   * @returns {object} GeoJSON Feature with geometry type 'Polygon'
   */
  polygon(item) {
    const { coordinates, ...properties } = item
    return {
      type: 'Feature',
      properties: properties,
      geometry: {
        type: 'Polygon',
        coordinates: coordinates,
      },
    }
  }
}
