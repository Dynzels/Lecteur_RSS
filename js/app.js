var app = {

    // Initialisation du script
    init: function() {
        console.log('Script JS initialisé !');
        $('#submit').on('click', app.hide); // On surveille le bouton "submit"
    },

    // Lorsque le formulaire est soumis
    hide: function(e) {
        e.preventDefault(); // On annule le rechargement de la page

        var rss = $('#src').val(); // On récupère l'url du flux
        var nbr_news = $('#nbr_news').val(); // On récupère le nombre d'article à afficher

        // GIF affichant une animation le temps du chargement
        $('#list_news').html('<img src="https://www.olybop.fr/wp-content/uploads/2018/10/loading-spin-defaut.gif">');


        $.ajax({
            url: 'news.php', // URL cible
            type: 'GET', // Le type de la requête HTTP
            data: 'url=' + rss + '&nbr=' + nbr_news, // Valeur des variables $_GET qu'on transmet
            dataType: 'html', // On désire recevoir du HTML

            // Si la requête est un succès
            success: function(data)
            {
                // On actualise le DIV avec l'ID "list_news"
                $('#list_news').html(data);
            },
            // Si la requête ne se fait pas (erreur)
            error: function(data)
            {
                console.log('Erreur');
                console.log(data);
            },
            // Lorsque la requête a terminé
            complete: function(data)
            {
                // Message de
                console.log('Actualité affichée avec succès !');
            }
        })
    }
}

// On initialise le script JS
$(app.init);
