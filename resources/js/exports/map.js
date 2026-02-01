export async function loadLeaflet() {
  if(document.querySelector('#map-container')) {
    const { default: leaflet } = await import('leaflet')
    window.leaflet = leaflet;
  }
}
