apiKey = "AAPKc4890c4654534900a686c06f0aae2052DKqIh5UizpYasKOG1TjkmCg6_XVR3yxHlk7iHjMAzsWBI5nQtIVp-xqC4PzChRCl";

let map ; // Global variable to store the map

function displayMap(location) {
  return new Promise(function(resolve, reject) {
    require(["esri/config", "esri/Map", "esri/views/MapView", "esri/Graphic", "esri/layers/GraphicsLayer"], function (esriConfig, Map, MapView, Graphic, GraphicsLayer) {
      esriConfig.apiKey = apiKey;

      const map = new Map({
        basemap: "arcgis/topographic", // basemap styles service
      });

      const view = new MapView({
        map: map,
        // Longitude, latitude
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

      resolve( { map: map, view: view } );
    });
  });
}


function getDirections(mapData, fromCurrentLocation) {
  require(["esri/config", "esri/Map", "esri/views/MapView", "esri/Graphic", "esri/rest/route", "esri/rest/support/RouteParameters", "esri/rest/support/FeatureSet"], function (esriConfig, Map, MapView, Graphic, route, RouteParameters, FeatureSet) {
    esriConfig.apiKey = apiKey;

    const map = mapData.map;
    const view = mapData.view;


    const routeUrl = "https://route-api.arcgis.com/arcgis/rest/services/World/Route/NAServer/Route_World";

    view.on("click", function (event) {
      if (view.graphics.length === 0) {
        addGraphic("origin", event.mapPoint);
        // addGraphic("origin", getCurrentLocation());
      }
      else if (view.graphics.length === 1) {
        addGraphic("destination", event.mapPoint);
        
        getRoute();
      }
      else {
        view.graphics.removeAll();
        // addGraphic("origin", event.mapPoint);
      }
    });

    function addGraphic(type, point) {
      const graphic = new Graphic({
        symbol: {
          type: "simple-marker",
          color: type === "origin" ? "white" : "black",
          size: "8px",
        },
        geometry: point,
      });
      view.graphics.add(graphic);
    }

    function getRoute() {
      const routeParams = new RouteParameters({
        stops: new FeatureSet({
          features: view.graphics.toArray(),
        }),

        returnDirections: true,
      });

      route
        .solve(routeUrl, routeParams)
        .then(function (data) {
          data.routeResults.forEach(function (result) {
            result.route.symbol = {
              type: "simple-line",
              color: [5, 150, 255],
              width: 3,
            };
            view.graphics.add(result.route);
          });

          // Display directions
          if (data.routeResults.length > 0) {
            const directions = document.createElement("ol");
            directions.classList =
              "esri-widget esri-widget--panel esri-directions__scroller";
            directions.style.marginTop = "0";
            directions.style.padding = "15px 15px 15px 30px";
            

            // ============================Shows the directions descriptions on the topleft side of the screen================================

            
            // const features = data.routeResults[0].directions.features;
            // Show each direction
            // features.forEach(function (result, i) {
            //   const direction = document.createElement("li");
            //   direction.innerHTML =
            //     result.attributes.text +
            //     " (" +
            //     result.attributes.length.toFixed(2) +
            //     " miles)";
            //   directions.appendChild(direction);
            // });
            // view.ui.add(directions, "top-right");
            // =====================================================================================================

            view.ui.empty("top-right");
          }
        })

        .catch(function (error) {
          console.log(error);
        });
    }
  });
}


// ===================== Getting the coordinates of the current location ==========================

function getCurrentLocation() {
  return new Promise((resolve, reject) => {
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(
              function (position) {
                  const coordinates = {
                      latitude: position.coords.latitude,
                      longitude: position.coords.longitude
                  };
                  resolve(coordinates);
              },
              function (error) {
                  reject("Error getting location: " + error.message);
              }
          );
      }
      else {
          reject("Geolocation is not supported by this browser.");
      }
  });
}

// Calling the function
// getCurrentLocation().then(coordinates => {
//   displayMap(coordinates);
// })

// =================================================================================