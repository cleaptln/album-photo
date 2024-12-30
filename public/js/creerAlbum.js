document.getElementById('add-photo').addEventListener('click', function() {
    // Créer une nouvelle div pour insérer la photo
    var newPhotoDiv = document.createElement('div');
    newPhotoDiv.className = 'insertPhoto';

    var photoIndex = document.querySelectorAll('.insertPhoto').length;

    // Ajouter les champs à la nouvelle div
    newPhotoDiv.innerHTML = `
        <input type="text" name="titrePhoto[${photoIndex}]" placeholder="Titre de la photo" required>
        <input type="file" name="img[${photoIndex}]" placeholder="Image" required>
        <div class="tag-input-container">
            <input type="text" class="tag-input" placeholder="#vacances #autre #...">
            <div class="tag-container"></div>
        </div>
        <input type="number" name="note[${photoIndex}]" placeholder="Note (1-5)" min="1" max="5" required>
        <button type="button" class="remove-photo">Supprimer</button>
    `;

    // Ajouter la nouvelle div au conteneur de photos
    document.getElementById('photos-container').appendChild(newPhotoDiv);

    // Ajouter un gestionnaire d'événements au bouton de suppression de cette nouvelle div
    newPhotoDiv.querySelector('.remove-photo').addEventListener('click', function() {
        newPhotoDiv.remove();
    });

    newPhotoDiv.querySelector('.tag-input').addEventListener('keydown', function(event) {
        if (event.key === ' ') {
            event.preventDefault();
            var tag = event.target.value.trim();
            if (tag) {
                // Supprimez le symbole '#' s'il est présent au début du tag
                if (tag.startsWith('#')) {
                    tag = tag.substring(1);
                }
                addTag(tag, photoIndex);
                event.target.value = '';
            }
        }
    });
});

function addTag(tag, photoIndex) {
    var tagContainer = document.querySelectorAll('.insertPhoto')[photoIndex].querySelector('.tag-container');
    var tagElement = document.createElement('span');
    tagElement.className = 'tag';
    tagElement.textContent = tag;
    tagContainer.appendChild(tagElement);

    // Ajouter un champ caché pour envoyer le tag avec le formulaire
    var hiddenInput = document.createElement('input');
    hiddenInput.type = 'hidden';
    hiddenInput.name = `tags[${photoIndex}][]`;
    hiddenInput.value = tag;
    tagContainer.appendChild(hiddenInput);
}

