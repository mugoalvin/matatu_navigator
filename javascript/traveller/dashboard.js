let destinationObj = {
    latitude: null,
    longitude: null
}


getCurrentLocation().then(function (currentLocation) {
    // Near Nakuru
    currentLocation.latitude = -0.2797014315110278
    currentLocation.longitude = 36.077263735725516
    
    // Kabarak Library
    // currentLocation.latitude = -0.16858708483176738, 
    // currentLocation.longitude = 35.966359953031706

    // Mombasa
    // currentLocation.latitude = -4.043546429025343
    // currentLocation.longitude = 39.667801146705806
    
    displayMap(currentLocation).then((mapData) => {
        const matatuOptions = querySelectorAll("#matatuOption");
        matatuOptions.forEach((matatuOption) => {
            matatuOption.addEventListener("click", () => {
                localStorage.setItem('route_id', matatuOption.querySelector("#details #route_id").innerText );
                availableMatatusObj.forEach((availableMatatuObj) => {
                    if (availableMatatuObj.matatu_company_name == matatuOption.children[1].children[0].innerText) {
                        destinationObj = {
                            latitude: availableMatatuObj.destination_latitude,
                            longitude: availableMatatuObj.destination_longitude
                        }
                        if (departureCity == availableMatatuObj.departure_city) {
                            if (matatuOption.children[1].children[0].innerText == availableMatatuObj.matatu_company_name) {
                                getDirectionsBtn(mapData, currentLocation, availableMatatuObj);
                                getDirectionsBtn(mapData, availableMatatuObj, destinationObj);
                            }
                        }
                        else {
                            city_of_departure = availableMatatuObj.departure_city
                            latitude_of_departure = availableMatatuObj.destination_latitude
                            longitude_of_departure = availableMatatuObj.destination_longitude
                            
                            city_of_destination = availableMatatuObj.destination_city
                            latitude_of_destination = availableMatatuObj.departure_latitude
                            longitude_of_destination = availableMatatuObj.departure_longitude
                            
                            availableMatatuObj.departure_city = availableMatatuObj.destination_city
                            availableMatatuObj.latitude = availableMatatuObj.destination_latitude
                            availableMatatuObj.longitude = availableMatatuObj.destination_longitude
                            
                            destinationObj = {
                                latitude: latitude_of_destination,
                                longitude: longitude_of_destination
                            }

                            if (matatuOption.children[1].children[0].innerText == availableMatatuObj.matatu_company_name) {
                                getDirectionsBtn(mapData, currentLocation, availableMatatuObj);
                                getDirectionsBtn(mapData, availableMatatuObj, destinationObj);
                            }
                        }
                    }
                })
                
                const yourLatitude = currentLocation.latitude
                const yourLongitude = currentLocation.longitude
                const centerLatitude = destinationObj.latitude;
                const centerLongitude = destinationObj.longitude;
                const radiusInKm = 1;
                
                if (isWithinRadius(yourLatitude, yourLongitude, centerLatitude, centerLongitude, radiusInKm)) {
                    var ifRate = confirm("You are about or have arrived. Would like to send rate your experience?")
                    if (ifRate) {
                        window.location.href = "../../php/traveller/rating.php";
                    }
                    else {
                        console.log("Rating cancelled");
                    }
                }
            })
        })
    })
})
.catch(function (error) {
    console.error("Error getting current location:", error);
});


// ====================Toggle FeedBack Section====================
var feedbackSection = id('feedbackSection')
var toggleComment = id('toggleCommentIcon')
id('toggleComment').addEventListener('click', () => {
    if (feedbackSection.style.width == '0px') {
        feedbackSection.style.width = '100%'
        feedbackSection.style.right = '0px'
        toggleComment.style.transform = 'rotateY(180deg)'
    }
    else {
        feedbackSection.style.width = '0px'
        feedbackSection.style.right = '-45%'
        toggleComment.style.transform = 'rotateY(0deg)'
    }
})

// ====================Toggle Directions Section====================

var directionSection = id('directionSection')
var toggleDirections = id('toggleDirections')
var toggleDirectionsIcon = id('toggleDirectionsIcon')

toggleDirections.addEventListener('click', () => {
    if (directionSection.style.transform == "translateX(600px)") {
        directionSection.style.transform = "translateX(-10px)"
        toggleDirectionsIcon.style.transform = 'rotateZ(270deg)'
    }
    else {
        directionSection.style.transform = "translateX(600px)"
        toggleDirectionsIcon.style.transform = 'rotateZ(0deg)'
    }
})

// =======================Toggle DarkMode=======================

var darkModeToggle = id("darkModeToggle")
var navbarHeader = id('navbarHeader')
var sideBar = id('sideBar')
var main = id('main')
var companyName = querySelector('#navbarHeader div h3')
var sideToggle = querySelector('#navbarHeader div ion-icon')
var selects = querySelectorAll('select')
var formDesDep = id('formDesDep')
var dropDown = querySelector('#dropDown button')

darkModeToggle.addEventListener('click', () => {
    if (darkModeToggle.getAttribute('name') == "moon") {
        darkModeToggle.setAttribute('name', 'sunny')
        navbarHeader.style.backgroundColor = 'var(--darkerBackground)'
        sideBar.style.backgroundColor = 'var(--darkerBackground)'
        main.style.backgroundColor = 'var(--darkBackground)'
        companyName.style.color = 'var(--darkText)'
        sideBar.style.color = 'var(--darkText)'
        selects.forEach(select => {
            select.style.backgroundColor = 'var(--darkText)'
        });
        formDesDep.style.backgroundColor = 'var(--darkText)'
        dropDown.style.backgroundColor = 'var(--darkerBackground)'
        dropDown.style.color = 'var(--darkText)'
    }
    else {
        darkModeToggle.setAttribute('name', 'moon')
        navbarHeader.style.backgroundColor = 'var(--white)'
        sideBar.style.backgroundColor = 'var(--white)'
        main.style.backgroundColor = 'var(--white)'
        companyName.style.color = 'var(--black)'
        sideBar.style.color = 'var(--black)'
        selects.forEach(select => {
            select.style.backgroundColor = ''
        });
        formDesDep.style.backgroundColor = ''
        dropDown.style.backgroundColor = ''
        dropDown.style.color = 'var(--black)'
    }
})