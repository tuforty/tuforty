export const stripUnderscore = (plan) => {
  return String(plan).replace(/_/g, " ");
}

/**
 * Capitalize first character in text.
 * @param {String} text 
 */
export const ucFirst = (text) => {
  return `${text.charAt(0).toUpperCase()}${text.slice(1).toLowerCase()}`;
}