const circleButton = document.getElementById("circleButton");
const radioList = document.getElementById("radioList");

// Activé l'expension au clique du bouton
circleButton.addEventListener("click", (event) => {
    event.stopPropagation(); // Prevent event bubbling to body
    circleButton.classList.toggle("expanded");
});

// Ferme la fenêtre si on clique en dehors
document.body.addEventListener("click", () => {
    circleButton.classList.remove("expanded");
});