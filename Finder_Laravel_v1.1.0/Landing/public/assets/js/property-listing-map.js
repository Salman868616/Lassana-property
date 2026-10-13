/* global L */
(() => {
  const element = document.getElementById('property-listing-map')
  if (!element) return
  const status = document.getElementById('property-map-status')
  const map = L.map(element).setView([7.8731, 80.7718], 7)
  L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; OpenStreetMap contributors',
  }).addTo(map)

  // The map is also inside a mobile offcanvas, which changes its size on opening.
  if (typeof ResizeObserver !== 'undefined') {
    new ResizeObserver(() => map.invalidateSize()).observe(element)
  }

  fetch(element.dataset.markersUrl, { headers: { Accept: 'application/json' } })
    .then(response => {
      if (!response.ok) throw new Error('Map request failed')
      return response.json()
    })
    .then(items => {
      if (!Array.isArray(items)) throw new Error('Invalid map response')
      const points = []
      items.forEach(item => {
        const coordinates = item.coordinates
        if (coordinates?.lat == null || coordinates?.lng == null) return
        if (coordinates.lat === '' || coordinates.lng === '') return
        const lat = Number(coordinates.lat)
        const lng = Number(coordinates.lng)
        if (!Number.isFinite(lat) || !Number.isFinite(lng) || Math.abs(lat) > 90 || Math.abs(lng) > 180) return
        const point = [lat, lng]
        const label = document.createElement('span')
        label.textContent = item.price === 'On request' ? 'Price on request' : `LKR ${item.price}`
        const popup = document.createElement('div')
        const price = document.createElement('strong')
        price.textContent = label.textContent
        const address = document.createElement('div')
        address.textContent = item.address || 'Property location'
        popup.append(price, address)
        L.marker(point).addTo(map)
          .bindTooltip(label, { permanent: true, direction: 'bottom' })
          .bindPopup(popup)
        points.push(point)
      })
      if (points.length) {
        map.fitBounds(points, { padding: [60, 60], maxZoom: 14 })
        status.textContent = 'Only properties with saved map coordinates are shown.'
      } else {
        status.textContent = 'No property map locations available yet. Browse the listings for address details.'
      }
    })
    .catch(() => {
      status.textContent = 'Property locations could not be loaded. Please refresh to try again.'
    })
})()
