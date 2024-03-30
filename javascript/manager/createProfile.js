const id = (ID) => {
  return document.getElementById(ID);
}

var map = L.map("map").setView([0, 0], 2);

L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
  attribution: "© OpenStreetMap contributors",
}).addTo(map);

function onMapClick(e) {
  var lat = e.latlng.lat;
  var lng = e.latlng.lng;

  const latitudeInput = id('latitude')
  const longitudeInput = id('longitude')
  
  latitudeInput.value = lat
  longitudeInput.value = lng

  console.log(
    "You clicked the map at latitude " + lat + " and longitude " + lng
  );
}

map.on("click", onMapClick);