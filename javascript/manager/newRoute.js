const destinationSelected = id("destination");
const latitudeInputBox = id("latitude");
const longitudeInputBox = id("longitude");

destinationSelected.addEventListener('change', () => {
    matatuCompanies.forEach(matatuCompany => {
        if (destinationSelected.value.split(', ')[0] == matatuCompany.name && destinationSelected.value.split(', ')[1] == matatuCompany.city) {
            latitudeInputBox.value = matatuCompany.latitude;
            longitudeInputBox.value = matatuCompany.longitude;
        }
    });
})