var route_id_div = document.getElementById('route_id_value')
route_id_div.value = localStorage.getItem('route_id')
route_id_div.parentElement.style.display = 'none'
route_id_div.parentElement.parentElement.children[1].style.display = 'none'
route_id_div.parentElement.parentElement.children[2].children[1].style.display = 'none'

// console.log(route_id_div.parentElement.parentElement.children);

document.addEventListener("DOMContentLoaded", function() {
    var stars = document.querySelectorAll(".star");
    
    stars.forEach(function(star) {
        star.addEventListener("click", function() {

            var value = parseInt(this.getAttribute("data-value"));

            console.log("User rating:", value);
            document.getElementById('rating').value = value
            console.log("Done");
            
            // Add .active class to all stars up to the selected one
            stars.forEach(function(s, index) {
                if (index < value) {
                    s.classList.add("active");
                } else {
                    s.classList.remove("active");
                }
            });
        });
    });
});