apiKey = "AAPKc4890c4654534900a686c06f0aae2052DKqIh5UizpYasKOG1TjkmCg6_XVR3yxHlk7iHjMAzsWBI5nQtIVp-xqC4PzChRCl";

let map; // Global variable to store the map

function displayMap(location) {
  return new Promise(function (resolve, reject) {
    require([
      "esri/config",
      "esri/Map",
      "esri/views/MapView",
      "esri/Graphic",
      "esri/layers/GraphicsLayer",
    ], function (esriConfig, Map, MapView, Graphic, GraphicsLayer) {
      esriConfig.apiKey = apiKey;

      const map = new Map({
        basemap: "arcgis/topographic", // basemap styles service
      });

      const view = new MapView({
        map: map,
        center: [parseFloat(location.longitude), parseFloat(location.latitude)],
        zoom: 13,
        container: "map",
      });

      const marker = {
        type: "point",
        longitude: parseFloat(location.longitude),
        latitude: parseFloat(location.latitude),
      };

      const simpleMarkerSymbol = {
        type: "simple-marker",
        color: [226, 119, 40], // Orange
        outline: {
          color: [255, 255, 255], // White
          width: 1,
        },
      };

      const graphicsLayer = new GraphicsLayer();

      const pointGraphic = new Graphic({
        geometry: marker,
        symbol: simpleMarkerSymbol,
      });

      graphicsLayer.add(pointGraphic);
      map.add(graphicsLayer);

      resolve({ map: map, view: view });
    });
  });
}

function getCurrentLocation() {
  return new Promise(function (resolve, reject) {
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function (position) {
          const location = {
            latitude: position.coords.latitude,
            longitude: position.coords.longitude,
          };
          // console.log("Current Location:", location);
          resolve(location);
        },
        function (error) {
          console.error("Geolocation error code:", error.code);
          console.error("Geolocation error message:", error.message);

          if (error.code === 1) {
            // User denied geolocation permission
            reject("User denied geolocation permission");
          } else {
            reject(error);
          }
        }
      );
    } else {
      reject("Geolocation is not supported by this browser.");
    }
  });
}

getCurrentLocation()
  .then(function (location) {
    return displayMap(location);
  })
  .catch(function (error) {
    console.error("Error getting current location:", error);
  });