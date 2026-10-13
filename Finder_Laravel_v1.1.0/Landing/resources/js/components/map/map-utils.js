/**
 * Deep merge two or more objects.
 *
 * @param {...object} objects Objects
 * @returns {object} Merged object
 */
const merge = (...objects) => {
  let target = {}
  const merger = (obj) => {
    for (let prop in obj) {
      if (Object.prototype.hasOwnProperty.call(obj, prop)) {
        if (Object.prototype.toString.call(obj[prop]) === '[object Object]') {
          // if the property is a nested object
          target[prop] = merge(target[prop], obj[prop])
        } else {
          // for regular property
          target[prop] = obj[prop]
        }
      }
    }
  }

  // iterate through all objects and
  // deep merge them with target
  for (let i = 0; i < objects.length; i++) {
    merger(objects[i])
  }

  return target
}

/**
 * Replace placeholders in the template string with the provided properties.
 *
 * Example:
 * ```
 * let template = `
 * <div>
 *   <i class="fi-map-pin-filled text-primary fs-4"></i>
 *   <span>{{address}}</span>
 *   <span>{{price}}</span>
 * </div>
 * `
 *
 * let props = {
 *  address: 'Address 1',
 *  price: 100,
 * }
 * let html = template(template, props)
 * ```
 *
 * @param {string} template Template string
 * @param {object} props Properties object
 * @returns {string} Processed template
 */
const template = (template, props) => {
  return template.replace(/{{(.*?)}}/g, (_, key) => props[key.trim()])
}

export { merge, template }
