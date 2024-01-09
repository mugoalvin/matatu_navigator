const byId = (id) => {
    return document.getElementById(id);
}

const byQueryAll = (query) => {
    return document.querySelectorAll(query)
}

const fnameInput = byId("fname")
const lnameInput = byId("lname")
const passwordInput = byId("password")
const showPasswordIcon = byId("showPassIcon")
const usernameInput = byId("usernameInput")

const fnameErrorDiv = byId("fnameError")
const lnameErrorDiv = byId("lnameError")
const usernameErrorDiv = byId("usernameError")
const passwordErrorDiv = byId("passwordError")
const ageErrorDiv = byId("ageError")

const errors = byQueryAll(".errorMessages");

// Function to display error message for input field
function nameValidation(fnameInput) {
    let errorMessage = ""
    if (!(/^[a-zA-Z]+$/).test(fnameInput)) {
        errorMessage = "First name must contain only letters.\n"
    }
    if (fnameInput.length <= 2) {
        errorMessage = "First name should be between more than 2 characters"
    }
    if (fnameInput.length > 10) {
        errorMessage = "First name should not exceed 10 characters."
    }
    if (parseInt(fnameInput)) {
        errorMessage = "First name cannot be an integer."
    }
    if (fnameInput == "" || fnameInput.length == 0) {
        errorMessage = ""
    }
    return errorMessage
}

function usernameValidation(username) {
    errorMessage = ""
    if (username.length <= 2) {
        errorMessage = "Username length should be greater than 2 characters.";
    }
    if (username.length > 15) {
        errorMessage = "The current username is too long."
    }
    if (parseInt(username)) {
        errorMessage = "Username cannot be a number"
    }
    if (username.length == 0 || username == "") {
        errorMessage = ""
    }
    usernameErrorDiv.innerText = errorMessage
}



showPasswordIcon.addEventListener("click", () => {
    if (passwordInput.type == "password") {
        passwordInput.type = "text"
        showPasswordIcon.name = "eye-off-outline"
    }
    else {
        passwordInput.type = "password"
        showPasswordIcon.name = "eye-outline"
    }
})

errors.forEach(error => {
    error.style.height = 0
})

fnameInput.addEventListener("input", () => {
    console.log(fnameInput.value);
    fnameErrorDiv.innerText = nameValidation(fnameInput.value)
    if (fnameErrorDiv.innerText) {
        fnameErrorDiv.style.height = "auto"
    }
    else {
        fnameErrorDiv.style.height = 0
    }
})
lnameInput.addEventListener("input", () => {
    lnameErrorDiv.innerText = nameValidation(lnameInput.value)
})

usernameInput.addEventListener("input", () => {
    usernameValidation(usernameInput.value)
})