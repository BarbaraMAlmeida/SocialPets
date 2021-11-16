/* Visible Password or No */
let inputPass = document.querySelector("#password")
let passwordVisible = document.querySelector(".visible");
let passwordInvisible = document.querySelector(".invisible");

passwordVisible.addEventListener("click", () => {
    passwordVisible.style.display = 'none'
    passwordInvisible.style.display = 'block'
    inputPass.setAttribute('type', 'password')
})

passwordInvisible.addEventListener("click", () => {
    passwordVisible.style.display = 'block'
    passwordInvisible.style.display = 'none'
    inputPass.setAttribute('type', 'text')
})
