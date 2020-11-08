<?php
// GESTION ET TRAITEMENT DES ERREURS ET EXCEPTIONS
function exceptions_error_handler($severity, $message, $filename, $lineno) //Permet de convertir les warnings et erreurs en exception
{
  if (error_reporting() == 0)
  {
    return;
  }
  if (error_reporting() & $severity)
  {
    throw new ErrorException($message, 0, $severity, $filename, $lineno);
  }
};

// On définit comment les erreurs doivent être gérées en appelant la fonction ci-dessus
set_error_handler('exceptions_error_handler');

// On récupère le flux RSS par défaut renseigné dans le fichier de config.ini
$ini = parse_ini_file('config.ini');
// On définit le flux à traiter (un flux par défaut est traité)
$rss_source = htmlspecialchars(isset($_GET['url']) && !empty($_GET['url']) ? $_GET['url'] : $ini['flux_rss']);

// Puis on s'assure de la conformité du flux
try {
    $rss_convert = simplexml_load_file($rss_source); // Flux RSS transformé en objet PHP
    $rss = $rss_convert->channel->item; // On récupère la liste des items du flux (classés par Index -> [0] [1] etc...)

    // On boucle le flux RSS pour connaitre le nombre d'actualité
    $count = 0;
    foreach ($rss as $key) {
        $count++;
    };

    // On récupère le choix de l'utilisateur du nombre d'articles à afficher (5 par défaut)
    $nbr_news = htmlspecialchars(isset($_GET['nbr']) && !empty($_GET['nbr']) ? $_GET['nbr'] : $ini['nbr_news_defaut']); // On indique le nombre de news à afficher par défaut
}
// SI le flux n'est pas conforme
catch (\Exception $e) {
    // On affiche un message d'erreur
    die('<p id="error">Flux RSS non conforme.</p>');
}
?>
<p class=""><span>Liste des dernières news du flux suivant :</span> <?= isset($rss_convert->channel->title) ? $rss_convert->channel->title : ''; ?></p>
<!-- Nom du flux RSS -->
<?php for ($i=0; $i < $nbr_news ; $i++) { ?>
    <article class="card">
        <img src="<?= $rss[$i]->image->url; ?>" class="card-img-top" alt="<?= $rss[$i]->image->title; ?>">
        <div class="card-body">
            <h2 class="card-title"><?= $rss[$i]->title; ?></h2>
            <p class="card-text"><?= $rss[$i]->description; ?></p>
            <a href="<?= $rss[$i]->link; ?>" class="btn btn-primary">Lire la news</a>
        </div>
    </article>
<?php } ?>
