const byId = (id) => {
  return document.getElementById(id);
};

const byQueryAll = (query) => {
  return document.querySelectorAll(query);
};

const fnameInput = byId("fname");
const lnameInput = byId("lname");
const passwordInput = byId("password");
const showPasswordIcon = byId("showPassIcon");
const usernameInput = byId("usernameInput");
const emailInput = byId("emailInput");

const fnameErrorDiv = byId("fnameError");
const lnameErrorDiv = byId("lnameError");
const usernameErrorDiv = byId("usernameError");
const passwordErrorDiv = byId("passwordError");
const ageErrorDiv = byId("ageError");
const emailErrorDiv = byId("emailError");

const errors = byQueryAll(".errorMessages");
const registerButton = byId("button");

var isFirstNameValid = false;
var isLastNameValid = false;
var isUsernameValid = false;
var isEmailValid = false;
// var isPasswordValid = false;
// var isAgeValid = false;

function nameValidation(fnameInput) {
  let errorMessage = "";
  if (!/^[a-zA-Z]+$/.test(fnameInput)) {
    errorMessage = "First name must contain only letters.\n";
  }
  if (fnameInput.length <= 2) {
    errorMessage = "First name should be between more than 2 characters";
  }
  if (fnameInput.length > 10) {
    errorMessage = "First name should not exceed 10 characters.";
  }
  if (parseInt(fnameInput)) {
    errorMessage = "First name cannot be an integer.";
  }
  if (fnameInput == "" || fnameInput.length == 0) {
    errorMessage = "";
  }
  return errorMessage;
}

function usernameValidation(username) {
  errorMessage = "";
  allUsers.forEach((user) => {
    if (user.username == username) {
      errorMessage = `${username} has already been taken.`;
    }
  });

  if (username.length <= 2) {
    errorMessage = "Username length should be greater than 2 characters.";
  }
  if (username.length > 15) {
    errorMessage = "The current username is too long.";
  }
  if (parseInt(username)) {
    errorMessage = "Username cannot be a number";
  }
  if (username.length == 0 || username == "") {
    errorMessage = "";
  }
  usernameErrorDiv.innerText = errorMessage;
  isUsernameValid = (errorMessage == "" || errorMessage == null) ? true : false;
  disableRegisterButton()
  console.log("isUsernameValid: " + isUsernameValid);
}

function emailValidation(email) {
  errorMessage = "";
  allUsers.forEach((user) => {
    if (user.email == email) {
      errorMessage = `The email ${email} already exists`;
    }
  });
  emailErrorDiv.innerText = errorMessage;
  isEmailValid = errorMessage == "" ? true : false;
  disableRegisterButton()
  console.log("isEmailValid: " + isEmailValid);
}

showPasswordIcon.addEventListener("click", () => {
  if (passwordInput.type == "password") {
    passwordInput.type = "text";
    showPasswordIcon.name = "eye-off-outline";
  } else {
    passwordInput.type = "password";
    showPasswordIcon.name = "eye-outline";
  }
});

errors.forEach((error) => {
  error.style.height = 0;
});

fnameInput.addEventListener("input", () => {
  errorMessage = nameValidation(fnameInput.value);
  fnameErrorDiv.innerText = errorMessage;
  isFirstNameValid = errorMessage == "" ? true : false;
  disableRegisterButton()
  console.log("isFirstNameValid: " + isFirstNameValid);
});

lnameInput.addEventListener("input", () => {
    errorMessage = nameValidation(lnameInput.value);
    lnameErrorDiv.innerText = errorMessage;
    isLastNameValid = errorMessage == "" ? true : false;
    disableRegisterButton()
    console.log("isLastNameValid: " + isLastNameValid);
});

usernameInput.addEventListener("input", () => {
  usernameValidation(usernameInput.value);
});

emailInput.addEventListener("input", () => {
  emailValidation(emailInput.value);
});


// Disabling the register button
function disableRegisterButton() {
    registerButton.disabled = isFirstNameValid && isLastNameValid && isEmailValid && isUsernameValid ? false : true;
    console.log("isButtonDisabled: " + registerButton.disabled );
}