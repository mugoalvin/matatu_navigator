const id = (ID) => {
  return document.getElementById(ID);
};
const className = (className) => {
  return document.getElementsByClassName(className);
}
const querySelectorAll = (identifier) => {
  return document.querySelectorAll(identifier);
};
const querySelector = (selector) => {
  return document.querySelector(selector)
}
apiKey = "AAPKc4890c4654534900a686c06f0aae2052DKqIh5UizpYasKOG1TjkmCg6_XVR3yxHlk7iHjMAzsWBI5nQtIVp-xqC4PzChRCl";

let map;

function displayMap(location) {
  return new Promise(function (resolve, reject) {
    require(["esri/config", "esri/Map", "esri/views/MapView", "esri/Graphic", "esri/layers/GraphicsLayer"], function (esriConfig, Map, MapView, Graphic, GraphicsLayer) {
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

function getDirectionsBtn(mapData, originPoint, originDestination) {
  require([
    "esri/config",
    "esri/Graphic",
    "esri/rest/route",
    "esri/rest/support/RouteParameters",
    "esri/rest/support/FeatureSet",
  ], function (esriConfig, Graphic, route, RouteParameters, FeatureSet) {
    esriConfig.apiKey = apiKey;

    const map = mapData.map;
    const view = mapData.view;

    const routeUrl = "https://route-api.arcgis.com/arcgis/rest/services/World/Route/NAServer/Route_World";

    // Clear Existing Route
    const existingGraphics = view.graphics.filter(
      (graphic) => graphic.layerId === undefined
    );
    view.graphics.removeMany(existingGraphics);
      

    addGraphic("origin", originPoint);
    addGraphic("destination", originDestination);

    function addGraphic(type, point) {
      const graphic = new Graphic({
        symbol: {
          type: "simple-marker",
          color: type === "origin" ? "white" : "black",
          size: "8px",
        },
        geometry: {
          type: "point",
          latitude: point.latitude,
          longitude: point.longitude,
        },
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
          // ============================Shows the directions descriptions================================
          if (data.routeResults.length > 0) {
            const directions = document.createElement("ol");
            directions.classList =
              "esri-widget esri-widget--panel esri-directions__scroller";
            directions.style.marginTop = "0";
            directions.style.padding = "15px 15px 15px 30px";

            const features = data.routeResults[0].directions.features;
            // Show each direction
            console.log(features);
            features.forEach(function (result, i) {
              const direction = document.createElement("li");
              direction.innerHTML = 
                result.attributes.text +
                " (" +
                (result.attributes.length * 1.60934).toFixed(2) +
                " km)";
              directions.appendChild(direction);
            });
            const directionSectionDiv = document.getElementById('directionSectionDiv')
            directionSectionDiv.innerText = ''
            directionSectionDiv.append(directions)
            console.log('Done');
          }
          // =====================================================================================================
        })

        .catch(function (error) {
          console.log(error);
        });
    }

    getRoute();
  });
}

function isWithinRadius(yourLatitude, yourLongitude, centerLatitude, centerLongitude, radiusInKm) {
  // Convert degrees to radians
  const yourLatRad = yourLatitude * Math.PI / 180;
  const yourLonRad = yourLongitude * Math.PI / 180;
  const centerLatRad = centerLatitude * Math.PI / 180;
  const centerLonRad = centerLongitude * Math.PI / 180;

  // Calculate earth radius in kilometers
  const earthRadius = 6371;

  // Calculate distance using Haversine formula
  const dLat = centerLatRad - yourLatRad;
  const dLon = centerLonRad - yourLonRad;
  const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
    Math.cos(yourLatRad) * Math.cos(centerLatRad) *
    Math.sin(dLon / 2) * Math.sin(dLon / 2);
  const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));

  // Check if distance is less than radius
  const distance = earthRadius * c;
  return distance <= radiusInKm;
}


function clearFeedbackSection() {
  while (feedbackSection.firstChild) {
    feedbackSection.removeChild(feedbackSection.firstChild)
  }
}

function generateFeedbackCards(feedbackData) {
  var cardsHTML = '';
  var currentName = null;

  var integer = 0
  feedbackData.forEach(feedback => {
      if (feedback.name !== currentName) {
          if (currentName !== null) {
              cardsHTML += '</div>';
          }
          cardsHTML += `<div class="card">
              <h3>${feedback.name}</h3>`;
          currentName = feedback.name;
      }
      cardsHTML += `<div class="individualFeedback">
          <div id="userStar">
            <h4>${feedback.username}</h4>
            <div id="stars" class="stars${integer}">
              <span class="feedbackstarRating" data-value="1">&#9733;</span>
              <span class="feedbackstarRating" data-value="2">&#9733;</span>
              <span class="feedbackstarRating" data-value="3">&#9733;</span>
              <span class="feedbackstarRating" data-value="4">&#9733;</span>
              <span class="feedbackstarRating" data-value="5">&#9733;</span>
            </div>
          </div>

          <p>${feedback.feedback}</p>
      </div>`;
      integer+=1
  });
  cardsHTML += '</div>';
  return cardsHTML;
}

function generateColor(value) {
  value = Math.max(0, Math.min(5, value));
  var hue = (value / 5) * 120;
  var rgbColor = "hsl(" + hue + ", 100%, 50%)";
  return rgbColor;
}