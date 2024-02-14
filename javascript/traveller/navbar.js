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
    ratingP.innerText = "Rating: " + averageRating;
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