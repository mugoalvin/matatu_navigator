document.getElementById('user').addEventListener('click', () => {
    const dropDown = document.getElementById('dropDown');
    const dropDownButton = document.querySelector('#dropDown button');
    const dropDownIonIcon = document.querySelector('#dropDown ion-icon');
    const dropDownArror = document.getElementById('chevron-down-outline')
    const isHidden = dropDownButton.style.color == 'transparent';

    dropDownButton.style.padding = isHidden ? '5px 10px' : '0';
    dropDownButton.style.height = isHidden ? '30px' : '0';
    dropDownButton.style.color = isHidden ? 'var(--black)' : 'transparent';
    dropDownIonIcon.style.color = isHidden ? 'var(--black)' : 'transparent';
    dropDownArror.style.transform = isHidden ? 'rotateZ(180deg)' : 'rotateZ(0deg)'
});

document.querySelector('ion-icon[name=menu]').addEventListener('click', () => {
    const sideBar = document.getElementById('sideBar')
    const mainTag = document.getElementById('main')
    if (sideBar.style.width != '0%') {
        sideBar.style.width = '0%'
        sideBar.style.paddingInline = '0';
        mainTag.style.width = '100%'
    }
    else {
        sideBar.style.width = '20%'
        mainTag.style.width = '80%'
        sideBar.style.paddingInline = '1vw';
    }
})


var integer = 0;

availableMatatusObj.forEach(availableMatatuObj => {
    ratingArray = [];
    feedbacks.forEach(feedback => {
        if (availableMatatuObj.route_id == feedback.route_id) {
            ratingArray.push(feedback.rating);
        }
    });

    var totalRating = ratingArray.reduce((acc, curr) => acc + curr, 0);
    var averageRating = ratingArray.length > 0 ? totalRating / ratingArray.length : 0;

    var idOfParagraph = "paragraph" + integer;
    var ratingP = document.querySelector("." + idOfParagraph);
    ratingP.innerText = "Rating: " + averageRating.toFixed(1);
    ratingP.style.fontWeight = 900
    ratingP.style.color = generateColor(averageRating)

    var stars = document.querySelectorAll('.stars'+ integer + ' .starRating');
    stars.forEach(function (star, index) {
        if (index < averageRating) {
            star.classList.add("active");
        } else {
            star.classList.remove("active");
        }
    });

    integer += 1;
});