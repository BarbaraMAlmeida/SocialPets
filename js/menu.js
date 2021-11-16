/* Menu Hamburguer */
let hamburguer = document.querySelector(".hamburguer");
let menudown = document.querySelector(".menuDown");

hamburguer.addEventListener("click", () => {
    menudown.classList.toggle("open");
})

/* Modal */

let openModalFound = document.querySelector(".find");
let closeModal = document.querySelector("i.closeModal");
let buttonFound = document.querySelectorAll("button.found");

buttonFound.forEach((btn) => btn.addEventListener("click", (event) => {
    openModalFound.classList.add("open");
}))

closeModal.addEventListener("click", () => {
    openModalFound.classList.remove("open");
})



