document.addEventListener("DOMContentLoaded", function() {
    const circleButton = document.getElementById("circleButton");
    const radioList = document.getElementById("radioList");
    const submitButton = document.getElementById("soumettre");

    // Activer l'expansion au clic du bouton
    circleButton.addEventListener("click", function(event) {
        event.stopPropagation(); // Empêche la propagation de l'événement
        circleButton.classList.toggle("expanded");
    });

    // Empêcher la fermeture lors de la sélection d'une option radio
    radioList.addEventListener("click", function(event) {
        event.stopPropagation(); // Empêche la propagation de l'événement
    });

    // Fermer le bouton lors du clic sur "Soumettre"
    submitButton.addEventListener("click", function() {
        circleButton.classList.remove("expanded");
    });

    // Fermer le menu si un clic est détecté en dehors du bouton ou de la liste
    document.addEventListener("click", function() {
        if (circleButton.classList.contains("expanded")) {
            circleButton.classList.remove("expanded");
        }
    });
});