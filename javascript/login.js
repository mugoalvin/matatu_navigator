const selectCategory = byId("userCategory")
const loginButton = byId("button");

isCategorySelected = false
isUsernameSelected = false
isPasswordSelected = false

selectCategory.addEventListener("change", () => {
    isCategorySelected = true
    disableLoginButton()
})

usernameInput.addEventListener("input", () =>{
    isUsernameSelected = usernameInput.value !== "" ? true : false
    disableLoginButton()
})

passwordInput.addEventListener("input", () => {
    isPasswordSelected = passwordInput.value !== "" ? true : false
    disableLoginButton()
})

function disableLoginButton() {
    loginButton.disabled = isCategorySelected && isUsernameSelected && isPasswordSelected ? false : true
}