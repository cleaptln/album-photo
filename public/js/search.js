$(document).ready(function() {
    $('#search').on('input', function() { //mise à jour à chaque frappe
        let query = $(this).val();

        $.ajax({
            url: '/photos/search', 
            type: 'GET',
            data: { q: query },
            success: function(data) {
                const photosSearchDiv = $('#photosSearch');
                photosSearchDiv.empty();
                if (data.length > 0) {
                    data.forEach(function(photo) {
                        photosSearchDiv.append(
                            '<div class="photo-item">' +
                                '<h3>' + photo.titre + '</h3>' +
                                '<img src="' + photo.image + '" alt="' + photo.titre + '">' +
                                '<a href="/albums/' + photo.album_id + '">Voir l\'album</a>' +
                            '</div>'
                        );
                    });
                } else {
                    photosSearchDiv.append('<div>Aucune photo trouvée.</div>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de la recherche:', error);
            }
        });
    });
});