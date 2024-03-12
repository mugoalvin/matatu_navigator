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

function nameValidation(nameInput) {
  let errorMessage = "";
  if (!/^[a-zA-Z]+$/.test(nameInput)) {
    errorMessage = "Name must contain only letters.\n";
  }
  if (nameInput.length <= 2) {
    errorMessage = "Name should be between more than 2 characters";
  }
  if (nameInput.length > 10) {
    errorMessage = "Name should not exceed 10 characters.";
  }
  if (parseInt(nameInput)) {
    errorMessage = "Name cannot be an integer.";
  }
  if (nameInput == "" || nameInput.length == 0) {
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
  isUsernameValid = username !== "" && errorMessage == ""  ? true : false;
  disableRegisterButton();
}

function emailValidation(email) {
  errorMessage = "";
  allUsers.forEach((user) => {
    if (user.email == email) {
      errorMessage = `The email ${email} already exists`;
    }
  });
  emailErrorDiv.innerText = errorMessage;
  isEmailValid = errorMessage == "" && email !== "" ? true : false;
  disableRegisterButton();
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
  error.style.height = error == "" ? 0 : "auto";
});

fnameInput.addEventListener("input", () => {
  errorMessage = nameValidation(fnameInput.value);
  isFirstNameValid = errorMessage == "" && fnameInput.value !== "" ? true : false;
  fnameErrorDiv.innerText = errorMessage;
  disableRegisterButton();
});

lnameInput.addEventListener("input", () => {
	errorMessage = nameValidation(lnameInput.value);
	isLastNameValid = lnameInput.value !== "" && errorMessage == "" ? true : false
	lnameErrorDiv.innerText = errorMessage;
	disableRegisterButton();
});

usernameInput.addEventListener("input", () => {
  isUsernameValid = (usernameInput.value == "" || usernameInput.value == null) ? false : true
  usernameValidation(usernameInput.value);
});

emailInput.addEventListener("input", () => {
  if (emailInput.value == "" || emailInput.value == null) {
    isEmailValid = false;
  }
  emailValidation(emailInput.value);
});

// Disabling the register button
function disableRegisterButton() {
  registerButton.disabled = isFirstNameValid && isLastNameValid && isEmailValid && isUsernameValid ? false : true;
}